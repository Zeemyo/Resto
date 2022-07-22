<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function getDataOrder($id_order)
    {
        if($id_order){
            $this->db->from('order');
            $this->db->where('id_order', $id_order);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from('order');
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    public function insertOrder($data)
    {
        $this->db->insert('order', $data);
        return $this->db->affected_rows();
    }

    public function updateorder($data, $id_order)
    {
        $this->db->update('order', $data, ['id_order' => $id_order]);
        return $this->db->affected_rows();
    }

    public function deleteorder($id_order)
    {
        $this->db->delete('order',['id_order' => $id_order]);
        return $this->db->affected_rows();
    }
}
