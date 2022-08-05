<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Minuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Minuman_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data minuman";
        $data['data_minuman'] = $this->Minuman_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('minuman/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_minuman)
    {
        $data['title'] = "List data minuman";
        $data['data_minuman'] = $this->Minuman_model->getByid($id_minuman);

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
        $this->form_validation->set_rules('harga_minuman', 'harga_minumann', 'trim|required');
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
                "harga_minuman" => $this->input->post('harga_minuman'),
                "stok_minuman" => $this->input->post('stok_minuman'),
                "HEHE" => "KEY-28642"
            ];
             $insert = $this->Minuman_model->save($data);

            if($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'menambahkan data Minuman');
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
        $data['title'] = "Edit data minuman";
        $data['data_minuman'] = $this->Minuman_model->getByid($id_minuman);

        $this->form_validation->set_rules('id_minuman', 'id_minuman', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_minuman', 'nama_minuman', 'trim|required');
        $this->form_validation->set_rules('harga_minuman', 'harga_minuman', 'trim|required');
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
                "harga_minuman" => $this->input->post('harga_minuman'),
                "stok_minuman" => $this->input->post('stok_minuman'),
                "HEHE" => "KEY-28642"
            ];
             $update = $this->Minuman_model->update($data);

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
        $delet = $this->Minuman_model->delete($id_minuman);

        if($delet['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'data dihapus');
            redirect('minuman');
        } else {
            $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
            redirect('minuman');
        }
    }
}
