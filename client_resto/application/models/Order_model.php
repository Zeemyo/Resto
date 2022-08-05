<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Order_model extends CI_Model
{
    private $_guzzle;

    public function __construct()
    {
        parent::__construct();
        $this->_guzzle = new Client([
            'base_uri' => 'http://localhost/restoran/rest_resto/API/order/order',
            'auth'  => ['admin', '1234']
        ]);
    }

    public function getAll()
    {
		
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'HEHE' => 'KEY-28642'
            ]
        ]);



        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function getByid($id_order)
    {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'HEHE' => 'KEY-28642',
                'id_order' => $id_order
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function save()
    {
		$data = [
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
        $response = $this->_guzzle->request('POST', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }

    public function update($data)
    {
        $response = $this->_guzzle->request('PUT', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }

    public function delete($id_order)
    {
        $response = $this->_guzzle->request('DELETE', '', [
            'form_params' => [
            'http_errors' => false,
            'HEHE' => 'KEY-28642',
            'id_order' => $id_order
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }
}
