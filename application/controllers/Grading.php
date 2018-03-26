<?php

require APPPATH . '/controllers/Auth.php';

class Grading extends Auth {	

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->cek_token();
        $this->load->model('Grading_model', 'grd_model');
    }
    
    /**
     * @api {get} /Grading/ Request semua data grading 
     * @apiVersion 0.1.0
     * @apiName GetGrading
     * @apiGroup Grading
     *
     * @apiSuccess {String[]} data berisi data grading
     * @apiSuccess {Integer} data.id  id grading
     * @apiSuccess {String} data.nama_grading  nama grading
     * @apiSuccess {Integer} data.nilai  nilai grading
     * @apiSuccess {Integer} data.urut  urutan grading
     * @apiSuccess {String} data.nama_parameter  nama parameter
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
     * @api {get} /Grading/:id Request data grading berdasarkan id
     * @apiVersion 0.1.0
     * @apiName GetGradingById
     * @apiGroup Grading
     *
     * @apiSuccess {String[]} data berisi data grading
     * @apiSuccess {Integer} data.id  id grading
     * @apiSuccess {String} data.nama_grading  nama grading
     * @apiSuccess {Integer} data.nilai  nilai grading
     * @apiSuccess {Integer} data.urut  urutan grading
     * @apiSuccess {String} data.nama_parameter  nama parameter
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
            $data = $this->grd_model->getAll();
            $no = 1;
            foreach($data as $key=>$value){
                $data[$key]['no'] = $no;
                $data[$key]['action'] = '<button onclick="show_modal_edit('.$value['id_grading'].')" title="Ubah" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>'
                        .'<button onclick="show_modal_delete('.$value['id_grading'].')" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
                $no++;
            }
        } else {
            $data = $this->grd_model->getById($id);
        }

        $this->response(array("data"=>$data), 200);
    }
    
    /**
     * @api {post} /Grading/insert Create grading
     * @apiVersion 0.1.0
     * @apiName PostGrading
     * @apiGroup Grading
     *
     * @apiParam {String} nama nama grading
     * @apiParam {Integer} nilai nilai grading
     * @apiParam {Integer} urut urut grading
     * @apiParam {Integer} id_parameter id parameter
     *
     * @apiSuccess {String} status success
     *
     */
    public function insert_post() {
        $input = $this->getJson();
        $data = array(
            'nama' => $input['nama'],
            'nilai' => $input['nilai'],
            'urut' => $input['urut'],
            'id_parameter' => $input['id_parameter'],
            'createdby' => $this->session->userdata('id_user')
        );
        $insert = $this->grd_model->store($data);
        if ($insert) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    /**
     * @api {post} /Grading/update update grading
     * @apiVersion 0.1.0
     * @apiName UpdateGrading
     * @apiGroup Grading
     *
     * @apiParam {Integer} id_grading id grading yang akan di update
     * @apiParam {String} nama nama grading
     * @apiParam {Integer} nilai nilai grading
     * @apiParam {Integer} urut urut grading
     * @apiParam {Integer} id_parameter id parameter
     *
     * @apiSuccess {String} status success
     *
     */
    public function update_post() {
        $input = $this->getJson();
        $id = $input['id_grading'];
        $data = array(
            'nama' => $input['nama'],
            'nilai' => $input['nilai'],
            'urut' => $input['urut'],
            'id_parameter' => $input['id_parameter'],
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        $update = $this->grd_model->update($id, $data);
        if(is_null($id) || $id==''){
            $this->response(array('status' => 'fail', 502));
        }
        if ($update) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    /**
     * @api {post} /Grading/delete hapus grading
     * @apiVersion 0.1.0
     * @apiName DeleteGrading
     * @apiGroup Grading
     *
     * @apiParam {Integer} id_grading id grading yang akan di hapus
     *
     * @apiSuccess {String} status success
     *
     */
    public function delete_post() {
        $input = $this->getJson();
        $id = $input['id_grading'];
        $data = array(
            'isactive' => 'n',
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        $delete = $this->grd_model->delete($id,$data);
        if(is_null($id) || $id==''){
            $this->response(array('status' => 'fail', 502));
        }
        if ($delete) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	
}