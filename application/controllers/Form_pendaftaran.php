<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_vendor');
        $this->load->model('M_cabang');
        $this->load->model('M_team_pav');
    }

    // ==================================== FORM PENDAFTARAN DATA VENDOR ==================================== 
    public function data_vendor()
    {
        // $data['user'] = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'PF Data Vendor';

        $dariDB = $this->M_vendor->cekkodebarang();
        // contoh V0001, angka 3 adalah awal pengambilan angka, dan 3 jumlah angka yang diambil
        $nourut = substr($dariDB, 3, 3);
        $kodeBarangSekarang = $nourut + 1;

        $data['kd_vendor'] = $kodeBarangSekarang;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('form_pendaftaran/add_dataVendor', $data);
        $this->load->view('templates/footer');
    }

    public function proses_addVendor()
    {
        $KODEVENDOR     = $this->input->post('KODEVENDOR', true);
        $NAMA           = $this->input->post('NAMA', true);
        $TLP            = $this->input->post('TLP', true);
        $FAX            = $this->input->post('FAX', true);
        $CURRENCY       = $this->input->post('CURRENCY', true);
        $TOP            = $this->input->post('TOP', true);
        $ALAMATVENDOR   = $this->input->post('ALAMATVENDOR', true);
        $NAMANPWP       = $this->input->post('NAMANPWP', true);
        $ALAMATNPWP     = $this->input->post('ALAMATNPWP', true);
        $NOMORNPWP      = $this->input->post('NOMORNPWP', true);
        $MPEMBAYARAN    = $this->input->post('MPEMBAYARAN', true);
        $NOREK          = $this->input->post('NOREK', true);
        $NAMABANK       = $this->input->post('NAMABANK', true);
        $NAMAREKENING   = $this->input->post('NAMAREKENING', true);

        $data = [
            'KODEVENDOR'    => $KODEVENDOR,
            'NAMA'          => $NAMA,
            'TLP'           => $TLP,
            'FAX'           => $FAX,
            'CURRENCY'      => $CURRENCY,
            'TOP'           => $TOP,
            'ALAMATVENDOR'  => $ALAMATVENDOR,
            'NAMANPWP'      => $NAMANPWP,
            'ALAMATNPWP'    => $ALAMATNPWP,
            'NOMORNPWP'     => $NOMORNPWP,
            'MPEMBAYARAN'   => $MPEMBAYARAN,
            'NOREK'         => $NOREK,
            'NAMABANK'      => $NAMABANK,
            'NAMAREKENING'  => $NAMAREKENING
        ];

        $addVendor = $this->db->insert('PAV_VENDOR', $data);
        if ($addVendor) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data vendor berhasil <strong>ditambahkan.</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('form_pendaftaran/data_vendor');
        }
    }
    // ==================================== END PENDAFTARAN DATA VENDOR ==================================== 


    // ==================================== PENDAFTARAN DATA CABANG ==================================== 
    public function data_cabang()
    {
        // $data['user']   = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title']  = 'PF Data Cabang';

        // get data branch dari ora_branch
        $data['dt_dest']  = $this->M_cabang->get_destinasi();

        // $data['dt_picKacab']  = $this->M_cabang->get_kacab();
        $data['dt_picKacab2']  = $this->M_cabang->get_kacab2();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('form_pendaftaran/add_dataCabang', $data);
        $this->load->view('templates/footer');
    }

    function kd_cabang()
    {
        $id = $this->input->post('id');
        $option = $_POST['op'];
        if ($option == '1') {
            $query = $this->M_cabang->get_regional($id);
            echo "<option value=''> --pilih regional-- </option>";
            foreach ($query as $data) {
                echo "<option value='" . $data['REGIONAL'] . "," . $id . "'>" . $data['REGIONAL'] . "</option>";
            }
        } else if ($option == '2') {
            $Pecah = explode(",", $id);
            $reg_id = $Pecah[0];
            $dest_id = $Pecah[1];

            $query = $this->M_cabang->get_kd_cabang($reg_id, $dest_id);
            echo "<option value=''> --pilih kodecabang-- </option>";
            foreach ($query as $data) {
                echo "<option value='" . $data['KODE_CABANG'] . "'>" . $data['KODE_CABANG'] . "</option>";
            }
        }
    }

    public function dt_password()
    {
        $id = $this->input->post('id');
        $option = $_POST['op'];
        if ($option == '5') {
            $query = $this->M_cabang->get_password($id);
            foreach ($query as $data) {
                $test['pass'] = $data['USER_PSWD'];
                $test['name'] = $data['USER_NAME'];
                // $test['brg'] = $data['NAMABARANG'];
                // $test['jml'] = $data['JUMLAH'];
                // $test['hrg'] = $data['HARGA'];
            }
            echo json_encode($test);
        }
    }


    public function proses_addCabang()
    {
        $DESTINASI      = $this->input->post('DESTINASI', true);
        $KODECABANG     = $this->input->post('KODECABANG', true);
        $REGIONAL       = $this->input->post('REGIONAL', true);
        $STATUS_CABANG  = $this->input->post('STATUS_CABANG', true);
        $ALAMAT         = $this->input->post('ALAMAT', true);
        $NAMA_KACAB     = $this->input->post('NAMA_KACAB', true);
        $HPKACAB        = $this->input->post('HPKACAB', true);
        $EMAILKACAB     = $this->input->post('EMAILKACAB', true);
        $NAMA_PIC_CAB   = $this->input->post('NAMA_PIC_CAB', true);
        $HPPIC          = $this->input->post('HPPIC', true);
        $EMAILPIC       = $this->input->post('EMAILPIC', true);
        $KACAB          = $this->input->post('KACAB', true);
        $DEPARTEMENT    = $this->input->post('DEPARTEMENT', true);
        $USER_NAME      = $this->input->post('USER_NAME', true);
        $PASSWORD       = password_hash($this->input->post('PASSWORD'), PASSWORD_DEFAULT);
        $ROLE           = $this->input->post('ROLE', true);
        $STATUS_CBG     = 1;
        $ID_CABANG      = rand();
        $ACTIVE         = 1;
        $NAME_ORION      = $this->input->post('NAME_ORION', true);

        $data = [
            'DESTINASI'     => $DESTINASI,
            'KODECABANG'    => $KODECABANG,
            'REGIONAL'      => $REGIONAL,
            'STATUS_CABANG' => $STATUS_CABANG,
            'ALAMAT'        => $ALAMAT,
            'NAMA_KACAB'    => $NAMA_KACAB,
            'HPKACAB'       => $HPKACAB,
            'EMAILKACAB'    => $EMAILKACAB,
            'NAMA_PIC_CAB'  => $NAMA_PIC_CAB,
            'HPPIC'         => $HPPIC,
            'EMAILPIC'      => $EMAILPIC,
            'KACAB'         => $KACAB,
            'DEPARTEMENT'   => $DEPARTEMENT,
            'USER_NAME'     => $USER_NAME,
            'PASSWORD'      => $PASSWORD,
            'ROLE'          => $ROLE,
            'STATUS_CBG'    => $STATUS_CBG,
            'ID_CABANG'     => $ID_CABANG,
            'ACTIVE'        => $ACTIVE,
            'NAME_ORION'    => $NAME_ORION
        ];

        // print_r($data);
        // exit;

        $insertCabang = $this->db->insert('PAV_CABANG', $data);
        if ($insertCabang) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data cabang berhasil <strong>ditambahkan.</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('form_pendaftaran/data_cabang');
        }
    }
    // ==================================== END PENDAFTARAN DATA CABANG ==================================== 


    // ==================================== DATA PENDAFTARAN DATA TEAM PAV ==================================== 
    public function data_team_pav()
    {
        // $data['user'] = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'PF Data Team PAV';

        $dariDB = $this->M_team_pav->cekkodepav();
        // contoh V0001, angka 3 adalah awal pengambilan angka, dan 3 jumlah angka yang diambil
        $nourut = substr($dariDB, 3, 3);
        $kodeBarangSekarang = $nourut + 1;

        $data['kd_team_pav'] = $kodeBarangSekarang;

        $data['dt_picKacab2']  = $this->M_cabang->get_user_pav();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('form_pendaftaran/add_dataTeamPAV', $data);
        $this->load->view('templates/footer');
    }

    public function dt_passwordpav()
    {
        $id = $this->input->post('id');
        $option = $_POST['op'];
        if ($option == '1') {
            $query = $this->M_cabang->get_password_pav($id);
            foreach ($query as $data) {
                $test['pass'] = $data['USER_PSWD'];
                $test['branch'] = $data['USER_BRANCH'];
                $test['name'] = $data['USER_NAME'];
                // $test['brg'] = $data['NAMABARANG'];
                // $test['jml'] = $data['JUMLAH'];
                // $test['hrg'] = $data['HARGA'];
            }
            echo json_encode($test);
        }
    }


    public function proses_addPAV()
    {
        $config['upload_path']      = FCPATH . '/uploads/data_pav/';
        $config['allowed_types']    = 'jpg|png|svg|jpeg';
        $config['max_size']         = '2048';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('FOTO')) {
            // echo $this->upload->display_errors();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <i>Data gagal disimpan, foto wajib diisi</i><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('update_status_pod/update_dokumentasi');
        } else {
            // $foto               = $this->upload->data('file_name');
            $KODECABANG             = $this->input->post('KODECABANG');
            $KODEPAV                = $this->input->post('KODEPAV');
            $NIP_PAV                = $this->input->post('NIP_PAV', true);
            $NAMA_PAV               = $this->input->post('NAMA_PAV', true);
            $POSITION_PAV           = $this->input->post('POSITION_PAV', true);
            $TGL_LAHIR_PAV          = $this->input->post('TGL_LAHIR_PAV');
            $ALAMAT_PAV             = $this->input->post('ALAMAT_PAV', true);
            $NO_HP_PAV              = $this->input->post('NO_HP_PAV', true);
            $EMAIL_PAV              = $this->input->post('EMAIL_PAV', true);
            $NO_TELP_KEL_PAV        = $this->input->post('NO_TELP_KEL_PAV', true);
            $TGL_MASUK_KERJA_PAV    = $this->input->post('TGL_MASUK_KERJA_PAV');
            $GOLDAR_PAV             = $this->input->post('GOLDAR_PAV', true);
            $PASSWORD               = password_hash($this->input->post('PASSWORD'), PASSWORD_DEFAULT);
            $ROLE                   = $this->input->post('ROLE');
            $USER_NAME              = $this->input->post('USER_NAME', true);
            $foto_baru              = $this->upload->data();
            $foto                   = $foto_baru['file_name'];
            $STATUS_PAV             = 2;
            $ACTIVE                 = 1;
            $NAME_ORION              = $this->input->post('NAME_ORION', true);
            // $TGL_PENDAFTARAN_PAV    = $this->input->post('TGL_PENDAFTARAN_PAV');

            $insertPAV = $this->db->query("INSERT INTO PAV_CABANG (KODECABANG, KODEPAV, NIP_PAV, NAMA_PAV, POSITION_PAV, TGL_LAHIR_PAV, ALAMAT_PAV, NO_HP_PAV, EMAIL_PAV, NO_TELP_KEL_PAV, TGL_MASUK_KERJA_PAV, GOLDAR_PAV, PASSWORD, ROLE, USER_NAME, FOTO, STATUS_PAV, ACTIVE, NAME_ORION) 
            VALUES ('" . $KODECABANG . "', '" . $KODEPAV . "', '" . $NIP_PAV . "', '" . $NAMA_PAV . "', '" . $POSITION_PAV . "', TO_DATE('" . $TGL_LAHIR_PAV . "','yyyy/mm/dd hh24:mi:ss'), '" . $ALAMAT_PAV . "', '" . $NO_HP_PAV . "', '" . $EMAIL_PAV . "', '" . $NO_TELP_KEL_PAV . "', TO_DATE('" . $TGL_MASUK_KERJA_PAV . "','yyyy/mm/dd hh24:mi:ss'), '" . $GOLDAR_PAV . "', '" . $PASSWORD . "', '" . $ROLE . "', '" . $USER_NAME . "', '" . $foto . "', '" . $STATUS_PAV . "', '" . $ACTIVE . "', '" . $NAME_ORION . "')");

            // print_r($insertPAV);
            // exit;

            // $insertPAV = $this->db->insert('CBD_VEHICLE', $data);
            if ($insertPAV) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data team pav berhasil <strong>ditambahkan.</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
                redirect('form_pendaftaran/data_team_pav');
            }
        }
    }



    // public function proses_addPAV()
    // {
    //     $config['upload_path']      = FCPATH . '/uploads/data_pav/';
    //     $config['allowed_types']    = 'jpg|png|svg|jpeg';
    //     $config['max_size']         = '2048';

    //     $this->load->library('upload', $config);

    //     if (!$this->upload->do_upload('FOTO')) {
    //         // echo $this->upload->display_errors();
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //         <i>Data gagal disimpan, foto wajib diisi</i><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //         <span aria-hidden="true">&times;</span></button></div>');
    //         redirect('update_status_pod/update_dokumentasi');
    //     } else {
    //         // $foto               = $this->upload->data('file_name');
    //         $KODEPAV    = $this->input->post('KODEPAV', true);
    //         $NAMA       = $this->input->post('NAMA', true);
    //         $PANGGILAN  = $this->input->post('PANGGILAN', true);
    //         $ALAMAT     = $this->input->post('ALAMAT', true);
    //         $TLP        = $this->input->post('TLP', true);
    //         $HP         = $this->input->post('HP', true);
    //         $foto_baru  = $this->upload->data();
    //         $foto       = $foto_baru['file_name'];
    //         $PASANGAN   = $this->input->post('PASANGAN', true);
    //         $HPPASANGAN = $this->input->post('HPPASANGAN', true);
    //         $EMAIL      = $this->input->post('EMAIL', true);
    //         $LAHIR      = $this->input->post('LAHIR', true);

    //         $insertPAV = $this->db->query("INSERT INTO PAV (KODEPAV, NAMA, PANGGILAN, ALAMAT, TLP, HP, PASANGAN, HPPASANGAN, EMAIL, LAHIR, FOTO) 
    //         VALUES ('" . $KODEPAV . "', '" . $NAMA . "', '" . $PANGGILAN . "', '" . $ALAMAT . "', '" . $TLP . "', '" . $HP . "', '" . $PASANGAN . "', '" . $HPPASANGAN . "', '" . $EMAIL . "', TO_DATE('" . $LAHIR . "','yyyy/mm/dd hh24:mi:ss'), '" . $foto . "')");

    //         // $insertPAV = $this->db->insert('CBD_VEHICLE', $data);
    //         if ($insertPAV) {
    //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //             Data team pav berhasil <strong>ditambahkan.</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //             <span aria-hidden="true">&times;</span></button></div>');
    //             redirect('form_pendaftaran/data_team_pav');
    //         }
    //     }
    // }

    // ==================================== END PENDAFTARAN DATA PAV ==================================== 


    // ==================================== PENDAFTARAN DATA TOOLS MARKETING ==================================== 
    public function tools_marketing()
    {
        // $data['user'] = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Tools & Marketing';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('form_pendaftaran/add_toolsMarketing', $data);
        $this->load->view('templates/footer');
    }

    public function proses_addTools()
    {
        $NO         = $this->input->post('NO', true);
        $REGIONAL   = $this->input->post('REGIONAL', true);
        $CABANG     = $this->input->post('CABANG', true);
        $UMBUL      = $this->input->post('UMBUL', true);
        $BANNER     = $this->input->post('BANNER', true);
        $BADUT      = $this->input->post('BADUT', true);
        $TENDA      = $this->input->post('TENDA', true);
        $BOOTH      = $this->input->post('BOOTH', true);

        $data = [
            'NO'    => $NO,
            'REGIONAL'    => $REGIONAL,
            'CABANG'    => $CABANG,
            'UMBUL'    => $UMBUL,
            'BANNER'    => $BANNER,
            'BADUT'    => $BADUT,
            'TENDA'    => $TENDA,
            'BOOTH'    => $BOOTH
        ];

        $insertTools = $this->db->insert('PAV_TOOLS_MARKETING', $data);

        if ($insertTools) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data tools & marketing berhasil <strong>ditambahkan.</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('form_pendaftaran/tools_marketing');
        }
    }
    // ==================================== END PENDAFTARAN DATA TOOLS MARKETING ==================================== 
}