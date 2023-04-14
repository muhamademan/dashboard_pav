<?php
defined('BASEPATH') or exit('No direct script access allowed');

class approval_merchandise extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kacab');
        $this->load->model('M_merchandise');
    }

    public function index()
    {
        // $data['user']   = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title']  = 'Approval Merchandise';

        $data['dt_permintaan'] = $this->M_kacab->getPermintaanAdmin();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approval_merchan/index', $data);
        $this->load->view('templates/footer');
    }

    public function detailPermintaan($SPSM)
    {
        // $data['user']   = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title']  = 'Detail Approval Merchandise';

        // $data['detail'] = $this->M_kacab->get_by_id($SPSM);

        $data['dt_permintaan'] = $this->M_kacab->getPermintaanAdmin();
        $data['detail2'] = $this->M_kacab->get_by_id($SPSM);

        $data['dt_merchan'] = $this->db->get('PAV_BARANGMASUK')->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approval_merchan/detail_permintaan', $data);
        $this->load->view('templates/footer');
    }

    public function preview()
    {
        $KODE_APPROVAL      = rand();
        $NAMA_CABANG        = $this->input->post('NAMA_CABANG');
        $NO_SPSM            = $this->input->post('NO_SPSM');
        $TGL_PENGGUNAAN     = $this->input->post('TGL_PENGGUNAAN');
        $KETERANGAN         = $this->input->post('KETERANGAN');
        $KODE_BARANG        = $this->input->post('KODE_BARANG');
        $NAMA_MERCHANDISE   = $this->input->post('NAMA_MERCHANDISE');
        $STOCK_ON_HAND      = $this->input->post('STOCK_ON_HAND');
        $SISA_STOCK_ONHAND  = $this->input->post('SISA_STOCK_ONHAND');
        $HARGA_STOCK_ONHAND = $this->input->post('HARGA_STOCK_ONHAND');
        $BALANCE_HARGA      = $this->input->post('BALANCE_HARGA');
        $JUMLAH_PERMINTAAN  = $this->input->post('JUMLAH_PERMINTAAN');
        $JUMLAH_DISETUJUI   = $this->input->post('JUMLAH_DISETUJUI');
        $HARGA              = $this->input->post('HARGA');
        $TOTAL_HARGA        = $this->input->post('TOTAL_HARGA');
        $STATUS             = 0;
        $KODEBARANGMASUK    = $this->input->post('KODEBARANGMASUK');
        $SISA_JUMLAHMINTA   = $this->input->post('SISA_JUMLAHMINTA');
        $NAMA_PAV           = $this->input->post('NAMA_PAV');
        $TGL_PERMINTAAN     = $this->input->post('TGL_PERMINTAAN');
        $DESTINASI          = $this->input->post('DESTINASI');
        $REGIONAL           = $this->input->post('REGIONAL');
        $NAMA_PEMINTA       = $this->input->post('NAMA_PEMINTA');
        $DEPARTEMENT        = $this->input->post('DEPARTEMENT');

        for ($i = 0; $i < count($KODE_BARANG); $i++) {


            $this->db->query("INSERT INTO PAV_APPROVAL_MERCHAN_TMP (KODE_APPROVAL, NAMA_CABANG, NO_SPSM, TGL_PENGGUNAAN, KETERANGAN, KODE_BARANG, NAMA_MERCHANDISE, STOCK_ON_HAND, SISA_STOCK_ONHAND, HARGA_STOCK_ONHAND, BALANCE_HARGA, JUMLAH_PERMINTAAN, JUMLAH_DISETUJUI, HARGA, TOTAL_HARGA, STATUS, SISA_JUMLAHMINTA, KODEBARANGMASUK, NAMA_PAV,TGL_PERMINTAAN, DESTINASI, REGIONAL, NAMA_PEMINTA, DEPARTEMENT) VALUES ('" . $KODE_APPROVAL . "', '" . $NAMA_CABANG . "', '" . $NO_SPSM . "', TO_DATE('" . $TGL_PENGGUNAAN . "', 'yyyy/mm/dd hh24:mi:ss'), '" . $KETERANGAN . "', '" . $KODE_BARANG[$i] . "', '" . $NAMA_MERCHANDISE[$i] . "', '" . $STOCK_ON_HAND[$i] . "', '" . $SISA_STOCK_ONHAND[$i] . "', '" . $HARGA_STOCK_ONHAND[$i] . "', '" . $BALANCE_HARGA[$i] . "', '" . $JUMLAH_PERMINTAAN[$i] . "', '" . $JUMLAH_DISETUJUI[$i] . "', '" . $HARGA[$i] . "', '" . $TOTAL_HARGA[$i] . "', '" . $STATUS . "', '" . $SISA_JUMLAHMINTA[$i] . "', '" . $KODEBARANGMASUK[$i] . "','" . $NAMA_PAV . "', TO_DATE('" . $TGL_PERMINTAAN . "', 'dd/mm/yy'), '" . $DESTINASI . "', '" . $REGIONAL . "', '" . $NAMA_PEMINTA . "', '" . $DEPARTEMENT . "')");

            // $datanya = "SELECT * FROM PAV_BARANGMASUK WHERE KODEBARANGMASUK = $KODEBARANGMASUK[$i]
            // AND JUMLAH > 0
            // ORDER BY TGL DESC";

            // $qeury1 = $this->db->query($datanya)->row_array();

            // $data2 = "SELECT * FROM PAV_APPROVAL_MERCHAN_TMP WHERE KODEBARANGMASUK = $KODEBARANGMASUK[$i] ORDER BY CREATEDATE DESC";
            // $qeury2 = $this->db->query($data2)->row_array();

            // $SISA = $qeury1['JUMLAH'] + $qeury2['SISA_JUMLAHMINTA'];

            // $this->db->query("UPDATE PAV_BARANGMASUK SET JUMLAH = $SISA WHERE KODEBARANGMASUK = $KODEBARANGMASUK[$i]");
        }

        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        <strong>Warning!</strong> Pastikan data yang anda input sudah benar. Silahkan <strong>submit</strong> jika sudah benar. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('approval_merchandise/detail_preview');
    }

    public function detail_preview()
    {
        // $data['user']   = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title']  = 'Preview Approval';

        $data['dt_permintaan']  = $this->M_kacab->getPermintaanAdmin();
        $data['dt_preview']     = $this->M_kacab->getDetailPreview();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approval_merchan/detail_preview', $data);
        $this->load->view('templates/footer');
    }

    public function proses_detail_preview()
    {

        $KODE_APPROVAL      = $this->input->post('KODE_APPROVAL');
        $NAMA_CABANG        = $this->input->post('NAMA_CABANG');
        $NO_SPSM            = $this->input->post('NO_SPSM');
        $TGL_PENGGUNAAN     = $this->input->post('TGL_PENGGUNAAN');
        $KETERANGAN         = $this->input->post('KETERANGAN');
        $KODE_BARANG        = $this->input->post('KODE_BARANG');
        $NAMA_MERCHANDISE   = $this->input->post('NAMA_MERCHANDISE');
        $STOCK_ON_HAND      = $this->input->post('STOCK_ON_HAND');
        $SISA_STOCK_ONHAND  = $this->input->post('SISA_STOCK_ONHAND');
        $HARGA_STOCK_ONHAND = $this->input->post('HARGA_STOCK_ONHAND');
        $BALANCE_HARGA      = $this->input->post('BALANCE_HARGA');
        $JUMLAH_PERMINTAAN  = $this->input->post('JUMLAH_PERMINTAAN');
        $JUMLAH_DISETUJUI    = $this->input->post('JUMLAH_DISETUJUI');
        $HARGA              = $this->input->post('HARGA');
        $TOTAL_HARGA        = $this->input->post('TOTAL_HARGA');
        $STATUS             = 0;
        $KODEBARANGMASUK    = $this->input->post('KODEBARANGMASUK');
        $SISA_JUMLAHMINTA   = $this->input->post('SISA_JUMLAHMINTA');
        $NAMA_PAV           = $this->input->post('NAMA_PAV');
        $TGL_PERMINTAAN     = $this->input->post('TGL_PERMINTAAN');
        $KODEDISTRIBUSI     = rand();
        $DESTINASI          = $this->input->post('DESTINASI');
        $REGIONAL           = $this->input->post('REGIONAL');
        $NAMA_PEMINTA       = $this->input->post('NAMA_PEMINTA');
        $DEPARTEMENT        = $this->input->post('DEPARTEMENT');

        for ($i = 0; $i < count($KODE_BARANG); $i++) {

            $this->db->query("INSERT INTO PAV_APPROVAL_MERCHAN (KODE_APPROVAL, NAMA_CABANG, NO_SPSM, TGL_PENGGUNAAN, KETERANGAN, KODE_BARANG, NAMA_MERCHANDISE, STOCK_ON_HAND, SISA_STOCK_ONHAND, HARGA_STOCK_ONHAND, BALANCE_HARGA, JUMLAH_PERMINTAAN, JUMLAH_DISETUJUI, HARGA, TOTAL_HARGA, STATUS, SISA_JUMLAHMINTA, KODEBARANGMASUK, NAMA_PAV, TGL_PERMINTAAN, DESTINASI, REGIONAL, NAMA_PEMINTA, DEPARTEMENT) VALUES ('" . $KODE_APPROVAL[$i] . "', '" . $NAMA_CABANG . "', '" . $NO_SPSM . "', TO_DATE('" . $TGL_PENGGUNAAN . "', 'yyyy/mm/dd hh24:mi:ss'), '" . $KETERANGAN . "', '" . $KODE_BARANG[$i] . "', '" . $NAMA_MERCHANDISE[$i] . "', '" . $STOCK_ON_HAND[$i] . "', '" . $SISA_STOCK_ONHAND[$i] . "', '" . $HARGA_STOCK_ONHAND[$i] . "', '" . $BALANCE_HARGA[$i] . "', '" . $JUMLAH_PERMINTAAN[$i] . "', '" . $JUMLAH_DISETUJUI[$i] . "', '" . $HARGA[$i] . "', '" . $TOTAL_HARGA[$i] . "', '" . $STATUS . "', '" . $SISA_JUMLAHMINTA[$i] . "', '" . $KODEBARANGMASUK[$i] . "','" . $NAMA_PAV . "', TO_DATE('" . $TGL_PERMINTAAN . "', 'dd/mm/yy'), '" . $DESTINASI . "', '" . $REGIONAL . "', '" . $NAMA_PEMINTA . "', '" . $DEPARTEMENT . "')");

            $this->db->query("UPDATE PAV_APPROVAL_MERCHAN_TMP SET STATUS = 1 WHERE KODE_APPROVAL = $KODE_APPROVAL[$i]");

            $datanya = "SELECT * FROM PAV_BARANGMASUK WHERE KODEBARANGMASUK = $KODEBARANGMASUK[$i]
            AND JUMLAH > 0
            ORDER BY TGL DESC";
            $qeury1 = $this->db->query($datanya)->row_array();

            $data2 = "SELECT * FROM PAV_APPROVAL_MERCHAN_TMP WHERE KODEBARANGMASUK = $KODEBARANGMASUK[$i] ORDER BY CREATEDATE DESC";
            $qeury2 = $this->db->query($data2)->row_array();

            $SISA = $qeury1['JUMLAH'] + $qeury2['SISA_JUMLAHMINTA'];
            $this->db->query("UPDATE PAV_BARANGMASUK SET JUMLAH = $SISA WHERE KODEBARANGMASUK = $KODEBARANGMASUK[$i]");

            // $this->db->query("UPDATE PAV_BARANGMASUK SET JUMLAH = $SISA WHERE KODEBARANG = $KODE_BARANG AND JUMLAH > 0 ORDER BY TGL DESC");

            // $this->db->query("UPDATE PAV_STATUSDISTRIBUSI SET KODEDISTRIBUSI = $KODEDISTRIBUSI, NAMA_PAV = $NAMA_PAV, TGLPERMINTAAN = $TGL_PERMINTAAN, TGLPENGGUNAAN = $TGL_PENGGUNAAN, SPSM = $NO_SPSM, KETERANGAN = $KETERANGAN, KODEBARANG = $KODE_BARANG[$i], NAMABARANG= $NAMA_MERCHANDISE[$i], QTY = $JUMLAH_DISETUJUI, HARGA = $HARGA[$i], TOTAL_HARGA = $TOTAL_HARGA[$i]");

            $this->db->query("INSERT INTO PAV_STATUSDISTRIBUSI (KODEDISTRIBUSI, NAMAPAV, TGLPERMINTAAN, TGLPENGGUNAAN, PIC, SPSM, CABANG, REGIONAL, KETERANGAN, KODEBARANG, NAMABARANG, QTY, HARGA, TOTAL_HARGA, KODEBARANGMASUK, DEPARTEMENT, KODE_APPROVAL, KODE_CABANG) VALUES ('" . $KODEDISTRIBUSI . "', '" . $NAMA_PAV . "', TO_DATE('" . $TGL_PERMINTAAN . "', 'dd/mm/yy'), TO_DATE('" . $TGL_PENGGUNAAN . "', 'yyyy/mm/dd hh24:mi:ss'),'" . $NAMA_PEMINTA . "', '" . $NO_SPSM . "','" . $DESTINASI . "','" . $NAMA_CABANG . '-' . $REGIONAL . "', '" . $KETERANGAN . "', '" . $KODE_BARANG[$i] . "', '" . $NAMA_MERCHANDISE[$i] . "', '" . $JUMLAH_DISETUJUI[$i] . "','" . $HARGA[$i] . "','" . $TOTAL_HARGA[$i] . "', '" . $KODEBARANGMASUK[$i] . "','" . $DEPARTEMENT . "', '" . $KODE_APPROVAL[$i] . "', '" . $NAMA_CABANG . "')");
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Permintaan merchandise berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('approval_merchandise');
    }

    public function delete_preview($KODE_APPROVAL)
    {
        $this->db->where('KODE_APPROVAL', $KODE_APPROVAL);
        $query = $this->db->delete('PAV_APPROVAL_MERCHAN_TMP');

        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Silahkan input kembali jumlah merchandise yang disetujui dengan benar. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            // redirect('approval_merchandise/detailPermintaan');
            redirect('approval_merchandise');
        }
    }
}