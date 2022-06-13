<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kelas');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) {
            redirect('auth/block');
        } else {
            $data['title'] = 'Kelas';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_siswa'] = $this->m_kelas->get_all_siswa();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('kelas-siswa', $data, FALSE);
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
            $data['title'] = 'Tambah Siswa';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_kelas'] = $this->db->get('kelas')->result_array();
            $data['get_siswa'] = $this->db->get('siswa')->result_array();

            $this->m_kelas->validasi();

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('tambah', $data, FALSE);
                // $this->load->view('template/footer', $data, FALSE);
            } else {
                $this->m_kelas->tambah();
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
                redirect('kelas/kelas_siswa', 'refresh');
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
            $data['title'] = 'Edit Siswa';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_kelas'] = $this->db->get('kelas')->result_array();
            $data['get_tempati'] = $this->db->get_where('tempati', ['id_tempati' => $id])->row_array();
            $data['get_siswa'] = $this->db->get('siswa')->result_array();

            $this->m_kelas->validasi();

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('edit', $data, FALSE);
            } else {
                $getid = $this->input->post('id_tempati');
                $this->m_kelas->edit($getid);
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
                redirect('kelas/kelas_siswa', 'refresh');
            }
        }
    }

    public function hapus_all()
    {
        $id = $_POST['id_tempati'];
        $this->m_kelas->delete($id);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Semua data siswa berhasil dihapus!"
                })
            })'
        );
        redirect('kelas/kelas_siswa');
    }

    public function hapus($id)
    {
        $this->db->delete('tempati', ['id_tempati' => $id]);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Data siswa berhasil dihapus!"
                })
            })'
        );
        redirect('kelas/kelas_siswa', 'refresh');
    }
}

/* End of file Kelas_siswa.php */
