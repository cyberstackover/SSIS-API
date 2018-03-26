<?php

require APPPATH . '/controllers/Auth.php';

class Rumahsakit extends Auth {

    function __construct($config = 'rest') {
        parent::__construct($config);
        
        $this->load->model('Rumahsakit_model', 'rs_model');
    }

    /**
     * @api {get} /Rumahsakit/ Request semua data rumah sakit
     * @apiVersion 0.1.0
     * @apiName GetRumahsakit
     * @apiGroup Rumahsakit
     *
     * @apiSuccess {String[]} data berisi data rumah sakit
     * @apiSuccess {Integer} data.id  id rumah sakit
     * @apiSuccess {String} data.nama  nama rumah sakit
     * @apiSuccess {String} data.alamat  alamat rumah sakit
     * @apiSuccess {Char} data.isactive  status aktif (y) atau non aktif (n) rumah sakit
     * @apiSuccess {Timestamp} data.created  waktu saat input data
     * @apiSuccess {Integer} data.createdby  id user yang melakukan input data
     * @apiSuccess {Timestamp} data.updated  waktu saat edit data
     * @apiSuccess {Integer} data.updatedby  id user yang melakukan edit data
     * @apiSuccess {Integer} data.no  nomor urut data
     * @apiSuccess {String} data.action  tombol edit dan delete
     *
     */

    /**
     * @api {get} /Rumahsakit/:id Request data rumah sakit berdasarkan id
     * @apiVersion 0.1.0
     * @apiName GetRumahsakitById
     * @apiGroup Rumahsakit
     *
     * @apiSuccess {String[]} data berisi data rumah sakit
     * @apiSuccess {Integer} data.id  id rumah sakit
     * @apiSuccess {String} data.nama  nama rumah sakit
     * @apiSuccess {String} data.alamat  alamat rumah sakit
     * @apiSuccess {Char} data.isactive  status aktif (y) atau non aktif (n) rumah sakit
     * @apiSuccess {Timestamp} data.created  waktu saat input data
     * @apiSuccess {Integer} data.createdby  id user yang melakukan input data
     * @apiSuccess {Timestamp} data.updated  waktu saat edit data
     * @apiSuccess {Integer} data.updatedby  id user yang melakukan edit data
     *
     */
    public function index_get($id = 0) {
        if ($id == 0) {
            $data = $this->rs_model->getAll();
            $no = 1;
            foreach ($data as $key => $value) {
                $data[$key]['no'] = $no;
                $data[$key]['action'] = '<button onclick="show_modal_edit(' . $value['id_rumahsakit'] . ')" title="Ubah" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>'
                        . '<button onclick="show_modal_delete(' . $value['id_rumahsakit'] . ')" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
                $no++;
            }
        } else {
            $data = $this->rs_model->getById($id);
        }

        $this->response(array("data" => $data), 200);
    }

    /**
     * @api {post} /Rumahsakit/insert Create rumahsakit
     * @apiVersion 0.1.0
     * @apiName PostRumahsakit
     * @apiGroup Rumahsakit
     *
     * @apiParam {String} nama nama rumah sakit
     * @apiParam {String} alamat alamat rumah sakit
     * @apiParam {String} telepon nomor telepon rumah sakit
     *
     * @apiSuccess {String} status success
     *
     */
    public function insert_post() {
        $this->cek_token();
        $input = $this->getJson();
        $data = array(
            'nama' => $input['nama'],
            'alamat' => $input['alamat'],
            'telepon' => $input['telepon'],
            'createdby' => $this->session->userdata('id_user')
        );
        $insert = $this->rs_model->store($data);
        if ($insert) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    /**
     * @api {post} /Rumahsakit/update update rumahsakit
     * @apiVersion 0.1.0
     * @apiName UpdateRumahsakit
     * @apiGroup Rumahsakit
     *
     * @apiParam {Integer} id id rumah sakit yang akan diupdate
     * @apiParam {String} nama nama rumah sakit
     * @apiParam {String} alamat alamat rumah sakit
     * @apiParam {String} telepon nomor telepon rumah sakit
     *
     * @apiSuccess {String} status success
     *
     */
    public function update_post() {
        $this->cek_token();
        $input = $this->getJson();
        $id = $input['id_rumahsakit'];
        $data = array(
            'nama' => $input['nama'],
            'alamat' => $input['alamat'],
            'telepon' => $input['telepon'],
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        $update = $this->rs_model->update($id, $data);
        if ($update) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    /**
     * @api {post} /Rumahsakit/delete hapus data rumahsakit
     * @apiVersion 0.1.0
     * @apiName DeleteRumahsakit
     * @apiGroup Rumahsakit
     *
     * @apiParam {Integer} id id rumah sakit yang akan dihapus
     *
     * @apiSuccess {String} status success
     *
     */
    public function delete_post() {
        $this->cek_token();
        $input = $this->getJson();
        $id = $input['id_rumahsakit'];
        $data = array(
            'isactive' => 'n',
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        $delete = $this->rs_model->delete($id, $data);
        if (is_null($id) || $id == '') {
            $this->response(array('status' => 'fail', 502));
        }
        if ($delete) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
