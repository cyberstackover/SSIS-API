<?php
require APPPATH . '/controllers/Auth.php';

class Derajatcidera extends Auth {	

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->cek_token();
        $this->load->model('Derajatcidera_model', 'dc_model');
    }
	
    /**
     * @api {get} /Derajatcidera/ Request semua data derajat cidera 
     * @apiVersion 0.1.0
     * @apiName GetDerajatcidera
     * @apiGroup Derajatcidera
     *
     * @apiSuccess {String[]} data berisi data derajat cidera
     * @apiSuccess {Integer} data.id_derajat_cidera  id derajat cidera
     * @apiSuccess {String} data.nama  nama derajat cidera
     * @apiSuccess {String} data.keterangan  keterangan derajat cidera
     * @apiSuccess {Integer} data.min_nilai  min nilai derajat cidera
     * @apiSuccess {Integer} data.max_nilai  max nilai derajat cidera
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
     * @api {get} /Derajatcidera/:id Request data derajat cidera berdasarkan id
     * @apiVersion 0.1.0
     * @apiName GetDerajatcideraById
     * @apiGroup Derajatcidera
     *
     * @apiSuccess {String[]} data berisi data derajat cidera
     * @apiSuccess {Integer} data.id_derajat_cidera  id derajat cidera
     * @apiSuccess {String} data.nama  nama derajat cidera
     * @apiSuccess {String} data.keterangan  keterangan derajat cidera
     * @apiSuccess {Integer} data.min_nilai  min nilai derajat cidera
     * @apiSuccess {Integer} data.max_nilai  max nilai derajat cidera
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
            $data = $this->dc_model->getAll();
            $no = 1;
            foreach($data as $key=>$value){
                $data[$key]['no'] = $no;
                $data[$key]['action'] = '<button onclick="show_modal_edit('.$value['id_derajat_cidera'].')" title="Ubah" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>'
                        .'<button onclick="show_modal_delete('.$value['id_derajat_cidera'].')" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
                $no++;
            }
        } else {
            $data = $this->dc_model->getById($id);
        }

        $this->response(array("data"=>$data), 200);
    }
    
    /**
     * @api {post} /Derajatcidera/insert Create derajat cidera
     * @apiVersion 0.1.0
     * @apiName PostDerajatcidera
     * @apiGroup Derajatcidera
     *
     * @apiParam {String} nama nama derajat cidera
     * @apiParam {String} keterangan keterangan derajat cidera
     * @apiParam {Integer} min_nilai min nilai derajat cidera
     * @apiParam {Integer} max_nilai max nilai derajat cidera
     *
     * @apiSuccess {String} status success
     *
     */
    public function insert_post() {
        $input = $this->getJson();
        $data = array(
            'nama' => $input['nama'],
            'keterangan' => $input['keterangan'],
            'min_nilai' => $input['min_nilai'],
            'max_nilai' => $input['max_nilai'],
            'createdby' => $this->session->userdata('id_user')
        );
        $insert = $this->dc_model->store($data);
        if ($insert) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    /**
     * @api {post} /Derajatcidera/update update derajat cidera
     * @apiVersion 0.1.0
     * @apiName UpdateDerajatcidera
     * @apiGroup Derajatcidera
     *
     * @apiParam {Integer} id_derajat_cidera id derajat cidera yang akan di update
     * @apiParam {String} nama nama derajat cidera
     * @apiParam {String} keterangan keterangan derajat cidera
     * @apiParam {Integer} min_nilai min nilai derajat cidera
     * @apiParam {Integer} max_nilai max nilai derajat cidera
     * @apiSuccess {String} status success
     *
     */
    public function update_post() {
        $input = $this->getJson();
        $id = $input['id_derajat_cidera'];
        $data = array(
            'nama' => $input['nama'],
            'keterangan' => $input['keterangan'],
            'min_nilai' => $input['min_nilai'],
            'max_nilai' => $input['max_nilai'],
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        $update = $this->dc_model->update($id, $data);
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
     * @api {post} /Derajatcidera/delete hapus derajat cidera
     * @apiVersion 0.1.0
     * @apiName DeleteDerajatcidera
     * @apiGroup Derajatcidera
     *
     * @apiParam {Integer} id_derajat_cidera id derajat cidera yang akan di hapus
     *
     * @apiSuccess {String} status success
     *
     */
    public function delete_post() {
        $input = $this->getJson();
        $id = $input['id_derajat_cidera'];
        $data = array(
            'isactive' => 'n',
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        $delete = $this->dc_model->delete($id,$data);
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