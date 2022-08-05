<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
		$this->load->model('Pesan_model');
		$this->load->model('Order_model');
		$this->load->model('Makanan_model');
		$this->load->model('Minuman_model');
		$this->load->model('Dessert_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List data laporan";
        $data['data_laporan'] = $this->Laporan_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_laporan)
    {
        $data['title'] = "List data laporan";
        $data['data_kbm'] = $this->Laporan_model->getByid($id_laporan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('laporan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah data laporan";
		$data['data_pesan'] = $this->Pesan_model->getAll();
		$data['data_order'] = $this->Order_model->getAll();
		$data['data_makanan'] = $this->Makanan_model->getAll();
		$data['data_minuman'] = $this->Minuman_model->getAll();
		$data['data_dessert'] = $this->Dessert_model->getAll();


        $this->form_validation->set_rules('id_laporan', 'id_laporan', 'trim|required|numeric');
        $this->form_validation->set_rules('id_pesan', 'id_pesan', 'trim|required');
        $this->form_validation->set_rules('id_order', 'id_order', 'trim|required');
        $this->form_validation->set_rules('id_makanan', 'id_makanan', 'trim|required');
        $this->form_validation->set_rules('id_minuman', 'id_minuman', 'trim|required');
        $this->form_validation->set_rules('id_dessert', 'id_dessert', 'trim|required');
        $this->form_validation->set_rules('tgl_laporan', 'tgl_laporan', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('laporan/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_laporan" => $this->input->post('id_laporan'),
                "id_pesan" => $this->input->post('id_pesan'),
                "id_order" => $this->input->post('id_order'),
                "id_makanan" => $this->input->post('id_makanan'),
                "id_minuman" => $this->input->post('id_minuman'),
                "id_dessert" => $this->input->post('id_dessert'),
                "tgl_laporan" => $this->input->post('tgl_laporan'),
                "jumlah" => $this->input->post('jumlah'),
                "HEHE" => "KEY-28642"
            ];
             $insert = $this->Laporan_model->save($data);

            if($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Ditambahkan data Laporan');
                redirect('laporan');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'data dupe!');
                redirect('laporan');
            } else {
                $this->session->set_flashdata('message', 'gagal');
                redirect('laporan');
            }
        }
    }

    public function edit($id_laporan)
    {
        $data['title'] = "Tambah data laporan";
        $data['data_Id_laporan'] = $this->Laporan_model->getByid($id_laporan);
		$data['data_pesan'] = $this->Pesan_model->getAll();
		$data['data_order'] = $this->Order_model->getAll();
		$data['data_makanan'] = $this->Makanan_model->getAll();
		$data['data_minuman'] = $this->Minuman_model->getAll();
		$data['data_dessert'] = $this->Dessert_model->getAll();

        $this->form_validation->set_rules('id_laporan', 'id_laporan', 'trim|required|numeric');
        $this->form_validation->set_rules('id_pesan', 'id_pesan', 'trim|required');
        $this->form_validation->set_rules('id_order', 'id_order', 'trim|required');
        $this->form_validation->set_rules('id_makanan', 'id_makanan', 'trim|required');
        $this->form_validation->set_rules('id_minuman', 'id_minuman', 'trim|required');
        $this->form_validation->set_rules('id_dessert', 'id_dessert', 'trim|required');
        $this->form_validation->set_rules('tgl_laporan', 'tgl_laporan', 'trim|required');
         $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('laporan/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data =[
                "id_laporan" => $this->input->post('id_laporan'),
                "id_pesan" => $this->input->post('id_pesan'),
                "id_order" => $this->input->post('id_order'),
                "id_makanan" => $this->input->post('id_makanan'),
                "id_minuman" => $this->input->post('id_minuman'),
                "id_dessert" => $this->input->post('id_dessert'),
                "tgl_laporan" => $this->input->post('tgl_laporan'),
                "jumlah" => $this->input->post('jumlah'),
                "HEHE" => "KEY-28642"
            ];
             $update = $this->Laporan_model->update($data);

            if($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'mengubah data Laporan');
                redirect('laporan');
            } elseif ($update['response_code'] === 400) {   
                $this->session->set_flashdata('message', 'gagal');
                redirect('laporan');
            } else {
                $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
                redirect('laporan');
            }
        }
    }

    public function delete($id_laporan)
    {
        $delet = $this->Laporan_model->delete($id_laporan);

        if($delet['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'menghapus data Laporan');
            redirect('laporan');
        } else {
            $this->session->set_flashdata('message', 'gagal!!!!!!!!!!!');
            redirect('laporan');
        }
    }
}
