<?php

class M_home extends CI_Model
{
    public function countCabang()
    {
        return $this->db->query("SELECT COUNT(KODEVENDOR) FROM PAV_VENDOR")->result_array();
    }

    // public function coba()
    // {
    //     $this->db->select('LOKASI');
    //     $this->db->select_sum('JUMLAH');
    //     $this->db->get('PAV_BARANGMASUK');
    //     $this->db->group_by('LOKASI');
    // }
}