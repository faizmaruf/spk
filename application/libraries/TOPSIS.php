<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Topsis{


    public function normalisasiTopsis($data)
    {
        $array_lengthRow = count($data);
        $array_lengthCol = count($data[0]);
       
        for ($row = 0; $row < $array_lengthRow; $row++) {
            for ($col = 0; $col < $array_lengthCol; $col++) {
                $Xij= (array_values($data[$row]));
                $Xij2[$row][$col]=pow($Xij[$col],2); 
		    } 
        }
        $sigma=_getSumCol($Xij2);
        $akarsigma = $this->_akarSigma($sigma);
        return $this->_dividerTopsis($data,$akarsigma);
 
    } 
    private function _akarSigma($data)
    {
        $array_length = count($data);
        for ($i = 0; $i < $array_length; $i++) {
           $p[$i]=sqrt($data[$i]);
        }
       return $p;
    }
    private function _dividerTopsis($data,$akarsigma)
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

    public function normalisasiTerbobotTopsis($rij,$W)
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


    public function findMax($data)
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
    public function findMin($data)
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
    public function distance($Y,$A)
    {   
        $array_lengthRow = count($Y);
        $array_lengthCol = count($Y[0]);
        
       
        for ($i = 0; $i < $array_lengthRow; $i++) {
            for ($j = 0; $j < $array_lengthCol; $j++) {
                $yij= (array_values($Y[$i]));
                $temp[$i][$j] = pow((($yij[$j])-($A[$j])),2);
		    } 
        }
        $temp1=_getSumRow($temp);
       
        for ($i=0; $i < $array_lengthRow; $i++) { 
            $D[$i] =0;
        }
        for ($i = 0; $i < $array_lengthRow; $i++) {
            $D[$i] =(sqrt($temp1[$i]));
        } 
       

        return $D;
    }
    public function preferenceValue($Dplus,$Dmin){
        $array_lengthRow = count($Dplus);
        for ($i = 0; $i < $array_lengthRow; $i++) {
            $D[$i]=$Dmin[$i]/($Dmin[$i]+$Dplus[$i]);
        }
      
        return $D;
    }
    
     public function perangkinganData($datapemainfutsal,$V)
    {
        
        $data=$this->_masukinDataPreferensi($datapemainfutsal,$V);
        
        $datapemain = [];
        $array_lengthRow = count($data);
     
        
     
        for ($i = 0; $i < $array_lengthRow; $i++) {
                $data1= (array_values($data[$i]));

                $id = $data1[0]; 
                $nama = $data1[1]; 
                $posisi = $data1[2]; 
                $fisik = $data1[3]; 
                $passing = $data1[4]; 
                $dribbling = $data1[5]; 
                $shooting = $data1[6]; 
                $heading = $data1[7]; 
                $kognitif = $data1[8]; 
                $preferensi = $data1[9]; 


            array_push($datapemain, [
                'id' => $id,
                'nama' => $nama,
                'posisi' => $posisi,
                'fisik' => $fisik,
                'passing' => $passing,
                'dribbling' => $dribbling,
                'shooting' => $shooting,
                'heading' => $heading,
                'kognitif' => $kognitif,
                'preferensi' => $preferensi,
            ]);
        }
        return $datapemain; 
    }

//kenapa dipanggil 2x datanya agar id nya masuk ke data
      private function _masukinDataPreferensi($data,$V)
    {
        $array_lengthRow = count($data);
        $array_lengthCol = count($data[0]);
        $preferensiIndex = $array_lengthCol-1;
       
        for ($i = 0; $i < $array_lengthRow; $i++) {
            for ($j = 0; $j < $array_lengthCol; $j++) {
                $data1= (array_values($data[$i]));
                $data1[$preferensiIndex] = $V[$i];
                $data2[$i][$j]=$data1[$j];
		    } 
        }
       
      return $data2;
    }
    
    
}
?>

<!-- cek data yang belum diselesaiin ditahap normanlisasi -->
<!-- pindahin kelas Calculate ke Folder helper, serta rename menjadi calculateHelper -->
<!-- change variable name with case styles principle -->