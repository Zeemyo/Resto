<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Dessert_model extends CI_Model
{
    private $_guzzle;

    public function __construct()
    {
        parent::__construct();
        $this->_guzzle = new Client([
            'base_uri' => 'http://localhost/restoran/rest_resto/API/dessert/dessert',
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

    public function getByid($id_dessert)
    {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'HEHE' => 'KEY-28642',
                'id_dessert' => $id_dessert
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function save($data)
    {
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

    public function delete($id_dessert)
    {
        $response = $this->_guzzle->request('DELETE', '', [
            'form_params' => [
            'http_errors' => false,
            'HEHE' => 'KEY-28642',
            'id_dessert' => $id_dessert
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }
}