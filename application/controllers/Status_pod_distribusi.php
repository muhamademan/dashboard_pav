<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class status_pod_distribusi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_status_pod_distribusi', 'mpod');
    }

    public function index()
    {

        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];
            if ($filter         == '1') {
                $tanggal1       = $_GET['tanggal'];
                $tanggal2       = $_GET['tanggal2'];
                $cetak_excel    = 'status_pod_distribusi/cetakTglExcel?tanggal1=' . $tanggal1 . '&tanggal2=' . $tanggal2 . '';
                $data_pod       = $this->mpod->view_by_tanggal($tanggal1, $tanggal2)->result_array();
            } elseif ($filter   == '2') {
                $regional       = $_GET['regional'];
                $cetak_excel    = 'status_pod_distribusi/cetakRegional?&regional=' . $regional;
                $data_pod       = $this->mpod->byRegional($regional)->result_array();
            } elseif ($filter   == '3') {
                $regional2      = $_GET['regional2'];
                $tanggal3       = $_GET['tanggal3'];
                $tanggal4       = $_GET['tanggal4'];
                $cetak_excel    = 'status_pod_distribusi/cetakPeriodeRegional?regional2=' . $regional2 . '&tanggal3=' . $tanggal3 . '&tanggal4=' . $tanggal4 . '';
                $data_pod       = $this->mpod->regionalbytanggal($regional2, $tanggal3, $tanggal4)->result_array();
            }
        } else {
            $cetak_excel        = 'status_pod_distribusi/cetakAllExcel';
            $data_pod           = $this->mpod->getAll();
        }


        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title']  = 'POD Distribusi';

        $data['cetak_excel'] = base_url($cetak_excel);
        $data['data_pod']   = $data_pod;
        $data['regional']   = $this->mpod->getRegional();
        // $data['dt_regional']   = $this->mpod->getRegional2();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('status_pod_distribusi/index', $data);
        $this->load->view('templates/footer');
    }

    public function cetakAllExcel()
    {
        $data['tgl_cetak'] = 'Dicetak pada tanggal : ' . date('d M Y');

        $keterangan = 'ALL DATA';
        $data['ket'] = $keterangan;
        $data['data_pod'] = $this->db->get("PAV_STATUSDISTRIBUSI")->result_array();
        $this->load->view('status_pod_distribusi/printExcel', $data);
    }

    public function cetakTglExcel()
    {
        $data['tgl_cetak'] = 'Dicetak pada tanggal : ' . date('d M Y');
        $tanggal1 = $_GET['tanggal1'];
        $tanggal2 = $_GET['tanggal2'];

        $keterangan = 'Status POD Distribusi Dari Tanggal ' . date('d M Y', strtotime($tanggal1)) . ' sampai tanggal ' . date('d M Y', strtotime($tanggal2));
        $data['data_pod'] = $this->mpod->view_by_tanggal($tanggal1, $tanggal2)->result_array();
        $data['ket'] = $keterangan;
        $this->load->view('status_pod_distribusi/printExcel', $data);
    }

    public function cetakRegional()
    {
        $data['tgl_cetak'] = 'Dicetak pada tanggal : ' . date('d M Y');
        $regional          = $_GET['regional'];

        $keterangan = 'Status POD Distribusi Berdasarkan Regional ' . strtoupper($regional);
        $data['data_pod'] = $this->mpod->byRegional($regional)->result_array();
        $data['ket'] = $keterangan;
        $this->load->view('status_pod_distribusi/printExcel', $data);
    }

    public function cetakPeriodeRegional()
    {
        $data['tgl_cetak'] = 'Dicetak pada tanggal : ' . date('d M Y');
        $regional2 = $_GET['regional2'];
        $tanggal3 = $_GET['tanggal3'];
        $tanggal4 = $_GET['tanggal4'];

        $keterangan = 'Status POD Distribusi Berdasarkan Regional ' . strtoupper($regional2) . ' Dengan Periode Tanggal Permintaan ' . date('d M Y', strtotime($tanggal3)) . ' Sampai Tanggal ' . date('d M Y', strtotime($tanggal4));
        $data['data_pod'] = $this->mpod->regionalbytanggal($regional2, $tanggal3, $tanggal4)->result_array();
        $data['ket'] = $keterangan;
        $this->load->view('status_pod_distribusi/printExcel', $data);
    }
}