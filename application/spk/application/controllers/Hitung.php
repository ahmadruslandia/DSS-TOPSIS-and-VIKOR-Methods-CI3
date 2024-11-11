<?php
class Hitung extends CI_Controller
{

    protected $crips = array();
    protected $alternatif = array();
    protected $kriteria = array();
    protected $matriks = array();
    protected $normal = array();
    protected $hasil = array();
    protected $total = array();
    protected $rank = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('hitung_model');
        $this->load->model('kriteria_model');
        $this->load->model('alternatif_model');
        $this->load->model('crips_model');
        $this->load->model('relasi_model');
    }

    public function hasil_cetak()
    {
        $data['rows'] = $this->alternatif_model->tampil();
        $data['title'] = 'Hasil Perbandingan Metode';
        load_view_cetak('hitung/hasil_cetak', $data);
    }

    public function hasil()
    {
        $data['rows'] = $this->alternatif_model->tampil();
        $data['title'] = 'Hasil Perbandingan Metode';
        load_view('hitung/hasil', $data);
    }

    public function vikor()
    {
        $data['title'] = 'Perhitungan VIKOR';
        $data['rows'] = $this->hitung_model->get_data();
        $data['kriteria'] = $this->kriteria_model->getArray();
        $data['alternatif'] = $this->alternatif_model->getArray();
        $data['crips'] = $this->crips_model->getArray();
        $data['rel_alternatif'] = $this->relasi_model->getArray();
        $data['atribut'] = array();
        $data['bobot'] = array();
        foreach ($data['kriteria'] as $row) {
            $data['atribut'][$row->kode_kriteria] = $row->atribut;
            $data['bobot'][$row->kode_kriteria] = $row->bobot;
        }
        $data['rel_nilai'] = $this->relasi_model->getRelNilai($data['rel_alternatif'], $data['crips']);
        $data['vikor'] = new VIKOR($data['rel_nilai'], $data['atribut'], $data['bobot']);

        load_view('hitung/vikor', $data);
    }

    public function vikor_cetak()
    {
        $data['title'] = 'Perhitungan VIKOR';
        $data['kriteria'] = $this->kriteria_model->getArray();
        $data['alternatif'] = $this->alternatif_model->getArray();
        $data['crips'] = $this->crips_model->getArray();
        $data['rel_alternatif'] = $this->relasi_model->getArray();
        $data['atribut'] = array();
        $data['bobot'] = array();
        foreach ($data['kriteria'] as $row) {
            $data['atribut'][$row->kode_kriteria] = $row->atribut;
            $data['bobot'][$row->kode_kriteria] = $row->bobot;
        }
        $data['rel_nilai'] = $this->relasi_model->getRelNilai($data['rel_alternatif'], $data['crips']);
        $data['vikor'] = new VIKOR($data['rel_nilai'], $data['atribut'], $data['bobot']);

        load_view_cetak('hitung/vikor_cetak', $data);
    }

    public function topsis()
    {
        $data['title'] = 'Perhitungan TOPSIS';
        $data['rows'] = $this->hitung_model->get_data();
        $data['kriteria'] = $this->kriteria_model->getArray();
        $data['alternatif'] = $this->alternatif_model->getArray();
        $data['crips'] = $this->crips_model->getArray();
        $data['rel_alternatif'] = $this->relasi_model->getArray();
        $data['atribut'] = array();
        $data['bobot'] = array();
        foreach ($data['kriteria'] as $row) {
            $data['atribut'][$row->kode_kriteria] = $row->atribut;
            $data['bobot'][$row->kode_kriteria] = $row->bobot;
        }
        $data['rel_nilai'] = $this->relasi_model->getRelNilai($data['rel_alternatif'], $data['crips']);
        $data['topsis'] = new TOPSIS($data['rel_nilai'], $data['atribut'], $data['bobot']);

        load_view('hitung/topsis', $data);
    }

    public function topsis_cetak()
    {
        $data['title'] = 'Perhitungan TOPSIS';
        $data['kriteria'] = $this->kriteria_model->getArray();
        $data['alternatif'] = $this->alternatif_model->getArray();
        $data['crips'] = $this->crips_model->getArray();
        $data['rel_alternatif'] = $this->relasi_model->getArray();
        $data['atribut'] = array();
        $data['bobot'] = array();
        foreach ($data['kriteria'] as $row) {
            $data['atribut'][$row->kode_kriteria] = $row->atribut;
            $data['bobot'][$row->kode_kriteria] = $row->bobot;
        }
        $data['rel_nilai'] = $this->relasi_model->getRelNilai($data['rel_alternatif'], $data['crips']);
        $data['topsis'] = new TOPSIS($data['rel_nilai'], $data['atribut'], $data['bobot']);

        load_view_cetak('hitung/topsis_cetak', $data);
    }
}
