<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_ekskul extends CI_Model
{
    public function get_ekskul()
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('ekskul');
        return $query->result_array();
    }

    public function tambah_ekskul($data)
    {
        $this->db->insert('ekskul', $data);
    }

    public function update_ekskul($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('ekskul', $data);
    }

    public function delete_ekskul($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ekskul');
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

    public function get_all_ekskul()
    {
        $query =
            " SELECT `nilai_ekskul`.*, `ekskul`.`nm_ekskul`
                FROM `nilai_ekskul` 
                JOIN `ekskul` ON `nilai_ekskul`.`id_ekskul` = `ekskul`.`id_ekskul`
                ORDER BY `nilai_ekskul`.`id_nilaiekskul` DESC
                ";
        return $this->db->query($query)->result_array();
    }

    public function tambah()
    {
        $data = [
            'id_ekskul' => $this->input->post('id_ekskul'),
            'id_tempati' => $this->input->post('id_tempati'),
            'tahun_ajar' => $this->input->post('tahun_ajar')
        ];
        return $this->db->insert('nilai_ekskul', $data);
    }

    public function edit($id)
    {
        $data = [
            'id_ekskul' => $this->input->post('id_ekskul'),
            'id_tempati' => $this->input->post('id_tempati'),
            'tahun_ajar' => $this->input->post('tahun_ajar')
        ];
        $this->db->where('id_nilaiekskul', $id);
        return $this->db->update('nilai_ekskul', $data);
    }

    public function delete($id)
    {
        $this->db->where_in('id_nilaiekskul', $id);
        $this->db->delete('nilai_ekskul');
    }

    public function validasi()
    {
        $this->form_validation->set_rules('id_ekskul', 'id ekskul', 'trim|required');
        $this->form_validation->set_rules('id_tempati', 'siswa', 'trim|required');
        $this->form_validation->set_rules('tahun_ajar', 'tahun ajar', 'trim|required');
    }
}

/* End of file m_kelas.php */
