<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload_data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_barang_masuk');
    }

    public function barang_masuk()
    {
        // $data['user'] = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Barang Masuk';

        $data['dt_vendor'] = $this->db->get('PAV_VENDOR')->result_array();

        $data['dt_barang'] = $this->M_barang_masuk->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('upload_data/brng_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function get_kode()
    {
        $id = $this->input->post('id');
        $option = $_POST['op'];
        if ($option == '1') {
            $query = $this->M_barang_masuk->get_nama_merchan($id);
            foreach ($query as $data) {
                $test['brg'] = $data['NAMA_BARANG'];
            }
            echo json_encode($test);
        }
    }

    public function add_barangMasuk()
    {
        $KODEBARANGMASUK    = rand();
        $TGL                = $this->input->post('TGL');
        $LOKASI             = $this->input->post('LOKASI');
        $KODEVENDOR         = $this->input->post('KODEVENDOR');
        $SURATJALAN         = $this->input->post('SURATJALAN');
        $PURCHASE_ORDER     = $this->input->post('PURCHASE_ORDER');
        $KODEBARANG         = $this->input->post('KODEBARANG');
        $NAMABARANG         = $this->input->post('NAMABARANG');
        $JUMLAH             = $this->input->post('JUMLAH');
        $HARGA              = $this->input->post('HARGA');
        $FSUPPORT           = $this->input->post('FSUPPORT');
        $HARGA_ONHAND       = $this->input->post('JUMLAH');

        for ($i = 0; $i < count($KODEBARANG); $i++) {
            //$data = array(
            //     'KODEBARANGMASUK'   => $KODEBARANGMASUK++,
            //     'TGL'               => $TGL,
            //     'LOKASI'            => $LOKASI,
            //     'KODEVENDOR'        => $KODEVENDOR,
            //     'SURATJALAN'        => $SURATJALAN,
            //     'PURCHASE_ORDER'    => $PURCHASE_ORDER,
            //     'KODEBARANG'        => $KODEBARANG[$i],
            //     'NAMABARANG'        => $NAMABARANG[$i],
            //     'JUMLAH'            => $JUMLAH[$i],
            //     'HARGA'             => $HARGA[$i],
            //     'FSUPPORT'          => $FSUPPORT
            // );

            $this->db->query("INSERT INTO PAV_BARANGMASUK (KODEBARANGMASUK, TGL, LOKASI, KODEVENDOR, SURATJALAN, PURCHASE_ORDER, KODEBARANG, NAMABARANG, JUMLAH, HARGA, FSUPPORT, HARGA_ONHAND) 
            VALUES ('" . $KODEBARANGMASUK++ . "', TO_DATE('" . $TGL . "','yyyy/mm/dd hh24:mi:ss'), '" . $LOKASI . "', '" . $KODEVENDOR . "', '" . $SURATJALAN . "', '" . $PURCHASE_ORDER . "', '" . $KODEBARANG[$i] . "', '" . $NAMABARANG[$i] . "', '" . $JUMLAH[$i] . "','" . $HARGA[$i] . "', '" . $FSUPPORT . "', '" . $HARGA_ONHAND[$i] . "')");
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data barang masuk berhasil <b>ditambahkan.</b> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('upload_data/barang_masuk');
    }
}