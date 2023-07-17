<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller

{
    // validasi agar hanya admin yang bisa akses halaman admin (dashboard)
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KelasModel');
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
    } 


    public function index()
    {
        $data['title'] = 'Kelas';
        $data['rows'] = $this->db->get('kelas')->result();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/kelas', $data);
        $this->load->view('templates/admin_footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kelas';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/kelas_tambah', $data);
        $this->load->view('templates/admin_footer');
    }

    public function simpan()
    {
        $this->KelasModel->simpan();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-warning alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Berhasil disimpan</h4>
              </div>
            ');
            redirect('admin/kelas');
        }
    }
    
    public function edit($id)
    {
        $data['title'] = 'Edit Kelas';
        $data['row'] = $this->db->get_where('kelas', ['id' => $id])->row(); // mengambil data yang sesuai kita pilih 
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/kelas_edit', $data);
        $this->load->view('templates/admin_footer');
    }

    public function update()
    {
        $this->KelasModel->update();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-warning alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Berhasil diupdate</h4>
              </div>
            ');
            redirect('admin/kelas');
        }
    }

    public function hapus($id)
    {
        $this->db->delete('kelas', ['id' => $id]);
        if ($this->db->affected_rows() > 0) { 
            $this->session->set_flashdata('message', '
            <div class="alert alert-warning alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Berhasil Dihapus</h4>
              </div>
            ');
            redirect('admin/kelas');
        }
        
        else {
            $this->session->set_flashdata('message', '');
        }
        
    }
}