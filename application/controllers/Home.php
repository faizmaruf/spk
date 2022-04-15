<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
        $x['data'] = $this->m_pemain->getAll();
        $this->load->view('v_home', $x);
    }
    public function Add()
    {
        $nama = $this->input->post('xname');
        $posisi = $this->input->post('xposisi');
        $passing = $this->input->post('xpassing');
        $dribbling = $this->input->post('xdribbling');
        $shooting = $this->input->post('xshooting');
        $heading = $this->input->post('xheading');
        $kognitif = $this->input->post('xkognitif');

        $data = array(
            'nama' => $nama,
            'posisi' => $posisi,
            'passing' => $passing,
            'dribbling' => $dribbling,
            'shooting' => $shooting,
            'heading' => $heading,
            'kognitif' => $kognitif,
        );

        $this->m_pemain->Add($data);
        redirect('Home');
    }
    public function Delete()
    {
        $id = $this->input->get('id');
        // var_dump($id);
        // die;
        $this->m_pemain->delete($id);
        redirect('Home');
    }
}
