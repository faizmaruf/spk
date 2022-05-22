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
        $this->load->library('calculate');
    
    }
    
    public function index()
    {   
        
        $x['data'] = $this->m_pemain->getAllValue();
        $data=$x['data'];
        $ahp = new $this->ahp;
        $topsis = new $this->topsis;
        $calculate = new $this->calculate;

        //tabel perbandingan prioritas dari pelatih
        $tblPerbandingan = $ahp->__construct();
        
        $pembagi= $calculate->_getSumCol($tblPerbandingan);

        //nilai eigen/normalisasi
        $normalisasi = $ahp->NormalisasiAHP($tblPerbandingan,$pembagi); 

        $nilaibobot = $ahp->weightValue($normalisasi);  

        //Metode AHP mengeluarkan Output berupat nilai bobot tiap variable
        // $W = $ahp->_weightValue($tblPerbandingan);
        // $Y = $this->topsis->Matriks($W,$data);
        // var_dump($this->ahp->_weightValue());
        var_dump($nilaibobot);
        // var_dump($W->_weightValue());
        // var_dump($W);
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