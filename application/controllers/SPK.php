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
    }

    public function index()
    {
        $x['data'] = $this->m_pemain->getAllData();
        $p=$x['data'];

      
        
        $this->_weightValue();
        // $this->load->view('v_home', $x);
    }
   

   
     function _weightValue(){
        //variable tabel perbandingan kriteria
        $jumlah[]=0;
        $q=0;
        $tblPerbandiangan=[
            [1.000,0.333,1.000,1.000,7.000,7.000],
            [3.000,1.000,3.000,3.000,9.000,9.000],
            [1.000,0.333,1.000,1.000,7.000,7.000],
            [1.000,0.333,1.000,1.000,7.000,5.000],
            [0.143,0.111,0.143,0.143,1.000,0.333],
            [0.143,0.111,0.143,0.143,3.000,1.000],
        ];
       for ($row = 0; $row < 6; $row++) {
		echo "<tr>";
		for ($col = 0; $col < 6; $col++) {
			echo "<td>".$tblPerbandiangan[$row][$col]."</td>";
		}
        
	    echo "</tr>";
        echo "<br>";
        
        }
        echo "<br>";echo "<br>";echo "<br>";echo "<br>";

        //jumlah nilai dari tiap kolom
        $pembagi =$this->_getSumCol($tblPerbandiangan);
        print_r($pembagi);
        
         echo "<br>";echo "<br>";

        //nilai eigen atau normalisasi
        $normalisasi = $this->Normalisasi($tblPerbandiangan,$pembagi);  
        print_r($normalisasi);

         echo "<br>";echo "<br>";
         //nilai bobot
        $nilaibobot = $this->weightValue($normalisasi);  
        print_r($nilaibobot);

        echo "<br>";echo "<br>";


        //cek kosinsistensi
        $cek=$this->_chehkCosistency($pembagi,$nilaibobot);
        var_dump($cek);
    die;
    }


    

    private function _getSumCol($data){
        $array_length = count($data);
        // $p=[0,0,0,0,0,0];
        for ($i=0; $i < $array_length; $i++) { 
            $p[$i]=0;
        }
        $i=0;
        for ($row = 0; $row < $array_length; $row++) {
            for ($col = 0; $col < $array_length; $col++) {
                $p[$i]=$p[$i]+$data[$row][$col];
                $i++;
		    }
            $i=0;
        }
        return $p;
    }
    private function _getSumRow($data){
        $array_length = count($data);
        // $p=[0,0,0,0,0,0];
        for ($i=0; $i < $array_length; $i++) { 
            $p[$i]=0;
        }
        $i=0;
        for ($row = 0; $row < $array_length; $row++) {
            for ($col = 0; $col < $array_length; $col++) {
                $p[$i]=$p[$i]+$data[$row][$col];
		    }
            $i++;
        }
        return $p;
    }
    function Normalisasi($data,$pembagi)
    {
        
         for ($row = 0; $row < 6; $row++) {
            for ($col = 0; $col < 6; $col++) {
               $p[$row][$col]=($data[$row][$col])/($pembagi[$col]);
		    }
        }
        return $p;
    }
    function weightValue($data)
    {   
        $array_length = count($data);
        // $p=[0,0,0,0,0,0];
        for ($i=0; $i < $array_length; $i++) { 
            $p[$i]=0;
        }
        $sum = $this->_getSumRow($data);
        for ($i=0; $i < $array_length; $i++) { 
            $p[$i]=$sum[$i]/$array_length;
        }
        return $p;
    }

    private function _chehkCosistency($data,$data1)    
    {
        // CI = (L-n)/(n-1) dan CR = CI/IR  . nilai IR n =6 adalah 1,24
        $array_length = count($data);
        $n=$array_length;
        $IR=1.24;
        $L=0;
        for ($i=0; $i < $array_length; $i++) { 
            $L=$L+$data[$i]*$data1[$i];
        }
        $CI = ($L-$n)/($n-1);
        $CR = $CI/$IR;
        //cek kosinsistensi, jika CR <0,1 maka kosisten, jika CR>0,1 maka tidak konsisten 
        if ($CR<0.1) {
            return true;
        }else{
            return false;
        }

    }
}
