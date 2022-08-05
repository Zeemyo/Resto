<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;
class Register_model extends CI_Model
{
    private $_guzzle;

    public function __construct()
    {
        parent::__construct();
        $this->_guzzle = new Client([
            'base_uri' => 'http://localhost/restoran/rest_resto/API/register/register',
            'auth'  => ['admin', '1234']
        ]);
    }
    function insert($data)
    {
        
        $response = $this->_guzzle->request('POST', '', [
            'http_errors' => false,
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }
}

?>