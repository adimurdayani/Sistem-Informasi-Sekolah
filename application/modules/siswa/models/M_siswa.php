<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_siswa extends CI_Model
{

    public function tambah()
    {
        $data = [
            'nis' => $this->input->post('nis'),
            'nis_nasional' => $this->input->post('nis_nasional'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'agama' => $this->input->post('agama'),
            'alamat' => $this->input->post('alamat'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'tahun_keluar' => $this->input->post('tahun_keluar'),
            'alasan_keluar' => $this->input->post('alasan_keluar'),
            'anak_ke' => $this->input->post('anak_ke'),
            'nama_bapak' => $this->input->post('nama_bapak'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'pekerjaan_bapak' => $this->input->post('pekerjaan_bapak'),
            'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
            'pendidikan_bapak' => $this->input->post('pendidikan_bapak'),
            'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
            'alamat_bapak' => $this->input->post('alamat_bapak'),
            'alamat_ibu' => $this->input->post('alamat_ibu'),
            'email_ortu' => $this->input->post('email_ortu'),
            'telp_bapak' => $this->input->post('telp_bapak'),
            'telp_ibu' => $this->input->post('telp_ibu'),
            'telp_ibu' => $this->input->post('telp_ibu'),
            'nama_wali' => $this->input->post('nama_wali'),
            'alamat_wali' => $this->input->post('alamat_wali'),
            'telp_wali' => $this->input->post('telp_wali'),
            'hubungan_wali' => $this->input->post('hubungan_wali'),
            'id_user' => $this->input->post('id_user')
        ];
        return $this->db->insert('siswa', $data);
    }

    public function tambah_siswa()
    {
        $data = [
            'nis' => $this->input->post('nis'),
            'nis_nasional' => $this->input->post('nis_nasional'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'id_user' => 3
        ];
        return $this->db->insert('siswa', $data);
    }

    public function edit_siswa($id)
    {
        $data = [
            'nis' => $this->input->post('nis'),
            'nis_nasional' => $this->input->post('nis_nasional'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'id_user' => 3
        ];
        $this->db->where('id_siswa', $id);
        return $this->db->update('siswa', $data);
    }

    public function edit($id)
    {
        $data = [
            'nis' => $this->input->post('nis'),
            'nis_nasional' => $this->input->post('nis_nasional'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'agama' => $this->input->post('agama'),
            'alamat' => $this->input->post('alamat'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'tahun_keluar' => $this->input->post('tahun_keluar'),
            'alasan_keluar' => $this->input->post('alasan_keluar'),
            'anak_ke' => $this->input->post('anak_ke'),
            'nama_bapak' => $this->input->post('nama_bapak'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'pekerjaan_bapak' => $this->input->post('pekerjaan_bapak'),
            'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
            'pendidikan_bapak' => $this->input->post('pendidikan_bapak'),
            'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
            'alamat_bapak' => $this->input->post('alamat_bapak'),
            'alamat_ibu' => $this->input->post('alamat_ibu'),
            'email_ortu' => $this->input->post('email_ortu'),
            'telp_bapak' => $this->input->post('telp_bapak'),
            'telp_ibu' => $this->input->post('telp_ibu'),
            'telp_ibu' => $this->input->post('telp_ibu'),
            'nama_wali' => $this->input->post('nama_wali'),
            'alamat_wali' => $this->input->post('alamat_wali'),
            'telp_wali' => $this->input->post('telp_wali'),
            'hubungan_wali' => $this->input->post('hubungan_wali'),
            'id_user' => $this->input->post('id_user')
        ];
        $this->db->where('id_siswa', $id);
        return $this->db->update('siswa', $data);
    }

    public function delete($id)
    {
        $this->db->where_in('id_siswa', $id);
        $this->db->delete('siswa');
    }

    public function validasi()
    {
        $this->form_validation->set_rules('nis', 'nis', 'trim|required');
        $this->form_validation->set_rules('nis_nasional', 'nis nasional', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
    }
}

/* End of file M_siswa.php */
