<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_galeri extends CI_Model
{

    public function get_galeri()
    {
        $query =
            " SELECT `tb_galeri`.*,`tb_katgaleri`.`kategori`
                FROM `tb_galeri` 
                JOIN `tb_katgaleri` ON `tb_galeri`.`kategori_id` = `tb_katgaleri`.`id`
                ORDER BY `tb_galeri`.`id` DESC
                ";
        return $this->db->query($query)->result();
    }

    public function delete($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('tb_galeri');
    }
}

/* End of file m_galeri.php */
