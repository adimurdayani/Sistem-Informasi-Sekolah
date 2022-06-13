<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ajar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_ajar');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) {
            redirect('auth/block');
        } else {
            $data['title'] = 'Ajar (Guru Bidang Studi)';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_guru'] = $this->m_ajar->get_all_guru();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('ajar', $data, FALSE);
            $this->load->view('template/footer', $data, FALSE);
        }
    }

    public function tambah()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {
            $data['title'] = 'Tambah Guru Ajar';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_pelajaran'] = $this->db->get('pelajaran')->result_array();
            $data['get_guru'] = $this->db->get('guru')->result_array();

            $this->m_ajar->validasi();

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('tambah', $data, FALSE);
            } else {
                $this->m_ajar->tambah();
                $this->session->set_flashdata(
                    'success',
                    '$(document).ready(function(e) {
                        Swal.fire({
                            type: "success",
                            title: "Sukses",
                            text: "Data berhasil disimpan!"
                        })
                    })'
                );
                redirect('ajar', 'refresh');
            }
        }
    }

    public function edit($id)
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {
            $data['title'] = 'Edit Guru Ajar';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();

            $data['get_pelajaran'] = $this->db->get('pelajaran')->result_array();
            $data['get_guru'] = $this->db->get('guru')->result_array();
            $data['get_ajar'] = $this->db->get_where('ajar', ['id_ajar' => $id])->row_array();

            $this->m_ajar->validasi();

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('edit', $data, FALSE);
            } else {
                $getid = $this->input->post('id_ajar');
                $this->m_ajar->edit($getid);
                $this->session->set_flashdata(
                    'success',
                    '$(document).ready(function(e) {
                        Swal.fire({
                            type: "success",
                            title: "Sukses",
                            text: "Data berhasil diupdate!"
                        })
                    })'
                );
                redirect('ajar', 'refresh');
            }
        }
    }

    public function hapus_all()
    {
        $id = $_POST['id_ajar'];
        $this->m_ajar->delete($id);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Semua data ajar berhasil dihapus!"
                })
            })'
        );
        redirect('ajar');
    }

    public function hapus($id)
    {
        $this->db->delete('ajar', ['id_ajar' => $id]);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Data ajar berhasil dihapus!"
                })
            })'
        );
        redirect('ajar', 'refresh');
    }
}

/* End of file Kelas_siswa.php */
