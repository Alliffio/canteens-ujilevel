<?php

class Dashboard extends CI_Controller{
    public function __construct(){                                            
        parent::__construct();
        $this->load->model('model_system');
    }
    
    // user
    public function homeuser(){
        $this->load->view('template/user/header');
        $this->load->view('user/home');
        $this->load->view('template/user/footer');
    }

    public function keranjang(){
        $this->load->view('template/user/header');
        $this->load->view('user/keranjang');
        $this->load->view('template/user/footer');
    }

    public function contact(){
        $this->load->view('template/user/header');
        $this->load->view('user/kontak');
        $this->load->view('template/user/footer');
    }

    public function belanja(){
        $data['masakan'] = $this->model_system->get_makanan();
        $data['c_masakan'] = $this->model_system->count_makanan();
        $this->load->view('template/user/header');
        $this->load->view('user/menu', $data);
        $this->load->view('template/user/footer');
        
    }

    public function index(){
        if ($this->session->userdata('status') !='login') {
            redirect('dashboard/register');
        }
        else if ($this->session->userdata('status') =='login') {
            redirect('dashboard/homeuser');
        }
    }

    //untuk tampil halaman login
    public function login(){
        if ($this->session->userdata('status') =='login') {
            redirect('dashboard/login');
        }
        
        $this->load->view('template/login/header');
        $this->load->view('user/login');
        $this->load->view('template/login/footer');

    }

    public function register(){
        $this->load->view('user/register');
        $this->load->view('template/daftar/footer');
        $this->load->view('template/daftar/header');
    }

    public function simpan_register(){
        $this->model_system->register_db();
        $this->load->view('user/login');
    }

    public function simpan_keranjang()
    {
        $this->model_system->cart_db();
    }

    public function login_action()
    {
        $usernamess = $this->input->post('usernam');
        $passwordss = $this->input->post('pass');
        $where = array(
            'username' => $usernamess,
            'password' => $passwordss
        );

        $cek = $this->model_system->cek_login("user", $where)->num_rows();

        if ($cek > 0) {
            $data_session = array(
                'username' => $usernamess,
                'status' => 'login'
            );

            $this->session->set_userdata($data_session);
            if ($this->session->userdata('status') == 'login') {
                header("location:" . base_url() . 'Dashboard/homeuser');
            } else {
                echo 'Login Gagal';
            }
        } else {
            echo 'username dan Password Salah !';
        }
    }

    public function signout()
    {
        $this->session->sess_destroy();
        redirect(base_url('dashboard/login'));
    }

    //admin
    public function admindashboard(){
        $this->load->view('admin/dashboard');
    }

    public function adminmakanan(){
        $data['masakan'] = $this->model_system->get_makanan();
        $data['c_masakan'] = $this->model_system->count_makanan();
        $this->load->view('admin/tabelmakanan', $data);
    }

    public function adminuser(){
        $data['user'] = $this->model_system->get_user();
        $data['c_user'] = $this->model_system->count_user();
        $this->load->view('admin/tabeluser', $data);
    }

    public function dataadmin(){
        $data['admin'] = $this->model_system->get_admin();
        $data['c_admin'] = $this->model_system->count_admin();
        $this->load->view('admin/tabeladmin', $data);
    }

    public function tambahdata(){
        $this->load->view('admin/tambahdatafood');
    }
    
    public function hapus_makanan($id){
        $where = array('id_masakan' => $id);
        $this->model_system->hapus_datamakanan($where, 'masakan');
        redirect('dashboard/adminmakanan');
    }

    public function update_makanan(){
        $this->model_system->edit_food();
    }

    public function simpan_makanan(){
        $this->model_system->tambah_food();
    }
    



    public function index_admin(){
        if ($this->session->userdata('status') !='login') {
            redirect('dashboard/register_admin');
        }
        else if ($this->session->userdata('status') =='login') {
            redirect('dashboard/dataadmin');
        }
    }

    //untuk tampil halaman login
    public function login_admin(){
        if ($this->session->userdata('status') =='login') {
            redirect('adminn/login_admin');
        }
        
        $this->load->view('template/login/header');
        $this->load->view('admin/login');
        $this->load->view('template/login/footer');

    }

    public function register_admin(){
        $this->load->view('template/daftar/header');
        $this->load->view('admin/register');
        $this->load->view('template/daftar/footer');
    }
    
    public function simpan_register_admin(){
        $this->model_system->register_admin();
    }
    
    public function login_action_admin()
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
                    header("location:" . base_url() . 'Dashboard/dataadmin');
                } else {
                    echo 'Login Gagal';
                }
            } else {
                echo 'username dan Password Salah !';
            }
        }
}
?>

}
?>