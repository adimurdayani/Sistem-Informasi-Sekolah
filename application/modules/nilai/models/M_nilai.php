<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_nilai extends CI_Model
{
    public function get_pelajaran()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('pelajaran');
        return $query->result_array();
    }

    public function tambah_pelajaran($data)
    {
        $this->db->insert('pelajaran', $data);
    }

    public function update_pelajaran($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('pelajaran', $data);
    }

    public function delete_pelajaran($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pelajaran');
    }
    public function get_all_nilai()
    {
        $query =
            " SELECT `nilai`.*, `kelas`.`nm_kelas`,`pelajaran`.`deskripsi`, `siswa`.`nama`, `siswa`.`nis_nasional`, `siswa`.`jenis_kelamin`
                FROM `nilai` 
                JOIN `kelas` ON `nilai`.`id_kelas` = `kelas`.`id`
                JOIN `pelajaran` ON `nilai`.`id_pelajaran` = `pelajaran`.`id`
                JOIN `siswa` ON `nilai`.`id_siswa` = `siswa`.`id_siswa`
                ORDER BY `nilai`.`id` DESC
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_all_nilai_id($id)
    {
        $query =
            " SELECT `nilai`.*, `kelas`.`nm_kelas`,`pelajaran`.`deskripsi`, `siswa`.`nama`, `siswa`.`nis_nasional`, `siswa`.`jenis_kelamin`
                FROM `nilai` 
                JOIN `kelas` ON `nilai`.`id_kelas` = `kelas`.`id`
                JOIN `pelajaran` ON `nilai`.`id_pelajaran` = `pelajaran`.`id`
                JOIN `siswa` ON `nilai`.`id_siswa` = `siswa`.`id_siswa`
                WHERE `nilai`.`id` = $id
                ORDER BY `nilai`.`id` DESC
                ";
        return $this->db->query($query)->row_array();
    }

    public function tambah()
    {
        $data = [
            'id_siswa' => $this->input->post('id_siswa'),
            'id_kelas' => $this->input->post('id_kelas'),
            'semester' => $this->input->post('semester'),
            'id_pelajaran' => $this->input->post('id_pelajaran'),
            'tahun_ajar' => $this->input->post('tahun_ajar'),
            'nilai' => $this->input->post('nilai'),
        ];
        return $this->db->insert('nilai', $data);
    }

    public function edit($id)
    {
        $data = [
            'id_siswa' => $this->input->post('id_siswa'),
            'id_kelas' => $this->input->post('id_kelas'),
            'semester' => $this->input->post('semester'),
            'id_pelajaran' => $this->input->post('id_pelajaran'),
            'tahun_ajar' => $this->input->post('tahun_ajar'),
            'nilai' => $this->input->post('nilai'),
        ];
        $this->db->where('id', $id);
        return $this->db->update('nilai', $data);
    }

    public function delete($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('nilai');
    }

    public function validasi()
    {
        $this->form_validation->set_rules('id_siswa', 'id pelajaran', 'trim|required');
        $this->form_validation->set_rules('id_kelas', 'id guru', 'trim|required');
        $this->form_validation->set_rules('semester', 'semester', 'trim|required');
        $this->form_validation->set_rules('tahun_ajar', 'tahun ajar', 'trim|required');
        $this->form_validation->set_rules('nilai', 'nilai', 'trim|required');
        $this->form_validation->set_rules('id_pelajaran', 'pelajaran', 'trim|required');
    }
}

/* End of file m_kelas.php */
