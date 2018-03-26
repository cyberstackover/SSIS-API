<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

/*

 *  Notes :

 *  1. Function token_post() merupakan proses untuk login dan generate token
 *     returnnya id, username, tgl&wktu login dan token
 *  2. Function cek_post() merupakan proses untuk mengecek token valid atau tidak
 *
 */

class Auth extends REST_Controller {

    function __construct() {

        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('m_auth');
    }
    /*
     * fungsi getJson digunakan untuk parsing data json menjadi array
     */
    function getJson(){
        $inputjson = file_get_contents('php://input');
        $input = json_decode($inputjson, true);
        
        return $input;
    }

    function token_post() {
        $input = $this->getJson();
        
        $username = $input['username'];
        $password = $input['password'];

        $id = $this->m_auth->cek_login($username, $password);

        if ($id == true) {
            $id_user = $this->m_auth->cek_id($username);
            $admin = $this->m_auth->data_user($id_user);
            $data = array();
            $data['id'] = $admin->id_user;
            $data['username'] = $admin->username;       
            $output['id'] = $admin->id_user;
            $output['token'] = AUTHORIZATION::generateToken($data);
            $output['username'] = $admin->username;  
            $output['status'] = '';
            if($admin->ispasien == 'y'){
                $output['status'] = 'pasien';
            }
            if($admin->isdokter == 'y'){
                $output['status'] = 'dokter';
            }
            $session_set = array(
                'id_user' => $admin->id_user
            );
            $this->session->set_userdata($session_set);
            echo json_encode($output, REST_Controller::HTTP_OK);
        } else {
            $this->response(array('status' => 'Gagal', 502));
        }
    }

    function cek_token() {
        $token = $this->input->get_request_header('Token');
        if ($token != NULL) {
            $decodedToken = AUTHORIZATION::validateToken($token);
            if ($decodedToken == true) {
                $this->set_response($decodedToken, REST_Controller::HTTP_OK);
            } else {
                $this->response(array('status' => 'Token Tidak Valid', 502));
            }
        } else {
            $this->response(array('status' => 'Gagal', 502));
        }
        return $decodedToken;
    }

    function hash_password($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    function verify_password_hash($password, $hash) {
        return password_verify($password, $hash);
    }
}
