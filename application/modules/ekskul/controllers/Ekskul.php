<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ekskul extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_ekskul');
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
            $data['title'] = 'Kategori Ekstrakurikuler';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('index', $data, FALSE);
        }
    }

    public function load_data()
    {
        $data =  $this->m_ekskul->get_ekskul();
        echo json_encode($data);
    }

    public function tambah()
    {
        $data = [
            'id_ekskul' => $this->input->post('id_ekskul'),
            'nm_ekskul' => $this->input->post('nm_ekskul')
        ];
        $this->m_ekskul->tambah_ekskul($data);
    }

    public function update()
    {
        $data = [
            $this->input->post('table_column') => $this->input->post('value')
        ];
        $this->m_ekskul->update_ekskul($data, $this->input->post('id'));
    }

    public function delete()
    {
        $this->m_ekskul->delete_ekskul($this->input->post('id'));
    }
}

/* End of file ekskul.php */
