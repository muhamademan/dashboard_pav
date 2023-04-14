<?php

class M_barang_masuk extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('PAV_DATA_BRG')->result_array();
    }

    public function get_kodeBarang()
    {
        $sqlKode = "SELECT DISTINCT(KODE_BARANG) KODE_BARANG FROM PAV_DATA_BRG ORDER BY KODE_BARANG ASC";
        return $this->db->query($sqlKode)->result_array();
    }

    public function get_nama_merchan($id)
    {
        $sqlMerchan = "SELECT NAMA_BARANG FROM PAV_DATA_BRG WHERE KODE_BARANG = '$id' ORDER BY NAMA_BARANG ASC";
        return $this->db->query($sqlMerchan)->result_array();
    }

    // public function get_harga($idMerchan)
    // {
    //     $sqlHarga = "SELECT DISTINCT(HARGA) HARGA FROM PAV_BARANGMASUK WHERE NAMABARANG = '$idMerchan'";
    //     return $this->db->query($sqlHarga)->result_array();
    // }
}