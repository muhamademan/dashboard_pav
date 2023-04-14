<?php

class M_status_pod_distribusi extends CI_Model
{

    public function getAll()
    {
        return $this->db->get('PAV_STATUSDISTRIBUSI')->result_array();
    }

    public function view_by_tanggal($tanggal1, $tanggal2)
    {
        $this->db->select("*");
        $this->db->from("PAV_STATUSDISTRIBUSI");
        $this->db->where("TGLPERMINTAAN BETWEEN TO_DATE ('" . $tanggal1 . "', 'yyyy/mm/dd') AND TO_DATE ('" . $tanggal2 . "', 'yyyy/mm/dd')");
        $this->db->order_by("TGLPERMINTAAN");
        return $this->db->get();
    }

    public function byRegional($regional)
    {
        $this->db->select("*");
        $this->db->from("PAV_STATUSDISTRIBUSI");
        $this->db->where("REGIONAL", $regional);
        return $this->db->get();
    }

    public function getRegional()
    {
        return $this->db->query('SELECT DISTINCT(REGIONAL) AS REGIONAL FROM PAV_STATUSDISTRIBUSI ORDER BY REGIONAL ASC')->result_array();
    }


    // public function getRegional2()
    // {
    //     return $this->db->query('SELECT DISTINCT(REGIONAL) AS REGIONAL FROM PAV_STATUSDISTRIBUSI ORDER BY REGIONAL ASC')->result_array();
    // }


    public function regionalbytanggal($regional2, $tanggal3, $tanggal4)
    {
        $this->db->select("*");
        $this->db->from("PAV_STATUSDISTRIBUSI");
        $this->db->where("REGIONAL", $regional2);
        $this->db->where("TGLPERMINTAAN BETWEEN TO_DATE ('" . $tanggal3 . "', 'yyyy/mm/dd') AND TO_DATE ('" . $tanggal4 . "', 'yyyy/mm/dd')");
        $this->db->order_by("TGLPERMINTAAN");
        return $this->db->get();
    }
}