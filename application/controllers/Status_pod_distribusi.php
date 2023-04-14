<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
                $data_pod       = $this->mpod->byRegional($regional)->result_array();
            } elseif ($filter   == '3') {
                $regional2      = $_GET['regional2'];
                $tanggal3       = $_GET['tanggal3'];
                $tanggal4       = $_GET['tanggal4'];
                $data_pod       = $this->mpod->regionalbytanggal($regional2, $tanggal3, $tanggal4)->result_array();
            }
        } else {
            $cetak_excel = 'status_pod_distribusi/cetakAllExcel';
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
        $data['tgl_cetak'] = 'dicetak pada tanggal :' . date('Y M d');

        $keterangan = 'ALL DATA';
        $data['ket'] = $keterangan;
        $data['allData'] = $this->db->get("PAV_STATUSDISTRIBUSI")->result_array();
        $this->load->view('status_pod_distribusi/printExcel', $data);
    }

    public function cetakTglExcel()
    {
        $data['tgl_cetak'] = 'dicetak pada tanggal :' . date('Y M d');
        $tanggal1 = $_GET['tanggal1'];
        $tanggal2 = $_GET['tanggal2'];

        $keterangan = 'Status POD Distribusi dari tanggal' . date('d-m-Y', strtotime($tanggal1)) . 'sampai tanggal' . date('d-m-Y', strtotime($tanggal2));
        $data['ket'] = $keterangan;
        $this->load->view('status_pod_distribusi/printExcel');
    }
}