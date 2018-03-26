<?php if(!defined('BASEPATH')) exit ('NO DIRECT SCRIPT ACCESS ALLOWED');

class Rekomendasi_model extends CI_Model{
    private $_table = 'm_rekomendasi';
    private $_primary = 'id_rekomendasi';
    
    function __construct() {
        parent::__construct();
    }
    
    function getAll(){
        $this->db->select('*');
        $this->db->from($this->_table.' a');
        $this->db->join('m_derajat_cidera b','b.id_derajat_cidera = a.id_derajat_cidera','left');
        $this->db->where('a.isactive','y');        
        $data = $this->db->get();
        
        return $data->result_array();
    }
    
    function getById($id){
        $this->db->select('*');
        $this->db->from($this->_table.' a');
        $this->db->join('m_derajat_cidera b','b.id_derajat_cidera = a.id_derajat_cidera','left');
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