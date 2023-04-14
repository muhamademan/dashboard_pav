<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
    }

    public function index()
    {
        // $data['user'] = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();

        $data['title'] = "Home";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}