<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_ajar extends CI_Model
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

    public function tambah()
    {
        $data = [
            'id_pelajaran' => $this->input->post('id_pelajaran'),
            'id_guru' => $this->input->post('id_guru'),
            'tahun_ajar' => $this->input->post('tahun_ajar')
        ];
        return $this->db->insert('ajar', $data);
    }

    public function edit($id)
    {
        $data = [
            'id_pelajaran' => $this->input->post('id_pelajaran'),
            'id_guru' => $this->input->post('id_guru'),
            'tahun_ajar' => $this->input->post('tahun_ajar')
        ];
        $this->db->where('id_ajar', $id);
        return $this->db->update('ajar', $data);
    }

    public function delete($id)
    {
        $this->db->where_in('id_ajar', $id);
        $this->db->delete('ajar');
    }

    public function validasi()
    {
        $this->form_validation->set_rules('id_pelajaran', 'id pelajaran', 'trim|required');
        $this->form_validation->set_rules('id_guru', 'id guru', 'trim|required');
        $this->form_validation->set_rules('tahun_ajar', 'tahun ajar', 'trim|required');
    }
}

/* End of file m_kelas.php */
