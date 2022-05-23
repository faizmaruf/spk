<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class TOPSIS extends Calculate{

   function __construct(){
        
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
        return $this->_normaliasiTopsis($data,$akarsigma);
 
    } 
    private function _akarSigma($data)
    {
        $array_length = count($data);
        for ($i = 0; $i < $array_length; $i++) {
           $p[$i]=sqrt($data[$i]);
        }
       return $p;
    }
    private function _normaliasiTopsis($data,$akarsigma)
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

    public function _normalisasiDataTerbobot($rij,$W)
    {
        $array_lengthRow = count($rij);
        $array_lengthCol = count($rij[0]);
  
        for ($i = 0; $i < $array_lengthRow; $i++) {
            for ($j = 0; $j < $array_lengthCol; $j++) {
                $r1= (array_values($rij[$i]));
                $y[$i][$j] = ($r1[$j])*($W[$j]);
                
		    } 
        }
        return $y;
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
    public function _D($Y,$A)
    {   
        $array_lengthRow = count($Y);
        $array_lengthCol = count($Y[0]);
        
       
        for ($i = 0; $i < $array_lengthRow; $i++) {
            for ($j = 0; $j < $array_lengthCol; $j++) {
                $yij= (array_values($Y[$i]));
                $temp[$i][$j] = pow((($yij[$j])-($A[$j])),2);
		    } 
        }
        $temp1=$this->_getSumRow($temp);
       
        for ($i=0; $i < $array_lengthRow; $i++) { 
            $D[$i] =0;
        }
        for ($i = 0; $i < $array_lengthRow; $i++) {
            $D[$i] =(sqrt($temp1[$i]));
        } 
       

        return $D;
    }
    public function _preferebceValue($Dplus,$Dmin){
        $array_lengthRow = count($Dplus);
        for ($i = 0; $i < $array_lengthRow; $i++) {
            $D[$i]=$Dmin[$i]/($Dmin[$i]+$Dplus[$i]);
        }
      
        return $D;
    }
    

    
}
?>