<?php

require APPPATH . '/controllers/Auth.php';

class Kriteria extends Auth {	

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->cek_token();
        $this->load->model('Kriteria_model', 'kta_model');
    }
    
    /**
     * @api {get} /Kriteria/ Request semua data kriteria 
     * @apiVersion 0.1.0
     * @apiName GetKriteria
     * @apiGroup Kriteria
     *
     * @apiSuccess {String[]} data berisi data kriteria
     * @apiSuccess {Integer} data.id  id kriteria
     * @apiSuccess {String} data.nama  nama kriteria
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
     * @api {get} /Kriteria/:id Request data kriteria berdasarkan id
     * @apiVersion 0.1.0
     * @apiName GetKriteriaById
     * @apiGroup Kriteria
     *
     * @apiSuccess {String[]} data berisi data kriteria
     * @apiSuccess {Integer} data.id  id kriteria
     * @apiSuccess {String} data.nama  nama kriteria
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
            $data = $this->kta_model->getAll();
            $no = 1;
            foreach($data as $key=>$value){
                $data[$key]['no'] = $no;
                $data[$key]['action'] = '<button onclick="show_modal_edit('.$value['id_kriteria'].')" title="Ubah" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>'
                        .'<button onclick="show_modal_delete('.$value['id_kriteria'].')" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
                $no++;
            }
        } else {
            $data = $this->kta_model->getById($id);
        }

        $this->response(array("data"=>$data), 200);
    }
    
    /**
     * @api {post} /Kriteria/insert Create kriteria
     * @apiVersion 0.1.0
     * @apiName PostKriteria
     * @apiGroup Kriteria
     *
     * @apiParam {String} nama nama kriteria
     *
     * @apiSuccess {String} status success
     *
     */
    public function insert_post() {
        $input = $this->getJson();
        $data = array(
            'nama' => $input['nama'],
            'createdby' => $this->session->userdata('id_user')
        );
        $insert = $this->kta_model->store($data);
        if ($insert) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    /**
     * @api {post} /Kriteria/update update kriteria
     * @apiVersion 0.1.0
     * @apiName UpdateKriteria
     * @apiGroup Kriteria
     *
     * @apiParam {Integer} id_kriteria id kriteria yang akan di update
     * @apiParam {String} nama nama kriteria
     *
     * @apiSuccess {String} status success
     *
     */
    public function update_post() {
        $input = $this->getJson();
        $id = $input['id_kriteria'];
        $data = array(
            'nama' => $input['nama'],
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        $update = $this->kta_model->update($id, $data);
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
     * @api {post} /Kriteria/delete hapus grading
     * @apiVersion 0.1.0
     * @apiName DeleteGrading
     * @apiGroup Grading
     *
     * @apiParam {Integer} id_kriteria id kriteria yang akan di hapus
     *
     * @apiSuccess {String} status success
     *
     */
    public function delete_post() {
        $input = $this->getJson();
        $id = $input['id_kriteria'];
        $data = array(
            'isactive' => 'n',
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        $delete = $this->kta_model->delete($id,$data);
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