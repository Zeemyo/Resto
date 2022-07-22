<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Dessert extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dessert_model');
        $this->methods['dessert_get']['limit'] = 1000;
        $this->methods['dessert_post']['limit'] = 1000;
        $this->methods['dessert_put']['limit'] = 1000;
        $this->methods['dessert_delete']['limit'] = 1000;
    }

    public function dessert_get()
    {
        $id_dessert = $this->get('id_dessert');
        $data = $this->dessert_model->getDatadessert($id_dessert);

        if($data)
        {
           $this->response(
            [
                'data' => $data,
                'status' => 'success',
                'response_code' => RestController::HTTP_OK
            ],
            RestController::HTTP_OK
        ); 
        } else {
            $this->response(
            [
                'status' => 'gagal',
                'response_code' => RestController::HTTP_NOT_FOUND
            ],
            RestController::HTTP_NOT_FOUND
        );
        }
    }

function dessert_post()
{
    $data = array(
        'id_dessert' => $this->post('id_dessert'),
        'nama_dessert' => $this->post('nama_dessert'),
		'harga_dessert' => $this->post('harga_dessert'),
		'stok_dessert' => $this->post('stok_dessert')
    );

    $cek_id_dessert = $this->dessert_model->getDatadessert($this->post('id_dessert'));

    //Jika semua data wajib diisi
    if ($data['id_dessert'] == NULL || $data['nama_dessert'] == NULL ||  $data['harga_dessert'] == NULL || $data['stok_dessert'] == NULL) {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );

    }elseif ($cek_id_dessert) {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Duplikat',
            ],
            RestController::HTTP_BAD_REQUEST
        );
    }
    //Jika data tersimpan
    elseif ($this->dessert_model->insertdessert($data) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_CREATED,
                'message' => 'Data Berhasil Ditambahkan',
            ],
            RestController::HTTP_CREATED
        );
        //Jika data duplikat
    }  else {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Gagal Menambahkan Data'    
            ],
            RestController::HTTP_BAD_REQUEST
        );
    }
}

function dessert_put()
    {
        $id_dessert = $this->put('id_dessert');
        $data = array(
            'nama_dessert' => $this->put('nama_dessert'),
			'harga_dessert' => $this->put('harga_dessert'),
			'stok_dessert' => $this->put('stok_dessert')
        );

        //Jika field id_dessert tidak diisi
        if ($id_dessert == NULL) {
            $this->response(
                [
                    'status' => $id_dessert,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_dessert Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->dessert_model->updatedessert($data, $id_dessert) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data dessert Dengan id_dessert '.$id_dessert.' Berhasil Diubah',
                ],
                RestController::HTTP_CREATED
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Gagal Mengubah Data',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

function dessert_delete()
    {
        $id_dessert = $this->delete('id_dessert');

        //Jika field id_dessert tidak diisi
        if ($id_dessert == NULL) {
            $this->response(
                [
                    'status' => $id_dessert,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_dessert Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->dessert_model->deletedessert($id_dessert) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data dessert Dengan id_dessert '.$id_dessert.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data dessert Dengan id_dessert '.$id_dessert.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

}
