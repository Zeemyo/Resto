<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class laporan extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_model');
        $this->methods['laporan_get']['limit'] = 1000;
        $this->methods['laporan_post']['limit'] = 1000;
        $this->methods['laporan_put']['limit'] = 1000;
        $this->methods['laporan_delete']['limit'] = 1000;
    }

    public function laporan_get()
    {
        $id_laporan = $this->get('id_laporan');
        $data = $this->laporan_model->getDatalaporan($id_laporan);

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

function laporan_post()
{
    $data = array(
        'id_laporan' => $this->post('id_laporan'),
        'id_pesan' => $this->post('id_pesan'),
        'id_order' => $this->post('id_order'),
		'id_makanan' => $this->post('id_makanan'),
        'id_minuman' => $this->post('id_minuman'),
        'id_dessert' => $this->post('id_dessert'),
        'tgl_laporan' => $this->post('tgl_laporan'),
        'jumlah' => $this->post('jumlah')
    );

    $cek_id_laporan = $this->laporan_model->getDatalaporan($this->post('id_laporan'));

    //Jika semua data wajib diisi
    if ($data['id_laporan'] == NULL || $data['id_pesan'] == NULL || $data['id_order'] == NULL || $data['id_makanan'] == NULL ) {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );

    }elseif ($cek_id_laporan) {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Duplikat',
            ],
            RestController::HTTP_BAD_REQUEST
        );
    }
    //Jika data tersimakananan
    elseif ($this->laporan_model->insertlaporan($data) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_CREATED,
                'message' => 'Data Laporan Berhasil Ditambahkan',
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

function laporan_put()
    {
        $id_laporan = $this->put('id_laporan');
        $data = array(
            'id_pesan' => $this->put('id_pesan'),
            'id_order' => $this->put('id_order'),
			'id_makanan' => $this->put('id_makanan'),
            'id_minuman' => $this->put('id_minuman'),
            'id_dessert' => $this->put('id_dessert'),
            'tgl_laporan' => $this->put('tgl_laporan'),
            'jumlah' => $this->put('jumlah')
        );

        //Jika field id_laporan tidak diisi
        if ($id_laporan == NULL) {
            $this->response(
                [
                    'status' => $id_laporan,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_laporan Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->laporan_model->updatelaporan($data, $id_laporan) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data laporan Dengan id_laporan '.$id_laporan.' Berhasil Diubah',
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

function laporan_delete()
    {
        $id_laporan = $this->delete('id_laporan');

        //Jika field id_laporan tidak diisi
        if ($id_laporan == NULL) {
            $this->response(
                [
                    'status' => $id_laporan,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_laporan Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->laporan_model->deletelaporan($id_laporan) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data laporan Dengan id_laporan '.$id_laporan.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data laporan Dengan id_laporan '.$id_laporan.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

}
