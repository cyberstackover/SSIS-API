<?php if(!defined('BASEPATH')) exit ('NO DIRECT SCRIPT ACCESS ALLOWED');

class Grading_model extends CI_Model{
    private $_table = 'm_grading';
    private $_primary = 'id_grading';
    
    function __construct() {
        parent::__construct();
    }
    
    function getAll(){
        $this->db->select('a.id_grading, a.nama nama_grading, a.nilai, a.urut, a.id_parameter, b.nama as nama_parameter, a.created, a.createdby, a.updated, a.updatedby');
        $this->db->from($this->_table.' a');
        $this->db->join('m_parameter b','b.id_parameter = a.id_parameter');
        $this->db->where('a.isactive','y');        
        $data = $this->db->get();
        
        return $data->result_array();
    }
    
    function getById($id){
        $this->db->select('a.id_grading, a.nama nama_grading, a.nilai, a.urut, a.id_parameter, b.nama as nama_parameter, a.created, a.createdby, a.updated, a.updatedby');
        $this->db->from($this->_table.' a');
        $this->db->join('m_parameter b','b.id_parameter = a.id_parameter');
        $this->db->where('a.isactive','y');        
        $this->db->where($this->_primary,$id);  
        $data = $this->db->get();
        
        return $data->result();
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
}