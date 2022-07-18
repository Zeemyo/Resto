<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Guru_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data guru";
        $data['data_guru'] = $this->Guru_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('guru/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_guru)
    {
        $data['title'] = "List data guru";
        $data['data_guru'] = $this->Guru_model->getByid($id_guru);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('guru/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data guru";

        $this->form_validation->set_rules('id_guru', 'id_guru', 'trim|required|numeric');
        $this->form_validation->set_rules('nip', 'nip', 'trim|required');
        $this->form_validation->set_rules('nama_guru', 'Nama_guru', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('guru/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_guru" => $this->input->post('id_guru'),
                "nip" => $this->input->post('nip'),
                "nama_guru" => $this->input->post('nama_guru'),
                "alamat" => $this->input->post('alamat'),
                "email" => $this->input->post('email'),
                "HEHE" => "KEY-920"
            ];
             $insert = $this->Guru_model->save($data);

            if($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Menambahkan data Guru');
                redirect('Guru');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'data dupe!');
                redirect('Guru');
            } else {
                $this->session->set_flashdata('message', 'gagal');
                redirect('Guru');
            }
        }
    }

    public function edit($id_guru)
    {
        $data['title'] = "Ubah data guru";
        $data['data_guru'] = $this->Guru_model->getByid($id_guru);

        $this->form_validation->set_rules('id_guru', 'id_guru', 'trim|required|numeric');
        $this->form_validation->set_rules('nip', 'nip', 'trim|required');
        $this->form_validation->set_rules('nama_guru', 'Nama guru', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('guru/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_guru" => $this->input->post('id_guru'),
                "nip" => $this->input->post('nip'),
                "nama_guru" => $this->input->post('nama_guru'),
                "alamat" => $this->input->post('alamat'),
                "email" => $this->input->post('email'),
                "HEHE" => "KEY-920"
            ];
             $update = $this->Guru_model->update($data);

            if($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'mengubah data Guru');
                redirect('Guru');
            } elseif ($update['response_code'] === 400) {   
                $this->session->set_flashdata('message', 'gagal');
                redirect('Guru');
            } else {
                $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
                redirect('Guru');
            }
        }
    }

    public function delete($id_guru)
    {
        $delet = $this->Guru_model->delete($id_guru);

        if($delet['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'menghapus data Guru');
            redirect('Guru');
        } else {
            $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
            redirect('Guru');
        }
    }
}