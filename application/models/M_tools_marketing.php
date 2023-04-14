<?php

class M_tools_marketing extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('PAV_TOOLS_MARKETING')->result_array();
    }
}