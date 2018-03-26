<?php

require APPPATH . '/controllers/Auth.php';

class Dokter extends Auth {

    private $id_user;

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->id_user = $this->session->userdata('id_user');
        $this->load->model('Dokter_model', 'dokter_model');
        $this->load->helper('url');
    }

    /**
     * @api {get} /Dokter/ Request semua data dokter
     * @apiVersion 0.1.0
     * @apiName GetDokter
     * @apiGroup Dokter
     *
     * @apiSuccess {String[]} data berisi data dokter
     * @apiSuccess {Integer} data.id_dokter  id dokter
     * @apiSuccess {String} data.nama  nama dokter
     * @apiSuccess {String} data.username  username dokter
     * @apiSuccess {String} data.password  password dokter
     * @apiSuccess {Integer} data.id_rumahsakit  id rumah sakit
     * @apiSuccess {String} data.nama_rs  nama rumah sakit
     * @apiSuccess {String} data.alamat  alamat rumah sakit
     * @apiSuccess {String} data.telepon  nomor telepon rumah sakit
     * @apiSuccess {String} data.isapprove  y = sudah disetujui , n = belum disetujui
     * @apiSuccess {Integer} data.no  nomor urut data
     * @apiSuccess {String} data.action  tombol edit dan delete
     *
     */

    /**
     * @api {get} /Dokter/:id Request data dokter by id
     * @apiVersion 0.1.0
     * @apiName GetDokterById
     * @apiGroup Dokter
     *
     * @apiSuccess {String[]} data berisi data dokter
     * @apiSuccess {Integer} data.id_dokter  id dokter
     * @apiSuccess {String} data.nama  nama dokter
     * @apiSuccess {String} data.username  username dokter
     * @apiSuccess {String} data.password  password dokter
     * @apiSuccess {Integer} data.id_rumahsakit  id rumah sakit
     * @apiSuccess {String} data.nama_rs  nama rumah sakit
     * @apiSuccess {String} data.alamat  alamat rumah sakit
     * @apiSuccess {String} data.telepon  nomor telepon rumah sakit
     * @apiSuccess {String} data.isapprove  y = sudah disetujui , n = belum disetujui
     *
     */
    public function index_get($id = 0) {
//        $this->cek_token();
        if ($id == 0) {
            $data = $this->dokter_model->getAll();
            $no = 1;
            foreach ($data as $key => $value) {
                $data[$key]['no'] = $no;
                $tombol = '<button onclick="show_modal_edit(' . $value['id_dokter'] . ')" title="Ubah" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>'
                        . '<button onclick="show_modal_delete(' . $value['id_dokter'] . ')" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
                if ($data[$key]['isapprove'] == 'n') {
                    $tombol .= '<button onclick="show_modal_approve(' . $value['id_dokter'] . ')" title="Approve" class="btn btn-info btn-xs"><i class="fa fa-check-square"></i></button>';
                } else {
                    $tombol .= '<button onclick="show_modal_reject(' . $value['id_dokter'] . ')" title="Reject" class="btn btn-primary btn-xs"><i class="fa fa-close"></i></button>';
                }
                $data[$key]['action'] = $tombol;
                $no++;
            }
        } else {
            $data = $this->dokter_model->getById($id);
        }
//        $data = $this->db->last_query();
        $this->response(array("data" => $data), 200);
    }

    /**
     * @api {post} /Dokter/insert Create dokter
     * @apiVersion 0.1.0
     * @apiName PostDokter
     * @apiGroup Dokter
     *
     * @apiParam {String} nama nama dokter
     * @apiParam {String} username username dokter
     * @apiParam {String} email email dokter
     * @apiParam {String} password password dokter
     * @apiParam {Integer} id_rumahsakit id rumah sakit
     *
     * @apiSuccess {String} status success
     * @apiSuccess {String} pesan pesan
     */
    public function insert_post() {
        $input = $this->getJson();
        $data = array(
            'nama' => $input['nama'],
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => $this->hash_password($input['password']),
            'id_rumahsakit' => $input['id_rumahsakit'],
            'isdokter' => 'y',
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
            $insert = $this->dokter_model->store($data);
            if ($insert) {
                $this->response(array('status' => 'success', 'pesan' => 'berhasil menyimpan'), 200);
            } else {
                $this->response(array('status' => 'fail', 'pesan' => 'gagal menyimpan'), 502);
            }
        }
    }

    /**
     * @api {post} /Dokter/update update data dokter
     * @apiVersion 0.1.0
     * @apiName UpdateDokter
     * @apiGroup Dokter
     *
     * @apiParam {Integer} id_dokter id dokter
     * @apiParam {String} nama nama dokter
     * @apiParam {String} username username dokter
     * @apiParam {String} email email dokter
     * @apiParam {String} password password dokter
     * @apiParam {Integer} id_rumahsakit id rumah sakit
     *
     * @apiSuccess {String} status success
     * @apiSuccess {String} pesan pesan
     *
     */
    public function update_post() {
        $this->cek_token();
        $input = $this->getJson();
        $id = $input['id_dokter'];
        $data = array(
            'nama' => $input['nama'],
            'username' => $input['username'],
            'email' => $input['email'],
            'id_rumahsakit' => $input['id_rumahsakit'],
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        if(isset($input['password'])){
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
            $update = $this->dokter_model->update($id, $data);
            if ($update) {
                $this->response(array('status' => 'success', 'pesan' => 'berhasil menyimpan'), 200);
            } else {
                $this->response(array('status' => 'fail', 'pesan' => 'gagal menyimpan'), 502);
            }
        }
    }

    /**
     * @api {post} /Dokter/delete hapus data dokter
     * @apiVersion 0.1.0
     * @apiName DeleteDokter
     * @apiGroup Dokter
     *
     * @apiParam {Integer} id_dokter id dokter yang akan dihapus
     *
     * @apiSuccess {String} status success
     *
     */
    public function delete_post() {
        $this->cek_token();
        $input = $this->getJson();
        $id = $input['id_dokter'];
        $data = array(
            'isactive' => 'n',
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        $delete = $this->dokter_model->delete($id, $data);
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
     * @api {post} /Dokter/approve approve dokter
     * @apiVersion 0.1.0
     * @apiName ApproveDokter
     * @apiGroup Dokter
     *
     * @apiParam {Integer} id_dokter id dokter
     * @apiParam {String} isapprove y = aprove, n = reject
     *
     * @apiSuccess {String} status success
     *
     */
    public function approve_post() {
        $this->cek_token();
        $input = $this->getJson();
        $id = $input['id_dokter'];
        $data = array(
            'isapprove' => $input['isapprove'],
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        $update = $this->dokter_model->update($id, $data);
        if ($update) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    /**
     * @api {get} /Dokter/pasien/:id get data dokter by id pasien
     * @apiVersion 0.1.0
     * @apiName GetDokterPasien
     * @apiGroup Dokter
     *
     * @apiSuccess {String} status success
     * @apiSuccess {String[]} data berisi data dokter
     * @apiSuccess {Integer} data.id_dokter id dokter
     * @apiSuccess {String} data.nama_dokter nama dokter
     * @apiSuccess {String} data.foto foto
     * @apiSuccess {String} data.nama_rumahsakit nama rumahsakit
     * @apiSuccess {String} data.alamat alamat rumah sakit
     * @apiSuccess {String} data.telepon telepon rumah sakit
     *
     */
    public function pasien_get($id) {
        $this->cek_token();
        $dokter = $this->dokter_model->getByPasien($id);


        $this->response(array('status' => 'success', 'data' => $dokter), 200);
    }

    /**
     * @api {post} /Dokter/upload/ upload foto dokter
     * @apiVersion 0.1.0
     * @apiName UploadFotoDokter
     * @apiGroup Dokter
     *
     * @apiParam {File} file file foto dokter
     * @apiParam {Integer} id id dokter
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
            $update = $this->dokter_model->update($id, $data);
            if ($update) {
                $this->response(array('status' => 'success', 200));
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
        
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
//            $update = $this->dokter_model->update($id, $data);
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
        $cek = $this->dokter_model->cekDuplicate($field, $fieldvalue, $id);
        if ($cek > 0) {
            return true;
        } else {
            return false;
        }
    }

}
