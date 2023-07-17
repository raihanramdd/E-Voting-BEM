<?php
defined('BASEPATH') or exit('No direct scipt access allowed');


class UserModel extends CI_Model
{
    public function getUser()
    {
       
        $this->db->select('*, user.id as id_user, user.nama as nama_user, kelas.nama as nama_kelas');
        $this->db->from('user');
        $this->db->join('kelas', 'kelas.id = user.id_kelas', 'left');
        return $this->db->get();
    }
    
    public function simpan() 
    {
        $data = [
            'id_kelas' => $this->input->post('id_kelas'),
            'nama' => $this->input->post('nama', true),
            'npm' => $this->input->post('npm'),
            'email' => $this->input->post('email', true),
            'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            'level' => $this->input->post('id_kelas')
        ];
        $this->db->insert('user', $data);
    }

    public function update()
    {
        $data = [
            'id' => $this->input->post('id'),
            'id_kelas' => $this->input->post('id_kelas'),
            'nama' => $this->input->post('nama', true),
            'npm' => $this->input->post('npm'),
            'email' => $this->input->post('email', true),
            'level' => $this->input->post('level', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }
}
    