<?php

class M_form_permintaan extends CI_Model
{
    // query kode vendor otomatis
    public function cekkodepermintaan()
    {
        $query = $this->db->query("SELECT MAX(SPSM) as SPSM from PAV_PERMINTAAN WHERE AKSI <= 1");
        $hasil = $query->row();
        return $hasil->SPSM;
    }

    public function get_kodeBarang()
    {
        $sqlKode = "SELECT DISTINCT(KODEBARANG) KODEBARANG FROM PAV_BARANGMASUK ORDER BY KODEBARANG ASC";
        return $this->db->query($sqlKode)->result_array();
    }

    public function get_nama_merchan($id)
    {
        $sqlMerchan = "SELECT KODEBARANGMASUK, NAMABARANG, JUMLAH, HARGA FROM PAV_BARANGMASUK WHERE KODEBARANG = '$id'
        AND JUMLAH > 0
        ORDER BY TGL DESC";
        return $this->db->query($sqlMerchan)->result_array();
    }
    // public function get_nama_merchan($id)
    // {
    //     $sqlMerchan = "SELECT DISTINCT(NAMABARANG) NAMABARANG, FROM PAV_BARANGMASUK WHERE KODEBARANG = '$id' ORDER BY NAMABARANG ASC";
    //     return $this->db->query($sqlMerchan)->result_array();
    // }

    public function get_harga($idMerchan)
    {
        $sqlHarga = "SELECT DISTINCT(HARGA) HARGA FROM PAV_BARANGMASUK WHERE NAMABARANG = '$idMerchan'";
        return $this->db->query($sqlHarga)->result_array();
    }
    // public function get_harga($idMerchan = null, $idKodebrng = null)
    // {
    //     $sqlHarga = "SELECT DISTINCT(HARGA) HARGA FROM PAV_BARANGMASUK WHERE NAMABARANG = '$idMerchan' AND KODEBARANG = '$idKodebrng' ORDER BY HARGA ASC";
    //     return $this->db->query($sqlHarga)->result_array();
    // }
}