<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function getDataLaporan($id_laporan)
    {
        if($id_laporan){
            $this->db->select('id_laporan, pesan.id_pesan, order.id_order, makanan.id_makanan');
            $this->db->from('laporan');
            $this->db->where('id_laporan', $id_laporan);
            $this->db->join('pesan', 'pesan.id_pesan = laporan.id_pesan');
            $this->db->join('order', 'order.id_order = laporan.id_order');
            $this->db->join('makanan', 'makanan.id_makanan = laporan.id_makanan');
            $this->db->join('minuman', 'minuman.id_minuman = laporan.id_minuman');
            $this->db->join('dessert', 'dessert.id_dessert = laporan.id_dessert');
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->select('*');
            $this->db->from('laporan');
            $this->db->join('pesan', 'pesan.id_pesan = laporan.id_pesan');
            $this->db->join('order', 'order.id_order = laporan.id_order');
            $this->db->join('makanan', 'makanan.id_makanan = laporan.id_makanan');
            $this->db->join('minuman', 'minuman.id_minuman = laporan.id_minuman');
            $this->db->join('dessert', 'dessert.id_dessert = laporan.id_dessert');
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    public function insertLaporan($data)
    {
        $this->db->insert('laporan', $data);
        return $this->db->affected_rows();
    }

    public function updateLaporan($data, $id_laporan)
    {
        $this->db->update('laporan', $data, ['id_laporan' => $id_laporan]);
        return $this->db->affected_rows();
    }

    public function deleteLaporan($id_laporan)
    {
        $this->db->delete('laporan',['id_laporan' => $id_laporan]);
        return $this->db->affected_rows();
    }
}
