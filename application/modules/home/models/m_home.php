<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_home extends CI_Model
{

    public function get_berita($limit, $start, $keyword = null)
    {
        $this->db->select('*');
        $this->db->from('tb_berita');
        $this->db->join('users', 'tb_berita.user_id = users.id', 'left');
        if ($keyword) {
            $this->db->like('judul_berita', $keyword);
        }
        $this->db->order_by('tb_berita.id', 'desc');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    public function get_detail_berita($id)
    {
        $query =
            " SELECT `tb_berita`.*,`tb_kategori`.`kategori`, `users`.`first_name`
                FROM `tb_berita` 
                JOIN `tb_kategori` ON `tb_berita`.`kategori_id` = `tb_kategori`.`id`
                JOIN `users` ON `tb_berita`.`user_id` = `users`.`id`
                WHERE `tb_berita`.`id` = $id
                ";
        return $this->db->query($query)->row();
    }

    public function layanan()
    {
        $this->db->order_by('tb_layanan.id', 'desc');
        $this->db->limit(9);
        return $this->db->get('tb_layanan')->result();
    }

    public function berita()
    {
        $this->db->order_by('tb_berita.id', 'desc');
        $this->db->limit(3);
        return $this->db->get('tb_berita')->result();
    }

    public function get_layanan($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('tb_layanan');
        $this->db->order_by('tb_layanan.id', 'desc');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    public function berita_update()
    {
        $this->db->order_by('tb_berita.id', 'desc');
        $this->db->limit(2);
        return $this->db->get('tb_berita')->result();
    }

    public function tambah()
    {
        $data = [
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
            'id_user' => 3
        ];
        return $this->db->insert('siswa', $data);
    }
}


/* End of file m_berita.php */
