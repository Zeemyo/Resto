<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class pesan extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pesan_model');
        $this->methods['pesan_get']['limit'] = 1000;
        $this->methods['pesan_post']['limit'] = 1000;
        $this->methods['pesan_put']['limit'] = 1000;
        $this->methods['pesan_delete']['limit'] = 1000;
    }

    public function pesan_get()
    {
        $id_pesan = $this->get('id_pesan');
        $data = $this->pesan_model->getDatapesan($id_pesan);

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

function pesan_post()
{
    $data = array(
        'id_pesan' => $this->post('id_pesan'),
        'id_order' => $this->post('id_order'),
        'id_user' => $this->post('id_user'),
		'jumlah' => $this->post('jumlah')
    );

    $cek_id_pesan = $this->pesan_model->getDatapesan($this->post('id_pesan'));

    //Jika semua data wajib diisi
    if ($data['id_pesan'] == NULL || $data['id_order'] == NULL || $data['id_user'] == NULL || $data['jumlah'] == NULL ) {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );

    }elseif ($cek_id_pesan) {
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
    elseif ($this->pesan_model->insertpesan($data) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_CREATED,
                'message' => 'Data Pesan Berhasil Ditambahkan',
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

function pesan_put()
    {
        $id_pesan = $this->put('id_pesan');
        $data = array(
            'id_order' => $this->put('id_order'),
            'id_user' => $this->put('id_user'),
			'jumlah' => $this->put('jumlah')
        );

        //Jika field id_pesan tidak diisi
        if ($id_pesan == NULL) {
            $this->response(
                [
                    'status' => $id_pesan,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_pesan Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->pesan_model->updatepesan($data, $id_pesan) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data pesan Dengan id_pesan '.$id_pesan.' Berhasil Diubah',
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

function pesan_delete()
    {
        $id_pesan = $this->delete('id_pesan');

        //Jika field id_pesan tidak diisi
        if ($id_pesan == NULL) {
            $this->response(
                [
                    'status' => $id_pesan,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_pesan Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->pesan_model->deletepesan($id_pesan) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data pesan Dengan id_pesan '.$id_pesan.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data pesan Dengan id_pesan '.$id_pesan.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

}
