<?php

class M_team_pav extends CI_Model
{
    // query kode team_pav otomatis
    public function cekkodepav()
    {
        $query = $this->db->query("SELECT MAX(KODEPAV) as KODEPAV from PAV_CABANG");
        $hasil = $query->row();
        return $hasil->KODEPAV;
    }

    public function getAll()
    {
        // return $this->db->get('PAV')->result_array();
        return $this->db->query("SELECT KODEPAV, CREATEDATE, NIP_PAV, NAMA_PAV, POSITION_PAV, TGL_LAHIR_PAV, ALAMAT_PAV, NO_HP_PAV, EMAIL_PAV, NO_TELP_KEL_PAV, TGL_MASUK_KERJA_PAV, GOLDAR_PAV, USER_NAME, FOTO FROM PAV_CABANG WHERE STATUS_PAV = 2")->result_array();
    }

    public function get_by_id($KODEPAV)
    {
        return $this->db->get_where('PAV_CABANG', ['KODEPAV' => $KODEPAV])->row_array();
    }


    public function get_userorion_pav()
    {
        $sqlDest = "SELECT USER_ID, USER_BRANCH FROM ORA_USER ORDER BY USER_ID ASC";
        return $this->db->query($sqlDest)->result_array();
    }
    public function get_password_pav($id)
    {
        $sqlKd = "SELECT USER_PSWD FROM ORA_USER WHERE USER_ID = '$id' ORDER BY USER_PSWD ASC";
        return $this->db->query($sqlKd)->result_array();
    }
}