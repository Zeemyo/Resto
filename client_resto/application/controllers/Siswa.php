<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data siswa";
        $data['data_siswa'] = $this->siswa_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_siswa)
    {
        $data['title'] = "List data siswa";
        $data['data_siswa'] = $this->siswa_model->getByid($id_siswa);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('siswa/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data siswa";

        $this->form_validation->set_rules('id_siswa', 'id_siswa', 'trim|required|numeric');
        $this->form_validation->set_rules('nis', 'nis', 'trim|required');
        $this->form_validation->set_rules('nama_siswa', 'Nama_siswa', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('jns_kelamin', 'jns_kelamin', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('siswa/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_siswa" => $this->input->post('id_siswa'),
                "nis" => $this->input->post('nis'),
                "nama_siswa" => $this->input->post('nama_siswa'),
                "tgl_lahir" => $this->input->post('tgl_lahir'),
                "alamat" => $this->input->post('alamat'),
                "jns_kelamin" => $this->input->post('jns_kelamin'),
                "HEHE" => "KEY-920"
            ];
             $insert = $this->siswa_model->save($data);

            if($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Menambahkan data Siswa');
                redirect('siswa');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'data dupe!');
                redirect('siswa');
            } else {
                $this->session->set_flashdata('message', 'gagal');
                redirect('siswa');
            }
        }
    }

    public function edit($id_siswa)
    {
        $data['title'] = "Tambah data siswa";
        $data['data_siswa'] = $this->siswa_model->getByid($id_siswa);

        $this->form_validation->set_rules('id_siswa', 'id_siswa', 'trim|required|numeric');
        $this->form_validation->set_rules('nis', 'nis', 'trim|required');
        $this->form_validation->set_rules('nama_siswa', 'Nama siswa', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('jns_kelamin', 'jns_kelamin', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('siswa/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_siswa" => $this->input->post('id_siswa'),
                "nis" => $this->input->post('nis'),
                "nama_siswa" => $this->input->post('nama_siswa'),
                "tgl_lahir" => $this->input->post('tgl_lahir'),
                "alamat" => $this->input->post('alamat'),
                "jns_kelamin" => $this->input->post('jns_kelamin'),
                "HEHE" => "KEY-920"
            ];
             $update = $this->siswa_model->update($data);

            if($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Mengubah data Siswa');
                redirect('siswa');
            } elseif ($update['response_code'] === 400) {   
                $this->session->set_flashdata('message', 'gagal');
                redirect('siswa');
            } else {
                $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
                redirect('siswa');
            }
        }
    }

    public function delete($id_siswa)
    {
        $delet = $this->siswa_model->delete($id_siswa);

        if($delet['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Menghapus data Siswa');
            redirect('siswa');
        } else {
            $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
            redirect('siswa');
        }
    }
}