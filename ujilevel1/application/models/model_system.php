<?php

Class model_system extends CI_Model{
    //proses registrasi masuk db
    public function register_db(){
        $data = array(
            'id_user' => "",
            'username' => $this->input->post('user'),
            'password' => $this->input->post('pw'),
            'nama_user' => $this->input->post('name'),
            'tanggal_lahir' => $this->input->post('tanggallahir'),
            'alamat' => $this->input->post('address'),

        );
        $this->db->insert('user', $data);
    }
    public function get_user(){
        $data = $this->db->get('user');
        return $data->result();
    }

    public function count_user(){
        $data = $this->db->get('user');
        return $data->num_rows();
    }

    public function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function get_makanan(){
        $data = $this->db->get('masakan');
        return $data->result();
    }

    public function count_makanan(){
        $data = $this->db->get('masakan');
        return $data->num_rows();
    }

    public function tambah_food(){
            
        $id = $this->input->post('idd');
        $nama = $this->input->post('food');
        $harga = $this->input->post('price');
        $status = $this->input->post('stat');
        $foto =  $_FILES['files'];
        if ($foto = '') {
            # kosong...
        }else{
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('files')) {
                echo "Gagal"; die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'id_masakan' => $id,
            'nama_masakan' => $nama,
            'harga' => $harga,
            'status_masakan' => $status,
            'foto' => $foto
        );


    $this->db->insert('masakan', $data);
    header("Location:" . base_url('Dashboard/adminmakanan'));
    }

    public function edit_food(){
            
        $id = $this->input->post('idd');
        $nama = $this->input->post('masakan');
        $harga = $this->input->post('hargaa');
        $status = $this->input->post('statuss');
        $foto =  $_FILES['filess'];
        if ($foto = '') {
            # kosong...
        }else{
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('filess')) {
                echo "Gagal"; die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'id_masakan' => $id,
            'nama_masakan' => $nama,
            'harga' => $harga,
            'status_masakan' => $status,
            'foto' => $foto
        );


    $this->db->update('masakan', $data);
    header("Location:" . base_url('Dashboard/adminmakanan'));
    }

    public function hapus_datamakanan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function insertTable($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function readColumnTable($table, $where)
    {
        return $this->db->get_where($table, $where)->row();
    }

    public function insertBatchTable($table, $data)
    {
        $this->db->insert_batch($table, $data);
    }


    // public function cart_db()
    // {
    //     $id = $this->input->post('id');
    //     $data = array(
    //         '' => ,
    //     );
    //     $this->db->insert('order', $data)
    // }

    public function register_admin(){
        $data = array(
            'id_admin' => "",
            'username' => $this->input->post('user'),
            'password' => $this->input->post('pw'),
            'nama_admin' => $this->input->post('name'),
            'tanggal_lahir' => $this->input->post('tanggallahir'),
            'alamat' => $this->input->post('address'),

        );
        $this->db->insert('admin', $data);
        header("Location:" . base_url('dashboard/login_admin'));
    }

    public function get_admin(){
        $data = $this->db->get('admin');
        return $data->result();
    }

    public function count_admin(){
        $data = $this->db->get('admin');
        return $data->num_rows();
    }

    public function cek_login_admin($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
}
?>