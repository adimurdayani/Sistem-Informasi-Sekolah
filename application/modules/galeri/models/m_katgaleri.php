<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_katgaleri extends CI_Model
{

    public function get_kategori()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('tb_katgaleri');
        return $query->result_array();
    }

    public function tambah_kategori($data)
    {
        $this->db->insert('tb_katgaleri', $data);
    }

    public function update_kategori($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_katgaleri', $data);
    }

    public function delete_kategori($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_katgaleri');
    }
}

/* End of file m_katgaleri.php */
