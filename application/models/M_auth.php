<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    private $_table = 'user';
    private $_primary = 'id_user';

    function cek_id($username) {
        $data = $this->db->get_where($this->_table, array('isactive' => 'y', 'username' => $username));
        return $data->row('id_user');
    }

    function data_user($id_user) {
        $data = $this->db->get_where($this->_table, array('isactive' => 'y', $this->_primary => $id_user));
        return $data->row();
    }

    function cek_login($username, $password) {
        $hash = $this->db->get_where($this->_table, array('isactive' => 'y', 'username' => $username))
                ->row('password');
        return $this->verify_password_hash($password, $hash);
    }

    private function hash_password($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    private function verify_password_hash($password, $hash) {
        return password_verify($password, $hash);
    }

}
