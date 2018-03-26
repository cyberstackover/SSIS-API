<?php

require APPPATH . '/controllers/Auth.php';

class Parameter extends Auth {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->cek_token();
        $this->load->model('Parameter_model', 'parameter_model');
    }

    /**
     * @api {get} /Parameter/ Request semua data parameter
     * @apiVersion 0.1.0
     * @apiName GetParameter
     * @apiGroup Parameter
     *
     * @apiSuccess {String[]} data berisi data parameter
     * @apiSuccess {Integer} data.id  id parameter
     * @apiSuccess {String} data.nama_parameter  nama parameter
     * @apiSuccess {String} data.nama_kriteria  nama kriteria
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
     * @api {get} /Parameter/:id Request data parameter berdasarkan id
     * @apiVersion 0.1.0
     * @apiName GetParameterById
     * @apiGroup Parameter
     *
     * @apiSuccess {String[]} data berisi data parameter
     * @apiSuccess {Integer} data.id  id parameter
     * @apiSuccess {String} data.nama_parameter  nama parameter
     * @apiSuccess {String} data.nama_kriteria  nama kriteria
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
            $data = $this->parameter_model->getAll();
            $no = 1;
            foreach($data as $key=>$value){
                $data[$key]['no'] = $no;
                $data[$key]['action'] = '<button onclick="show_modal_edit('.$value['id_parameter'].')" title="Ubah" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>'
                        .'<button onclick="show_modal_delete('.$value['id_parameter'].')" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
                $no++;
            }
        } else {
            $data = $this->parameter_model->getById($id);
        }

        $this->response(array("data"=>$data), 200);
    }

    /**
     * @api {post} /Parameter/insert Create parameter
     * @apiVersion 0.1.0
     * @apiName PostParameter
     * @apiGroup Parameter
     *
     * @apiParam {String} nama nama parameter
     * @apiParam {Integer} id_kriteria id kriteria
     *
     * @apiSuccess {String} status success
     *
     */
    public function insert_post() {
        $input = $this->getJson();
        $data = array(
            'nama' => $input['nama'],
            'id_kriteria' => $input['id_kriteria'],
            'createdby' => $this->session->userdata('id_user')
        );
        $insert = $this->parameter_model->store($data);
        if ($insert) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    /**
     * @api {post} /Parameter/update update parameter
     * @apiVersion 0.1.0
     * @apiName UpdateParameter
     * @apiGroup Parameter
     *
     * @apiParam {Integer} id_parameter id parameter yang akan di update
     * @apiParam {String} nama nama parameter
     * @apiParam {Integer} id_kriteria id kriteria
     *
     * @apiSuccess {String} status success
     *
     */
    public function update_post() {
        $input = $this->getJson();
        $id = $input['id_parameter'];
        $data = array(
            'nama' => $input['nama'],
            'id_kriteria' => $input['id_kriteria'],
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        $update = $this->parameter_model->update($id, $data);
        if ($update) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    /**
     * @api {post} /Parameter/delete hapus parameter
     * @apiVersion 0.1.0
     * @apiName DeleteParameter
     * @apiGroup Parameter
     *
     * @apiParam {Integer} id_parameter id parameter yang akan dihapus
     *
     * @apiSuccess {String} status success
     *
     */
    public function delete_post() {
        $input = $this->getJson();
        $id = $input['id_parameter'];
        $data = array(
            'isactive' => 'n',
            'updated' => date('Y-m-d H:i:s'),
            'updatedby' => $this->session->userdata('id_user')
        );
        $delete = $this->parameter_model->delete($id,$data);
        if ($delete) {
            $this->response(array('status' => 'success', 200));
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
