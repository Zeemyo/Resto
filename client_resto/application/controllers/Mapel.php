<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mapel_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data mapel";
        $data['data_mapel'] = $this->Mapel_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('mapel/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_mp)
    {
        $data['title'] = "List data mapel";
        $data['data_mapel'] = $this->Mapel_model->getByid($id_mp);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('mapel/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data mapel";

        $this->form_validation->set_rules('id_mp', 'id_mp', 'trim|required|numeric');
        $this->form_validation->set_rules('kode_mp', 'kode_mp', 'trim|required');
        $this->form_validation->set_rules('nama_mp', 'nama_mp', 'trim|required');
        $this->form_validation->set_rules('pertemuan', 'pertemuan', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('mapel/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_mp" => $this->input->post('id_mp'),
                "kode_mp" => $this->input->post('kode_mp'),
                "nama_mp" => $this->input->post('nama_mp'),
                "pertemuan" => $this->input->post('pertemuan'),
                "email" => $this->input->post('email'),
                "HEHE" => "KEY-920"
            ];
             $insert = $this->Mapel_model->save($data);

            if($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Mebambahkan data Mapel');
                redirect('mapel');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'data dupe!');
                redirect('mapel');
            } else {
                $this->session->set_flashdata('message', 'gagal');
                redirect('mapel');
            }
        }
    }

    public function edit($id_mp)
    {
        $data['title'] = "Tambah data mapel";
        $data['data_mapel'] = $this->Mapel_model->getByid($id_mp);

        $this->form_validation->set_rules('id_mp', 'id_mp', 'trim|required|numeric');
        $this->form_validation->set_rules('kode_mp', 'kode_mp', 'trim|required');
        $this->form_validation->set_rules('nama_mp', 'Nama mapel', 'trim|required');
        $this->form_validation->set_rules('pertemuan', 'pertemuan', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('mapel/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_mp" => $this->input->post('id_mp'),
                "kode_mp" => $this->input->post('kode_mp'),
                "nama_mp" => $this->input->post('nama_mp'),
                "pertemuan" => $this->input->post('pertemuan'),
                "HEHE" => "KEY-920"
            ];
             $update = $this->Mapel_model->update($data);

            if($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Mengubah data mapel');
                redirect('mapel');
            } elseif ($update['response_code'] === 400) {   
                $this->session->set_flashdata('message', 'gagal');
                redirect('mapel');
            } else {
                $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
                redirect('mapel');
            }
        }
    }

    public function delete($id_mp)
    {
        $delet = $this->Mapel_model->delete($id_mp);

        if($delet['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Menghapus data Mapel');
            redirect('mapel');
        } else {
            $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
            redirect('mapel');
        }
    }
}