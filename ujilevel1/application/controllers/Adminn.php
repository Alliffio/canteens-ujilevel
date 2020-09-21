<?php

class Dashboard extends CI_Controller{
    public function __construct(){                                            
        parent::__construct();
        $this->load->model('model_system');
    }

    public function index(){
        if ($this->session->userdata('status') !='login') {
            redirect('adminn/register');
        }
        else if ($this->session->userdata('status') =='login') {
            redirect('dashboard/dataadmin');
        }
    }

    //untuk tampil halaman login
    public function login(){
        if ($this->session->userdata('status') =='login') {
            redirect('adminn/login');
        }
        
        $this->load->view('template/login/header');
        $this->load->view('admin/login');
        $this->load->view('template/login/footer');

    }

    public function register(){
        $this->load->view('template/daftar/header');
        $this->load->view('admin/register');
        $this->load->view('template/daftar/footer');
    }
    
    public function simpan_register_admin(){
        $this->model_system->register_admin();
        $this->load->view('adminn/login');
    }
    
    public function login_action()
        {
            $usernamess = $this->input->post('usernam');
            $passwordss = $this->input->post('pass');
            $where = array(
                'username' => $usernamess,
                'password' => $passwordss
            );

            $cek = $this->model_system->cek_login_admin("admin", $where)->num_rows();

            if ($cek > 0) {
                $data_session = array(
                    'username' => $usernamess,
                    'status' => 'login'
                );

                $this->session->set_userdata($data_session);
                if ($this->session->userdata('status') == 'login') {
                    header("location:" . base_url() . 'Dashboard/admindashboard');
                } else {
                    echo 'Login Gagal';
                }
            } else {
                echo 'username dan Password Salah !';
            }
        }
}
?>