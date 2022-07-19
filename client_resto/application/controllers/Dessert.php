<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dessert extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dessert_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data Dessert";
        $data['data_Dessert'] = $this->Dessert_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('Dessert/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_dessert)
    {
        $data['title'] = "List data Dessert";
        $data['data_Dessert'] = $this->Dessert_model->getByid($id_dessert);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('Dessert/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data Dessert";

        $this->form_validation->set_rules('id_dessert', 'id_dessert', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_dessert', 'nama_dessert', 'trim|required');
        $this->form_validation->set_rules('harga_dessert', 'harga_dessert', 'trim|required');
        $this->form_validation->set_rules('stok_dessert', 'stok_dessert', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('Dessert/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_dessert" => $this->input->post('id_dessert'),
                "nama_dessert" => $this->input->post('nama_dessert'),
                "harga_dessert" => $this->input->post('harga_dessert'),
                "stok_dessert" => $this->input->post('stok_dessert'),
                "HEHE" => "KEY-920"
            ];
             $insert = $this->Dessert_model->save($data);

            if($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Mebambahkan data Dessert');
                redirect('Dessert');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'data dupe!');
                redirect('Dessert');
            } else {
                $this->session->set_flashdata('message', 'gagal');
                redirect('Dessert');
            }
        }
    }

    public function edit($id_dessert)
    {
        $data['title'] = "Tambah data Dessert";
        $data['data_Dessert'] = $this->Dessert_model->getByid($id_dessert);

        $this->form_validation->set_rules('id_dessert', 'id_dessert', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_dessert', 'nama_dessert', 'trim|required');
        $this->form_validation->set_rules('harga_dessert', 'Nama Dessert', 'trim|required');
        $this->form_validation->set_rules('stok_dessert', 'stok_dessert', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('Dessert/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_dessert" => $this->input->post('id_dessert'),
                "nama_dessert" => $this->input->post('nama_dessert'),
                "harga_dessert" => $this->input->post('harga_dessert'),
                "stok_dessert" => $this->input->post('stok_dessert'),
                "HEHE" => "KEY-920"
            ];
             $update = $this->Dessert_model->update($data);

            if($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Mengubah data Dessert');
                redirect('Dessert');
            } elseif ($update['response_code'] === 400) {   
                $this->session->set_flashdata('message', 'gagal');
                redirect('Dessert');
            } else {
                $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
                redirect('Dessert');
            }
        }
    }

    public function delete($id_dessert)
    {
        $delet = $this->Dessert_model->delete($id_dessert);

        if($delet['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Menghapus data Dessert');
            redirect('Dessert');
        } else {
            $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
            redirect('Dessert');
        }
    }
}