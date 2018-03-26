<?php if(!defined('BASEPATH')) exit ('NO DIRECT SCRIPT ACCESS ALLOWED');

class Pasien_model extends CI_Model{
    private $_table = 'user';
    private $_primary = 'id_user';
    
    function __construct() {
        parent::__construct();
    }
    
    function getAll(){
        $this->db->select('pasien.id_user id_pasien, pasien.nama, pasien.username, pasien.email, pasien.foto, pasien.password, pasien.tanggal_lahir, pasien.gender, dokter.id_user id_dokter, dokter.nama nama_dokter');
        $this->db->from($this->_table.' pasien');
        $this->db->join('user dokter','dokter.id_user = pasien.id_dokter','left');
        $this->db->where('pasien.isactive','y');
//        $this->db->where('dokter.isactive','y');
        $this->db->where('dokter.isdokter','y');
        $this->db->where('pasien.ispasien','y');
        $data = $this->db->get();
        
        return $data->result_array();
    }
    
    function getById($id){
        $this->db->select('pasien.id_user id_pasien, pasien.nama, pasien.username, pasien.email, pasien.foto, pasien.password, pasien.tanggal_lahir, pasien.gender, dokter.id_user id_dokter, dokter.nama nama_dokter');
        $this->db->from($this->_table.' pasien');
        $this->db->join('user dokter','dokter.id_user = pasien.id_dokter','left');
        $this->db->where('pasien.isactive','y');
//        $this->db->where('dokter.isactive','y');
        $this->db->where('dokter.isdokter','y');
        $this->db->where('pasien.ispasien','y');
        $this->db->where('pasien.id_user',$id);
        $data = $this->db->get();
        
        return $data->result_array();
    }
    
    function store($data){
        $return = $this->db->insert($this->_table,$data);
        
        return $return;
    }
    
    function update($id,$data){
        $this->db->where($this->_primary, $id);
        $return = $this->db->update($this->_table, $data);
        
        return $return;
    }
    
    function delete($id,$data){
        $this->db->where($this->_primary, $id);
        $return = $this->db->update($this->_table, $data);
        
        return $return;
    }
    
    function getByDokter($id){
        $this->db->select('pasien.id_user id_pasien, pasien.nama, pasien.tanggal_lahir, pasien.gender, pasien.foto, dokter.id_user id_dokter, dokter.nama nama_dokter');
        $this->db->from($this->_table.' pasien');
        $this->db->join('user dokter','dokter.id_user = pasien.id_dokter','left');
        $this->db->where('pasien.isactive','y');
//        $this->db->where('dokter.isactive','y');
        $this->db->where('dokter.isdokter','y');
        $this->db->where('pasien.ispasien','y');
        $this->db->where('pasien.id_dokter',$id);
        $data = $this->db->get();
        
        return $data->result_array();
    }
    
    function cekDuplicate($field, $fieldvalue, $id) {
        $data = $this->db->get_where('user', array(
                    $field => $fieldvalue,
                    'isactive' => 'y',
//                    'ispasien' => 'y',
                    'id_user !=' => $id
                ))->num_rows();

        return $data;
    }
}