<?php

class M_stokopname extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('PAV_STOCKOPNAME')->result_array();
    }

    public function getTglOpname()
    {
        return $this->db->query("SELECT DISTINCT(TGL_OPNAME) as TGL_OPNAME FROM PAV_STOCKOPNAME")->result_array();
    }

    // QUERY MENAMPILKAN REPORT STOK OPNAME BERDASARKAN RANGE TANGGAL STOK OPNAME
    public function view_by_tanggal($tanggal1, $tanggal2)
    {
        $this->db->select("*");
        $this->db->from("PAV_STOCKOPNAME");
        $this->db->where("TGL_OPNAME BETWEEN TO_DATE('" . $tanggal1 . "', 'yyyy/mm/dd') AND TO_DATE('" . $tanggal2 . "', 'yyyy/mm/dd')");
        $this->db->order_by('TGL_OPNAME');
        return $this->db->get();
    }

    // QUERY MENAMPILKAN TOTAL BERDASARKAN RANGE TANGGAL STOK OPNAME
    public function total_byTgl($tanggal1, $tanggal2)
    {
        $data = "SELECT sum(HARGA) as HARGA, sum(TOTAL_JUMLAH) as TOTAL_JUMLAH, sum(JUMLAH45) as JUMLAH45, sum(JUMLAH11) AS JUMLAH11, sum(PERHITUNGAN_STOK45) AS PERHITUNGAN_STOK45, sum(PERHITUNGAN_STOK11) AS PERHITUNGAN_STOK11, sum(SELISIH_QTY45) AS SELISIH_QTY45, sum(SELISIH_QTY11) AS SELISIH_QTY11, sum(SELISIH_HARGA45) AS SELISIH_HARGA45, sum(SELISIH_HARGA11) AS SELISIH_HARGA11 FROM PAV_STOCKOPNAME WHERE TGL_OPNAME BETWEEN TO_DATE('" . $tanggal1 . "', 'yyyy/mm/dd') AND TO_DATE('" . $tanggal2 . "', 'yyyy/mm/dd')";

        return $this->db->query($data);
    }

    // QUERY MENAMPILKAN REPORT STOK OPNAME BERDASARKAN TGL OPNAME
    public function by_tglOpname($tgl_opname)
    {
        $this->db->select("*");
        $this->db->from("PAV_STOCKOPNAME");
        $this->db->where("TGL_OPNAME", $tgl_opname);
        return $this->db->get();
    }

    // QUERY MENAMPILKAN TOTAL BERDASARKAN TANGGAL OPNAME
    public function total_tglOpname($tgl_opname)
    {
        $data = "SELECT sum(HARGA) as HARGA, sum(TOTAL_JUMLAH) as TOTAL_JUMLAH, sum(JUMLAH45) as JUMLAH45, sum(JUMLAH11) AS JUMLAH11, sum(PERHITUNGAN_STOK45) AS PERHITUNGAN_STOK45, sum(PERHITUNGAN_STOK11) AS PERHITUNGAN_STOK11, sum(SELISIH_QTY45) AS SELISIH_QTY45, sum(SELISIH_QTY11) AS SELISIH_QTY11, sum(SELISIH_HARGA45) AS SELISIH_HARGA45, sum(SELISIH_HARGA11) AS SELISIH_HARGA11 FROM PAV_STOCKOPNAME WHERE TGL_OPNAME = '$tgl_opname'";

        return $this->db->query($data);
    }

    // QUERY MENAMPILKAN SEMUA TOTAL DARI STOK OPNAME
    public function allTotal()
    {
        return $this->db->query("SELECT sum(HARGA) as HARGA, sum(TOTAL_JUMLAH) as TOTAL_JUMLAH, sum(JUMLAH45) as JUMLAH45, sum(JUMLAH11) AS JUMLAH11, sum(PERHITUNGAN_STOK45) AS PERHITUNGAN_STOK45, sum(PERHITUNGAN_STOK11) AS PERHITUNGAN_STOK11, sum(SELISIH_QTY45) AS SELISIH_QTY45, sum(SELISIH_QTY11) AS SELISIH_QTY11, sum(SELISIH_HARGA45) AS SELISIH_HARGA45, sum(SELISIH_HARGA11) AS SELISIH_HARGA11 FROM PAV_STOCKOPNAME")->result_array();
    }
}