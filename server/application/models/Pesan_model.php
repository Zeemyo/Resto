<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pesan_model extends CI_Model
{
    public function getDatapesan($id_pesan)
    {
        if($id_pesan){
            $this->db->select('id_pesan, user.id_user, order.id_order');
            $this->db->from('pesan');
            $this->db->where('id_pesan', $id_pesan);
            $this->db->join('order', 'order.id_order = pesan.id_order');
            $this->db->join('user', 'user.id_user = pesan.id_user');
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->select('id_pesan, user.id_user, order.id_order');
            $this->db->from('pesan');
            $this->db->join('order', 'order.id_order = pesan.id_order');
            $this->db->join('user', 'user.id_user = pesan.id_user');
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    public function insertpesan($data)
    {
        $this->db->insert('pesan', $data);
        return $this->db->affected_rows();
    }

    public function updatepesan($data, $id_pesan)
    {
        $this->db->update('pesan', $data, ['id_pesan' => $id_pesan]);
        return $this->db->affected_rows();
    }

    public function deletepesan($id_pesan)
    {
        $this->db->delete('pesan',['id_pesan' => $id_pesan]);
        return $this->db->affected_rows();
    }
}
