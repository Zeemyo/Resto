<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class minuman extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('minuman_model');
        $this->methods['minuman_get']['limit'] = 1000;
        $this->methods['minuman_post']['limit'] = 1000;
        $this->methods['minuman_put']['limit'] = 1000;
        $this->methods['minuman_delete']['limit'] = 1000;
    }

    public function minuman_get()
    {
        $id_minuman = $this->get('id_minuman');
        $data = $this->minuman_model->getDataminuman($id_minuman);

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

function minuman_post()
{
    $data = array(
        'id_minuman' => $this->post('id_minuman'),
        'nama_minuman' => $this->post('nama_minuman'),
        'harga_minuman' => $this->post('harga_minuman'),
		'stok_minuman' => $this->post('stok_minuman')
    );

    $cek_id_minuman = $this->minuman_model->getDataminuman($this->post('id_minuman'));

    //Jika semua data wajib diisi
    if ($data['id_minuman'] == NULL || $data['nama_minuman'] == NULL || $data['harga_minuman'] == NULL || $data['stok_minuman'] == NULL) {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );

    }elseif ($cek_id_minuman) {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Duplikat',
            ],
            RestController::HTTP_BAD_REQUEST
        );
    }
    //Jika data tersiminumanan
    elseif ($this->minuman_model->insertminuman($data) > 0) {
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

function minuman_put()
    {
        $id_minuman = $this->put('id_minuman');
        $data = array(
            'nama_minuman' => $this->put('nama_minuman'),
            'nama_minuman' => $this->put('nama_minuman'),
			'stok_minuman' => $this->put('stok_minuman')
        );

        //Jika field id_minuman tidak diisi
        if ($id_minuman == NULL) {
            $this->response(
                [
                    'status' => $id_minuman,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_minuman Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->minuman_model->updateminuman($data, $id_minuman) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data minuman Dengan id_minuman '.$id_minuman.' Berhasil Diubah',
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

function minuman_delete()
    {
        $id_minuman = $this->delete('id_minuman');

        //Jika field id_minuman tidak diisi
        if ($id_minuman == NULL) {
            $this->response(
                [
                    'status' => $id_minuman,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_minuman Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->minuman_model->deleteminuman($id_minuman) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data minuman Dengan id_minuman '.$id_minuman.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data minuman Dengan id_minuman '.$id_minuman.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

}
