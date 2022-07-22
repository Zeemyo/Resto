<?php
defined('BASEPATH') or exit('No direct script access allowed');

class akanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('makanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data makanan";
        $data['data_makanan'] = $this->makanan_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('makanan/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_makanan)
    {
        $data['title'] = "List data makanan";
        $data['data_makanan'] = $this->makanan_model->getByid($id_makanan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('makanan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data makanan";

        $this->form_validation->set_rules('id_makanan', 'id_makanan', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_makanan', 'Nama_makanan', 'trim|required');
        $this->form_validation->set_rules('harga_makanan', 'harga_makanan', 'trim|required');
        $this->form_validation->set_rules('stok_makanan', 'stok_makanan', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('makanan/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_makanan" => $this->input->post('id_makanan'),
                "harga_makanan" => $this->input->post('harga_makanan'),
                "nama_makanan" => $this->input->post('nama_makanan'),
                "stok_makanan" => $this->input->post('stok_makanan'),
                "HEHE" => "KEY-28642"
            ];
             $insert = $this->makanan_model->save($data);

            if($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Menambahkan data makanan');
                redirect('makanan');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'data dupe!');
                redirect('makanan');
            } else {
                $this->session->set_flashdata('message', 'gagal');
                redirect('makanan');
            }
        }
    }

    public function edit($id_makanan)
    {
        $data['title'] = "Ubah data makanan";
        $data['data_makanan'] = $this->makanan_model->getByid($id_makanan);

        $this->form_validation->set_rules('id_makanan', 'id_makanan', 'trim|required|numeric');
        $this->form_validation->set_rules('harga_makanan', 'harga_makanan', 'trim|required');
        $this->form_validation->set_rules('nama_makanan', 'Nama makanan', 'trim|required');
        $this->form_validation->set_rules('stok_makanan', 'stok_makanan', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('makanan/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_makanan" => $this->input->post('id_makanan'),
                "harga_makanan" => $this->input->post('harga_makanan'),
                "nama_makanan" => $this->input->post('nama_makanan'),
                "stok_makanan" => $this->input->post('stok_makanan'),
                "HEHE" => "KEY-28642"
            ];
             $update = $this->makanan_model->update($data);

            if($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'mengubah data makanan');
                redirect('makanan');
            } elseif ($update['response_code'] === 400) {   
                $this->session->set_flashdata('message', 'gagal');
                redirect('makanan');
            } else {
                $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
                redirect('makanan');
            }
        }
    }

    public function delete($id_makanan)
    {
        $delet = $this->makanan_model->delete($id_makanan);

        if($delet['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'menghapus data makanan');
            redirect('makanan');
        } else {
            $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
            redirect('makanan');
        }
    }
}