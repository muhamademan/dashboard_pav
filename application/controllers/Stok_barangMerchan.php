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

    public function inputOpname()
    {
        $KODE_STOKOPNAME    = rand();
        $TGL_OPNAME         = $_POST['TGL_OPNAME'];
        $TGL_BRG            = $_POST['TGL_BRG'];
        $KODEBARANG         = $_POST['KODEBARANG'];
        $NAMABARANG         = $_POST['NAMABARANG'];
        $HARGA              = $_POST['HARGA'];
        $TOTAL_JUMLAH       = $_POST['TOTAL_JUMLAH'];
        $JUMLAH45           = $_POST['JUMLAH45'];
        $JUMLAH11           = $_POST['JUMLAH11'];
        $TOTAL_PERHITUNGAN  = $_POST['TOTAL_PERHITUNGAN'];
        $PERHITUNGAN_STOK45 = $_POST['PERHITUNGAN_STOK45'];
        $PERHITUNGAN_STOK11 = $_POST['PERHITUNGAN_STOK11'];
        $SELISIH_QTY        = $_POST['SELISIH_QTY'];
        $SELISIH_QTY45      = $_POST['SELISIH_QTY45'];
        $SELISIH_QTY11      = $_POST['SELISIH_QTY11'];
        $SELISIH_HARGA      = $_POST['SELISIH_HARGA'];
        $SELISIH_HARGA45    = $_POST['SELISIH_HARGA45'];
        $SELISIH_HARGA11    = $_POST['SELISIH_HARGA11'];

        // $data = [];

        for ($i = 0; $i < count($KODEBARANG); $i++) {
            $this->db->query("INSERT INTO PAV_STOCKOPNAME (KODE_STOKOPNAME, TGL_OPNAME, TGL_BRG, KODEBARANG, NAMABARANG, HARGA, TOTAL_JUMLAH, JUMLAH45, JUMLAH11, TOTAL_PERHITUNGAN, PERHITUNGAN_STOK45, PERHITUNGAN_STOK11, SELISIH_QTY, SELISIH_QTY45, SELISIH_QTY11, SELISIH_HARGA, SELISIH_HARGA45, SELISIH_HARGA11) VALUES ('" . $KODE_STOKOPNAME . "',TO_DATE('" . $TGL_OPNAME . "', 'dd/mm/yy'), TO_DATE('" . $TGL_BRG[$i] . "', 'dd/mm/yy'), '" . $KODEBARANG[$i] . "', '" . $NAMABARANG[$i] . "', '" . $HARGA[$i] . "', '" . $TOTAL_JUMLAH[$i] . "', '" . $JUMLAH45[$i] . "', '" . $JUMLAH11[$i] . "', '" . $TOTAL_PERHITUNGAN[$i] . "', '" . $PERHITUNGAN_STOK45[$i] . "', '" . $PERHITUNGAN_STOK11[$i] . "', '" . $SELISIH_QTY[$i] . "', '" . $SELISIH_QTY45[$i] . "', '" . $SELISIH_QTY11[$i] . "', '" . $SELISIH_HARGA[$i] . "', '" . $SELISIH_HARGA45[$i] . "', '" . $SELISIH_HARGA11[$i] . "')");
        }

        // if ($dataInsert) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <strong>Data stok opname merchandise berhasil di simpan</strong>. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('stok_barangMerchan/stok_opname');
        // }
    }

    public function report_stok_opname()
    {
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Report Opname';

        $data['stok_merchan'] = $this->db->get('PAV_BARANGMASUK')->result_array();
        // $data['stok_merchan'] = $this->db->get('PAV_STOCKOPNAME')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok_barang/report_stok_opname', $data);
        $this->load->view('templates/footer');
    }
}