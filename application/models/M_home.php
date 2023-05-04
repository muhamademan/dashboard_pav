<?php

class M_home extends CI_Model
{
    public function countCabang()
    {
        return $this->db->query("SELECT COUNT(KODEVENDOR) FROM PAV_VENDOR")->result_array();
    }
}