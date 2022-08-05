<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data user";
        $data['data_user'] = $this->User_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_user)
    {
        $data['title'] = "List data user";
        $data['data_user'] = $this->User_model->getByid($id_user);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data user";

        $this->form_validation->set_rules('id_user', 'id_user', 'trim|required|numeric');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('user/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_user" => $this->input->post('id_user'),
                "email" => $this->input->post('email'),
                "password" => $this->input->post('password'),
                "name" => $this->input->post('name'),
                "HEHE" => "KEY-28642"
            ];
             $insert = $this->User_model->save($data);

            if($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Menambahkan data User');
                redirect('user');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'data dupe!');
                redirect('user');
            } else {
                $this->session->set_flashdata('message', 'gagal');
                redirect('user');
            }
        }
    }

    public function edit($id_user)
    {
        $data['title'] = "Edit data user";
        $data['data_user'] = $this->User_model->getByid($id_user);

        $this->form_validation->set_rules('id_user', 'id_user', 'trim|required|numeric');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_user" => $this->input->post('id_user'),
                "email" => $this->input->post('email'),
                "password" => $this->input->post('password'),
                "name" => $this->input->post('name'),
                "HEHE" => "KEY-28642"
            ];
             $update = $this->User_model->update($data);

            if($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Mengubah data User');
                redirect('user');
            } elseif ($update['response_code'] === 400) {   
                $this->session->set_flashdata('message', 'gagal');
                redirect('user');
            } else {
                $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
                redirect('user');
            }
        }
    }

    public function delete($id_user)
    {
        $delet = $this->User_model->delete($id_user);

        if($delet['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Menghapus data User');
            redirect('user');
        } else {
            $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
            redirect('user');
        }
    }
}
