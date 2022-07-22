<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dessert_model extends CI_Model
{
    public function getDataDessert($id_dessert)
    {
        if($id_dessert){
            $this->db->from('dessert');
            $this->db->where('id_dessert', $id_dessert);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from('dessert');
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    public function insertDessert($data)
    {
        $this->db->insert('dessert', $data);
        return $this->db->affected_rows();
    }

    public function updateDessert($data, $id_dessert)
    {
        $this->db->update('dessert', $data, ['id_dessert' => $id_dessert]);
        return $this->db->affected_rows();
    }

    public function deleteDessert($id_dessert)
    {
        $this->db->delete('dessert',['id_dessert' => $id_dessert]);
        return $this->db->affected_rows();
    }
}
