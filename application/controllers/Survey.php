<?php

require APPPATH . '/controllers/Auth.php';

class Survey extends Auth {

    private $id_user;
    private $token;

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->token = $this->cek_token();
        $this->id_user = $this->session->userdata('id_user');
        $this->load->model('Survey_model', 'survey_model');
        $this->load->model('Kriteria_model', 'kriteria_model');
        $this->load->model('Parameter_model', 'parameter_model');
        $this->load->model('Grading_model', 'grading_model');
        date_default_timezone_set("Asia/Jakarta");
    }

    /**
     * @api {get} /Survey/pertanyaan/ Request data pertanyaan
     * @apiVersion 0.1.0
     * @apiName GetPertanyaan
     * @apiGroup Survey
     *
     * @apiSuccess {String[]} data berisi data pertanyaan
     * @apiSuccess {String[]} data.kriteria  berisi data kriteria
     * @apiSuccess {Integer} data.kriteria.id  id kriteria
     * @apiSuccess {String} data.kriteria.nama  nama kriteria
     * @apiSuccess {String[]} data.kriteria.parameter berisi data parameter
     * @apiSuccess {Integer} data.kriteria.parameter.id id parameter
     * @apiSuccess {String} data.kriteria.parameter.nama nama parameter
     * @apiSuccess {String[]} data.kriteria.parameter.grading berisi data grading
     * @apiSuccess {Integer} data.kriteria.parameter.grading.id id grading
     * @apiSuccess {String} data.kriteria.parameter.grading.nama nama grading
     * @apiSuccess {Integer} data.kriteria.parameter.grading.urut nomor urut
     *
     */
    public function pertanyaan_get() {
        $kriteria = $this->kriteria_model->getAll();
        $parameter = $this->parameter_model->getAll();
        $grading = $this->grading_model->getAll();
        $data = array();
        foreach ($kriteria as $key => $value) {
            $data['kriteria'][$key]['id'] = $value['id_kriteria'];
            $data['kriteria'][$key]['nama'] = $value['nama'];
            $data['kriteria'][$key]['parameter'] = array();
        }
        foreach ($kriteria as $key => $value) {
            $no = 0;
            foreach ($parameter as $keyparam => $valueparam) {
                if ($value['id_kriteria'] == $valueparam['id_kriteria']) {
                    $data['kriteria'][$key]['parameter'][$no]['id'] = $valueparam['id_parameter'];
                    $data['kriteria'][$key]['parameter'][$no]['nama'] = $valueparam['nama_parameter'];
                    $data['kriteria'][$key]['parameter'][$no]['grading'] = array();
                    $no++;
                }
            }
        }
        foreach ($data['kriteria'] as $key => $value) {
            foreach ($value['parameter'] as $keyparam => $valueparam) {
                $no = 0;
                foreach ($grading as $keygrad => $valgrad) {
                    if ($valueparam['id'] == $valgrad['id_parameter']) {
                        $data['kriteria'][$key]['parameter'][$keyparam]['grading'][$no]['id'] = $valgrad['id_grading'];
                        $data['kriteria'][$key]['parameter'][$keyparam]['grading'][$no]['nama'] = $valgrad['nama_grading'];
                        $data['kriteria'][$key]['parameter'][$keyparam]['grading'][$no]['urut'] = $valgrad['urut'];
                        $no++;
                    }
                }
            }
        }

        $this->response(array("data" => $data), 200);
    }

    /**
     * @api {post} /Survey/insert Insert jawaban
     * @apiVersion 0.1.0
     * @apiName InsertPertanyaan
     * @apiGroup Survey
     *
     * @apiParam {String[]} grading data jawaban
     * @apiParam {Integer} grading.id_grading id grading
     *
     * @apiParamExample {json} Request-Example:
     * {
     *      "grading":[
     *          {
     *              "id_grading":"112"
     *          },
     *          {
     *              "id_grading":"108"
     *          },
     *          {
     *              "id_grading":"18"
     *          }
     *      ]
     * }
     * 
     * @apiSuccess {String} status success
     * @apiSuccess {Integer} nilai nilai total dari survey
     * @apiSuccess {String[]} derajat arrat derajat
     * @apiSuccess {Integer} derajat.id id derajat cidera
     * @apiSuccess {String} derajat.nama nama derajat cidera
     * @apiSuccess {String} derajat.keterangan keterangan derajat cidera
     * @apiSuccess {String[]} rekomendasi array rekomendasi
     *
     */
    public function insert_post() {
        $input = $this->getJson();
        $id_user = $this->token->id;
        $current_date = date("Y-m-d H:i:s");
        $data = array(
            'id_user' => $id_user,
            'created' => $current_date,
            'createdby' => $id_user
        );
        $id_survey = $this->survey_model->insertsurvey($data);
        foreach ($input['grading'] as $key => $value) {
            $input['grading'][$key]['id_survey'] = $id_survey;
        }
        $respon = $this->survey_model->insertjawaban($input['grading']);
        $nilai = $this->hitungNilai($id_survey);
        $derajat = $this->getDerajatCidera($nilai['nilai']);
        $rekomendasi = $this->getRekomendasi($derajat['id']);
        if ($respon) {
            $this->response(array(
                "status" => 'success',
                "nilai" => $nilai['nilai'],
                "derajat" => $derajat,
                "rekomendasi" => $rekomendasi
                    ), 200);
        } else {
            
        }
    }

    private function hitungNilai($id_survey) {
        $nilai = $this->survey_model->getNilai($id_survey);

        return $nilai;
    }

    public function hitungAllNilai_get() {
        $data = $this->survey_model->getAllNilai();
        $no = 1;
        foreach ($data as $key => $value) {
            $data[$key]['no'] = $no;
            $tombol = '<button onclick="show_modal_delete(' . $value['id_survey'] . ')" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>';
            $data[$key]['action'] = $tombol;
            $no++;
        }

        $this->response(array("status" => 'success', "data" => $data), 200);
//        return $nilai;
    }

    private function getDerajatCidera($nilai) {
        $return = array();
        $data = $this->survey_model->getDerajat();
        foreach ($data as $value) {
            if ($nilai < $value['max_nilai']) {
                $return = array(
                    "id" => $value['id_derajat_cidera'],
                    "nama" => $value['nama'],
                    "keterangan" => $value['keterangan']
                );
                break;
            }
        }

        return $return;
    }

    private function getRekomendasi($id_derajat_cidera) {
        $data = $this->survey_model->getRekomendasi($id_derajat_cidera);
        $rekomendasi = array();
        foreach ($data as $key => $value) {
            array_push($rekomendasi, $value['rekomendasi']);
        }

        return $rekomendasi;
    }

    /**
     * @api {get} /Survey/skorderajat/:id Request skor dan derajat berdasarkan id survey
     * @apiVersion 0.1.0
     * @apiName GetSkorDerajatById
     * @apiGroup Survey
     *
     * @apiSuccess {String} status success
     * @apiSuccess {Integer} nilai nilai total dari survey
     * @apiSuccess {String[]} derajat array derajat
     * @apiSuccess {Integer} derajat.id id derajat cidera
     * @apiSuccess {String} derajat.nama nama derajat cidera
     * @apiSuccess {String} derajat.keterangan keterangan derajat cidera
     *
     */
    public function skorderajat_get($id) {
        $nilai = $this->hitungNilai($id);
        $derajat = $this->getDerajatCidera($nilai['nilai']);
        if ($derajat) {
            $this->response(array(
                "status" => 'success',
                "nilai" => $nilai['nilai'],
                "derajat" => $derajat
                    ), 200);
        }
    }

    /**
     * @api {get} /Survey/skorkriteria/:id Request skor per kriteria berdasarkan id survey
     * @apiVersion 0.1.0
     * @apiName GetSkorKriteriaById
     * @apiGroup Survey
     *
     * @apiSuccess {String} status success
     * @apiSuccess {String[]} data array data
     * @apiSuccess {Integer} data.id id kriteria
     * @apiSuccess {String} data.nama nama kriteria
     * @apiSuccess {Integer} data.nilai skor kriteria
     *
     */
    public function skorkriteria_get($id) {
        $nilai_kriteria = $this->survey_model->getNilaiKriteria($id);
        $kriteria = $this->kriteria_model->getAll();
        $data = array();
        foreach ($kriteria as $key => $value) {
            $data[$key]['id_kriteria'] = $value['id_kriteria'];
            $data[$key]['nama_kriteria'] = $value['nama'];
            $data[$key]['nilai'] = 0;
        }
        foreach ($data as $key => $value) {
            foreach ($nilai_kriteria as $keynilai => $valuenilai) {
                if ($value['id_kriteria'] == $valuenilai['id_kriteria']) {
                    $data[$key]['nilai'] = $valuenilai['nilai'];
                }
            }
        }
        $this->response(array("status" => 'success', "data" => $data), 200);
    }

    /**
     * @api {get} /Survey/rekomendasi/:id Request rekomendasi by id derajat cidera
     * @apiVersion 0.1.0
     * @apiName GetRekomendasiById
     * @apiGroup Survey
     *
     * @apiSuccess {String} status success
     * @apiSuccess {String[]} data array data
     * @apiSuccess {String} data.rekomendasi rekomendasi
     *
     */
    public function rekomendasi_get($id) {
        $data = $this->getRekomendasi($id);
        $this->response(array("status" => 'success', "data" => $data), 200);
    }

    /**
     * @api {get} /Survey/pasien/:id Request survey by id pasien
     * @apiVersion 0.1.0
     * @apiName GetSurveyByPasien
     * @apiGroup Survey
     *
     * @apiSuccess {String} status success
     * @apiSuccess {String[]} data array data
     * @apiSuccess {Integer} data.id_survey id survey
     * @apiSuccess {Integer} data.id_user id user
     * @apiSuccess {String} data.valid y = valid, n = not valid
     * @apiSuccess {String} data.tanggal tanggal survey (yyyy-mm-dd)
     * @apiSuccess {String} data.jam jam survey (hh:mm)
     *
     */
    public function pasien_get($id) {
        $data = $this->survey_model->getSurveyPasien($id);
        $this->response(array("status" => 'success', "data" => $data), 200);
    }

    /**
     * @api {get} /Survey/detail/:id Request detail jawaban by id survey
     * @apiVersion 0.1.0
     * @apiName GetDetailBySurvey
     * @apiGroup Survey
     *
     * @apiSuccess {String} status success
     * @apiSuccess {String[]} data array data
     * @apiSuccess {Integer} data.id_survey id survey
     * @apiSuccess {Integer} data.id_grading id grading
     * @apiSuccess {String} data.nama_grading jawaban
     * @apiSuccess {String} data.nama_parameter pertanyaan
     *
     */
    public function detail_get($id) {
        $data = $this->survey_model->getDetailJawaban($id);

        $this->response(array("status" => 'success', "data" => $data), 200);
    }

    /**
     * @api {get} /Survey/allsurvey Request total data survey
     * @apiVersion 0.1.0
     * @apiName GetAllSurvey
     * @apiGroup Survey
     *
     * @apiSuccess {String} status success
     * @apiSuccess {String[]} data array data
     * @apiSuccess {Integer} data.total_survey id survey
     *
     */
    public function allsurvey_get() {
        $data = $this->survey_model->getAllSurvey();

        $this->response(array("status" => 'success', "data" => $data), 200);
    }

    /**
     * @api {get} /Survey/alldatasurvey Request semua data survey
     * @apiVersion 0.1.0
     * @apiName GetAllDataSurvey
     * @apiGroup Survey
     *
     * @apiSuccess {String} status success
     * @apiSuccess {String[]} data array data
     * @apiSuccess {Integer} data.id_survey id survey
     * @apiSuccess {Integer} data.id_user id user
     * @apiSuccess {String} data.nama nama user
     * @apiSuccess {String} data.valid y = valid, n = not valid
     * @apiSuccess {String} data.tanggal tanggal survey (yyyy-mm-dd)
     * @apiSuccess {String} data.jam jam survey (hh:mm)
     *
     */
    public function alldatasurvey_get() {
        $data = $this->survey_model->getAllDataSurvey();

        $this->response(array("status" => 'success', "data" => $data), 200);
    }

    /**
     * @api {get} /Survey/filterData Request semua data survey untuk filtering
     * @apiVersion 0.1.0
     * @apiName GetFilterData
     * @apiGroup Survey
     *
     * @apiSuccess {String} status success
     * @apiSuccess {String[]} data array data
     * @apiSuccess {Integer} data.id_survey id survey
     * @apiSuccess {Integer} data.id_user id user
     * @apiSuccess {String} data.nama nama user
     * @apiSuccess {String} data.gender jenis kelamin
     * @apiSuccess {String} data.gender_name jenis kelamin
     * @apiSuccess {String} data.tahun tahun survey
     * @apiSuccess {String} data.usia usia user
     * @apiSuccess {Integer} data.nilai total nilai
     * @apiSuccess {String} data.derajat derajat cidera
     * @apiSuccess {String} data.valid y = valid, n = not valid
     * @apiSuccess {String} data.valid_name y = valid, n = not valid
     * @apiSuccess {String} data.tanggal tanggal survey (yyyy-mm-dd)
     * @apiSuccess {String} data.jam jam survey (hh:mm:ss)
     * @apiSuccess {String} data.status status user (Dokter/Pasien)
     *
     */
    public function filterData_get() {
        $dataFilterSurvey = $this->survey_model->getFilterDataSurvey();

        $dataAllNilai = $this->survey_model->getAllNilai();

        foreach ($dataAllNilai as $key => $value) {
            $derajat = $this->getDerajatCidera($value['total_nilai']);
            $dataAllNilai[$key]['id_derajat'] = $derajat['id'];
            $dataAllNilai[$key]['nama_derajat'] = $derajat['nama'];
            if ($value['isdokter'] == 'y') {
                $dataAllNilai[$key]['status'] = 'Dokter';
            }
            if ($value['ispasien'] == 'y') {
                $dataAllNilai[$key]['status'] = 'Pasien';
            }
        }
        $data = array();
        foreach ($dataFilterSurvey as $key => $value) {
            foreach ($dataAllNilai as $keyA => $valueA) {
                if ($value['id_survey'] == $valueA['id_survey']) {
                    array_push($data, array(
                        "id_survey" => $value['id_survey'],
                        "id_user" => $value['id_user'],
                        "nama" => $value['nama'],
                        "gender" => $value['gender'],
                        "gender_name" => $value['gender'] == "l" ? "Laki-laki" : "Perempuan",
                        "valid" => $value['valid'],
                        "valid_name" => $value['valid'] == "y" ? "Valid" : "Tidak Valid",
                        "tahun" => $value['tahun'],
                        "usia" => $this->hitung_umur($value['tanggal_lahir']),
                        "nilai" => $valueA['total_nilai'],
                        "derajat" => $valueA['nama_derajat'],
                        "tanggal" => $value['tanggal'],
                        "jam" => $value['jam'],
                        "status" => $valueA['status']
                    ));
                }
            }
        }

        $this->response(array("status" => 'success', "data" => $data), 200);
    }

    /**
     * @api {post} /Survey/setvalid set validasi survey
     * @apiVersion 0.1.0
     * @apiName SetValidSurvey
     * @apiGroup Survey
     *
     * @apiParam {Integer} id_survey id survey
     * @apiParam {String} valid y / n
     * 
     * @apiSuccess {String} status success
     * @apiSuccess {String} pesan pesan
     *
     */
    function setvalid_post() {
        $input = $this->getJson();
        $id_survey = $input['id_survey'];
        $valid = $input['valid'];
        $validasi = $this->survey_model->setValid($id_survey, $valid);
//        echo $this->db->last_query();
        if ($validasi) {
            $this->response(array('status' => 'success', 'pesan' => 'berhasil menyimpan'), 200);
        } else {
            $this->response(array('status' => 'fail', 'pesan' => 'gagal menyimpan'), 502);
        }
    }
    
    /**
     * @api {post} /Survey/delete delete survey
     * @apiVersion 0.1.0
     * @apiName DeleteSurvey
     * @apiGroup Survey
     *
     * @apiParam {Integer} id_survey id survey
     * 
     * @apiSuccess {String} status success
     * @apiSuccess {String} pesan pesan
     *
     */
    function delete_post() {
        $input = $this->getJson();
        $id_survey = $input['id_survey'];
        $delete = $this->survey_model->delete($id_survey);
//        echo $this->db->last_query();
        if ($delete) {
            $this->response(array('status' => 'success', 'pesan' => 'berhasil menghapus'), 200);
        } else {
            $this->response(array('status' => 'fail', 'pesan' => 'gagal menghapus'), 502);
        }
    }

    private function hitung_umur($tanggal_lahir) {
        list($year, $month, $day) = explode("-", $tanggal_lahir);
        $year_diff = date("Y") - $year;
        $month_diff = date("m") - $month;
        $day_diff = date("d") - $day;
        if ($month_diff < 0) {
            $year_diff--;
        } else if (($month_diff == 0) && ($day_diff < 0)) {
            $year_diff--;
        }
        return $year_diff;
    }

}
