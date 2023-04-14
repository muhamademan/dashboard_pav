<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Update_status_pod extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_status_pod', 'M_status_pod');
    }

    // STATUS POD SPSM ==============================================

    public function status_pod_spsm()
    {
        // $data['user'] = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Update AWB';

        $data['test'] = $this->db->get('PAV_APPROVAL_MERCHAN')->result_array();

        // $data['dt_approval'] = $this->M_status_pod->getDataApprovalSPSM();

        // $query = "SELECT DISTINCT(NO_SPSM) NO_SPSM FROM PAV_APPROVAL_MERCHAN GROUP BY NO_SPSM ORDER BY NO_SPSM";
        // $data['dt_approval'] = $this->db->query($query)->result_array();

        // $id = $_GET['SPSM'];
        // $kdBarang = "SELECT NO_SPSM, KODE_BARANG, NAMA_MERCHANDISE, HARGA FROM PAV_APPROVAL_MERCHAN WHERE NO_SPSM = '$id' AND STATUS = 0 ORDER BY KODE_BARANG desc";
        // $data['viewTable'] = $this->db->query($kdBarang)->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('update_statusPOD/pod_spsm', $data);
        $this->load->view('templates/footer');
    }


    public function kode_barang()
    {
        $id = $this->input->post('id');
        $option = $_POST['op'];
        if ($option == '1') {
            $query = $this->M_status_pod->getDataApprovalKodeBarang($id);
            foreach ($query as $data) {
                $test['kodebrg'] = $data['KODE_BARANG'];
                $test['brg'] = $data['NAMA_MERCHANDISE'];
                $test['hrg'] = $data['HARGA'];
            }
            echo json_encode($test);
        }
    }

    public function insertDataPod()
    {
        // $config['upload_path']      = FCPATH . '/uploads/update_status_pod/';
        // $config['allowed_types']    = 'jpg|png|svg|jpeg';
        // $config['max_size']         = '2048';

        // $this->load->library('upload', $config);

        // if (!$this->upload->do_upload('FOTOUKURAN')) {
        //     echo $this->upload->display_errors();
        // } else {
        $SPSM               = $this->input->post('SPSM');
        $TGLKIRIM           = $this->input->post('TGLKIRIM');
        $AWB                = $this->input->post('AWB');
        $KODEBARANG         = $this->input->post('KODEBARANG');
        $NAMABARANG         = $this->input->post('NAMABARANG');
        $HARGA              = $this->input->post('HARGA');
        $FOTOUKURAN         = NULL;
        $KODE_APPROVAL      = $this->input->post('KODE_APPROVAL');
        // $foto_baru  = $this->upload->data();
        // $foto       = $foto_baru['file_name'];
        $KD_STATUS_POD  = rand();

        for ($i = 0; $i < count($KODEBARANG); $i++) {
            $this->db->query("INSERT INTO PAV_STATUSPOD (SPSM, TGLKIRIM, AWB, KODEBARANG, NAMABARANG, HARGA, FOTOUKURAN, KD_STATUS_POD, KODE_APPROVAL) 
            VALUES ('" . $SPSM[$i] . "', TO_DATE('" . $TGLKIRIM . "','yyyy/mm/dd hh24:mi:ss'), '" . $AWB . "', '" . $KODEBARANG[$i] . "', '" . $NAMABARANG[$i] . "', '" . $HARGA[$i] . "', '" . $FOTOUKURAN[$i] . "', '" . $KD_STATUS_POD . "', '" . $KODE_APPROVAL . "')");

            // QUERY UPDATE KE TABLE PAV_STATUSDISTRIBUSI SETELAH PROSES POD_SPSM OLEH TEAM PAV
            $this->db->query("UPDATE PAV_STATUSDISTRIBUSI SET AWB = '$AWB', TGLKIRIM = '$TGLKIRIM' WHERE KODE_APPROVAL = $KODE_APPROVAL");
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <i>Data Berhasil di Simpan</i><button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('update_status_pod/status_pod_spsm');
        // }
    }
    // ========== END ===========

    // =================================== UPDATE DOKUMENTASI / EVENT ===================================

    public function update_dokumentasi()
    {
        // $data['user']   = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title']  = 'Update Dokumentasi';

        $data['dt_statuspod'] = $this->db->get('PAV_STATUSPOD')->result_array();
        // $data['dt_statuspod'] = $this->M_status_pod->get_by_id($KD_STATUS_POD);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('update_statusPOD/update_dokevent', $data);
        $this->load->view('templates/footer');
    }

    public function insertDokEvent()
    {
        $config['upload_path']      = FCPATH . '/uploads/update_dokumentasi/';
        $config['allowed_types']    = 'jpg|png|svg|jpeg';
        $config['max_size']         = '2048';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('FOTO_DOKUMENTASI') || !$this->upload->do_upload('FOTO_DOKUMENTASI') > 2000 * 2000) {
            // echo $this->upload->display_errors();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <i>Data gagal disimpan, pastikan file gambar diisi dengan ukuran Max 2MB</i><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('update_status_pod/update_dokumentasi');
        } else {
            $SPSM               = $this->input->post('SPSM');
            $TGL                = $this->input->post('TGL');
            $AWB                = $this->input->post('AWB');
            $KODEBARANG         = $this->input->post('KODEBARANG');
            $NAMABARANG         = $this->input->post('NAMABARANG');
            $HARGA              = $this->input->post('HARGA');
            $FOTOUKURAN         = null;
            $foto_baru          = $this->upload->data();
            $foto               = $foto_baru['file_name'];
            $KD_STATUSDOK       = rand();
            $NAMA_PENERIMA      = $this->input->post('NAMA_PENERIMA');
            $KODE_APPROVAL      = $this->input->post('KODE_APPROVAL');

            for ($i = 0; $i < count($KODEBARANG); $i++) {
                $this->db->query("INSERT INTO PAV_STATUSDOK(SPSM, TGL, AWB, KODEBARANG, NAMABARANG, HARGA, FOTOUKURAN, FOTO_DOKUMENTASI, KD_STATUSDOK, NAMA_PENERIMA, KODE_APPROVAL) VALUES('" . $SPSM[$i] . "', TO_DATE('" . $TGL . "','yyyy/mm/dd hh24:mi:ss'),'" . $AWB . "', '" . $KODEBARANG[$i] . "', '" . $NAMABARANG[$i] . "','" . $HARGA[$i] . "','" . $FOTOUKURAN . "', '" . $foto . "', '" . $KD_STATUSDOK . "', '" . $NAMA_PENERIMA . "', '" . $KODE_APPROVAL . "')");

                // QUERY UPDATE KE TABLE PAV_STATUSDISTRIBUSI SETELAH PROSES UPDATE_DOKEVENT OLEH USER / CUSTOMER
                $this->db->query("UPDATE PAV_STATUSDISTRIBUSI SET TGLDITERIMA = '$TGL', NAMAPENERIMA = '$NAMA_PENERIMA', FOTOPENERIMA = '$foto' WHERE KODE_APPROVAL = $KODE_APPROVAL");
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <i>Data Berhasil di Simpan</i><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('update_status_pod/update_dokumentasi');
        }
    }

    // =================================== END ===================================
}