<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_walikelas extends CI_Model
{

    public function get_all_guru()
    {
        $query =
            " SELECT `walikelas`.*, `guru`.`nip`,`guru`.`nama`,`guru`.`nama`,`guru`.`jenis_kelamin`,`guru`.`pendidikan_terakhir`,`guru`.`agama`,`guru`.`jabatan`,`guru`.`golongan`,`kelas`.`nm_kelas`
                FROM `walikelas` 
                JOIN `guru` ON `walikelas`.`id_guru` = `guru`.`id_guru`
                JOIN `kelas` ON `walikelas`.`id_kelas` = `kelas`.`id_kelas`
                ORDER BY `walikelas`.`id` DESC
                ";
        return $this->db->query($query)->result_array();
    }

    public function tambah()
    {
        $data = [
            'id_kelas' => $this->input->post('id_kelas'),
            'id_guru' => $this->input->post('id_guru'),
            'tahun_ajar' => $this->input->post('tahun_ajar')
        ];
        return $this->db->insert('walikelas', $data);
    }

    public function edit($id)
    {
        $data = [
            'id_kelas' => $this->input->post('id_kelas'),
            'id_guru' => $this->input->post('id_guru'),
            'tahun_ajar' => $this->input->post('tahun_ajar')
        ];
        $this->db->where('id', $id);
        return $this->db->update('walikelas', $data);
    }

    public function delete($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('walikelas');
    }

    public function validasi()
    {
        $this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
        $this->form_validation->set_rules('id_guru', 'id guru', 'trim|required');
        $this->form_validation->set_rules('tahun_ajar', 'tahun ajar', 'trim|required');
    }
}

/* End of file m_kelas.php */
