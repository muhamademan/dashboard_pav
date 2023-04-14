<?php

class M_vendor extends CI_Model
{
    // query kode vendor otomatis
    public function cekkodebarang()
    {
        $query = $this->db->query("SELECT MAX(KODEVENDOR) as KODEVENDOR from PAV_VENDOR");
        $hasil = $query->row();
        return $hasil->KODEVENDOR;
    }
}