<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_kelas extends CI_Model
{
    public function get_kelas()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('kelas');
        return $query->result_array();
    }

    public function tambah_kelas($data)
    {
        $this->db->insert('kelas', $data);
    }

    public function update_kelas($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('kelas', $data);
    }

    public function delete_kelas($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kelas');
    }
    public function get_all_siswa()
    {
        $query =
            " SELECT `tempati`.*, `siswa`.`nama`, `siswa`.`nis`, `siswa`.`jenis_kelamin`, `kelas`.`nm_kelas`, `jurusan`.`nama_kelas` 
                FROM `tempati` 
                JOIN `siswa` ON `tempati`.`nisn` = `siswa`.`nis_nasional`
                JOIN `kelas` ON `tempati`.`id_kelas` = `kelas`.`id`
                JOIN `jurusan` ON `tempati`.`id_jurusan` = `jurusan`.`id`
                ORDER BY `tempati`.`id_tempati` DESC
                ";
        return $this->db->query($query)->result_array();
    }

    public function tambah()
    {
        $data = [
            'id_kelas' => $this->input->post('id_kelas'),
            'id_jurusan' => $this->input->post('id_jurusan'),
            'nisn' => $this->input->post('nisn'),
            'tahun_ajar' => $this->input->post('tahun_ajar')
        ];
        return $this->db->insert('tempati', $data);
    }

    public function edit($id)
    {
        $data = [
            'id_kelas' => $this->input->post('id_kelas'),
            'id_jurusan' => $this->input->post('id_jurusan'),
            'nisn' => $this->input->post('nisn'),
            'tahun_ajar' => $this->input->post('tahun_ajar')
        ];
        $this->db->where('id_tempati', $id);
        return $this->db->update('tempati', $data);
    }

    public function delete($id)
    {
        $this->db->where_in('id_tempati', $id);
        $this->db->delete('tempati');
    }

    public function validasi()
    {
        $this->form_validation->set_rules('id_kelas', 'kelas', 'trim|required');
        $this->form_validation->set_rules('id_jurusan', 'jurusan', 'trim|required');
        $this->form_validation->set_rules('nisn', 'nis', 'trim|required');
        $this->form_validation->set_rules('tahun_ajar', 'tahun ajar', 'trim|required');
    }
}

/* End of file m_kelas.php */
