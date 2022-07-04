<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_siswa extends CI_Model
{

    public function tambah()
    {
        $data = [
            'tahun' => $this->input->post('tahun'),
            'jumlah' => $this->input->post('jumlah'),
        ];
        return $this->db->insert('tb_alumni', $data);
    }

    public function edit($id)
    {
        $data = [
            'tahun' => $this->input->post('tahun'),
            'jumlah' => $this->input->post('jumlah'),
        ];
        $this->db->where('id', $id);
        return $this->db->update('tb_alumni', $data);
    }

    public function delete($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('tb_alumni');
    }

    public function validasi()
    {
        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'jumlah alumni', 'trim|required');
    }
}

/* End of file M_siswa.php */
