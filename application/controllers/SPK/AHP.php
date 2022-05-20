<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AHP extends CI_Controller
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
       
    }
    
}