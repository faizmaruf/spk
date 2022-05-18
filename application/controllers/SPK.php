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

        // $this->_testOperation($p);
        var_dump($p);
        $this->_weightValue();
        // $this->load->view('v_home', $x);
    }
   

    private function _testOperation($value){
        echo $value[0]['nama'];
        foreach ($value as $v){
           echo $v['nama'];
        }

        die;
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
            [0.143,0.111,0.143,2.000,3.000,1.000],
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

        $x=0;
        $y=0;

        $z=0;
       
        
       $tblPerbandiangan1= $this->_reverseArray($tblPerbandiangan);


var_dump($tblPerbandiangan);


        
        for ($row = 0; $row < 6; $row++) {
		echo "<tr>";
		for ($col = 0; $col < 6; $col++) {
			echo "<td>".$tblPerbandiangan1[$row][$col]."</td>";
		}
        
	    echo "</tr>";
        echo "<br>";
        
        }
echo "<br>";echo "<br>";echo "<br>";echo "<br>";




    
    die;
    }


    private function _reverseArray($data){
         for ($col = 0; $col < 6; $col++) {
            for ($row = 0; $row < 6; $row++) {
                $tblPerbandiangan1[$col][$row]=$data[$row][$col];
		    }
        }
        return $tblPerbandiangan1;
    }
}
