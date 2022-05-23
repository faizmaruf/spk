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
        $z['data'] = $this->m_pemain->getAll();
        $datapemain=$z['data'];
        $datapemain1=$this->_masukinDataPreferensi($datapemain,$V);

        var_dump($datapemain1);
        die;
        
        
        // $this->load->view('v_home', $x);
    }
     public function _masukinDataPreferensi($data,$V)
    {
        $array_lengthRow = count($data);
        $array_lengthCol = count($data[0]);
        $preferensiIndex = $array_lengthCol-1;
        // var_dump($array_lengthRow);
        // var_dump($array_lengthCol);
        // die;
        for ($i = 0; $i < $array_lengthRow; $i++) {
            for ($j = 0; $j < $array_lengthCol; $j++) {
                $data1= (array_values($data[$i]));
                $data1[$preferensiIndex] = $V[$i];
                $data2[$i][$j]=$data1[$j];
		    } 
        }
      return $data2;
        
    }
    // public function FunctionName(Type $var = null)
    // {
    //     # code...
    // } 

   
}
