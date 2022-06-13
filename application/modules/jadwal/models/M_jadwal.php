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

    public function tambah()
    {
        $jadwal = $this->db->get('jadwal')->num_rows();
        $jml_jadwal = $jadwal + 1;
        $data = [
            'id_kelas' => $this->input->post('id_kelas'),
            'semester' => $this->input->post('semester'),
            'id_jadwal' => $jml_jadwal,
            'id_ajar' => $this->input->post('id_ajar'),
            'tahun_ajar' => $this->input->post('tahun_ajar'),
        ];
        return $this->db->insert('jadwal', $data);
    }

    public function tambah_detail()
    {
        $jml = $this->db->get('jadwal')->num_rows();
        $hari = $_POST['hari'];
        $jam = $_POST['jam'];
        $get_data = array();
        $index = 0;
        foreach ($hari as $jadwal) {
            array_push($get_data, array(
                'id_jadwal' => $jml,
                'hari' => $hari[$index],
                'jam' => $jam[$index]
            ));
            $index++;
        }
        return $this->db->insert_batch('detail_jadwal', $get_data);
    }

    public function edit($id)
    {
        $jadwal = $this->db->get('jadwal')->num_rows();
        $jml_jadwal = $jadwal + 1;
        $data = [
            'id_kelas' => $this->input->post('id_kelas'),
            'semester' => $this->input->post('semester'),
            'id_jadwal' => $jml_jadwal,
            'id_ajar' => $this->input->post('id_ajar'),
            'tahun_ajar' => $this->input->post('tahun_ajar'),
        ];
        $this->db->where('id_jadwal', $id);
        return $this->db->update('jadwal', $data);
    }

    public function edit_detail($id)
    {
        $data = [
            'jam' => $this->input->post('jam'),
        ];
        $this->db->where('id_jadwal', $id);
        return $this->db->update('detail_jadwal', $data);
    }

    public function tambah_detail_id()
    {
        $data = [
            'id_jadwal' => $this->input->post('id_jadwal'),
            'hari' => $this->input->post('hari'),
            'jam' => $this->input->post('jam'),
        ];
        return $this->db->insert('detail_jadwal', $data);
    }

    public function delete($id)
    {
        $this->db->where_in('id_jadwal', $id);
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
