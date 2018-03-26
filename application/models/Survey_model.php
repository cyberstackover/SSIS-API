<?php

if (!defined('BASEPATH'))
    exit('NO DIRECT SCRIPT ACCESS ALLOWED');

class Survey_model extends CI_Model {

    private $_table_survey = 'survey';
    private $_table_jawaban = 'jawab_survey';

//    private $_primary = 'id_user';

    function __construct() {
        parent::__construct();
    }

    function insertsurvey($data) {
        $this->db->insert($this->_table_survey, $data);
        $return = $this->db->insert_id();
        return $return;
    }

    function insertjawaban($data) {
        $return = $this->db->insert_batch($this->_table_jawaban, $data);
        return $return;
    }

    function getNilai($id_survey) {
        $this->db->select_sum('b.nilai');
        $this->db->from('jawab_survey a');
        $this->db->join('m_grading b', 'a.id_grading = b.id_grading');
        $this->db->where('a.id_survey', $id_survey);
        $return = $this->db->get();

        return $return->row_array();
    }

    function getAllNilai() {
        $data = $this->db->query("SELECT
                                    b.id_survey,
                                    a.id_user,
                                    a.nama,
                                    a.isdokter,
                                    a.ispasien,
                                    c.total_nilai,
                                    b.created AS tgl_survey
                                FROM
                                    `user` `a`,
                                    survey b,
                                    (
                                    SELECT
                                        SUM(b.nilai) AS total_nilai,
                                        a.id_survey
                                    FROM
                                        jawab_survey a,
                                        m_grading b
                                    WHERE
                                        a.id_grading = b.id_grading AND a.isactive = 'y' AND b.isactive = 'y'
                                    GROUP BY
                                        a.id_survey
                                ) c
                                WHERE
                                    a.id_user = b.id_user AND b.id_survey = c.id_survey AND a.isactive = 'y' AND b.isactive = 'y'");

        return $data->result_array();
    }

    function getDerajat() {
        $this->db->order_by('max_nilai', 'asc');
        $return = $this->db->get_where('m_derajat_cidera', array('isactive' => 'y'));

        return $return->result_array();
    }

    function getRekomendasi($id_derajat) {
        $return = $this->db->get_where('m_rekomendasi', array('isactive' => 'y', 'id_derajat_cidera' => $id_derajat));

        return $return->result_array();
    }

    function getNilaiKriteria($id_survey) {
        $data = $this->db->query("SELECT
                    a.id_kriteria,
                    a.nama nama_kriteria,
                    SUM(c.nilai) nilai
                FROM
                    m_kriteria a
                LEFT JOIN m_parameter b ON
                    a.id_kriteria = b.id_kriteria AND b.isactive = 'y'
                LEFT JOIN m_grading c ON
                    b.id_parameter = c.id_parameter AND c.isactive = 'y'
                LEFT JOIN jawab_survey d ON
                    c.id_grading = d.id_grading AND d.isactive = 'y'
                WHERE
                    a.isactive = 'y' AND d.id_survey = $id_survey
                GROUP BY
                    a.id_kriteria");
        return $data->result_array();
    }

    function getSurveyPasien($id) {
        $this->db->select('id_survey, id_user, valid, date(created) tanggal, concat(concat(concat(concat(hour(created),":"), minute(created)),":"),second(created)) jam');
        $this->db->from($this->_table_survey);
        $this->db->where('isactive', 'y');
        $this->db->where('id_user', $id);
        $data = $this->db->get();

        return $data->result_array();
    }

    function getDetailJawaban($id) {
        $data = $this->db->query("SELECT
                                    a.id_survey,
                                    a.id_grading,
                                    b.nama nama_grading,
                                    c.nama nama_parameter
                                FROM
                                    jawab_survey a
                                JOIN m_grading b ON
                                    a.id_grading = b.id_grading AND b.isactive = 'y'
                                RIGHT JOIN m_parameter c ON
                                    b.id_parameter = c.id_parameter AND c.isactive = 'y'
                                WHERE
                                    a.id_survey = $id AND a.isactive = 'y'");
        return $data->result_array();
    }

    function getAllSurvey() {
        $data = $this->db->query("SELECT count(id_survey) as total_survey FROM survey WHERE isactive = 'y'");
        return $data->result_array();
    }

    function getAllDataSurvey() {
        $this->db->select('a.id_survey, a.id_user, a.valid, b.nama, date(a.created) tanggal, concat(concat(concat(concat(hour(a.created),":"), minute(a.created)),":"),second(a.created)) jam');
        $this->db->from($this->_table_survey . ' a');
        $this->db->join('user b', "a.id_user = b.id_user and b.isactive = 'y'");
        $this->db->where('a.isactive', 'y');
        $data = $this->db->get();

        return $data->result_array();
    }

    function getFilterDataSurvey() {
        $this->db->select('a.id_survey, a.valid, b.id_user, b.nama, b.gender, YEAR(a.created) tahun, date(a.created) tanggal, concat(concat(concat(concat(hour(a.created),":"), minute(a.created)),":"),second(a.created)) jam, b.tanggal_lahir');
        $this->db->from('survey a');
        $this->db->join('user b', "a.id_user = b.id_user AND b.isactive = 'y'", 'left');
        $this->db->where('a.isactive', 'y');
        $data = $this->db->get();

        return $data->result_array();
    }

    function setValid($id_survey, $value) {
        $data = array(
            'valid' => $value
        );
        $this->db->where('id_survey', $id_survey);
        $update = $this->db->update('survey', $data);
//        echo $this->db->last_query();
        return $update;
    }
    
    function delete($id_survey) {
        $data = array(
            'isactive' => 'n'
        );
        $this->db->where('id_survey', $id_survey);
        $update = $this->db->update('survey', $data);
//        echo $this->db->last_query();
        return $update;
    }

}
