<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class report_pav extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_report', 'report');
    }

    public function report()
    {
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Report Harian';

        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];
            if ($filter == '1') {
                $tanggal1       = $_GET['tanggal'];
                $tanggal2       = $_GET['tanggal2'];
                $cetak_file     = 'report_pav/cetakTgl?tanggal=' . $tanggal1 . '&tanggal2=' . $tanggal2 . '';
                $report         = $this->report->view_by_tanggal($tanggal1, $tanggal2)->result_array();
            } elseif ($filter   == '2') {
                $regional       = $_GET['regional'];
                $cetak_file     = 'report_pav/cetakRegional?&regional=' . $regional;
                $report         = $this->report->by_regional($regional)->result_array();
            } elseif ($filter   == '3') {
                $merchandise    = $_GET['merchandise'];
                $cetak_file     = 'report_pav/cetakMerchandise?merchandise=' . $merchandise;
                $report         = $this->report->by_merchandise($merchandise)->result_array();
            } else if ($filter  == '4') {
                $merchandise2   = $_GET['merchandise2'];
                $tanggal3       = $_GET['tanggal3'];
                $tanggal4       = $_GET['tanggal4'];
                $cetak_file     = 'report_pav/cetakMerchandiseByPeriode?Merchandise2=' . $merchandise2 . '&tanggal3=' . $tanggal3 . '&tanggal4=' . $tanggal4 . '';
                $report         = $this->report->getPeriodMerchand($merchandise2, $tanggal3, $tanggal4)->result_array();
            } elseif ($filter   == '5') {
                $regional2      = $_GET['regional2'];
                $tanggal5       = $_GET['tanggal5'];
                $tanggal6       = $_GET['tanggal6'];
                $cetak_file     = 'report_pav/cetakRegionalByPeriode?regional2=' . $regional2 . '&tanggal5=' . $tanggal5 . '&tanggal6=' . $tanggal6 . '';
                $report         = $this->report->getPeriodRegioal($regional2, $tanggal5, $tanggal6)->result_array();
            }
        } else {
            $cetak_file = 'report_pav/cetakAll';
            $report = $this->report->getAll();
        }

        $data['cetak_file'] = base_url($cetak_file);
        $data['dt_report'] = $report;
        $data['report_merchan'] = $this->report->r_merchandise();
        $data['report_regional'] = $this->report->r_regional();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('report/index', $data);
        $this->load->view('templates/footer');
    }

    public function cetakAll()
    {
        $data['tgl_cetak'] = 'Dicetak pada tanggal : ' . date('d M Y');
        $keterangan = 'All Report';
        $data['ket'] = $keterangan;
        $data['dt_report'] = $this->report->getAll();
        $this->load->view('report/printExcel', $data);
    }

    public function cetakTgl()
    {
        $data['tgl_cetak'] = "Dicetak pada tanggal : " . date('d M Y');
        $tanggal1 = $_GET['tanggal'];
        $tanggal2 = $_GET['tanggal2'];

        $keterangan = 'Data Report Berdasarkan Periode Tanggal Permintaan ' . $tanggal1 . ' Sampai Dengan Tanggal ' . $tanggal2;
        $data['dt_report'] = $this->report->view_by_tanggal($tanggal1, $tanggal2)->result_array();
        $data['ket'] = $keterangan;
        $this->load->view('report/printExcel', $data);
    }

    public function cetakRegional()
    {
        $data['tgl_cetak']  = 'Dicetak pada tanggal : ' . date('d M Y');
        $regional           = $_GET['regional'];
        $keterangan         = 'Data Report Berdasarkan Regional ' . $regional;

        $data['ket']        = $keterangan;
        $data['dt_report']  = $this->report->by_regional($regional)->result_array();
        $this->load->view('report/printExcel', $data);
    }

    public function cetakMerchandise()
    {
        $data['tgl_cetak']  = 'Dicetak pada tanggal : ' . date('d M Y');
        $merchandise        = $_GET['merchandise'];
        $keterangan         = 'Data Report Berdasarkan Nama Merchandise / Barang ' . $merchandise;

        $data['ket']        = $keterangan;
        $data['dt_report']  = $this->report->by_merchandise($merchandise)->result_array();
        $this->load->view('report/printExcel', $data);
    }

    public function cetakMerchandiseByPeriode()
    {
        $data['tgl_cetak']  = 'Dicetak pada tanggal : ' . date('d M Y');
        $merchandise2       = $_GET['merchandise2'];
        $tanggal3           = $_GET['tanggal3'];
        $tanggal4           = $_GET['tanggal4'];

        $keterangan         = 'Data Report Berdasarkan Nama Merchandise ' . $merchandise2 . ' Dengan Periode Tanggal Mulai Dari ' . date('d M Y', strtotime($tanggal3)) . ' Sampai Dengan Tanggal ' . date('d M Y', strtotime($tanggal4));

        $data['ket']        = $keterangan;
        $data['dt_report']  = $this->report->getPeriodMerchand($merchandise2, $tanggal3, $tanggal4)->result_array();
        $this->load->view('report/printExcel', $data);
    }

    public function cetakRegionalByPeriode()
    {
        $data['tgl_cetak']  = 'Dicetak pada tanggal : ' . date('d M Y');
        $regional2          = $_GET['regional2'];
        $tanggal5           = $_GET['tanggal5'];
        $tanggal6           = $_GET['tanggal6'];

        $keterangan         = 'Data Report Berdasarkan Regional ' . $regional2 . ' Dengan Periode Tanggal Mulai Dari ' . date('d M Y', strtotime($tanggal5)) . ' Sampai Dengan Tanggal ' . date('d M Y', strtotime($tanggal6));

        $data['ket']        = $keterangan;
        $data['dt_report']  = $this->report->getPeriodRegioal($regional2, $tanggal5, $tanggal6)->result_array();
        $this->load->view('report/printExcel', $data);
    }
}