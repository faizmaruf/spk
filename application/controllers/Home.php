<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    private $filename = "import_data"; // Kita tentukan nama filenya
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->model('m_pemain');
    }

    public function index()
    {
        $x['data'] = $this->m_pemain->getAll();
        $this->load->view('v_home', $x);
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
        );

        $this->m_pemain->Add($data);
        redirect('Home');
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
        );
        // var_dump($data);
        // die;
        $this->m_pemain->update($id, $data);
        redirect('Home');
    }
    public function Delete()
    {
        $id = $this->input->get('id');
        $this->m_pemain->delete($id);
        redirect('Home');
    }
    public function form()
    {
        $data = array(); // Buat variabel $data sebagai array
       
        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
            // lakukan upload file dengan memanggil private function upload dibawah
            $upload = $this->_uploadFile($this->filename);

            if ($upload['result'] == "success") { // Jika proses upload sukses
                // Load plugin PHPExcel nya
                include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

                $csvreader = PHPExcel_IOFactory::createReader('CSV');
                $loadcsv = $csvreader->load('csv/' . $this->filename . '.csv'); // Load file yang tadi diupload ke folder csv
                $sheet = $loadcsv->getActiveSheet()->getRowIterator();

                // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
                // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam csv yang sudha di upload sebelumnya
                $data['sheet'] = $sheet;
            } else { // Jika proses upload gagal
                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
        }

        $this->load->view('v_priviewFile', $data);
    }

    private function _uploadFile($filename)
    {
        $this->load->library('upload'); // Load librari upload

        $config['upload_path'] = './csv/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;

       $this->upload->initialize($config); // Load konfigurasi uploadnya

    //    $r=$this->upload->do_upload('file');
    //    var_dump($r);
    //    die;
        if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function import()
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $csvreader = PHPExcel_IOFactory::createReader('CSV');
        $loadcsv = $csvreader->load('csv/' . $this->filename . '.csv'); // Load file yang tadi diupload ke folder csv
        $sheet = $loadcsv->getActiveSheet()->getRowIterator();

        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
        die;
        $data = [];

        $numrow = 1;
        foreach ($sheet as $row) {
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if ($numrow > 1) {
                // START -->
                // Skrip untuk mengambil value nya
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set

                $get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0
                foreach ($cellIterator as $cell) {
                    array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get
                }
                // <-- END

                // Ambil data value yang telah di ambil dan dimasukkan ke variabel $get
                

               // $id = $get[0]; // Ambil data id
                $nama = $get[1]; // Ambil data nama
                $posisi = $get[2]; // Ambil data Posisi
                $fisik = $get[3]; // Ambil data email
                $passing = $get[4]; // Ambil data passing
                $dribbling = $get[5]; // Ambil data dribbling
                $shooting = $get[6]; // Ambil data shotting
                $heading = $get[7]; // Ambil data heading
                $kognitif = $get[8]; // Ambil data kognitif

               

                array_push($data, [
                    'nama' => $nama,
                    'posisi' => $posisi,
                    'fisik' => $fisik,
                    'passing' => $passing,
                    'dribbling' => $dribbling,
                    'shooting' => $shooting,
                    'heading' => $heading,
                    'kognitif' => $kognitif,
                ]);
            }

            $numrow++; // Tambah 1 setiap kali looping
        }

        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
        $this->M_pemain->insert_multiple($data);

        redirect("Home"); // Redirect ke halaman awal (ke controller siswa fungsi index)
    }
}
