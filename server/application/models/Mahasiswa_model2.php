<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
    public function getDataMahasiswa($npm)
    {
        if($npm){
            $this->db->from('tbl_mahasiswa');
            $this->db->where('npm', $npm);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from('tbl_mahasiswa');
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    public function insertMahasiswa($data)
    {
        $this->db->insert('tbl_mahasiswa', $data);
        return $this->db->affected_rows();
    }

    public function updateMahasiswa($data, $npm)
    {
        $this->db->update('tbl_mahasiswa', $data, ['npm' => $npm]);
        return $this->db->affected_rows();
    }

    public function deleteMahasiswa($npm)
    {
        $this->db->delete('tbl_mahasiswa',['npm' => $npm]);
        return $this->db->affected_rows();
    }
}