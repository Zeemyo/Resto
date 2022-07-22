<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Key_model');

	}

	public function index()
	{
		$this->load->view('home');
	}

	public function halaman_tambah()
	{
		$this->load->view('halaman_tambah');
	}

	public function fungsiTambah()
	{
		$key = $this->input->post('key');

		$ArrInsert = array(
			'key' => $key
		);

		$this->Key_model->insertKey($ArrInsert);
		redirect(base_url('home/halaman_berhasil'));

	}

	public function halaman_berhasil()
	{
		$this->load->view('halaman_berhasil');
	}
}
