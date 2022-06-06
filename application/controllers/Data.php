<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    private $filename = "import_data"; 
    function __construct()
    {
        parent::__construct();
        // $this->load->library('session');
        // $this->load->library('upload');
        // $this->load->model('m_pemain');
    }

    public function index()
    {
        $x['data'] = $this->m_pemain->getAll();
        $this->load->view('Dashboard/v_data', $x);
    }
    public function Add()
    {
        $nama = $this->input->post('xname');
        $posisi = $this->input->post('xposisi');
        $fisik = $this->input->post('xfisik');
        $passing = $this->input->post('xpassing');
        $dribbling = $this->input->post('xdribbling');
        $shooting = $this->input->post('xshooting');
        $heading = $this->input->post('xheading');
        $kognitif = $this->input->post('xkognitif');

        $data = array(
            'nama' => $nama,
            'posisi' => $posisi,
            'fisik' => $fisik,
            'passing' => $passing,
            'dribbling' => $dribbling,
            'shooting' => $shooting,
            'heading' => $heading,
            'kognitif' => $kognitif,
            'preferensi' => 0,
        );

        $this->m_pemain->Add($data);
        redirect('data');
    }
    public function Update()
    {
        $id = $this->input->post('xid');
        $nama = $this->input->post('xname');
        $posisi = $this->input->post('xposisi');
        $fisik = $this->input->post('xfisik');
        $passing = $this->input->post('xpassing');
        $dribbling = $this->input->post('xdribbling');
        $shooting = $this->input->post('xshooting');
        $heading = $this->input->post('xheading');
        $kognitif = $this->input->post('xkognitif');
        $data = array(
            'nama' => $nama,
            'posisi' => $posisi,
            'fisik' => $fisik,
            'passing' => $passing,
            'dribbling' => $dribbling,
            'shooting' => $shooting,
            'heading' => $heading,
            'kognitif' => $kognitif,
            'preferensi' => 0,
        );
        $this->m_pemain->update($id, $data);
     redirect('data');
    }

    public function Delete()
    {
        $id = $this->input->get('id');
        $this->m_pemain->delete($id);
        redirect('data');
    }
    public function DeleteAll()
    {
        $this->m_pemain->deleteAll();
        redirect('data');
    }
  

    public function form()
    {
        $data = array(); 
        if (isset($_POST['preview'])) { 
            $upload = $this->_uploadFile($this->filename);
            if ($upload['result'] == "success") { 
                include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
                $csvreader = PHPExcel_IOFactory::createReader('CSV');
                $loadcsv = $csvreader->load('csv/' . $this->filename . '.csv'); 
                $sheet = $loadcsv->getActiveSheet()->getRowIterator();
                $data['sheet'] = $sheet;
            } else {
                $data['upload_error'] = $upload['error']; 
            }
        }

        $this->load->view('Dashboard/v_priviewFile', $data);
    }

    private function _uploadFile($filename)
    {
        $this->load->library('upload'); 

        $config['upload_path'] = './csv/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;

        $this->upload->initialize($config); 
        if ($this->upload->do_upload('file')) { 
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');

            return $return;
        } else {
            
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function import()
    {
        
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $csvreader = PHPExcel_IOFactory::createReader('CSV');
        $loadcsv = $csvreader->load('csv/' . $this->filename . '.csv'); 
        $sheet = $loadcsv->getActiveSheet()->getRowIterator();

        $data = [];
        $numrow = 1;
        foreach ($sheet as $row) {
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if ($numrow > 1) {
                // START -->
                // Skip untuk mengambil value nya
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false); 
                $get = array(); 
                foreach ($cellIterator as $cell) {
                    array_push($get, $cell->getValue()); 
                }
                // <-- END

               
                $nama = $get[0]; 
                $posisi = $get[1]; 
                $fisik = $get[2]; 
                $passing = $get[3]; 
                $dribbling = $get[4]; 
                $shooting = $get[5]; 
                $heading = $get[6]; 
                $kognitif = $get[7]; 



                array_push($data, [
                    'nama' => $nama,
                    'posisi' => $posisi,
                    'fisik' => $fisik,
                    'passing' => $passing,
                    'dribbling' => $dribbling,
                    'shooting' => $shooting,
                    'heading' => $heading,
                    'kognitif' => $kognitif,
                    'preferensi' => 0,
                ]);
            }

            $numrow++; 
        }

        
        $this->m_pemain->insert_multiple($data);
        redirect("data"); 
    }
}