<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visi_misi extends CI_Controller

{
    // validasi agar hanya admin yang bisa akses halaman admin (dashboard)
    public function __construct()
    {
        parent::__construct();
        $this->load->model('VisimisiModel');
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
    } 


    public function index()
    {
        $data['title'] = 'Visi & Misi';
        $data['rows'] = $this->VisimisiModel->getVisimisi()->result();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/visimisi', $data);
        $this->load->view('templates/admin_footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Visi & Misi';
        $data['kandidat'] = $this->db->get('kandidat')->result();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/visimisi_tambah', $data);
        $this->load->view('templates/admin_footer');
    }

    public function simpan()
    {
        $this->VisimisiModel->simpan();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-warning alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Berhasil disimpan</h4>
              </div>
            ');
            redirect('admin/visi_misi');
        }
    }
    
    public function edit($id)
    {
        $data['title'] = 'Edit Visi & Misi';
        $data['kandidat'] = $this->db->get('kandidat')->result();
        $data['row'] = $this->db->get_where('visimisi', ['id' => $id])->row(); // mengambil data yang sesuai kita pilih 
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/visimisi_edit', $data);
        $this->load->view('templates/admin_footer');
    }

    public function update()
    {
        $this->VisimisiModel->update();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-warning alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Berhasil diupdate</h4>
              </div>
            ');
            redirect('admin/visi_misi');
        }
    }

    public function hapus($id)
    {
        $this->db->delete('visimisi', ['id' => $id]);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', '
                <div class="alert alert-warning alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Berhasil Dihapus</h4>
              </div>
            ');
            redirect('admin/visi_misi');
        }
    }
}