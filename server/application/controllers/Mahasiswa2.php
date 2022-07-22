<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Mahasiswa extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->methods['mhs_get']['limit'] = 30;
        $this->methods['mhs_post']['limit'] = 1;
    }

    public function mhs_get()
    {
        $npm = $this->get('npm');
        $data = $this->Mahasiswa_model->getDataMahasiswa($npm);

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

function mhs_post()
{
    $data = array(
        'npm' => $this->post('npm'),
        'nama' => $this->post('nama'),
        'alamat' => $this->post('alamat'),
        'email' => $this->post('email')
    );

    $cek_npm = $this->Mahasiswa_model->getDataMahasiswa($this->post('npm'));

    //Jika semua data wajib diisi
    if ($data['npm'] == NULL || $data['nama'] == NULL || $data['alamat'] == NULL || $data['email'] == NULL) {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );

    }elseif ($cek_npm) {
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
    elseif ($this->Mahasiswa_model->insertMahasiswa($data) > 0) {
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

function mhs_put()
    {
        $npm = $this->put('npm');
        $data = array(
            'nama' => $this->put('nama'),
            'alamat' => $this->put('alamat'),
            'email' => $this->put('email')
        );

        //Jika field npm tidak diisi
        if ($npm == NULL) {
            $this->response(
                [
                    'status' => $npm,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'NPM Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->Mahasiswa_model->updateMahasiswa($data, $npm) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Mahasiswa Dengan NPM '.$npm.' Berhasil Diubah',
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

function mhs_delete()
    {
        $npm = $this->delete('npm');

        //Jika field npm tidak diisi
        if ($npm == NULL) {
            $this->response(
                [
                    'status' => $npm,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'NPM Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->Mahasiswa_model->deleteMahasiswa($npm) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Mahasiswa Dengan NPM '.$npm.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Mahasiswa Dengan NPM '.$npm.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

}
