<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Makanan_model extends CI_Model
{
    public function getDataMakanan($id_makanan)
    {
        if($id_makanan){
            $this->db->from('makanan');
            $this->db->where('id_makanan', $id_makanan);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from('makanan');
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    public function insertMakanan($data)
    {
        $this->db->insert('makanan', $data);
        return $this->db->affected_rows();
    }

    public function updateMakanan($data, $id_makanan)
    {
        $this->db->update('makanan', $data, ['id_makanan' => $id_makanan]);
        return $this->db->affected_rows();
    }

    public function deleteMakanan($id_makanan)
    {
        $this->db->delete('makanan',['id_makanan' => $id_makanan]);
        return $this->db->affected_rows();
    }
}
