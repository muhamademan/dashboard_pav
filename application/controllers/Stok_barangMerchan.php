<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stok_barangMerchan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_stokopname', 'm_stok');
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
            $this->db->query("INSERT INTO PAV_STOCKOPNAME (KODE_STOKOPNAME, TGL_OPNAME, TGL_BRG, KODEBARANG, NAMABARANG, HARGA, TOTAL_JUMLAH, JUMLAH45, JUMLAH11, TOTAL_PERHITUNGAN, PERHITUNGAN_STOK45, PERHITUNGAN_STOK11, SELISIH_QTY, SELISIH_QTY45, SELISIH_QTY11, SELISIH_HARGA, SELISIH_HARGA45, SELISIH_HARGA11) VALUES ('" . $KODE_STOKOPNAME++ . "',TO_DATE('" . $TGL_OPNAME . "', 'dd/mm/yy'), TO_DATE('" . $TGL_BRG[$i] . "', 'dd/mm/yy'), '" . $KODEBARANG[$i] . "', '" . $NAMABARANG[$i] . "', '" . $HARGA[$i] . "', '" . $TOTAL_JUMLAH[$i] . "', '" . $JUMLAH45[$i] . "', '" . $JUMLAH11[$i] . "', '" . $TOTAL_PERHITUNGAN[$i] . "', '" . $PERHITUNGAN_STOK45[$i] . "', '" . $PERHITUNGAN_STOK11[$i] . "', '" . $SELISIH_QTY[$i] . "', '" . $SELISIH_QTY45[$i] . "', '" . $SELISIH_QTY11[$i] . "', '" . $SELISIH_HARGA[$i] . "', '" . $SELISIH_HARGA45[$i] . "', '" . $SELISIH_HARGA11[$i] . "')");
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


        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];
            if ($filter         == '1') {
                $tanggal1       = $_GET['tanggal'];
                $tanggal2       = $_GET['tanggal2'];
                $cetak_file     = 'stok_barangMerchan/cetakTgl?&tanggal=' . $tanggal1 . '&tanggal2=' . $tanggal2 . '';
                $report         = $this->m_stok->view_by_tanggal($tanggal1, $tanggal2)->result_array();
                $tgl            = $this->m_stok->total_byTgl($tanggal1, $tanggal2)->result_array();
            } elseif ($filter   == '2') {
                $tgl_opname     = $_GET['tgl_opname'];
                $cetak_file     = 'stok_barangMerchan/cetakByTglOpname?&tgl_opname=' . $tgl_opname;
                $report         = $this->m_stok->by_tglOpname($tgl_opname)->result_array();
                $tgl            = $this->m_stok->total_tglOpname($tgl_opname)->result_array();
            }
        } else {
            $cetak_file = 'stok_barangMerchan/cetakAll';
            $report = $this->m_stok->getAll();
            $tgl = $this->m_stok->allTotal();
        }

        $data['cetak_file'] = base_url($cetak_file);
        $data['dt_report']  = $report;
        $data['dt_tgl']  = $tgl;
        $data['tglOpname'] = $this->m_stok->getTglOpname();

        // $data['dt_report'] = $this->db->get('PAV_STOCKOPNAME')->result_array();

        $data['hargaMerchan'] = $this->db->query("SELECT sum(HARGA) as HARGA, sum(TOTAL_JUMLAH) as TOTAL_JUMLAH, sum(JUMLAH45) as JUMLAH45, sum(JUMLAH11) AS JUMLAH11, sum(PERHITUNGAN_STOK45) AS PERHITUNGAN_STOK45, sum(PERHITUNGAN_STOK11) AS PERHITUNGAN_STOK11, sum(SELISIH_QTY45) AS SELISIH_QTY45, sum(SELISIH_QTY11) AS SELISIH_QTY11, sum(SELISIH_HARGA45) AS SELISIH_HARGA45, sum(SELISIH_HARGA11) AS SELISIH_HARGA11 FROM PAV_STOCKOPNAME")->result_array();


        // $data['lokasi'] = $this->db->query("SELECT sum(HARGA) AS HARGA, sum(TOTAL_JUMLAH) as TOTAL_JUMLAH FROM PAV_STOCKOPNAME")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok_barang/report_stok_opname', $data);
        $this->load->view('templates/footer');
    }

    public function cetakAll()
    {
        $data['tgl_cetak']  = "Dicetak pada tanggal : " . date('d M Y');
        $keterangan         = 'All Report Stok Opname';
        $data['ket']        = $keterangan;
        $data['dt_report']  = $this->m_stok->getAll();
        $this->load->view('stok_opname/printExcel', $data);
    }

    public function cetakTgl()
    {
        $data['tgl_cetak']  = "Dicetak pada tanggal : " . date('d M Y');
        $tanggal1           = $_GET['tanggal1'];
        $tanggal2           = $_GET['tanggal2'];

        $keterangan         = 'Data stok opname dari tanggal ' . $tanggal1 . ' sampai dengan tanggal ' . $tanggal2;
        $data['ket']        = $keterangan;
        $data['dt_report']  = $this->m_stok->view_by_tanggal($tanggal1, $tanggal2)->result_array();
        $this->load->view('stok_opname/printExcel', $data);
    }

    public function cetakByTglOpname()
    {
        $data['tgl_cetak']  = "Dicetak pada tanggal : " . date('d M Y');
        $tgl_opname         = $_GET['tgl_opname'];

        $keterangan         = 'Data stok opname berdasarkan tanggal opname yang disimpan ; ' . $tgl_opname;
        $data['ket']        = $keterangan;
        $data['dt_report']  = $this->m_stok->by_tglOpname($tgl_opname)->result_array();
        $this->load->view('stok_opname/printExcel', $data);
    }
}