<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH."controllers/AHP.php";
class TOPSIS extends AHP
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
       
    }

    ////////////////////////////////////////////
    // Algoritma TOPSIS
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