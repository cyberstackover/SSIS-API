<?php if(!defined('BASEPATH')) exit ('NO DIRECT SCRIPT ACCESS ALLOWED');

class Rumahsakit_model extends CI_Model{
    private $_table = 'm_rumahsakit';
    private $_primary = 'id_rumahsakit';
    
    function __construct() {
        parent::__construct();
    }
    
    function getAll(){
        $this->db->order_by('id_rumahsakit','asc');
        $data = $this->db->get_where($this->_table, array('isactive' => 'y'));
        
        return $data->result_array();
    }
    
    function getById($id){
        $data = $this->db->get_where($this->_table, array('isactive' => 'y',$this->_primary=>$id));
        
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