<?php

require APPPATH . '/controllers/Auth.php';

class Pasien extends Auth {

    private $id_user;

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->id_user = $this->session->userdata('id_user');
        $this->load->model('Pasien_model', 'pasien_model');
    }

    /**
     * @api {get} /Pasien/ Request semua data pasien
     * @apiVersion 0.1.0
     * @apiName GetPasien
     * @apiGroup Pasien
     *
     * @apiSuccess {String[]} data berisi data pasien
     * @apiSuccess {Integer} data.id_pasien  id pasien
     * @apiSuccess {String} data.nama  nama pasien
     * @apiSuccess {String} data.username  username pasien
     * @apiSuccess {String} data.password  password pasien
     * @apiSuccess {String} data.tanggal_lahir  tanggal lahir pasien (yyyy-mm-dd)
     * @apiSuccess {String} data.gender  jenis kelamin pasien (l = laki-laki, p = perempuan)
     * @apiSuccess {Integer} data.id_dokter  id dokter
     * @apiSuccess {String} data.nama_dokter  nama dokter
     * @apiSuccess {Integer} data.no  nomor urut data
     * @apiSuccess {String} data.action  tombol edit dan delete
     *
     * 
     */

    /**
     * @api {get} /Pasien/:id Request semua data pasien
     * @apiVersion 0.1.0
     * @apiName GetPasienById
     * @apiGroup Pasien
     *
     * @apiSuccess {String[]} data berisi data pasien
     * @apiSuccess {Integer} data.id_pasien  id pasien
     * @apiSuccess {String} data.nama  nama pasien
     * @apiSuccess {String} data.username  username pasien
     * @apiSuccess {String} data.password  password pasien
     * @apiSuccess {String} data.tanggal_lahir  tanggal lahir pasien (yyyy-mm-dd)
     * @apiSuccess {String} data.gender  jenis kelamin pasien (l = laki-laki, p = perempuan)
     * @apiSuccess {Integer} data.id_dokter  id dokter
     * @apiSuccess {String} data.nama_dokter  nama dokter
     *
     */
    public function index_get($id = 0) {
//        $this->cek_token();
        if ($id == 0) {
            $data = $this->pasien_model->getAll();
            $no = 1;
            foreach ($data as $key => $value) {
                $data[$key]['no'] = $no;
                $data[$key]['action'] = '<button onclick="show_modal_edit(' . $value['id_pasien'] . ')" title="Ubah" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>'
                        . '<button onclick="show_modal_delete(' . $value['id_pasien'] . ')" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
                $no++;
            }
        } else {
            $data = $this->pasien_model->getById($id);
        }
//        $data = $this->db->last_query();
        $this->response(array("data" => $data), 200);
    }

    /**
     * @api {post} /Pasien/insert Create pasien
     * @apiVersion 0.1.0
     * @apiName PostPasien
     * @apiGroup Pasien
     *
     * @apiParam {String} nama nama pasien
     * @apiParam {String} username username pasien
     * @apiParam {String} email email pasien
     * @apiParam {String} password password pasien
     * @apiParam {String} tanggal_lahir tanggal lahir pasien (yyyy-mm-dd)
     * @apiParam {String} data.gender  jenis kelamin pasien (l = laki-laki, p = perempuan)
     * @apiParam {Integer} data.id_dokter  id dokter
     * 
     * @apiSuccess {String} status success
     * @apiSuccess {String} pesan pesan
     *
     */
    public function insert_post() {
        $input = $this->getJson();
        $data = array(
            'nama' => $input['nama'],
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => $this->hash_password($input['password']),
            'tanggal_lahir' => $input['tanggal_lahir'],
            'gender' => strtolower($input['gender']),
            'id_dokter' => $input['id_dokter'],
            'ispasien' => 'y',
            'createdby' => is_null($this->id_user) ? 0 : $this->id_user
        );
        if ($this->isDuplicate('username', $input['username']) || $this->isDuplicate('email', $input['email'])) {
            if ($this->isDuplicate('username', $input['username']) && $this->isDuplicate('email', $input['email'])) {
                $this->response(array('status' => 'fail', 'pesan' => 'Gagal Daftar, username dan email sudah pernah terdaftar'), 502);
            } else if ($this->isDuplicate('email', $input['email'])) {
                $this->response(array('status' => 'fail', 'pesan' => 'Gagal Daftar, email sudah pernah terdaftar'), 502);
            } else if ($this->isDuplicate('username', $input['username'])) {
                $this->response(array('status' => 'fail', 'pesan' => 'Gagal Daftar, username sudah pernah terdaftar'), 502);
            }
        } else {
            $insert = $this->pasien_model->store($data);
            if ($insert) {
                $this->response(array('status' => 'success', 'pesan' => 'berhasil menyimpan'), 200);
            } else {
                $this->response(array('status' => 'fail', 'pesan' => 'gagal menyimpan'), 502);
            }
        }
    }

    /**
     * @api {post} /Pasien/update update data pasien
     * @apiVersion 0.1.0
     * @apiName UpdatePasien
     * @apiGroup Pasien
     *
     * @apiParam {Integer} id_pasien id pasien
     * @apiParam {String} nama nama pasien
     * @apiParam {String} username username pasien
     * @apiParam {String} email email pasien
     * @apiParam {String} password password pasien
     * @apiParam {String} tanggal_lahir tanggal lahir pasien (yyyy-mm-dd)
     * @apiParam {String} data.gender  jenis kelamin pasien (l = laki-laki, p = perempuan)
     * @apiParam {Integer} data.id_dokter  id dokter
     *
     * @apiSuccess {String} status success
     * @apiSuccess {String} pesan pesan
     *
     */
    public function update_post() {
        $this->cek_token();
        $input = $this->getJson();
        $id = $input['id_pasien'];
        $data = array(
            'nama' => $input['nama'],
            'username' => $input['username'],
            'email' => $input['email'],
            'tanggal_lahir' => $input['tanggal_lahir'],
            'gender' => strtolower($input['gender']),
            'id_dokter' => $input['id_dokter'],
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        if (isset($input['password'])) {
            $data['password'] = $this->hash_password($input['password']);
        }
        if ($this->isDuplicate('username', $input['username'], $id) || $this->isDuplicate('email', $input['email'], $id)) {
            if ($this->isDuplicate('username', $input['username'], $id) && $this->isDuplicate('email', $input['email'], $id)) {
                $this->response(array('status' => 'fail', 'pesan' => 'duplikasi username & email'), 502);
            } else if ($this->isDuplicate('email', $input['email'], $id)) {
                $this->response(array('status' => 'fail', 'pesan' => 'duplikasi email'), 502);
            } else if ($this->isDuplicate('username', $input['username'], $id)) {
                $this->response(array('status' => 'fail', 'pesan' => 'duplikasi username'), 502);
            }
        } else {
            $update = $this->pasien_model->update($id, $data);
            if ($update) {
                $this->response(array('status' => 'success', 'pesan' => 'berhasil menyimpan'), 200);
            } else {
                $this->response(array('status' => 'fail', 'pesan' => 'gagal menyimpan'), 502);
            }
        }
    }

    /**
     * @api {post} /Pasien/delete hapus data pasien
     * @apiVersion 0.1.0
     * @apiName DeletePasien
     * @apiGroup Pasien
     *
     * @apiParam {Integer} id_pasien id pasien yang akan dihapus
     *
     * @apiSuccess {String} status success
     *
     */
    public function delete_post() {
        $this->cek_token();
        $input = $this->getJson();
        $id = $input['id_pasien'];
        $data = array(
            'isactive' => 'n',
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        $delete = $this->pasien_model->delete($id, $data);
        if (is_null($id) || $id == '') {
            $this->response(array('status' => 'fail', 502));
        }
        if ($delete) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    /**
     * @api {get} /Pasien/dokter/:id get data pasien by id dokter
     * @apiVersion 0.1.0
     * @apiName GetPasienDokter
     * @apiGroup Pasien
     *
     * @apiSuccess {String} status success
     * @apiSuccess {String[]} data berisi data pasien
     * @apiSuccess {Integer} data.id_pasien  id pasien
     * @apiSuccess {String} data.nama  nama pasien
     * @apiSuccess {String} data.tanggal_lahir  tanggal lahir pasien (yyyy-mm-dd)
     * @apiSuccess {String} data.gender  jenis kelamin pasien (l = laki-laki, p = perempuan)
     * @apiSuccess {String} data.foto foto pasien
     * @apiSuccess {Integer} data.id_dokter  id dokter
     * @apiSuccess {String} data.nama_dokter  nama dokter
     * @apiSuccess {String} data.usia  usia pasien
     *
     */
    public function dokter_get($id) {
        $this->cek_token();
        $pasien = $this->pasien_model->getByDokter($id);

        foreach ($pasien as $key => $value) {
            $pasien[$key]['usia'] = $this->hitung_umur($value['tanggal_lahir']);
        }
        $this->response(array('status' => 'success', 'data' => $pasien), 200);
    }

    private function hitung_umur($tanggal_lahir) {
        list($year, $month, $day) = explode("-", $tanggal_lahir);
        $year_diff = date("Y") - $year;
        $month_diff = date("m") - $month;
        $day_diff = date("d") - $day;
        if ($month_diff < 0) {
            $year_diff--;
        } else if (($month_diff == 0) && ($day_diff < 0)) {
            $year_diff--;
        }
        return $year_diff;
    }

    /**
     * @api {post} /Pasien/upload/:id upload foto pasien
     * @apiVersion 0.1.0
     * @apiName UploadFotoPasien
     * @apiGroup Pasien
     *
     * @apiParam {File} file file foto pasien
     *
     * @apiSuccess {String} status success
     *
     */
    public function upload_post() {
        $id = $_POST['id'];
        $info = pathinfo($_FILES['image']['name']);
        $ext = $info['extension']; // get the extension of the file
        $newname = uniqid().'.'.$ext; 
        $path = realpath(APPPATH . '../upload');
        $target = $path.'/'.$newname;

        $upload = move_uploaded_file( $_FILES['image']['tmp_name'], $target);
        
        if (!$upload) {
            $this->response(array('status' => 'fail', 'pesan' => 'gagal', 502));
        } else {
            $data = array(//        $id = $_POST['id'];

                'foto' => $newname,
                'updated' => date('Y-m-d H:i:s'),
                'updatedby' => $id
            );
            $update = $this->pasien_model->update($id, $data);
            if ($update) {
                $this->response(array('status' => 'success', 200));
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
//        $id = $_POST['id'];
//        $path = realpath(APPPATH . '../upload');
//        $data = $_POST['img'];
//        $data = str_replace('data:image/png;base64,', '', $data);
//        $data = str_replace(' ', '+', $data);
//        $data = base64_decode($data);
//        $file = $path . uniqid() . '.png';
//        $success = file_put_contents($file, $data);
//        if (!$success) {
//            $this->response(array('status' => 'fail', 'pesan' => 'gagal', 502));
//        } else {
//            $data = array(
//                'foto' => uniqid() . '.png',
//                'updated' => date('Y-m-d H:i:s'),
//                'updatedby' => $id
//            );
//            $update = $this->pasien_model->update($id, $data);
//            if ($update) {
//                $this->response(array('status' => 'success', 200));
//            } else {
//                $this->response(array('status' => 'fail', 502));
//            }
//        }
//        $config['upload_path'] = realpath(APPPATH . '../upload');
//        $config['allowed_types'] = 'jpg|png|jpeg';
//        $this->load->library('upload', $config);
//        if (!$this->upload->do_upload('file')) {
//            $pesan = $this->upload->display_errors();
//            $this->response(array('status' => 'fail', 'pesan' => $pesan, 502));
//        } else {
//            $upload_data = $this->upload->data();
//
//            $data = array(
//                'foto' => $upload_data['file_name'],
//                'updated' => date('Y-m-d H:i:s'),
//                'updatedby' => $id
//            );
//            $update = $this->dokter_model->update($id, $data);
//            if ($update) {
//                $this->response(array('status' => 'success', 200));
//            } else {
//                $this->response(array('status' => 'fail', 502));
//            }
//        }
    }

    private function isDuplicate($field, $fieldvalue, $id = 0) {
        $cek = $this->pasien_model->cekDuplicate($field, $fieldvalue, $id);
        if ($cek > 0) {
            return true;
        } else {
            return false;
        }
    }

}
