<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH."controllers/AHP.php";
require APPPATH."controllers/TOPSIS.php";
class SPK extends CI_Controller
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
        
        $x['data'] = $this->m_pemain->getAllValue();
        $data=$x['data'];
       
      
        // $W=$this->_weightValue();
        var_dump($data);
        die;
        
        // echo "<br> <br>";

        // $topsis = $this->Topsis($W,$data);
        // print_r($topsis);

        //  echo "<br> <br>";
        // die;
        
        
        
        // $this->load->view('v_home', $x);
    }
   

   
}
