<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stok_barangMerchan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_home');
    }

    public function stok_merchandise()
    {
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Stok Barang/Merchandise';

        $data['stok_merchan'] = $this->db->get('PAV_BARANGMASUK')->result_array();

        // $data['hargaMerchan'] = $this->db->query("SELECT LOKASI, (SELECT sum(HARGA) FROM PAV_BARANGMASUK)HARGA, (SELECT sum(JUMLAH) FROM PAV_BARANGMASUK) JUMLAH FROM PAV_BARANGMASUK")->result_array();
        $data['hargaMerchan'] = $this->db->query("SELECT sum(HARGA) as HARGA, sum(JUMLAH) as JUMLAH FROM PAV_BARANGMASUK")->result_array();

        $data['lokasi'] = $this->db->query("SELECT LOKASI, sum(HARGA) AS HARGA, SUM(JUMLAH) AS JUMLAH FROM PAV_BARANGMASUK GROUP BY LOKASI")->result();

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