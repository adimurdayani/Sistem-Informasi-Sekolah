<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_staf extends CI_Model
{

    public function tambah()
    {
        $data = [
            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'agama' => $this->input->post('agama'),
            'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
            'email' => $this->input->post('email'),
            'telpon' => $this->input->post('telpon'),
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'id_user' => $this->input->post('id_user')
        ];
        return $this->db->insert('staf', $data);
    }

    public function edit($id)
    {
        $data = [
            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'agama' => $this->input->post('agama'),
            'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
            'email' => $this->input->post('email'),
            'telpon' => $this->input->post('telpon'),
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'id_user' => $this->input->post('id_user')
        ];
        $this->db->where('id_staf', $id);
        return $this->db->update('staf', $data);
    }

    public function delete($id)
    {
        $this->db->where_in('id_staf', $id);
        $this->db->delete('staf');
    }

    public function validasi()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('nip', 'nip', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
        $this->form_validation->set_rules('pendidikan_terakhir', 'pendidikan terkahir', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('telpon', 'telepon', 'trim|required');
        $this->form_validation->set_rules('tgl_masuk', 'tanggal masuk', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'tanggal lahir', 'trim|required');
    }
}

/* End of file M_staf.php */
