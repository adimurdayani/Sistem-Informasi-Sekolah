<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_galeri extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_katgaleri');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {
            $data['title'] = 'Galeri';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('kat_galeri', $data, FALSE);
        }
    }

    public function load_data_kat_galeri()
    {
        $data =  $this->m_katgaleri->get_kategori();
        echo json_encode($data);
    }

    public function tambah_kat_galeri()
    {
        $data = [
            'kategori' => $this->input->post('kategori'),
            'keterangan' => $this->input->post('keterangan'),
            'created_at' => date("d M Y")
        ];
        $this->m_katgaleri->tambah_kategori($data);
    }

    public function update_kat_galeri()
    {
        $data = [
            $this->input->post('table_column') => $this->input->post('value')
        ];
        $this->m_katgaleri->update_kategori($data, $this->input->post('id'));
    }

    public function delete_kat_galeri()
    {
        $this->m_katgaleri->delete_kategori($this->input->post('id'));
    }
}

/* End of file Kategori_galeri.php */
