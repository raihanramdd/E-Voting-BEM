<?php
defined('BASEPATH') or exit('No direct scipt access allowed');


class KelasModel extends CI_Model
{
    public function simpan()
    {
    $kelas = $this->input->post('nama', true);
    $data = [];
    foreach ($kelas as $key => $value) {
        $data[] = [
            'nama' => $kelas[$key]
        ];
    
    }
    $this->db->insert_batch('kelas', $data);
}

    public function update()
    {
        $data = ['nama' => $this->input->post('nama', true)];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kelas', $data);
    }
}