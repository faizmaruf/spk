<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SPK extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('ahp');
        $this->load->library('topsis');
    }
    
    public function index()
    {   
        $x['nama'] = $this->m_pemain->getAllName();
        $x['data'] = $this->m_pemain->getAllValue();
        $data=$x['data'];
        
        $ahp = new $this->ahp;
        $topsis = new $this->topsis;
      


        ///////////////////Metode AHP
        //sampai mendapatkan nilai bobot tiap variable


        //tabel perbandingan prioritas dari pelatih
        $array =$this->m_pemain->getAllTblPerbandingan();
        $tblPerbandingan= convertArray($array);
       
       
        $pembagi= _getSumCol($tblPerbandingan);

        //nilai eigen/normalisasi
        $normalisasi = $ahp->NormalisasiAHP($tblPerbandingan,$pembagi); 
       

        //nilai bobot = W
        $nilaibobot = $ahp->weightValue($normalisasi); 
        $W = $nilaibobot;
        $x['bobot']=$W;
        $x['tabledata'] = $this->m_pemain->getAll();
        //cek kosinsistensi
        $cek=$ahp->_chehkCosistency($pembagi,$nilaibobot);
        // $x['bobot'] = $this->load->view('Dashboard/History/v_bobot', $W);

         ///////////////////Metode Topsis
        //sampai mendapatkan nilai preferensi tiap alternatif


        //Data Pemain dinormalisasi terlebih dahulu
        $rij=$topsis->_normalisasiData($data);
        $x['rij']=$rij;
// var_dump($rij);
// die;

        //data normalisasi terbobot yij = wj*rij
        $y = $topsis->_normalisasiDataTerbobot($rij,$W);
        $x['y']=$y;

        //Mencari solusi ideal positive dan negative
        $A_plus=$topsis->_findMax($y);
        $A_minus=$topsis->_findMin($y);
        $x['A_plus']=$A_plus;
        $x['A_minus']=$A_minus;


        //Mencari D+ dan D- untuk Setiap Altenatif
        $D_plus=$topsis->_D($y,$A_plus);
        $D_minus=$topsis->_D($y,$A_minus);
        $x['D_plus']=$D_plus;
        $x['D_minus']=$D_minus;

       

        //menghitung nilai preferensi tiap alternatif 
        $V = $topsis->_preferenceValue($D_plus,$D_minus);

        //perangkingan
        $z['data'] = $this->m_pemain->getAll();
        $datapemain=$topsis->_preferensi($z['data'],$V);
        
        $this->m_pemain->update_multiple($datapemain);
        
        $A['data'] = $this->m_pemain->rank();
        $datapemainrangking = $A['data'];
        $x['datarangking']= $datapemainrangking;

        
        $B['data'] = $this->m_pemain->getAllDataPemainTerpilih();
        $datapemainterpilih =$B['data'];
        $x['datapemainterpilih']=$datapemainterpilih;
        $batas = count($datapemainterpilih); 
        while (count($datapemainrangking) > $batas ) {
            array_pop($datapemainrangking);
        }
        $datapemainrangking14 = $datapemainrangking;
        
        $x['akurasi']=nilaiAkurasi($datapemainrangking14,$datapemainterpilih);
        
        
        
        $this->load->view('Dashboard/v_spk', $x);
    }
  
   
}
