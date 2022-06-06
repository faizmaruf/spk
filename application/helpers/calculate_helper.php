<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  
    function _getSumCol($data){
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
   function _getSumRow($data){
        $array_lengthRow = count($data);
        $array_lengthCol = count($data[0]);
    
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
    function nilaiAkurasi($data,$data1){
       $value=0;
       $s=0;
       for ($i=0; $i < count($data); $i++) { 
           for ($j=0; $j < count($data1); $j++) { 
               
               if ($data[$i]['nama']==$data1[$j]['nama']) {
                   $value++;
                }
            }
        }
    $n = count($data);
    $akurasi = (($value/$n)*100);
    return $akurasi;
    }
