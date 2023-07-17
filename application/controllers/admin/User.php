<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller

{
    // validasi agar hanya admin yang bisa akses halaman admin (dashboard)
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
    } 


    public function index()
    {
        $data['title'] = 'User';
        $data['rows'] = $this->UserModel->getUser()->result();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/user', $data);
        $this->load->view('templates/admin_footer');
    } 

    public function tambah()
    {
        $data['title'] = 'Tambah User';
        $data['kelas'] = $this->db->get('kelas')->result();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/user_tambah', $data);
        $this->load->view('templates/admin_footer');
    } 

    public function simpan()
    {
        $this->UserModel->simpan();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-warning alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Berhasil diupdate</h4>
              </div>
            ');
            redirect('admin/user');
        }
    }
    
    public function edit($id)
    {
        $data['title'] = 'Edit User';
        $data['kelas'] = $this->db->get('kelas')->result();
        $data['row'] = $this->db->get_where('user', ['id' => $id])->row(); // mengambil data yang sesuai kita pilih 
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/user_edit', $data);
        $this->load->view('templates/admin_footer');
    }

    public function update()
    {
        $this->UserModel->update();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-warning alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Berhasil diupdate</h4>
              </div>
            ');
            redirect('admin/user');
        }
    }

    public function hapus($id)
    {
        $this->db->delete('user', ['id' => $id]);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-warning alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Berhasil diupdate</h4>
              </div>
            ');
            redirect('admin/user');
        }
    }
}