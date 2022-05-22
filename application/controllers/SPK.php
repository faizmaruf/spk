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


        ///////////////////Metode AHP
        //sampai mendapatkan nilai bobot tiap variable


        //tabel perbandingan prioritas dari pelatih
        $tblPerbandingan = $ahp->__construct();
        
        $pembagi= $calculate->_getSumCol($tblPerbandingan);

        //nilai eigen/normalisasi
        $normalisasi = $ahp->NormalisasiAHP($tblPerbandingan,$pembagi); 

        //nilai bobot = W
        $nilaibobot = $ahp->weightValue($normalisasi); 
        $W = $nilaibobot;
        //cek kosinsistensi
        $cek=$ahp->_chehkCosistency($pembagi,$nilaibobot);


         ///////////////////Metode Topsis
        //sampai mendapatkan nilai preferensi tiap alternatif


        //Data Pemain dinormalisasi terlebih dahulu
        $rij=$topsis->_normalisasiData($data);

        //data normalisasi terbobot yij = wj*rij
        $y = $topsis->_normalisasiDataTerbobot($rij,$W);

        //Mencari solusi ideal positive dan negative
        $A_plus=$topsis->_findMax($y);
        $A_minus=$topsis->_findMin($y);

        //Mencari D+ dan D- untuk Setiap Altenatif
        $D_plus=$topsis->_D($y,$A_plus);
        $D_minus=$topsis->_D($y,$A_minus);

        //menghitung nilai preferensi tiap alternatif 
        $V = $topsis->_preferebceValue($D_plus,$D_minus);

        //perangkingan

        
        
        
        // $this->load->view('v_home', $x);
    }

   
}
// $objekspk = new SPK();