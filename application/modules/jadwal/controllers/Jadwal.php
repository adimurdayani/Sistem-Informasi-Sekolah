<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jadwal');
    }


    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else {
            $data['title'] = 'Jadwal';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $this->db->order_by('id', 'desc');
            $data['get_jadwal'] = $this->db->get('jadwal')->result_array();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('index', $data, FALSE);
            $this->load->view('template/footer', $data, FALSE);
        }
    }

    public function tambah()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else {
            $data['title'] = 'Tambah Jadwal';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_kelas'] = $this->db->get('kelas')->result_array();
            $data['get_guru'] = $this->m_jadwal->get_all_guru();

            $this->m_jadwal->validasi();
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('tambah', $data, FALSE);
            } else {

                $this->m_jadwal->tambah();
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
                redirect('jadwal', 'refresh');
            }
        }
    }


    public function edit($id)
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else {
            $data['title'] = 'Edit Jadwal';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_kelas'] = $this->db->get('kelas')->result_array();
            $data['get_guru'] = $this->m_jadwal->get_all_guru();
            $data['get_jadwal'] = $this->db->get_where('jadwal', ['id' => $id])->row_array();
            $data['get_guru_id'] = $this->m_jadwal->get_all_guru_id($data['get_jadwal']['id_ajar']);

            $this->m_jadwal->validasi();
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('edit', $data, FALSE);
            } else {

                $get_id = $this->input->post('id');
                $this->m_jadwal->edit($get_id);
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
                redirect('jadwal', 'refresh');
            }
        }
    }
    public function edit_waktu()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else {
            $data['title'] = 'Edit Jadwal';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $this->db->order_by('id', 'desc');
            $data['get_jadwal'] = $this->db->get('jadwal')->result_array();

            $this->form_validation->set_rules('hari', 'hari', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('index', $data, FALSE);
                $this->load->view('template/footer', $data, FALSE);
            } else {

                $get_id = $this->input->post('id');
                $this->m_jadwal->edit_waktu($get_id);
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
                redirect('jadwal', 'refresh');
            }
        }
    }

    public function hapus_all()
    {
        $id = $_POST['id'];
        $this->db->where_in($id);
        $this->m_jadwal->delete($id);
        redirect('jadwal');
    }

    public function hapus($id)
    {
        $this->db->delete('jadwal', ['id' => $id]);
        redirect('jadwal', 'refresh');
    }
}

/* End of file Jadwal.php */
