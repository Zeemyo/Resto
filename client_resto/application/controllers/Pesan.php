<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data tu";
        $data['data_tu'] = $this->Tu_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('tu/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_tu)
    {
        $data['title'] = "List data tu";
        $data['data_tu'] = $this->Tu_model->getByid($id_tu);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('tu/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data tu";

        $this->form_validation->set_rules('id_tu', 'id_tu', 'trim|required|numeric');
        $this->form_validation->set_rules('id_siswa', 'id_siswa', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('tu/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_tu" => $this->input->post('id_tu'),
                "id_siswa" => $this->input->post('id_siswa'),
                "HEHE" => "KEY-28642"
            ];
             $insert = $this->Tu_model->save($data);

            if($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Menambahkan data Tata Usaha');
                redirect('tu');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'data dupe!');
                redirect('tu');
            } else {
                $this->session->set_flashdata('message', 'gagal');
                redirect('tu');
            }
        }
    }

    public function edit($id_tu)
    {
        $data['title'] = "Tambah data tu";
        $data['data_tu'] = $this->Tu_model->getByid($id_tu);

        $this->form_validation->set_rules('id_tu', 'id_tu', 'trim|required|numeric');
        $this->form_validation->set_rules('id_siswa', 'id_siswa', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('tu/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_tu" => $this->input->post('id_tu'),
                "id_siswa" => $this->input->post('id_siswa'),
                "HEHE" => "KEY-28642"
            ];
             $update = $this->Tu_model->update($data);

            if($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Mengubah data Tata Usaha');
                redirect('tu');
            } elseif ($update['response_code'] === 400) {   
                $this->session->set_flashdata('message', 'gagal');
                redirect('tu');
            } else {
                $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
                redirect('tu');
            }
        }
    }

    public function delete($id_tu)
    {
        $delet = $this->Tu_model->delete($id_tu);

        if($delet['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Menghapus data Tata Usaha');
            redirect('tu');
        } else {
            $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
            redirect('tu');
        }
    }
}