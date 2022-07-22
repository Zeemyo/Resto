<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data order";
        $data['data_order'] = $this->order_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('order/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_order)
    {
        $data['title'] = "List data order";
        $data['data_order'] = $this->order_model->getByid($id_order);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('order/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data order";

        $this->form_validation->set_rules('id_order', 'id_order', 'trim|required|numeric');
        $this->form_validation->set_rules('no_meja', 'no_meja', 'trim|required');
        $this->form_validation->set_rules('total_harga', 'total_harga', 'trim|required');
        $this->form_validation->set_rules('uang_bayar', 'uang_bayar', 'trim|required');
        $this->form_validation->set_rules('uang_kembali', 'uang_kembali', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('order/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_order" => $this->input->post('id_order'),
                "no_meja" => $this->input->post('no_meja'),
                "total_harga" => $this->input->post('total_harga'),
                "uang_bayar" => $this->input->post('uang_bayar'),
                "uang_kembali" => $this->input->post('uang_kembali'),
                "HEHE" => "KEY-28642"
            ];
             $insert = $this->order_model->save($data);

            if($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Menambahkan data order');
                redirect('order');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'data dupe!');
                redirect('order');
            } else {
                $this->session->set_flashdata('message', 'gagal');
                redirect('order');
            }
        }
    }

    public function edit($id_order)
    {
        $data['title'] = "Tambah data order";
        $data['data_order'] = $this->order_model->getByid($id_order);

        $this->form_validation->set_rules('id_order', 'id_order', 'trim|required|numeric');
        $this->form_validation->set_rules('no_meja', 'no_meja', 'trim|required');
        $this->form_validation->set_rules('total_harga', 'Nama order', 'trim|required');
        $this->form_validation->set_rules('uang_bayar', 'uang_bayar', 'trim|required');
        $this->form_validation->set_rules('uang_kembali', 'uang_kembali', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('order/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_order" => $this->input->post('id_order'),
                "no_meja" => $this->input->post('no_meja'),
                "total_harga" => $this->input->post('total_harga'),
                "uang_bayar" => $this->input->post('uang_bayar'),
                "uang_kembali" => $this->input->post('uang_kembali'),
                "HEHE" => "KEY-28642"
            ];
             $update = $this->order_model->update($data);

            if($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Mengubah data order');
                redirect('order');
            } elseif ($update['response_code'] === 400) {   
                $this->session->set_flashdata('message', 'gagal');
                redirect('order');
            } else {
                $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
                redirect('order');
            }
        }
    }

    public function delete($id_order)
    {
        $delet = $this->order_model->delete($id_order);

        if($delet['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Menghapus data order');
            redirect('order');
        } else {
            $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
            redirect('order');
        }
    }
}