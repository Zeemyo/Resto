<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Order_model');
		$this->load->model('Makanan_model');
		$this->load->model('Minuman_model');
		$this->load->model('Dessert_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "List data Order";
		$data['data_order'] = $this->Order_model->getAll();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu');
		$this->load->view('order/index', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id_order)
	{
		$data['title'] = "Detail data Order";
		$data['data_order'] = $this->Order_model->getById($id_order);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu');
		$this->load->view('order/detail', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$data['title'] = "Tambah data Order";

		$data['data_makanan'] = $this->Makanan_model->getAll();
		$data['data_minuman'] = $this->Minuman_model->getAll();
		$data['data_dessert'] = $this->Dessert_model->getAll();

		$this->form_validation->set_rules('id_order', 'id_order', 'trim|required|numeric');
		$this->form_validation->set_rules('id_makanan', 'Makanan', 'trim|required');
		$this->form_validation->set_rules('id_minuman', 'Minuman', 'trim|required');
		$this->form_validation->set_rules('id_dessert', 'Dessert', 'trim|required');
		$this->form_validation->set_rules('no_meja', 'no_meja', 'trim|required');
		$this->form_validation->set_rules('total_harga', 'total harga', 'trim|required');
		$this->form_validation->set_rules('uang_bayar', 'uang_bayar', 'trim|required');
		$this->form_validation->set_rules('uang_kembali', 'uang_kembali', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/menu');
			$this->load->view('order/add', $data);
			$this->load->view('templates/footer');
		} else {
			

			$insert = $this->Order_model->save();

			if ($insert['response_code'] === 201) {
				$this->session->set_flashdata('flash', 'menambahkan Data Order');
				redirect('Order');
			} elseif ($insert['response_code'] === 400) {
				$this->session->set_flashdata('message', 'Data Duplikat!!');
				redirect('Order');
			} else {
				$this->session->set_flashdata('message', 'GAGAL!! ');
				redirect('Order');
			}
		}
	}

    public function edit($id_order)
    {
        $data['title'] = "Ubah data Order";
        $data['data_order'] = $this->Order_model->getByid($id_order);
		$data['data_makanan'] = $this->Makanan_model->getAll();
		$data['data_minuman'] = $this->Minuman_model->getAll();
		$data['data_dessert'] = $this->Dessert_model->getAll();

		$this->form_validation->set_rules('id_order', 'id_order', 'trim|required|numeric');
		$this->form_validation->set_rules('id_makanan', 'Makanan', 'trim|required');
		$this->form_validation->set_rules('id_minuman', 'Minuman', 'trim|required');
		$this->form_validation->set_rules('id_dessert', 'Dessert', 'trim|required');
		$this->form_validation->set_rules('no_meja', 'no_meja', 'trim|required');
		$this->form_validation->set_rules('total_harga', 'total harga', 'trim|required');
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
				"id_makanan" => $this->input->post('id_makanan'),
				"id_minuman" => $this->input->post('id_minuman'),
				"id_dessert" => $this->input->post('id_dessert'),
				"no_meja" => $this->input->post('no_meja'),
				"total_harga" => $this->input->post('total_harga'),
				"uang_bayar" => $this->input->post('uang_bayar'),
				"uang_kembali" => $this->input->post('uang_kembali'),
				"HEHE" => "KEY-28642"
            ];
             $update = $this->Order_model->update($data);

            if($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'mengubah data order');
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
		$delete = $this->Order_model->delete($id_order);
		if ($delete['response_code'] === 200) {
			$this->session->set_flashdata('flash', 'Dihapus');
			redirect('Order');
		} else {
			$this->session->set_flashdata('message', 'GAGAL!!');
			redirect('Order');
		}
	}
}
