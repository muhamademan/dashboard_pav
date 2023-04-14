<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_team_pav');
        $this->load->model('M_tools_marketing');
        $this->load->model('M_cabang');
        $this->load->model('M_merchandise');
        $this->load->model('M_barang');
    }

    // ==================================== MASTER DATA VENDOR ==================================== 
    public function md_vendor()
    {
        // $data['user'] = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Master Data Vendor';

        $data['dt_vendor'] = $this->db->get('PAV_VENDOR')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterData/md_vendor', $data);
        $this->load->view('templates/footer');
    }

    // ==================================== END MASTER DATA VENDOR ==================================== 

    // ==================================== MERCHANDISE & HARGA DARI VENDOR ==================================== 
    public function md_merchanHarga()
    {
        // $data['user'] = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Master Data Merchandise & Harga';

        $data['dt_merchan'] = $this->M_merchandise->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterData/md_merchanHarga', $data);
        $this->load->view('templates/footer');
    }
    // ==================================== END MERCHANDISE & HARGA DARI VENDOR ==================================== 

    // ==================================== MASTER DATA CABANG ==================================== 
    public function md_cabang()
    {
        // $data['user'] = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Master Data Cabang';

        $data['dt_cabang'] = $this->M_cabang->getAllCabang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterData/md_Cabang', $data);
        $this->load->view('templates/footer');
    }

    public function editCabang($ID_CABANG)
    {
        // $data['user']   = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title']  = 'Halaman Edit Cabang';

        // data cabang dari table pav_cabang
        $data['edit_cabang'] = $this->M_cabang->get_by_id($ID_CABANG);

        // data cabang dari table orion
        $data['dt_dest']  = $this->M_cabang->get_destinasi();
        $data['dt_picKacab2']  = $this->M_cabang->get_kacab2();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterData/editCabang', $data);
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
            }
            echo json_encode($test);
        }
    }

    public function proses_editCabang($ID_CABANG = null)
    {
        $ID_CABANG      = $this->input->post('ID_CABANG', true);
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
        // $STATUS_CBG     = 1;
        // $ID_CABANG      = rand();

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
            'ROLE'          => $ROLE
        ];

        $this->db->where('ID_CABANG', $ID_CABANG);
        $updateCabang = $this->db->update('PAV_CABANG', $data);

        if ($updateCabang) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data cabang berhasil <b>diupdate.</b> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('master_data/md_cabang');
        }
    }

    // ==================================== END MASTER DATA CABANG ==================================== 

    // ==================================== MASTER DATA TEAM PAV ==================================== 
    public function md_teamPAV()
    {
        // $data['user'] = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Master Data Team PAV';

        $data['dt_team_pav'] = $this->M_team_pav->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterData/md_TeamPAV', $data);
        $this->load->view('templates/footer');
    }

    public function editTeamPAV($KODEPAV = null)
    {
        // $data['user'] = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Edit Data Team PAV';

        $data['edit_pav'] = $this->M_team_pav->get_by_id($KODEPAV);
        $data['dt_orion'] = $this->M_team_pav->get_userorion_pav();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterData/editTeamPAV', $data);
        $this->load->view('templates/footer');
    }

    public function dt_passwordpav()
    {
        $id = $this->input->post('id');
        $option = $_POST['op'];
        if ($option == '1') {
            $query = $this->M_team_pav->get_password_pav($id);
            foreach ($query as $data) {
                $test['pass'] = $data['USER_PSWD'];
            }
            echo json_encode($test);
        }
    }

    public function proses_editPAV($KODEPAV = null)
    {
        $KODEPAV         = $this->input->post('KODEPAV');

        $config['upload_path']      = './uploads/data_pav/';
        $config['allowed_types']    = 'jpg|png|svg|jpeg';
        $config['max_size']         = '2048';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('FOTO')) {

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

            $updatePav = $this->db->query("UPDATE PAV_CABANG SET NIP_PAV = '" . $NIP_PAV . "', NAMA_PAV = '" . $NAMA_PAV . "', POSITION_PAV = '" . $POSITION_PAV . "', TGL_LAHIR_PAV = TO_DATE('" . $TGL_LAHIR_PAV . "','yyyy/mm/dd hh24:mi:ss'), ALAMAT_PAV = '" . $ALAMAT_PAV . "', NO_HP_PAV = '" . $NO_HP_PAV . "', EMAIL_PAV = '" . $EMAIL_PAV . "', NO_TELP_KEL_PAV = '" . $NO_TELP_KEL_PAV . "', TGL_MASUK_KERJA_PAV = TO_DATE('" . $TGL_MASUK_KERJA_PAV . "','yyyy/mm/dd hh24:mi:ss'), GOLDAR_PAV = '" . $GOLDAR_PAV . "', PASSWORD = '" . $PASSWORD . "', ROLE = '" . $ROLE . "', USER_NAME = '" . $USER_NAME . "'  WHERE KODEPAV = '" . $KODEPAV . "'");

            // print_r($updatePav);
            // exit;

            if ($updatePav) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data team pav berhasil <b>diupdate.</b> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
                redirect('master_data/md_teamPAV');
            }
        } else {

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
            // $STATUS_PAV             = 2;

            $updatePAV = $this->db->query("UPDATE PAV_CABANG SET NIP_PAV = '" . $NIP_PAV . "', NAMA_PAV = '" . $NAMA_PAV . "', POSITION_PAV = '" . $POSITION_PAV . "', TGL_LAHIR_PAV = TO_DATE('" . $TGL_LAHIR_PAV . "','yyyy/mm/dd hh24:mi:ss'), ALAMAT_PAV = '" . $ALAMAT_PAV . "', NO_HP_PAV = '" . $NO_HP_PAV . "', EMAIL_PAV  = '" . $EMAIL_PAV . "', NO_TELP_KEL_PAV  = '" . $NO_TELP_KEL_PAV . "', TGL_MASUK_KERJA_PAV = TO_DATE('" . $TGL_MASUK_KERJA_PAV . "','yyyy/mm/dd hh24:mi:ss'), GOLDAR_PAV  = '" . $GOLDAR_PAV . "', PASSWORD  = '" . $PASSWORD . "',ROLE  = '" . $ROLE . "', USER_NAME  = '" . $USER_NAME . "', FOTO = '" . $foto . "' 
            WHERE KODEPAV = '" . $KODEPAV . "'");

            if ($updatePAV) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data team pav berhasil <b>diupdate.</b> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
                redirect('master_data/md_teamPAV');
            }
        }
    }
    // ==================================== END MASTER DATA PAV ==================================== 


    // ==================================== MASTER DATA TOOLS DAN MARKETING ==================================== 
    public function md_toolsMarketing()
    {
        // $data['user'] = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Master Data Tools & Marketing';

        $data['dt_toolsMar'] = $this->M_tools_marketing->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterData/md_ToolsMarketing', $data);
        $this->load->view('templates/footer');
    }
    // ==================================== END MASTER DATA TOOLS DAN MARKETING ==================================== 

    // ==================================== MASTER DATA BARANG ==================================== 
    public function md_data_barang()
    {
        // $data['user'] = $this->db->get_where('ORA_USER', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['user'] = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $this->session->userdata('USER_NAME')])->row_array();
        $data['title'] = 'Master Data Barang';

        // $data['dt_toolsMar'] = $this->M_tools_marketing->getAll();
        $data['dt_barang'] = $this->M_barang->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('masterData/md_dtBarang', $data);
        $this->load->view('templates/footer');
    }

    public function addDataBarang()
    {
        $ID_DATA_BRG    = rand(00000, 99999);
        $KODE_BARANG    = $this->input->post('KODE_BARANG', TRUE);
        $NAMA_BARANG    = $this->input->post('NAMA_BARANG', TRUE);

        $data = [
            'ID_DATA_BRG' => $ID_DATA_BRG++,
            'KODE_BARANG' => $KODE_BARANG,
            'NAMA_BARANG' => $NAMA_BARANG
        ];

        $addData = $this->db->insert('PAV_DATA_BRG', $data);
        if ($addData) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berang berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('master_data/md_data_barang');
        }
    }
    // ==================================== END MASTER DATA BARANG ==================================== 
}