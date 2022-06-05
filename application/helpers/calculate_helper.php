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
