<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->model('m_pemain');
    }

    public function index()
    {
        $x['data'] = $this->m_pemain->getAll();
        $this->load->view('v_home', $x);
    }
}
