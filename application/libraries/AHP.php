<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ahp {
    
  
    public function normalisasiAhp($data,$pembagi)
    {
        $array_length = count($data);
         for ($row = 0; $row < $array_length; $row++) {
            for ($col = 0; $col < $array_length; $col++) {
               $p[$row][$col]=($data[$row][$col])/($pembagi[$col]);
		    }
        }
        return $p;
    }

    public function weightValueAhp($data)
    {   
        $array_length = count($data);
        for ($i=0; $i < $array_length; $i++) { 
            $p[$i]=0;
        }
        $data1 = $data;
        $sum = _getSumRow($data1);
      
        for ($i=0; $i < $array_length; $i++) { 
            $p[$i]=$sum[$i]/$array_length;
        } 
        return $p;
    }

    public function checkConsistencyAhp($data,$data1)    
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