<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class Pinjam extends RESTController
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->methods['index_post']['limit'] = 10;
        $this->methods['index_get']['limit'] = 10;
        $this->methods['index_put']['limit'] = 10;
        $this->methods['index_delete']['limit'] = 10;
    }
    function index_get()
    {
        $id = $this->get('pinjam_id');
        if ($id == '') {
            $mhs = $this->db->get('tbl_pinjam')->result();
        } else {
            $this->db->where('pinjam_id', $id);
            $mhs = $this->db->get('tbl_pinjam')->result();
        }
        $this->response($mhs, 200);
    }
    function index_post()
    {
        $data = array(
            'id_pinjam' => $this->post('id_pinjam'),
            'pinjam_id' => $this->post('pinjam_id'),
            'anggota_id' => $this->post('anggota_id'),
            'nama_buku' => $this->post('nama_buku'),
            'status' => $this->post('status'),
            'tgl_pinjam' => $this->post('tgl_pinjam'),
            'lama_pinjam' => $this->post('lama_pinjam'),
            'tgl_balik' => $this->post('tgl_balik'),
            'tgl_kembali' => $this->post('tgl_kembali')
        );
        $insert = $this->db->insert('tbl_pinjam', $data);
        if ($insert) {
            $this->response($data, 200);
            // $this->response(['status' => 'success', 'message' => 'Obat UPDATED !', 'data' => $data], 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put()
    {
        $npm = $this->put('pinjam_id');
        $data = array(
            'id_pinjam' => $this->put('id_pinjam'),
            'pinjam_id' => $this->put('pinjam_id'),
            'anggota_id' => $this->put('anggota_id'),
            'nama_buku' => $this->put('nama_buku'),
            'status' => $this->put('status'),
            'tgl_pinjam' => $this->put('tgl_pinjam'),
            'lama_pinjam' => $this->put('lama_pinjam'),
            'tgl_balik' => $this->put('tgl_balik'),
            'tgl_kembali' => $this->put('tgl_kembali')
        );
        $this->db->where('pinjam_id', $npm);
        $update = $this->db->update('tbl_pinjam', $data);
        if ($update) {
            if ($this->db->affected_rows() == 1) {
                $this->response(['status' => 'success', 'message' => 'Pinjaman UPDATED !', 'data' => $data], 200);
            } else {
                $this->response(['status' => 'update failed', 'message' => 'something went wrong!!'], 400);
            }
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_delete()
    {
        $id = $this->delete('pinjam_id');
        $this->db->where('pinjam_id', $id);
        $delete = $this->db->delete('tbl_pinjam');
        if ($delete) {
            $this->response(array('status' => true, 'message' => 'Pinjaman has been DELETED !!!'), 202);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
