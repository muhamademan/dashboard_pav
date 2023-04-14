<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class M_kacab extends CI_Model
{
    public function getPermintaan()
    {
        $query = "SELECT * FROM PAV_PERMINTAAN WHERE AKSI = 0 ORDER BY TGLGUNA DESC";
        return $this->db->query($query)->result_array();
    }

    public function getDetailPreview()
    {
        // return $this->db->get('PAV_APPROVAL_MERCHAN_TMP')->result_array();

        $query = "SELECT KODE_APPROVAL, NO_SPSM, TGL_PENGGUNAAN, KETERANGAN, KODE_BARANG, NAMA_MERCHANDISE, STOCK_ON_HAND, SISA_STOCK_ONHAND, HARGA_STOCK_ONHAND, BALANCE_HARGA, JUMLAH_PERMINTAAN, JUMLAH_DISETUJUI, HARGA, TOTAL_HARGA, SISA_JUMLAHMINTA, NAMA_CABANG, KODEBARANGMASUK FROM PAV_APPROVAL_MERCHAN_TMP WHERE STATUS = 0";
        return $this->db->query($query)->result_array();
    }


    public function getPermintaanAdmin()
    {
        $queryAdmin = "SELECT distinct(SPSM) SPSM, TGLGUNA, KETERANGAN, CREATEDATE, CABANG, DESTINASI, REGIONAL, NAMA_PEMINTA, DEPARTEMENT FROM PAV_PERMINTAAN WHERE AKSI = 1 ORDER BY TGLGUNA DESC";
        return $this->db->query($queryAdmin)->result_array();
    }

    // public function get_by_id($SPSM)
    // {
    //     $queryDetail = "SELECT distinct(SPSM) SPSM, TGLGUNA, KETERANGAN, NO, KODEBARANG, NAMABARANG, SISA, JUMLAHMINTA, HARGA, TOTAL_HARGA, KD_PERMINTAAN_BRG, STOCK, KODEBARANGMASUK FROM PAV_PERMINTAAN WHERE SPSM = $SPSM and AKSI = 1";
    //     return $this->db->query($queryDetail)->result_array();
    // }

    // public function get_by_id($SPSM)
    // {
    //     $queryDetail = "SELECT * FROM PAV_PERMINTAAN P, PAV_BARANGMASUK B WHERE P.KODEBARANGMASUK = B.KODEBARANGMASUK 
    //     AND SPSM = $SPSM 
    //     AND AKSI = 1";
    //     return $this->db->query($queryDetail)->result_array();
    // }


    public function get_by_id($SPSM)
    {
        // $queryDetail = "SELECT DISTINCT P.SPSM, P.TGLGUNA, P.KETERANGAN, P.NO, P.KODEBARANG, P.NAMABARANG, P.SISA, P.JUMLAHMINTA, P.HARGA, P.TOTAL_HARGA, P.KD_PERMINTAAN_BRG, P.STOCK, SUM(B.JUMLAH) AS TOTAL, B.JUMLAH, B.KODEBARANGMASUK, B.TGL, B.LOKASI, B.KODEVENDOR, B.SURATJALAN, B.PURCHASE_ORDER, B.KODEBARANG, B.NAMABARANG, B.HARGA, B.FSUPPORT, B.HARGA_ONHAND 
        // FROM PAV_PERMINTAAN P 
        // INNER JOIN PAV_BARANGMASUK B 
        // ON P.KODEBARANGMASUK = B.KODEBARANGMASUK 
        // WHERE P.SPSM = $SPSM 
        // AND P.AKSI = 1 
        // GROUP BY P.SPSM, P.TGLGUNA, P.KETERANGAN, P.NO, P.KODEBARANG, P.NAMABARANG, P.SISA, P.JUMLAHMINTA, P.HARGA, P.TOTAL_HARGA, P.KD_PERMINTAAN_BRG, P.STOCK, B.KODEBARANGMASUK, B.TGL, B.LOKASI, B.KODEVENDOR, B.SURATJALAN, B.PURCHASE_ORDER, B.KODEBARANG, B.NAMABARANG, B.HARGA, B.FSUPPORT, B.HARGA_ONHAND, B.JUMLAH";
        // return $this->db->query($queryDetail)->result_array();

        $query = "SELECT
        P.SPSM,
        P.TGLGUNA,
        -- P.SPSM,
        P.TGLGUNA,
        P.KETERANGAN,
        P.NO,
        P.KODEBARANG,
        P.NAMABARANG,
        P.SISA,
        P.JUMLAHMINTA,
        -- PB.HARGA,
        P.HARGA,
        P.TOTAL_HARGA,
        P.KODEBARANGMASUK,
        P.KD_PERMINTAAN_BRG,
        -- P.CREATEDATE,
        (
            SELECT
            SUM(JUMLAH)
            FROM
            PAV_BARANGMASUK PB
            WHERE
            PB.KODEBARANG = P.KODEBARANG
        ) TOTAL,
        (
            SELECT 
            SUM(JUMLAH * HARGA)
            FROM
            PAV_BARANGMASUK PB
            WHERE
            PB.KODEBARANG = P.KODEBARANG
        ) HARGA_STOCK
        FROM
            PAV_PERMINTAAN P
            -- JOIN PAV_BARANGMASUK PB ON P.KODEBARANG = PB.KODEBARANG
        WHERE
            SPSM = $SPSM
        AND 
            AKSI = 1
        -- AND P.KODEBARANG = 'PAV05'
        ";


        return $this->db->query($query)->result_array();
    }

    public function get_data($SPSM)
    {
        $data = $this->db->query("SELECT sum(b.JUMLAH) as total FROM PAV_BARANGMASUK b, PAV_PERMINTAAN p 
        where b.KODEBARANGMASUK = p.KODEBARANGMASUK
        AND p.SPSM = $SPSM
        AND p.AKSI = 1
        ORDER BY b.KODEBARANG");
        return $data->result_array();
    }
}