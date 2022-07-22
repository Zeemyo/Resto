<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class Buku extends RESTController
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
        $id = $this->get('buku_id');
        if ($id == '') {
            $user = $this->db->get('tbl_buku')->result();
        } else {
            $this->db->where('buku_id', $id);
            $user = $this->db->get('tbl_buku')->result();
        }
        $this->response($user, 200);
    }
    function index_post()
    {
        $data = array(
            'id_buku' => $this->post('id_buku'),
            'buku_id' => $this->post('buku_id'),
            'id_kategori' => $this->post('id_kategori'),
            'id_rak' => $this->post('id_rak'),
            'sampul' => $this->post('sampul'),
            'isbn' => $this->post('isbn'),
            'lampiran' => $this->post('lampiran'),
            'title' => $this->post('title'),
            'penerbit' => $this->post('penerbit'),
            'pengarang' => $this->post('pengarang'),
            'thn_buku' => $this->post('thn_buku'),
            'isi' => $this->post('isi'),
            'jml' => $this->post('jml'),
            'tgl_masuk' => $this->post('tgl_masuk')
        );
        $insert = $this->db->insert('tbl_buku', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put()
    {
        $npm = $this->put('buku_id');
        $data = array(
            'id_buku' => $this->put('id_buku'),
            'buku_id' => $this->put('buku_id'),
            'id_kategori' => $this->put('id_kategori'),
            'id_rak' => $this->put('id_rak'),
            'sampul' => $this->put('sampul'),
            'isbn' => $this->put('isbn'),
            'lampiran' => $this->put('lampiran'),
            'title' => $this->put('title'),
            'penerbit' => $this->put('penerbit'),
            'pengarang' => $this->put('pengarang'),
            'thn_buku' => $this->put('thn_buku'),
            'isi' => $this->put('isi'),
            'jml' => $this->put('jml'),
            'tgl_masuk' => $this->put('tgl_masuk')
        );
        $this->db->where('buku_id', $npm);
        $update = $this->db->update('tbl_buku', $data);
        if ($update) {
            if ($this->db->affected_rows() == 1) {
                $this->response(['status' => 'success', 'message' => 'Buku UPDATED !', 'data' => $data], 200);
            } else {
                $this->response(['status' => 'update failed', 'message' => 'something went wrong!!'], 400);
            }
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_delete()
    {
        $id = $this->delete('buku_id');
        $this->db->where('buku_id', $id);
        $delete = $this->db->delete('tbl_buku');
        if ($delete) {
            $this->response(array('status' => true, 'message' => 'Buku has been DELETED !!!'), 202);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
