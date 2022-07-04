<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_detail extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_detail');
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
            $data['title'] = 'Kelas';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();

            $this->db->order_by('id', 'desc');
            $data['get_jurusan'] = $this->db->get('jurusan')->result_array();
            $data['get_id_kelas'] = $this->db->get('kelas')->result_array();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('kelas-detail', $data, FALSE);
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
            $data['title'] = 'Tambah Nama Kelas';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_id_kelas'] = $this->db->get('kelas')->result_array();

            $this->m_detail->validasi();

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('kelas-detail', $data, FALSE);
                $this->load->view('template/footer', $data, FALSE);
            } else {
                $this->m_detail->tambah();
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
                redirect('kelas/kelas_detail', 'refresh');
            }
        }
    }

    public function edit()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {
            $data['title'] = 'Tambah Nama Kelas';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_id_kelas'] = $this->db->get('kelas')->result_array();

            $this->m_detail->validasi();

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('kelas-detail', $data, FALSE);
                $this->load->view('template/footer', $data, FALSE);
            } else {
                $this->m_detail->edit();
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
                redirect('kelas/kelas_detail', 'refresh');
            }
        }
    }

    public function hapus_all()
    {
        $id = $_POST['id'];
        $this->m_detail->delete($id);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Semua data nama kelas berhasil dihapus!"
                })
            })'
        );
        redirect('kelas/kelas_detail');
    }

    public function hapus($id)
    {
        $this->db->delete('jurusan', ['id' => $id]);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Data nama kelas berhasil dihapus!"
                })
            })'
        );
        redirect('kelas/kelas_detail', 'refresh');
    }
}

/* End of file Kelas_detail.php */
