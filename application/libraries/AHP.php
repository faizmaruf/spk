<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ahp {
     
    function __construct(){
       
    }

public function _weightValue(){
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
    

        //jumlah nilai dari tiap kolom
        $pembagi =$this->_getSumCol($tblPerbandiangan);
        // var_dump($pembagi);
        // die;
        //nilai eigen/normalisasi
        $normalisasi = $this->NormalisasiAHP($tblPerbandiangan,$pembagi);  
        
        $nilaibobot = $this->weightValue($normalisasi);  
        // var_dump($nilaibobot);
        // die;
        


        //cek kosinsistensi
        $cek=$this->_chehkCosistency($pembagi,$nilaibobot);
        // var_dump($cek);
        // die;
        return $nilaibobot;

    }


    public function _getSumCol($data){
        $array_lengthRow = count($data);
        $array_lengthCol = count($data[0]);
        for ($i=0; $i < $array_lengthCol; $i++) { 
            $p[$i]=0;
        }
        
        $i=0;
        for ($row = 0; $row < $array_lengthRow; $row++) {
            $i=0;
            for ($col = 0; $col < $array_lengthCol; $col++) {
                $p[$i]=$p[$i]+$data[$row][$col];
                $i++;
		    }
        }
        return $p;
    }
    public function _getSumRow($data){
        $array_lengthRow = count($data);
        $array_lengthCol = count($data[0]);
        //  var_dump($data);
        // die;
        for ($i=0; $i < $array_lengthRow; $i++) { 
            $p[$i]=0;
        }
        $i=0;
        
        for ($row = 0; $row < $array_lengthRow; $row++) {
            for ($col = 0; $col < $array_lengthCol; $col++) {
                $p[$i]=$p[$i]+$data[$row][$col];
		    }
            $i++;
        }
       
        return $p;
    }
    public function NormalisasiAHP($data,$pembagi)
    {
        $array_length = count($data);
         for ($row = 0; $row < $array_length; $row++) {
            for ($col = 0; $col < $array_length; $col++) {
               $p[$row][$col]=($data[$row][$col])/($pembagi[$col]);
		    }
        }
        return $p;
    }
    public function weightValue($data)
    {   
        $array_length = count($data);
        for ($i=0; $i < $array_length; $i++) { 
            $p[$i]=0;
        }
        $data1 = $data;
        $sum = $this->_getSumRow($data1);
        for ($i=0; $i < $array_length; $i++) { 
            $p[$i]=$sum[$i]/$array_length;
        }
        // var_dump($p);
        // die;
        return $p;
    }

    public function _chehkCosistency($data,$data1)    
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
?>