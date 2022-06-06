<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        // $this->load->library('session');
        // $this->load->library('upload');
    }

    public function index()
    {
        
        $this->load->view('v_landingpage');
    }
    public function about()
    {
        
        $this->load->view('v_about');
    }
    public function go()
    {   
        redirect('Home');
    }
    
    
}