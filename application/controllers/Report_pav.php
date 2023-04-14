<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
                $tanggal1 = $_GET['tanggal'];
                $tanggal2 = $_GET['tanggal2'];
                $report   = $this->report->view_by_tanggal($tanggal1, $tanggal2)->result_array();
            } elseif ($filter == '2') {
                $regional = $_GET['regional'];
                $report     = $this->report->by_regional($regional)->result_array();
            } elseif ($filter == '3') {
                $merchandise = $_GET['merchandise'];
                $report = $this->report->by_merchandise($merchandise)->result_array();
            } else if ($filter == '4') {
                $merchandise2 = $_GET['merchandise2'];
                $tanggal3       = $_GET['tanggal3'];
                $tanggal4       = $_GET['tanggal4'];
                $report       = $this->report->getPeriodMerchand($merchandise2, $tanggal3, $tanggal4)->result_array();
            } elseif ($filter == '5') {
                $regional2 = $_GET['regional2'];
                $tanggal5   = $_GET['tanggal5'];
                $tanggal6   = $_GET['tanggal6'];
                $report     = $this->report->getPeriodRegioal($regional2, $tanggal5, $tanggal6)->result_array();
            }
        } else {
            $report = $this->report->getAll();
        }

        $data['dt_report'] = $report;
        $data['report_regional'] = $this->report->r_regional();
        $data['report_merchan'] = $this->report->r_merchandise();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('report/index', $data);
        $this->load->view('templates/footer');
    }
}