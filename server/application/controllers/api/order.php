<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class order extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_Model');
        $this->methods['order_get']['limit'] = 1000;
        $this->methods['order_post']['limit'] = 1000;
        $this->methods['order_put']['limit'] = 1000;
        $this->methods['order_delete']['limit'] = 1000;
    }

    public function order_get()
    {
        $id_order = $this->get('id_order');
        $data = $this->Order_Model->getDataorder($id_order);

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

function order_post()
{
    $data = array(
        'id_order' => $this->post('id_order'),
        'no_meja' => $this->post('no_meja'),
        'total_harga' => $this->post('total_harga'),
        'uang_bayar' => $this->post('uang_bayar'),
        'uang_kembali' => $this->post('uang_kembali')    
    );

    $cek_id_order = $this->Order_Model->getDataorder($this->post('id_order'));

    //Jika semua data wajib diisi
     if ($data['id_order'] == NULL || $data['no_meja'] == NULL || $data['total_harga'] == NULL || $data['uang_bayar'] == NULL || $data['uang_kembali'] == NULL) {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );

    }elseif ($cek_id_order) {
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
    elseif ($this->Order_Model->insertorder($data) > 0) {
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

function order_put()
    {
        $id_order = $this->put('id_order');
        $data = array(
            'no_meja' => $this->put('no_meja'),
            'total_harga' => $this->put('total_harga'),
            'uang_bayar' => $this->put('uang_bayar'),
            'uang_kembali' => $this->put('uang_kembali'),
        );

        //Jika field id_order tidak diisi
        if ($id_order == NULL) {
            $this->response(
                [
                    'status' => $id_order,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_order Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->Order_Model->updateorder($data, $id_order) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data order Dengan id_order '.$id_order.' Berhasil Diubah',
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

function order_delete()
    {
        $id_order = $this->delete('id_order');

        //Jika field id_order tidak diisi
        if ($id_order == NULL) {
            $this->response(
                [
                    'status' => $id_order,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'id_order Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->Order_Model->deleteorder($id_order) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data order Dengan id_order '.$id_order.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data order Dengan id_order '.$id_order.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

}
