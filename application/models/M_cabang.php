<?php

class M_cabang extends CI_Model
{

    // mengambil data dari table pav_cabang
    public function getAllCabang()
    {
        // return $this->db->get('PAV_CABANG')->result_array();
        return $this->db->query("SELECT * FROM PAV_CABANG WHERE STATUS_CBG = 1")->result_array();
    }

    // mengambil data cabang berdasarkan kodecabang
    public function get_by_id($ID_CABANG)
    {
        // return $this->db->get_where('PAV_CABANG', ['KODECABANG' => $KODECABANG])->row_array();
        return $this->db->get_where('PAV_CABANG', ['ID_CABANG' => $ID_CABANG])->row_array();
    }

    // mengambil data dari db orion
    public function getCabang()
    {
        return $this->db->get('ORA_BRANCH')->result_array();
    }

    function get_cabang()
    {
        // cabang dan regional ORA_BRANCH
        $query = $this->db->get('ORA_BRANCH');
        return $query;
    }

    // mengambil data destinasi dari orion
    public function get_destinasi()
    {
        $sqlDest = "SELECT DISTINCT(BRANCH_CTRNO) DESTINASI FROM ORA_BRANCH ORDER BY BRANCH_CTRNO ASC";
        return $this->db->query($sqlDest)->result_array();
    }

    public function get_regional($id)
    {
        $sqlKd = "SELECT DISTINCT(BRANCH_DESC) REGIONAL FROM ORA_BRANCH WHERE BRANCH_CTRNO = '$id' ORDER BY BRANCH_DESC ASC";
        return $this->db->query($sqlKd)->result_array();
    }

    public function get_kd_cabang($reg_id = null, $dest_id = null)
    {
        $sqlReg = "SELECT DISTINCT(BRANCH_CODE) KODE_CABANG FROM ORA_BRANCH WHERE BRANCH_DESC = '$reg_id' AND BRANCH_CTRNO = '$dest_id' ORDER BY BRANCH_CODE ASC";
        return $this->db->query($sqlReg)->result_array();
    }


    // public function get_kacab()
    // {
    //     return $this->db->get('ORA_USER')->result_array();
    // }

    public function get_kacab2()
    {
        $sqlDest = "SELECT USER_ID, USER_BRANCH, USER_NAME FROM ORA_USER ORDER BY USER_ID ASC";
        return $this->db->query($sqlDest)->result_array();
    }
    public function get_password($id)
    {
        $sqlKd = "SELECT USER_PSWD, USER_NAME FROM ORA_USER WHERE USER_ID = '$id' ORDER BY USER_PSWD ASC";
        return $this->db->query($sqlKd)->result_array();
    }

    public function get_user_pav()
    {
        $sqlDest = "SELECT USER_ID, USER_BRANCH, USER_NAME FROM ORA_USER ORDER BY USER_ID ASC";
        return $this->db->query($sqlDest)->result_array();
    }
    public function get_password_pav($id)
    {
        $sqlKd = "SELECT USER_PSWD, USER_BRANCH, USER_NAME FROM ORA_USER WHERE USER_ID = '$id' ORDER BY USER_PSWD ASC";
        return $this->db->query($sqlKd)->result_array();
    }
}