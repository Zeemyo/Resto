<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kbm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kbm_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data kbm";
        $data['data_kbm'] = $this->Kbm_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('kbm/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_kbm)
    {
        $data['title'] = "List data kbm";
        $data['data_kbm'] = $this->Kbm_model->getByid($id_kbm);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('kbm/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data kbm";

        $this->form_validation->set_rules('id_kbm', 'id_kbm', 'trim|required|numeric');
        $this->form_validation->set_rules('id_siswa', 'id_siswa', 'trim|required');
        $this->form_validation->set_rules('id_guru', 'id_guru', 'trim|required');
        $this->form_validation->set_rules('id_mp', 'id_mp', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('kbm/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_kbm" => $this->input->post('id_kbm'),
                "id_siswa" => $this->input->post('id_siswa'),
                "id_guru" => $this->input->post('id_guru'),
                "id_mp" => $this->input->post('id_mp'),
                "HEHE" => "KEY-920"
            ];
             $insert = $this->Kbm_model->save($data);

            if($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Ditambahkan data KBM');
                redirect('kbm');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'data dupe!');
                redirect('kbm');
            } else {
                $this->session->set_flashdata('message', 'gagal');
                redirect('kbm');
            }
        }
    }

    public function edit($id_kbm)
    {
        $data['title'] = "Tambah data kbm";
        $data['data_kbm'] = $this->Kbm_model->getByid($id_kbm);

        $this->form_validation->set_rules('id_kbm', 'id_kbm', 'trim|required|numeric');
        $this->form_validation->set_rules('id_siswa', 'id_siswa', 'trim|required');
        $this->form_validation->set_rules('id_guru', 'id_guru', 'trim|required');
        $this->form_validation->set_rules('id_mp', 'id_mp', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('kbm/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_kbm" => $this->input->post('id_kbm'),
                "id_siswa" => $this->input->post('id_siswa'),
                "id_guru" => $this->input->post('id_guru'),
                "id_mp" => $this->input->post('id_mp'),
                "HEHE" => "KEY-920"
            ];
             $update = $this->Kbm_model->update($data);

            if($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'mengubah data KBM');
                redirect('kbm');
            } elseif ($update['response_code'] === 400) {   
                $this->session->set_flashdata('message', 'gagal');
                redirect('kbm');
            } else {
                $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
                redirect('kbm');
            }
        }
    }

    public function delete($id_kbm)
    {
        $delet = $this->Kbm_model->delete($id_kbm);

        if($delet['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'menghapus data KBM');
            redirect('kbm');
        } else {
            $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
            redirect('kbm');
        }
    }
}