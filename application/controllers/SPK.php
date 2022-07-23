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
        $x['tblperbandingan'] = $this->m_pemain->getAllTblPerbandingan();
        $x['nama'] = $this->m_pemain->getAllName();
        $x['data'] = $this->m_pemain->getAllValue();
        $x['tabledata'] = $this->m_pemain->getAll();
        $z['data'] = $this->m_pemain->getAll();
        $data=$x['data'];
        if (count($data)<2) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-center" role="alert" >Masukan Data Kembali, Minimal 2 Data Untuk Melakukan Perangkingan!!!</div>');
            redirect ('data');
        }
        
    
        ///////////////////Metode AHP
        //sampai mendapatkan nilai bobot tiap variable
        $ahp = new $this->ahp;

        //tabel perbandingan prioritas dari pelatih
        $tblPerbandingan= convertArray($this->m_pemain->getAllTblPerbandingan());
       
       
        $pembagi= _getSumCol($tblPerbandingan);

        //nilai eigen/normalisasi
        $normalisasi = $ahp->normalisasiAhp($tblPerbandingan,$pembagi); 
       

        //nilai bobot = W
        $nilaibobot = $ahp->weightValueAhp($normalisasi); 
        $W = $nilaibobot;
        $x['bobot']=$W;
        
        //cek kosinsistensi
        $cek=$ahp->checkConsistencyAhp($pembagi,$nilaibobot);
        if ($cek==false) {
             $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex justify-content-center" role="alert" >Terjadi Inkonsistensi Pada Tabel Perbandingan Prioritas, Silahkan Input Ulang Niliai Prioritas Kriteria!!!</div>');
            redirect ('Home');
        }

         ///////////////////Metode Topsis
        //sampai mendapatkan nilai preferensi tiap alternatif
        $topsis = new $this->topsis;

        //Data Pemain dinormalisasi terlebih dahulu
        $rij=$topsis->normalisasiTopsis($data);
        $x['rij']=$rij;
        

        //data normalisasi terbobot yij = wj*rij
        $y = $topsis->normalisasiTerbobotTopsis($rij,$W);
        $x['y']=$y;

        //Mencari solusi ideal positive dan negative
        $A_plus=$topsis->findMax($y);
        $A_minus=$topsis->findMin($y);
        $x['A_plus']=$A_plus;
        $x['A_minus']=$A_minus;


        //Mencari D+ dan D- untuk Setiap Altenatif
        $D_plus=$topsis->distance($y,$A_plus);
        $D_minus=$topsis->distance($y,$A_minus);
        $x['D_plus']=$D_plus;
        $x['D_minus']=$D_minus;

       

        //menghitung nilai preferensi tiap alternatif 
        $V = $topsis->preferenceValue($D_plus,$D_minus);

        //perangkingan
        $datapemain=$topsis->perangkinganData($z['data'],$V);
       
        //nilai preferensi dimasukan ke database
        $this->m_pemain->updateMultiple($datapemain);
        
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
//END
