<?php
defined('BASEPATH') or exit('No direct script access allowed');

class minuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('minuman_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data minuman";
        $data['data_minuman'] = $this->minuman_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('minuman/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_minuman)
    {
        $data['title'] = "List data minuman";
        $data['data_minuman'] = $this->minuman_model->getByid($id_minuman);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('minuman/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data minuman";

        $this->form_validation->set_rules('id_minuman', 'id_minuman', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_minuman', 'nama_minuman', 'trim|required');
        $this->form_validation->set_rules('harga_makanan', 'harga_makanan', 'trim|required');
        $this->form_validation->set_rules('stok_minuman', 'stok_minuman', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('minuman/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_minuman" => $this->input->post('id_minuman'),
                "nama_minuman" => $this->input->post('nama_minuman'),
                "harga_makanan" => $this->input->post('harga_makanan'),
                "stok_minuman" => $this->input->post('stok_minuman'),
                "HEHE" => "KEY-920"
            ];
             $insert = $this->minuman_model->save($data);

            if($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'data ditambahkan');
                redirect('minuman');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'data dupe!');
                redirect('minuman');
            } else {
                $this->session->set_flashdata('message', 'gagal');
                redirect('minuman');
            }
        }
    }

    public function edit($id_minuman)
    {
        $data['title'] = "Tambah data minuman";
        $data['data_minuman'] = $this->minuman_model->getByid($id_minuman);

        $this->form_validation->set_rules('id_minuman', 'id_minuman', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_minuman', 'nama_minuman', 'trim|required');
        $this->form_validation->set_rules('harga_makanan', 'harga_makanan', 'trim|required');
        $this->form_validation->set_rules('stok_minuman', 'stok_minuman', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('minuman/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_minuman" => $this->input->post('id_minuman'),
                "nama_minuman" => $this->input->post('nama_minuman'),
                "harga_makanan" => $this->input->post('harga_makanan'),
                "stok_minuman" => $this->input->post('stok_minuman'),
                "HEHE" => "KEY-920"
            ];
             $update = $this->minuman_model->update($data);

            if($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'data diubah');
                redirect('minuman');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'gagal');
                redirect('minuman');
            } else {
                $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
                redirect('minuman');
            }
        }
    }

    public function delete($id_minuman)
    {
        $delet = $this->minuman_model->delete($id_minuman);

        if($delet['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'data dihapus');
            redirect('minuman');
        } else {
            $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
            redirect('minuman');
        }
    }
}