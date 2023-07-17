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
        $data['title'] = 'Auth';
        $data['kelas'] = $this->db->get('kelas')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('auth', $data);
        $this->load->view('templates/footer');
    }

    // fungsi untuk form registrasi
    public function registrasi() 

    {
        // perintah ketika ingin mengisi form dan tidak sesuai atau tidak lengkap akan ada warning required
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => '%s masih kosong' 
        ]);

        $this->form_validation->set_rules('npm', 'Npm', 'trim|required|is_unique[user.npm]', [
            'required' => '%s masih kosong',
            'is_unique' => '%s sudah terpakai'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[user.email]', [
            'required' => '%s masih kosong',
            'is_unique' => '%s sudah terpakai'
            
        ]);

        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => '%s masih kosong' 
        ]);
        //perintah untuk validasi
        if ($this->form_validation->run() == FALSE) {
            $this->index();

        } else {
            //perintah masukin inputan ke database
            $data = [
                'id_kelas' => $this->input->post('id_kelas', true),
                'nama' => $this->input->post('nama', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                'npm' => $this->input->post('npm', true),
                'level' => 'siswa'
            ];
            // warning ketika akun berhasil dibuat
            $this->db->insert('user', $data);
            if ($this->db->affected_rows() > 0) {
                echo "<script>
                    alert('Akun Berhasil Dibuat');
                    window.location.href = '".site_url('auth'). "';
                </script>";
            }

        }
    }

    public function login()

    {
        //logika ngecek email
        $cek_email = $this->db->get_where('user', ['npm' => $this->input->post('npm1', true)])->row();

        //jika emailnya ada
        if ($cek_email) { 
            //mencocokkan jika pasword sama
            if(password_verify($this->input->post('password1'), $cek_email->password)) {

                //mengecek yang login ia admin atau user
                //ini ngecek admin atau bukan
                if ($cek_email->level == 'admin') { // admin
                
                    $data_session = [
                        'id' => $cek_email->id,
                        'nama' => $cek_email->nama,
                        'level' => $cek_email->level,
                    ];

                    $this->session->set_userdata($data_session);
                    redirect('admin/dashboard');

                // ini jika user yang login 
                } else {                             // USER
                    $data_session = [
                        'id' => $cek_email->id,
                        'nama' => $cek_email->nama,
                        'level' => $cek_email->level,
                    ];

                    $this->session->set_userdata($data_session);
                    redirect('home');
                }

            // jika tidak
            } else {
                echo "<script>
                    alert('Password anda salah');
                    window.location.href = '".site_url('auth'). "';
                </script>";
            }

        //jika emailnya tidak ada
        } else { 
            echo "<script>
                alert('NPM anda salah');
                window.location.href = '".site_url('auth'). "';
            </script>";
        }
        
    }

    //method untuk logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}