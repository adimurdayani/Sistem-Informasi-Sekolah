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
            " SELECT *
                FROM `tempati` 
                JOIN `siswa` ON `tempati`.`nis` = `siswa`.`nis_nasional`
                JOIN `kelas` ON `tempati`.`id_kelas` = `kelas`.`id`
                ORDER BY `tempati`.`id_tempati` DESC
                ";
        return $this->db->query($query)->result_array();
    }

    public function tambah()
    {
        $data = [
            'id_kelas' => $this->input->post('id_kelas'),
            'nis' => $this->input->post('nis'),
            'tahun_ajar' => $this->input->post('tahun_ajar'),
            'no_absen' => $this->input->post('no_absen')
        ];
        return $this->db->insert('tempati', $data);
    }

    public function edit($id)
    {
        $data = [
            'id_kelas' => $this->input->post('id_kelas'),
            'nis' => $this->input->post('nis'),
            'tahun_ajar' => $this->input->post('tahun_ajar'),
            'no_absen' => $this->input->post('no_absen')
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
        $this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
        $this->form_validation->set_rules('nis', 'nis', 'trim|required');
        $this->form_validation->set_rules('tahun_ajar', 'tahun ajar', 'trim|required');
        $this->form_validation->set_rules('no_absen', 'nomor absen', 'trim|required');
    }
}

/* End of file m_kelas.php */
