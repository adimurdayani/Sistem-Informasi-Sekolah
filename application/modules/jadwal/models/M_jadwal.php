<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_jadwal extends CI_Model
{

    public function get_all_guru()
    {
        $query =
            " SELECT *
                FROM `ajar` 
                JOIN `guru` ON `ajar`.`id_guru` = `guru`.`id_guru`
                JOIN `pelajaran` ON `ajar`.`id_pelajaran` = `pelajaran`.`id_pelajaran`
                ORDER BY `ajar`.`id_ajar` DESC
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_all_guru_id($id)
    {
        $query =
            " SELECT *
                FROM `ajar` 
                JOIN `guru` ON `ajar`.`id_guru` = `guru`.`id_guru`
                JOIN `pelajaran` ON `ajar`.`id_pelajaran` = `pelajaran`.`id_pelajaran`
                WHERE `ajar`.`id_ajar` = $id
                ORDER BY `ajar`.`id_ajar` DESC
                ";
        return $this->db->query($query)->row_array();
    }

    public function tambah()
    {
        $data = [
            'id_kelas' => $this->input->post('id_kelas'),
            'semester' => $this->input->post('semester'),
            'hari' => $this->input->post('hari'),
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_selesai' => $this->input->post('jam_selesai'),
            'sesi' => $this->input->post('sesi'),
            'id_ajar' => $this->input->post('id_ajar'),
            'tahun_ajar' => $this->input->post('tahun_ajar'),
        ];
        return $this->db->insert('jadwal', $data);
    }

    public function edit($id)
    {
        $data = [
            'id_kelas' => $this->input->post('id_kelas'),
            'semester' => $this->input->post('semester'),
            'hari' => $this->input->post('hari'),
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_selesai' => $this->input->post('jam_selesai'),
            'sesi' => $this->input->post('sesi'),
            'id_ajar' => $this->input->post('id_ajar'),
            'tahun_ajar' => $this->input->post('tahun_ajar'),
        ];
        $this->db->where('id', $id);
        return $this->db->update('jadwal', $data);
    }

    public function edit_waktu($id)
    {
        $data = [
            'hari' => $this->input->post('hari'),
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_selesai' => $this->input->post('jam_selesai'),
        ];
        $this->db->where('id', $id);
        return $this->db->update('jadwal', $data);
    }

    public function delete($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('jadwal');
    }

    public function validasi()
    {
        $this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
        $this->form_validation->set_rules('semester', 'semester', 'trim|required');
        $this->form_validation->set_rules('tahun_ajar', 'tahun ajar', 'trim|required');
        $this->form_validation->set_rules('id_ajar', 'id ajar', 'trim|required');
    }
}

/* End of file m_jadwal.php */
