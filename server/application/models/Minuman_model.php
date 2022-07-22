<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Minuman_model extends CI_Model
{
    public function getDataMinuman($id_minuman)
    {
        if($id_minuman){
            $this->db->from('minuman');
            $this->db->where('id_minuman', $id_minuman);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from('minuman');
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    public function insertMinuman($data)
    {
        $this->db->insert('minuman', $data);
        return $this->db->affected_rows();
    }

    public function updateMinuman($data, $id_minuman)
    {
        $this->db->update('minuman', $data, ['id_minuman' => $id_minuman]);
        return $this->db->affected_rows();
    }

    public function deleteMinuman($id_minuman)
    {
        $this->db->delete('minuman',['id_minuman' => $id_minuman]);
        return $this->db->affected_rows();
    }
}
