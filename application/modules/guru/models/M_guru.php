<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_guru extends CI_Model
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
            'golongan' => $this->input->post('golongan'),
            'jabatan' => $this->input->post('jabatan'),
            'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
            'email' => $this->input->post('email'),
            'telpon' => $this->input->post('telpon'),
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'id_user' => $this->input->post('id_user')
        ];
        return $this->db->insert('guru', $data);
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
            'golongan' => $this->input->post('golongan'),
            'jabatan' => $this->input->post('jabatan'),
            'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
            'email' => $this->input->post('email'),
            'telpon' => $this->input->post('telpon'),
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'id_user' => $this->input->post('id_user')
        ];
        $this->db->where('id_guru', $id);
        return $this->db->update('guru', $data);
    }

    public function delete($id)
    {
        $this->db->where_in('id_guru', $id);
        $this->db->delete('guru');
    }

    public function validasi()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('nip', 'nip', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
        $this->form_validation->set_rules('golongan', 'golongan', 'trim|required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
        $this->form_validation->set_rules('pendidikan_terakhir', 'pendidikan terkahir', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('telpon', 'telepon', 'trim|required');
        $this->form_validation->set_rules('tgl_masuk', 'tanggal masuk', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'tanggal lahir', 'trim|required');
    }
}

/* End of file M_guru.php */
