<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepala_cabang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_kacab');
    }

    public function index()
    {
        // $data['user'] = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();

        $data['title'] = "Home";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('home/kacabdanuser', $data);
        $this->load->view('templates/footer');
    }

    public function approval_merchan()
    {
        // $data['user'] = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();

        $data['title'] = "Approval Merchandise";

        $data['dt_permintaan'] = $this->M_kacab->getPermintaan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kacab/approv_merchan', $data);
        $this->load->view('templates/footer');
    }

    public function disetujui($id)
    {
        $sql = "UPDATE PAV_PERMINTAAN SET AKSI = 1 WHERE KD_PERMINTAAN_BRG = $id";
        $this->db->query($sql);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data permintaan barang telah disetujui<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect(site_url('kepala_cabang/approval_merchan'));
    }

    public function reject($id)
    {
        // $JUMLAHMINTA = $_POST['JUMLAHMINTA'];
        $data1 = $this->db->get_where('PAV_BARANGMASUK', ['KODEBARANGMASUK' => $id])->row_array();
        $data2 = $this->db->get_where('PAV_PERMINTAAN', ['KODEBARANGMASUK' => $id])->row_array();

        $tambah = $data1['JUMLAH'] + $data2['JUMLAHMINTA'];
        $this->db->query("UPDATE PAV_BARANGMASUK SET JUMLAH = $tambah WHERE KODEBARANGMASUK = $id");

        $sql = "UPDATE PAV_PERMINTAAN SET AKSI = 2 WHERE KODEBARANGMASUK = $id";
        $this->db->query($sql);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data permintaan barang telah ditolak<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect(site_url('kepala_cabang/approval_merchan'));
    }

    // public function reject($KD_PERMINTAAN_BRG)
    // {
    //     $this->db->where('KD_PERMINTAAN_BRG', $KD_PERMINTAAN_BRG);
    //     $rejecData = $this->db->delete('PAV_PERMINTAAN');

    //     if ($rejecData) {
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //         Data permintaan barang telah disetujui <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //         <span aria-hidden="true">&times;</span></button></div>');
    //         redirect('kepala_cabang/approval_merchan');
    //     }
    // }
}