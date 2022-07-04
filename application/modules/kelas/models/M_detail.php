<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_detail extends CI_Model
{

    public function tambah()
    {
        $data = [
            'nama_kelas' => $this->input->post('nama_kelas'),
            'id_kelas' => $this->input->post('id_kelas')
        ];
        return $this->db->insert('jurusan', $data);
    }

    public function edit()
    {
        $data = [
            'nama_kelas' => $this->input->post('nama_kelas'),
            'id_kelas' => $this->input->post('id_kelas')
        ];
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('jurusan', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('jurusan');
    }

    public function validasi()
    {
        $this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
        $this->form_validation->set_rules('nama_kelas', 'nama kelas', 'trim|required');
    }
}

/* End of file M_detail.php */
