<?php

use PHPMailer\PHPMailer\PHPMailer;

defined('BASEPATH') or exit('No direct script access allowed');

class Form_permintaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_form_permintaan');
    }


    public function index()
    {
        // $data['user'] = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Form Permintaan';

        $dariDB = $this->M_form_permintaan->cekkodepermintaan();
        $nourut = substr($dariDB, 15, 3);
        $kdspsm   = $nourut + 1;
        $data['no_spsm'] = $kdspsm;

        $data['dt_barang'] = $this->M_form_permintaan->get_kodeBarang();
        $data['dt_barang2'] = $this->M_form_permintaan->get_kodeBarang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('form_permintaan/index', $data);
        $this->load->view('templates/footer');
    }

    public function kode_barang()
    {
        $id = $this->input->post('id');
        $option = $_POST['op'];
        if ($option == '1') {
            $query = $this->M_form_permintaan->get_nama_merchan($id);
            // echo "<option value=''> --pilih nama merchandise-- </option>";
            foreach ($query as $data) {
                // echo "<option value='" . $data['NAMABARANG'] . "," . $id . "'>" . $data['NAMABARANG'] . "</option>";
                // echo '<input name="NAMABARANG[]" type="text" class="form-control" autocomplete="off" value="' . $data['NAMABARANG'] . '">';
                // $test = [];
                // $test['brg'] = "john";
                $test['kodebrg'] = $data['KODEBARANGMASUK'];
                $test['brg'] = $data['NAMABARANG'];
                $test['jml'] = $data['JUMLAH'];
                $test['hrg'] = $data['HARGA'];
            }
            echo json_encode($test);
        }
    }


    public function proses_submit()
    {
        $SPSM               = $this->input->post('SPSM');
        $TGLGUNA            = $this->input->post('TGLGUNA');
        $KETERANGAN         = $this->input->post('KETERANGAN');
        $NO                 = 1;
        $KODEBARANG         = $this->input->post('KODEBARANG');
        $NAMABARANG         = $this->input->post('NAMABARANG');
        $SISA               = $this->input->post('SISA');
        $JUMLAHMINTA        = $this->input->post('JUMLAHMINTA');
        $HARGA              = $this->input->post('HARGA');
        $TOTAL_HARGA        = $this->input->post('TOTAL_HARGA');
        $KD_PERMINTAAN_BRG  = rand(00000, 99999);
        // $STOCK              = $this->input->post('STOCK');
        $STOCK              = null;
        $AKSI               = '0';
        $KODEBARANGMASUK    = $this->input->post('KODEBARANGMASUK');
        $CABANG             = $this->input->post('CABANG');
        $DESTINASI          = $this->input->post('DESTINASI');
        $REGIONAL           = $this->input->post('REGIONAL');
        $NAMA_PEMINTA       = $this->input->post('NAMA_PEMINTA');
        $DEPARTEMENT        = $this->input->post('DEPARTEMENT');

        // $from               = $this->config->item('smtp_user');
        $EMAILKACAB         = $this->input->post('EMAILKACAB');
        $SUBJECT            = $_POST['SUBJECT'];
        $MESSAGE            = $_POST['MESSAGE'];


        for ($i = 0; $i < count($KODEBARANG); $i++) {

            $data = $this->db->get_where('PAV_BARANGMASUK', ['KODEBARANGMASUK' => $KODEBARANGMASUK[$i]])->row_array();
            $SISA = $data['JUMLAH'] - $JUMLAHMINTA[$i];

            $this->db->query("INSERT INTO PAV_PERMINTAAN (SPSM, TGLGUNA, KETERANGAN, NO, KODEBARANG, NAMABARANG, SISA, JUMLAHMINTA, HARGA, TOTAL_HARGA, KD_PERMINTAAN_BRG, STOCK, AKSI, KODEBARANGMASUK, CABANG, DESTINASI, REGIONAL, NAMA_PEMINTA, DEPARTEMENT) VALUES ('" . $SPSM . "', TO_DATE('" . $TGLGUNA . "', 'yyyy/mm/dd hh24:mi:ss'), '" . $KETERANGAN . "', '" . $NO . "', '" . $KODEBARANG[$i] . "', '" . $NAMABARANG[$i] . "', '" . $SISA[$i] . "', '" . $JUMLAHMINTA[$i] . "', '" . $HARGA[$i] . "', '" . $TOTAL_HARGA[$i] . "', '" . $KD_PERMINTAAN_BRG++ . "', '" . $STOCK[$i] . "', '" . $AKSI . "', '" . $KODEBARANGMASUK[$i] . "', '" . $CABANG . "', '" . $DESTINASI . "', '" . $REGIONAL . "', '" . $NAMA_PEMINTA . "', '" . $DEPARTEMENT . "')");

            $this->db->query("UPDATE PAV_BARANGMASUK SET JUMLAH = $SISA WHERE KODEBARANGMASUK = $KODEBARANGMASUK[$i]");
        }



        // Load PHPMailer library
        // $this->load->library('phpmailer_lib');
        // PHPMailer Object
        // $mail = $this->phpmailer_lib->load();
        // include('phpmailer/PHPMailerAutoload.php');
        require_once APPPATH . 'third_party/PHPMailer/Exception.php';
        require_once APPPATH . 'third_party/PHPMailer/PHPMailer.php';
        require_once APPPATH . 'third_party/PHPMailer/SMTP.php';
        $mail = new PHPMailer;
        // SMPT Configuration
        $mail->SMTPDebug = 0;
        // $mail->Debugoutput = 'html';
        $mail->isSMTP();
        $mail->Host = 'e-relay.jne.co.id';
        $mail->SMTPAuth = true;
        $mail->Username = 'notification@jne.co.id';
        $mail->Password = '123456';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender
        $mail->setFrom('no-reply@jne.co.id', 'Permohonan Mercahndise');

        // Recipients
        $mail->addAddress('eman.sulaeman@jne.co.id');
        // $mail->addAddress("$EMAILKACAB");

        $mail->isHTML(true);
        $mail->Subject = $SUBJECT;

        $mailContent = 'tolong di acc';
        $mail->Body = $mailContent;



        if (!$mail->send()) {
            echo 'Pesan Gagal Dikirim';
            echo 'Mailer Error :' . $mail->ErrorInfo;
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Permintaan merchandise berhasil terkirim <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('form_permintaan');
    }

    // public function proses_submit()
    // {
    //     $SPSM               = $this->input->post('SPSM');
    //     $TGLGUNA            = $this->input->post('TGLGUNA');
    //     $KETERANGAN         = $this->input->post('KETERANGAN');
    //     $NO                 = 1;
    //     $KODEBARANG         = $this->input->post('KODEBARANG');
    //     $NAMABARANG         = $this->input->post('NAMABARANG');
    //     $SISA               = $this->input->post('SISA');
    //     $JUMLAHMINTA        = $this->input->post('JUMLAHMINTA');
    //     $HARGA              = $this->input->post('HARGA');
    //     $TOTAL_HARGA        = $this->input->post('TOTAL_HARGA');
    //     $KD_PERMINTAAN_BRG  = rand(00000, 99999);
    //     $STOCK              = $this->input->post('STOCK');
    //     $AKSI               = '0';
    //     $KODEBARANGMASUK    = $this->input->post('KODEBARANGMASUK');

    //     for ($i = 0; $i < count($KODEBARANG); $i++) {
    //         $test = $this->db->query("INSERT INTO PAV_PERMINTAAN (SPSM, TGLGUNA, KETERANGAN, NO, KODEBARANG, NAMABARANG, SISA, JUMLAHMINTA, HARGA, TOTAL_HARGA, KD_PERMINTAAN_BRG, STOCK, AKSI, KODEBARANGMASUK) VALUES ('" . $SPSM . "', TO_DATE('" . $TGLGUNA . "', 'yyyy/mm/dd hh24:mi:ss'), '" . $KETERANGAN . "', '" . $NO . "', '" . $KODEBARANG[$i] . "', '" . $NAMABARANG[$i] . "', '" . $SISA[$i] . "', '" . $JUMLAHMINTA[$i] . "', '" . $HARGA[$i] . "', '" . $TOTAL_HARGA[$i] . "', '" . $KD_PERMINTAAN_BRG++ . "', '" . $STOCK[$i] . "', '" . $AKSI . "', '" . $KODEBARANGMASUK[$i] . "')");
    //     }

    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //     Permintaan merchandise berhasil terkirim <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //     <span aria-hidden="true">&times;</span></button></div>');
    //     redirect('form_permintaan');
    // }
}