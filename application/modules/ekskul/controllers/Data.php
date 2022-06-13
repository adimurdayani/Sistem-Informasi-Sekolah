<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_ekskul');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        } else {
            $data['title'] = 'Nilai Ekstrakulrikuler';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_ekskul'] = $this->m_ekskul->get_all_ekskul();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('ekstrakurikuler', $data, FALSE);
            $this->load->view('template/footer', $data, FALSE);
        }
    }

    public function tambah()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else {
            $data['title'] = 'Tambah Nilai Ekskul';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_siswa'] = $this->m_ekskul->get_all_siswa();
            $data['get_ekskul'] = $this->db->get('ekskul')->result_array();

            $this->m_ekskul->validasi();

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('tambah', $data, FALSE);
            } else {
                $this->m_ekskul->tambah();
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
                redirect('ekskul/data', 'refresh');
            }
        }
    }

    public function edit($id)
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else {
            $data['title'] = 'Edit Nilai Ekstrakurikuler';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();

            $data['get_siswa'] = $this->m_ekskul->get_all_siswa();
            $data['get_ekskul'] = $this->db->get('ekskul')->result_array();
            $data['get_nilai'] = $this->db->get_where('nilai_ekskul', ['id_nilaiekskul' => $id])->row_array();

            $this->m_ekskul->validasi();

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('edit', $data, FALSE);
            } else {
                $getid = $this->input->post('id_nilaiekskul');
                $this->m_ekskul->edit($getid);
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
                redirect('ekskul/data', 'refresh');
            }
        }
    }

    public function hapus_all()
    {
        $id = $_POST['id_nilaiekskul'];
        $this->m_ekskul->delete($id);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Semua data berhasil dihapus!"
                })
            })'
        );
        redirect('ekskul/data');
    }

    public function hapus($id)
    {
        $this->db->delete('nilai_ekskul', ['id_nilaiekskul' => $id]);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Data berhasil dihapus!"
                })
            })'
        );
        redirect('ekskul/data', 'refresh');
    }
}

/* End of file Kelas_siswa.php */
