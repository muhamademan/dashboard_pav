<?php

class M_status_pod extends CI_Model
{
    public function get_by_id($KD_STATUS_POD)
    {
        $queryDetail = "SELECT * FROM PAV_STATUSPOD WHERE KD_STATUS_POD = $KD_STATUS_POD";
        return $this->db->query($queryDetail)->result_array();

        // $queryDetail = "SELECT * FROM PAV_PERMINTAAN P, PAV_BARANGMASUK B 
        // WHERE P.KODEBARANGMASUK = B.KODEBARANGMASUK 
        // AND SPSM = $SPSM 
        // AND AKSI = 1";
        // return $this->db->query($queryDetail)->result_array();
    }

    public function getDataApprovalSPSM()
    {
        $query = "SELECT DISTINCT(NO_SPSM) NO_SPSM FROM PAV_APPROVAL_MERCHAN ORDER BY NO_SPSM desc";
        return $this->db->query($query)->result_array();
    }

    public function getDataApprovalKodeBarang($id)
    {
        $kdBarang = "SELECT NO_SPSM, KODE_BARANG, NAMA_MERCHANDISE, HARGA FROM PAV_APPROVAL_MERCHAN WHERE NO_SPSM = '$id' AND STATUS = 0 ORDER BY KODE_BARANG desc";
        return $this->db->query($kdBarang)->result_array();
    }
    // public function getDataApprovalKodeBarang2()
    // {
    //     $kdBarang = "SELECT KODE_BARANG, NAMA_MERCHANDISE, HARGA FROM PAV_APPROVAL_MERCHAN";
    //     return $this->db->query($kdBarang)->result_array();
    // }
}