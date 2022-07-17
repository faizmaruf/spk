<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
   
    function __construct()
    {
        parent::__construct();  
    }

    public function index()
    {
        $x['data'] = $this->m_pemain->getAll();
        $x['tblperbandingan'] = $this->m_pemain->getAllTblPerbandingan();
        $this->load->view('Dashboard/v_home', $x);
    }
}