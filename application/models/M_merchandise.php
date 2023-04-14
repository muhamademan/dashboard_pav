<?php

class M_merchandise extends CI_Model
{
    public function getAll()
    {
        // return $this->db->get('PAV_BARANGMASUK')->result_array();
        $query = $this->db->query("SELECT DISTINCT(KODEBARANG) KODEBARANG, KODEBARANGMASUK, TGL, LOKASI, KODEVENDOR, SURATJALAN, PURCHASE_ORDER, KODEBARANG, NAMABARANG, JUMLAH, HARGA, FSUPPORT, HARGA_ONHAND FROM PAV_BARANGMASUK WHERE JUMLAH > 0 ORDER BY KODEBARANGMASUK ASC")->result_array();
        return $query;
    }
}