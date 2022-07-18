<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data Mahasiswa";
        $data['data_mahasiswa'] = $this->Mahasiswa_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($npm)
    {
        $data['title'] = "List data Mahasiswa";
        $data['data_mahasiswa'] = $this->Mahasiswa_model->getByid($npm);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data Mahasiswa";

        $this->form_validation->set_rules('npm', 'Npm', 'trim|required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'NO Hp', 'trim|required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('mahasiswa/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "npm" => $this->input->post('npm'),
                "nama" => $this->input->post('nama'),
                "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                "alamat" => $this->input->post('alamat'),
                "agama" => $this->input->post('agama'),
                "no_hp" => $this->input->post('no_hp'),
                "email" => $this->input->post('email'),
                "HEHE" => "KEY-920"
            ];
             $insert = $this->Mahasiswa_model->save($data);

            if($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'data ditambahkan');
                redirect('Mahasiswa');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'data dupe!');
                redirect('Mahasiswa');
            } else {
                $this->session->set_flashdata('message', 'gagal');
                redirect('Mahasiswa');
            }
        }
    }

    public function edit($npm)
    {
        $data['title'] = "Tambah data Mahasiswa";
        $data['data_mahasiswa'] = $this->Mahasiswa_model->getByid($npm);

        $this->form_validation->set_rules('npm', 'Npm', 'trim|required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'NO Hp', 'trim|required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('mahasiswa/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "npm" => $this->input->post('npm'),
                "nama" => $this->input->post('nama'),
                "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                "alamat" => $this->input->post('alamat'),
                "agama" => $this->input->post('agama'),
                "no_hp" => $this->input->post('no_hp'),
                "email" => $this->input->post('email'),
                "HEHE" => "KEY-920"
            ];
             $update = $this->Mahasiswa_model->update($data);

            if($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'data diubah');
                redirect('Mahasiswa');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'gagal');
                redirect('Mahasiswa');
            } else {
                $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
                redirect('Mahasiswa');
            }
        }
    }

    public function delete($npm)
    {
        $delet = $this->Mahasiswa_model->delete($npm);

        if($delet['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'data dihapus');
            redirect('Mahasiswa');
        } else {
            $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
            redirect('Mahasiswa');
        }
    }
}