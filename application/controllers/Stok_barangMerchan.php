<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stok_barangMerchan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function stok_merchandise()
    {
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Stok Barang/Merchandise';

        $data['stok_merchan'] = $this->db->get('PAV_BARANGMASUK')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok_barang/stok_merchandise', $data);
        $this->load->view('templates/footer');
    }

    public function detailMerchan($KODEBARANGMASUK)
    {
    }

    public function stok_opname()
    {
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Stok Barang/Merchandise';

        $data['stok_merchan'] = $this->db->get('PAV_BARANGMASUK')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok_barang/stok_opname', $data);
        $this->load->view('templates/footer');
    }

    public function report_stok_opname()
    {
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Report Opname';

        $data['stok_merchan'] = $this->db->get('PAV_BARANGMASUK')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok_barang/report_stok_opname', $data);
        $this->load->view('templates/footer');
    }
}