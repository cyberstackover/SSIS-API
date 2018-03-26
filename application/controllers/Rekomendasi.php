<?php

require APPPATH . '/controllers/Auth.php';

class Rekomendasi extends Auth {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->cek_token();
        $this->load->model('Rekomendasi_model', 'r_model');
    }

    /**
     * @api {get} /Rekomendasi/ Request semua data rekomendasi
     * @apiVersion 0.1.0
     * @apiName GetRekomendasi
     * @apiGroup Rekomendasi
     *
     * @apiSuccess {String[]} data berisi data rekomendasi
     * @apiSuccess {Integer} data.id  id rekomendasi
     * @apiSuccess {String} data.rekomendasi  nama rekomendasi
     * @apiSuccess {Integer} data.id_derajat_cidera  id derajat cidera
     * @apiSuccess {String} data.nama  nama derajat cidera
     * @apiSuccess {String} data.keterangan  keterangan derajat cidera
     * @apiSuccess {Integer} data.min_nilai  nilai minimum derajat cidera
     * @apiSuccess {Integer} data.max_nilai  nilai maximum derajat cidera
     * @apiSuccess {Char} data.isactive  status aktif (y) atau non aktif (n) 
     * @apiSuccess {Timestamp} data.created  waktu saat input data
     * @apiSuccess {Integer} data.createdby  id user yang melakukan input data
     * @apiSuccess {Timestamp} data.updated  waktu saat edit data
     * @apiSuccess {Integer} data.updatedby  id user yang melakukan edit data
     * @apiSuccess {Integer} data.no  nomor urut data
     * @apiSuccess {String} data.action  tombol edit dan delete
     *
     */

    /**
     * @api {get} /Rekomendasi/:id Request data rekomendasi berdasarkan id
     * @apiVersion 0.1.0
     * @apiName GetRekomendasiById
     * @apiGroup Rekomendasi
     *
     * @apiSuccess {String[]} data berisi data rekomendasi
     * @apiSuccess {Integer} data.id  id rekomendasi
     * @apiSuccess {String} data.rekomendasi  nama rekomendasi
     * @apiSuccess {Integer} data.id_derajat_cidera  id derajat cidera
     * @apiSuccess {String} data.nama  nama derajat cidera
     * @apiSuccess {String} data.keterangan  keterangan derajat cidera
     * @apiSuccess {Integer} data.min_nilai  nilai minimum derajat cidera
     * @apiSuccess {Integer} data.max_nilai  nilai maximum derajat cidera
     * @apiSuccess {Char} data.isactive  status aktif (y) atau non aktif (n) 
     * @apiSuccess {Timestamp} data.created  waktu saat input data
     * @apiSuccess {Integer} data.createdby  id user yang melakukan input data
     * @apiSuccess {Timestamp} data.updated  waktu saat edit data
     * @apiSuccess {Integer} data.updatedby  id user yang melakukan edit data
     * @apiSuccess {Integer} data.no  nomor urut data
     * @apiSuccess {String} data.action  tombol edit dan delete
     *
     */
    public function index_get($id = 0) {
        if ($id == 0) {
            $data = $this->r_model->getAll();
            $no = 1;
            foreach($data as $key=>$value){
                $data[$key]['no'] = $no;
                $data[$key]['action'] = '<button onclick="show_modal_edit('.$value['id_rekomendasi'].')" title="Ubah" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>'
                        .'<button onclick="show_modal_delete('.$value['id_rekomendasi'].')" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
                $no++;
            }
        } else {
            $data = $this->r_model->getById($id);
        }
        $this->response(array("data"=>$data, 200));
    }

    /**
     * @api {post} /Rekomendasi/insert Create rekomendasi
     * @apiVersion 0.1.0
     * @apiName PostRekomendasi
     * @apiGroup Rekomendasi
     *
     * @apiParam {String} rekomendasi nama rekomendasi
     * @apiParam {Integer} id_derajat_cidera id derajat cidera
     *
     * @apiSuccess {String} status success
     *
     */
    public function insert_post() {
        $input = $this->getJson();
        $data = array(
            'rekomendasi' => $input['rekomendasi'],
            'id_derajat_cidera' => $input['id_derajat_cidera'],
            'createdby' => $this->session->userdata('id_user')
        );
        $insert = $this->r_model->store($data);
        if ($insert) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    /**
     * @api {post} /Rekomendasi/update update rekomendasi
     * @apiVersion 0.1.0
     * @apiName UpdateRekomendasi
     * @apiGroup Rekomendasi
     *
     * @apiParam {Integer} id_rekomendasi id rekomendasi yang akan diupdate
     * @apiParam {String} rekomendasi nama rekomendasi
     * @apiParam {Integer} id_derajat_cidera id derajat cidera
     *
     * @apiSuccess {String} status success
     *
     */
    public function update_post() {
        $input = $this->getJson();
        $id = $input['id_rekomendasi'];
        $data = array(
            'rekomendasi' => $input['rekomendasi'],
            'id_derajat_cidera' => $input['id_derajat_cidera'],
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        $update = $this->r_model->update($id, $data);
        if ($update) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    
    /**
     * @api {post} /Rekomendasi/delete hapus rekomendasi
     * @apiVersion 0.1.0
     * @apiName DeleteRekomendasi
     * @apiGroup Rekomendasi
     *
     * @apiParam {Integer} id_rekomendasi id rekomendasi yang akan dihapus
     *
     * @apiSuccess {String} status success
     *
     */
    public function delete_post() {
        $input = $this->getJson();
        $id = $input['id_rekomendasi'];
        $data = array(
            'isactive' => 'n',
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        $delete = $this->r_model->delete($id,$data);
        if ($delete) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
