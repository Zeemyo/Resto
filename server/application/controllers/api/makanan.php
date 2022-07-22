<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class makanan extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('makanan_model');
        $this->methods['makanan_get']['limit'] = 1000;
        $this->methods['makanan_post']['limit'] = 1000;
        $this->methods['makanan_put']['limit'] = 1000;
        $this->methods['makanan_delete']['limit'] = 1000;
    }

    public function makanan_get()
    {
        $id_makanan = $this->get('id_makanan');
        $data = $this->makanan_model->getDatamakanan($id_makanan);

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

function makanan_post()
{
    $data = array(
        'id_makanan' => $this->post('id_makanan'),
        'nama_makanan' => $this->post('nama_makanan'),
		'harga_makanan' => $this->post('harga_makanan'),
		'stok_makanan' => $this->post('stok_makanan')
    );

    $cek_id_makanan = $this->makanan_model->getDatamakanan($this->post('id_makanan'));

    //Jika semua data wajib diisi
    if ($data['id_makanan'] == NULL || $data['nama_makanan'] == NULL || $data['harga_makanan'] == NULL) {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );

    }elseif ($cek_id_makanan) {
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
    elseif ($this->makanan_model->insertmakanan($data) > 0) {
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

function makanan_put()
    {
        $id_makanan = $this->put('id_makanan');
        $data = array(
            'nama_makanan' => $this->put('nama_makanan'),
			'harga_makanan' => $this->put('harga_makanan'),
			'stok_makanan' => $this->put('stok_makanan')
        );

        //Jika field id_makanan tidak diisi
        if ($id_makanan == NULL) {
            $this->response(
                [
                    'status' => $id_makanan,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_makanan Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->makanan_model->updatemakanan($data, $id_makanan) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data makanan Dengan id_makanan '.$id_makanan.' Berhasil Diubah',
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

function makanan_delete()
    {
        $id_makanan = $this->delete('id_makanan');

        //Jika field id_makanan tidak diisi
        if ($id_makanan == NULL) {
            $this->response(
                [
                    'status' => $id_makanan,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_makanan Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->makanan_model->deletemakanan($id_makanan) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data makanan Dengan id_makanan '.$id_makanan.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data makanan Dengan id_makanan '.$id_makanan.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

}
