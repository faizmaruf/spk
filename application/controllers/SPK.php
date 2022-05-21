<?php
defined('BASEPATH') or exit('No direct script access allowed');


class SPK extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->model('m_pemain');
        $this->load->library('ahp');
        $this->load->library('topsis');
    
    }
    
    public function index()
    {   
        
        $x['data'] = $this->m_pemain->getAllValue();
        $data=$x['data'];
        $W = $this->ahp->_weightValue();
        
        $Y = $this->topsis->Matriks($W,$data);
        // var_dump($data);
        die;

        // $W=$this->$ahp->_weightValue();
       
        
        // echo "<br> <br>";

        // $topsis = $this->Topsis($W,$data);
        // print_r($topsis);

        //  echo "<br> <br>";
        // die;
        
        
        
        // $this->load->view('v_home', $x);
    }
   
}
// $objekspk = new SPK();