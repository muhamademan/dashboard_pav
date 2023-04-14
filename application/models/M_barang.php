<?php

class M_barang extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('PAV_DATA_BRG')->result_array();
    }
}