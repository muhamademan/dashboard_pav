<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('USER_NAME', 'Username', 'required');
        $this->form_validation->set_rules('PASSWORD', 'Password', 'required|trim');

        $data['title'] = "Halaman Login";
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // jika validasi login berhasil
            $this->_login();
        }
    }

    // private function _login()
    // {
    //     $username = $this->input->post('USER_NAME');
    //     $password = $this->input->post('USER_PSWD');

    //     $user = $this->db->get_where('ORA_USER', ['USER_NAME' => $username])->row_array();
    //     // $user = $this->db->get_where('PAV', ['USER_NAME' => $username])->row_array();

    //     // print_r($user);
    //     // exit;

    //     // jika akun user ada
    //     if ($user) {
    //         // jika akun user masih aktif
    //         if ($user['USER_ACTIVE'] == 'Y') {
    //             // cek password
    //             // if (password_verify($password, $user['USER_PSWD'])) {
    //             if ($password > 0 || $password == 0) {
    //                 $data = [
    //                     'USER_NAME' => $user['USER_NAME'],
    //                     'USER_GRID' => $user['USER_GRID']
    //                 ];
    //                 $this->session->set_userdata($data);
    //                 if ($user['USER_GRID'] == 'SUPER_USER') {
    //                     redirect('admin');
    //                 } elseif ($user['USER_GRID'] == 'BRANCH_OPS') {
    //                     redirect('kepala_cabang');
    //                 } elseif ($user['USER_GRID'] == 'BPN_OPS3') {
    //                     redirect('user');
    //                 }
    //             } else {
    //                 $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //                 Password anda salah</div>');
    //                 redirect('auth');
    //             }
    //             // end cek password
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //             Akun anda belum/tidak aktif</div>');
    //             redirect('auth');
    //             // end cek user aktif
    //         }
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //         Akun anda belum terdaftar</div>');
    //         redirect('auth');
    //         // end cek user ada
    //     }
    // }

    private function _login()
    {
        $USER_NAME  = $this->input->post('USER_NAME');
        $PASSWORD   = $this->input->post('PASSWORD');

        $user = $this->db->get_where('PAV_CABANG', ['USER_NAME' => $USER_NAME])->row_array();

        if ($user) {
            // JIKA AKUN LOGIN USER MASIH AKTIF
            if ($user['ACTIVE'] == 1) {
                // CEK PASSWORD
                if (password_verify($PASSWORD, $user['PASSWORD'])) {
                    $data = [
                        'USER_NAME' => $user['USER_NAME'],
                        'ROLE'      => $user['ROLE']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['ROLE'] == 'SUPER_USER') {
                        redirect('admin');
                    } elseif ($user['ROLE'] == 'BRANCH_OPS') {
                        redirect('kepala_cabang');
                    } elseif ($user['ROLE'] == 'BPN_OPS3') {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password anda salah</div>');
                    redirect('auth');
                }
                // END CHECK PASSWORD
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Akun anda belum/tidak aktif</div>');
                redirect('auth');
            }
            // END CHECK USER AKTIF
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Akun anda belum terdaftar</div>');
            redirect('auth');
            // END CHECK APAKAH ADA AKUN USERNYA
        }
    }




    public function logout()
    {
        // $this->session->unset_userdata('USER_NAME');
        // $this->session->unset_userdata('PASSWORD');

        unset(
            $_SESSION['USER_NAME'],
            $_SESSION['PASSWORD']
        );

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil keluar!</div>');
        redirect('auth');
    }
}