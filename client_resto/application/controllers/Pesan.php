<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesan_model');
		$this->load->model('Order_model');
		$this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data pesan";
        $data['data_pesan'] = $this->Pesan_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('pesan/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_pesan)
    {
        $data['title'] = "List data pesan";
        $data['data_pesan'] = $this->Pesan_model->getByid($id_pesan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('pesan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data pesan";
		$data['data_order'] = $this->Order_model->getAll();
		$data['data_user'] = $this->User_model->getAll();

        $this->form_validation->set_rules('id_pesan', 'id_pesan', 'trim|required|numeric');
        $this->form_validation->set_rules('id_order', 'id_order', 'trim|required');
        $this->form_validation->set_rules('id_user', 'id_user', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('pesan/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_pesan" => $this->input->post('id_pesan'),
                "id_order" => $this->input->post('id_order'),
                "id_user" => $this->input->post('id_user'),
                "HEHE" => "KEY-28642"
            ];
             $insert = $this->Pesan_model->save($data);

            if($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Menambahkan data Pesan');
                redirect('pesan');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'data dupe!');
                redirect('pesan');
            } else {
                $this->session->set_flashdata('message', 'gagal');
                redirect('pesan');
            }
        }
    }

    public function edit($id_pesan)
    {
        $data['title'] = "Edit data pesan";
        $data['data_pesan'] = $this->Pesan_model->getByid($id_pesan);
		$data['data_order'] = $this->Order_model->getAll();
		$data['data_user'] = $this->User_model->getAll();

        $this->form_validation->set_rules('id_pesan', 'id_pesan', 'trim|required|numeric');
        $this->form_validation->set_rules('id_order', 'id_order', 'trim|required');
        $this->form_validation->set_rules('id_user', 'id_user', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('pesan/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_pesan" => $this->input->post('id_pesan'),
                "id_order" => $this->input->post('id_order'),
                "id_user" => $this->input->post('id_user'),
                "HEHE" => "KEY-28642"
            ];
             $update = $this->Pesan_model->update($data);

            if($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Mengubah data Pesan');
                redirect('pesan');
            } elseif ($update['response_code'] === 400) {   
                $this->session->set_flashdata('message', 'gagal');
                redirect('pesan');
            } else {
                $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
                redirect('pesan');
            }
        }
    }

    public function delete($id_pesan)
    {
        $delet = $this->Pesan_model->delete($id_pesan);

        if($delet['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Menghapus data Pesan');
            redirect('pesan');
        } else {
            $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
            redirect('pesan');
        }
    }
}
