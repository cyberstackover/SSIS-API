<?php if(!defined('BASEPATH')) exit ('NO DIRECT SCRIPT ACCESS ALLOWED');

class Parameter_model extends CI_Model{
    private $_table = 'm_parameter';
    private $_primary = 'id_parameter';
    
    function __construct() {
        parent::__construct();
    }
    
    function getAll(){
        $this->db->select('a.id_parameter, a.nama as nama_parameter, a.id_kriteria, b.nama nama_kriteria, a.created, a.createdby, b.updated, b.updatedby');
        $this->db->from($this->_table.' a');
        $this->db->join('m_kriteria b','b.id_kriteria = a.id_kriteria');
        $this->db->where('a.isactive','y');        
        $data = $this->db->get();
       
        return $data->result_array();
    }
    
    function getById($id){
        $this->db->select('a.id_parameter, a.nama as nama_parameter, a.id_kriteria, b.nama nama_kriteria, a.created, a.createdby, b.updated, b.updatedby');
        $this->db->from($this->_table.' a');
        $this->db->join('m_kriteria b','b.id_kriteria = a.id_kriteria');
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
