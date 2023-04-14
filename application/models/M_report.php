<?php
class M_report extends CI_Model
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

    public function by_regional($regional)
    {
        $this->db->select("*");
        $this->db->from("PAV_STATUSDISTRIBUSI");
        $this->db->where("REGIONAL", $regional);
        return $this->db->get();
    }

    public function r_regional()
    {
        return $this->db->query("SELECT DISTINCT(REGIONAL) AS REGIONAL FROM PAV_STATUSDISTRIBUSI ORDER BY REGIONAL ASC")->result_array();
    }

    public function by_merchandise($merchandise)
    {
        $this->db->select("*");
        $this->db->from("PAV_STATUSDISTRIBUSI");
        $this->db->where("NAMABARANG", $merchandise);
        return $this->db->get();
    }

    public function r_merchandise()
    {
        return $this->db->query("SELECT DISTINCT(NAMABARANG) AS NAMABARANG FROM PAV_STATUSDISTRIBUSI ORDER BY NAMABARANG ASC")->result_array();
    }

    public function getPeriodMerchand($merchandise2, $tanggal3, $tanggal4)
    {
        $this->db->select("*");
        $this->db->from("PAV_STATUSDISTRIBUSI");
        $this->db->where("NAMABARANG", $merchandise2);
        $this->db->where("TGLPERMINTAAN BETWEEN TO_DATE ('" . $tanggal3 . "', 'yyyy/mm/dd') AND TO_DATE ('" . $tanggal4 . "', 'yyyy/mm/dd')");
        $this->db->order_by("TGLPERMINTAAN");
        return $this->db->get();
    }

    public function getPeriodRegioal($regional2, $tanggal5, $tanggal6)
    {
        $this->db->select("*");
        $this->db->from("PAV_STATUSDISTRIBUSI");
        $this->db->where("REGIONAL", $regional2);
        $this->db->where("TGLPERMINTAAN BETWEEN TO_DATE ('" . $tanggal5 . "', 'yyyy/mm/dd') AND TO_DATE ('" . $tanggal6 . "', 'yyyy/mm/dd')");
        $this->db->order_by("TGLPERMINTAAN");
        return $this->db->get();
    }
}