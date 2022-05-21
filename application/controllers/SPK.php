<?php
defined('BASEPATH') or exit('No direct script access allowed');


class AHP{

    function __construct()
    {
        
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->model('m_pemain');
        
        // $x=$this->load->library('/Home.php');
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
        // print_r($pembagi);
        
        //  echo "<br>";echo "<br>";

        //nilai eigen atau normalisasi
        $normalisasi = $this->NormalisasiAHP($tblPerbandiangan,$pembagi);  
        // print_r($normalisasi);

        //  echo "<br>";echo "<br>";
         //nilai bobot
        $nilaibobot = $this->weightValue($normalisasi);  
        // print_r($nilaibobot);

        // echo "<br>";echo "<br>";


        //cek kosinsistensi
        $cek=$this->_chehkCosistency($pembagi,$nilaibobot);
        // var_dump($cek);

        ////////////////////////////////////////////
        //Topsis
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
        
        for ($i=0; $i < $array_lengthCol; $i++) { 
            $p[$i]=0;
        }
        $i=0;
        for ($row = 0; $row < $array_lengthRow; $row++) {
            for ($col = 0; $col < $array_lengthCol; $col++) {
                $p[$i]=$p[$i]+$data[$row][$col];
		    }
            $i++;
        }
        var_dump($p);
        die;
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
        $sum = $this->_getSumRow($data);
        for ($i=0; $i < $array_length; $i++) { 
            $p[$i]=$sum[$i]/$array_length;
        }
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


class TOPSIS{
     function __construct()
    {
        
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->model('m_pemain');
    }


    public function Topsis($W,$data)
    {
        //Data dinormalisasi
        $rij=$this->_normalisasiData($data);

        //data normalisasi terbobot yij = wj*rij
        $array_lengthRow = count($rij);
        $array_lengthCol = count($rij[0]);
       
        for ($row = 0; $row < $array_lengthRow; $row++) {
            for ($col = 0; $col < $array_lengthCol; $col++) {
                $rij1= (array_values($rij[$row]));
                $yij[$row][$col] = ($rij1[$col])*($W[$col]);
		    } 
        }
        $A_plus=$this->_findMax($yij);
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        $A_minus=$this->_findMin($yij);
       

        $this->_DPlus($yij,$A_plus);
        die;
        return $yij;
    }


    public function _normalisasiData($data)
    {
        $array_lengthRow = count($data);
        $array_lengthCol = count($data[0]);
       
        for ($row = 0; $row < $array_lengthRow; $row++) {
            for ($col = 0; $col < $array_lengthCol; $col++) {
                $Xij= (array_values($data[$row]));
                $Xij2[$row][$col]=pow($Xij[$col],2); 
		    } 
        }
        $sigma=$this->_getSumCol($Xij2);
        $akarsigma = $this->_akarSigma($sigma);
        return$this->_normaliasiTopsis($data,$akarsigma);
 
    } 
    public function _akarSigma($data)
    {
        $array_length = count($data);
        for ($i = 0; $i < $array_length; $i++) {
           $p[$i]=sqrt($data[$i]);
        }
       return $p;
    }
    public function _normaliasiTopsis($data,$akarsigma)
    {   
        $array_lengthRow = count($data);
        $array_lengthCol = count($data[0]);
       
        for ($row = 0; $row < $array_lengthRow; $row++) {
            for ($col = 0; $col < $array_lengthCol; $col++) {
                $data1= (array_values($data[$row]));
                $Rij[$row][$col] = ($data1[$col])/($akarsigma[$col]);
		    } 
        }
       return $Rij;
    }
    public function _findMax($data)
    {
        $array_lengthRow = count($data);
        $array_lengthCol = count($data[0]);
        for ($i=0; $i < $array_lengthCol; $i++) { 
            $p[$i]=0;
        }
        
        $i=0;
        for ($row = 0; $row < $array_lengthRow; $row++) {
            $i=0;
            for ($col = 0; $col < $array_lengthCol; $col++) {
                
                $pembanding=0+$data[$row][$col];
                if ($p[$i]<$pembanding) {
                    $p[$i]=$data[$row][$col];
                }
                $i++;
		    } 
        }
        
        return $p;
    }
    public function _findMin($data)
    {
        $array_lengthRow = count($data);
        $array_lengthCol = count($data[0]);
        for ($i=0; $i < $array_lengthCol; $i++) { 
            $p[$i]=1;
        }
        
        $i=0;
        for ($row = 0; $row < $array_lengthRow; $row++) {
            $i=0;
            for ($col = 0; $col < $array_lengthCol; $col++) {
                
                $pembanding=0+$data[$row][$col];
                if ($p[$i]>$pembanding) {
                    $p[$i]=$data[$row][$col];
                }
                $i++;
		    } 
        }
        
        return $p;
    }
    public function _DPlus($data,$yj)
    {
        $array_lengthRow = count($data);
        $array_lengthCol = count($data[0]);
       
        for ($row = 0; $row < $array_lengthRow; $row++) {
            for ($col = 0; $col < $array_lengthCol; $col++) {
                $yij= (array_values($data[$row]));
                $D[$row][$col] = pow((($yij[$col])-($yj[$col])),2);
		    } 
        }
        //  var_dump($D);
        // die;
        return $this->_getSumRow($D);
        // return $D_plus;
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
        // var_dump($array_lengthRow);
        //  var_dump($array_lengthCol);
        //  die;
        for ($i=0; $i < $array_lengthCol; $i++) { 
            $p[$i]=0;
        }
        $i=0;
        for ($row = 0; $row < $array_lengthRow; $row++) {
            for ($col = 0; $col < $array_lengthCol; $col++) {
                $p[$i]=$p[$i]+$data[$row][$col];
		    }
            $i++;
        }
        var_dump($p);
        die;
        return $p;
    }
}

class SPK extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->model('m_pemain');
        $this->load->library('custom');
        // var_dump($x);
        // die;

        // $ahp = new AHP();
        // $topsis = new TOPSIS();
    }
    
    public function index()
    {   
        
        $x['data'] = $this->m_pemain->getAllValue();
        $data=$x['data'];
        $t = $this->custom->hitung(8,9);
      
        // $W=$this->$ahp->_weightValue();
        var_dump($t);
        die;
        
        // echo "<br> <br>";

        // $topsis = $this->Topsis($W,$data);
        // print_r($topsis);

        //  echo "<br> <br>";
        // die;
        
        
        
        // $this->load->view('v_home', $x);
    }
   
}
// $objekspk = new SPK();