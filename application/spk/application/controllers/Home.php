<?php
class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('alternatif_model');
    }

    public function index()
    {
        $data['title'] = 'PERANGKINGAN <strong>BANK SAMPAH</strong>';

        $this->load->view('header', $data);
        $data['rows'] = $this->alternatif_model->tampil();
        $this->load->view('home', $data);
        $this->load->view('footer');
    }
}
