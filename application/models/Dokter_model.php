<?php

if (!defined('BASEPATH'))
    exit('NO DIRECT SCRIPT ACCESS ALLOWED');

class Dokter_model extends CI_Model {

    private $_table = 'user';
    private $_primary = 'id_user';

    function __construct() {
        parent::__construct();
    }

    function getAll() {
        $this->db->select('dokter.id_user id_dokter, dokter.nama, dokter.username, dokter.email, dokter.foto, dokter.password, dokter.isapprove, rs.id_rumahsakit, rs.nama nama_rs, rs.alamat, rs.telepon');
        $this->db->from($this->_table . ' dokter');
        $this->db->join('m_rumahsakit rs', "rs.id_rumahsakit = dokter.id_rumahsakit and rs.isactive = 'y'", 'left');
//        $this->db->where('dokter.isactive','y');
//        $this->db->where('rs.isactive','y');
        $this->db->where('dokter.isactive', 'y');
        $this->db->where('dokter.isdokter', 'y');
        $data = $this->db->get();

        return $data->result_array();
    }

    function getById($id) {
        $this->db->select('dokter.id_user id_dokter, dokter.nama, dokter.username, dokter.email, dokter.foto, dokter.password, dokter.isapprove, rs.id_rumahsakit, rs.nama nama_rs, rs.alamat, rs.telepon');
        $this->db->from($this->_table . ' dokter');
        $this->db->join('m_rumahsakit rs', 'rs.id_rumahsakit = dokter.id_rumahsakit', 'left');
        $this->db->where('dokter.isactive', 'y');
//        $this->db->where('rs.isactive','y');
        $this->db->where('dokter.isactive', 'y');
        $this->db->where('dokter.isdokter', 'y');
        $this->db->where($this->_primary, $id);
        $data = $this->db->get();

        return $data->result_array();
    }

    function store($data) {
        $return = $this->db->insert($this->_table, $data);

        return $return;
    }

    function update($id, $data) {
        $this->db->where($this->_primary, $id);
        $return = $this->db->update($this->_table, $data);

        return $return;
    }

    function delete($id, $data) {
        $this->db->where($this->_primary, $id);
        $return = $this->db->update($this->_table, $data);

        return $return;
    }

    function getByPasien($id) {
        $data = $this->db->query("SELECT
                        b.id_user id_dokter,
                        b.nama nama_dokter,
                        b.foto,
                        c.nama nama_rumahsakit,
                        c.alamat alamat_rumahsakit,
                        c.telepon
                    FROM
                        user b
                        left JOIN m_rumahsakit c on b.id_rumahsakit = c.id_rumahsakit and c.isactive = 'y'
                    WHERE
                        b.id_user =(
                        SELECT
                            a.id_dokter
                        FROM
                            user a
                        WHERE
                            a.ispasien = 'y' AND a.isactive = 'y' AND a.id_user = $id
                    ) AND b.isactive = 'y' AND b.isdokter = 'y'");

        return $data->result_array();
    }

    function cekDuplicate($field, $fieldvalue, $id) {
        $data = $this->db->get_where('user', array(
                    $field => $fieldvalue,
                    'isactive' => 'y',
//                    'isdokter' => 'y',
                    'id_user !=' => $id
                ))->num_rows();

        return $data;
    }

}
