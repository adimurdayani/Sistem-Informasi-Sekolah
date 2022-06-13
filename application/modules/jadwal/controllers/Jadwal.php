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
                // $this->m_jadwal->tambah_detail();

                $jml = $this->db->get('jadwal')->num_rows();
                if (!isset($_POST['hari'])) {
                    $this->session->set_flashdata(
                        'error',
                        '$(document).ready(function(e) {
                            Swal.fire({
                                icon: "error",
                                type: "error",
                                title: "Oops...",
                                text: "Pilih minal satu hari!"
                            })
                        })'
                    );
                    redirect('jadwal/tambah', 'refresh');
                } else {
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
                    $this->db->insert_batch('detail_jadwal', $get_data);
                }

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
            $data['get_ajar'] = $this->db->get_where('ajar', ['id_ajar' => $data['get_jadwal']['id_ajar']])->row_array();
            $data['get_pelajaran'] = $this->db->get_where('pelajaran', ['id_pelajaran' => $data['get_ajar']['id_pelajaran']])->row_array();
            $data['get_detail'] = $this->db->get_where('detail_jadwal', ['id_jadwal' => $data['get_jadwal']['id_jadwal']])->row_array();

            $this->m_jadwal->validasi();
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data, FALSE);
                $this->load->view('template/topbar', $data, FALSE);
                $this->load->view('template/sidebar', $data, FALSE);
                $this->load->view('edit', $data, FALSE);
            } else {

                $get_id = $this->input->post('id_jadwal');
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
    public function hapus_all()
    {
        $id = $_POST['id_jadwal'];
        $this->db->where_in($id);
        $this->db->delete('detail_jadwal');
        $this->m_jadwal->delete($id);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Semua data jadwal berhasil dihapus!"
                })
            })'
        );
        redirect('jadwal');
    }

    public function hapus($id)
    {
        $jadwal = $this->db->get_where('jadwal', ['id' => $id])->row_array();
        $this->db->delete('detail_jadwal', ['id_jadwal' => $jadwal['id_jadwal']]);

        $this->db->delete('jadwal', ['id' => $id]);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Data jadwal berhasil dihapus!"
                })
            })'
        );
        redirect('jadwal', 'refresh');
    }

    public function edit_detail()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else {
            $data['title'] = 'Edit Jadwal';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $this->form_validation->set_rules('jam', 'jam', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata(
                    'error',
                    '$(document).ready(function(e) {
                        Swal.fire({
                            icon: "error",
                            type: "error",
                            title: "Oops...",
                            text: "Data yang anda input masih ada yang kosong!"
                        })
                    })'
                );
                redirect('jadwal', 'refresh');
            } else {
                $get_id = $this->input->post('id_jadwal');
                $this->m_jadwal->edit_detail($get_id);
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

    public function tambah_detail_id()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else {
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $this->form_validation->set_rules('jam', 'jam', 'trim|required');
            $this->form_validation->set_rules('hari', 'hari', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata(
                    'error',
                    '$(document).ready(function(e) {
                        Swal.fire({
                            icon: "error",
                            type: "error",
                            title: "Oops...",
                            text: "Data yang anda input masih ada yang kosong. atau nama hari tidak boleh sama!"
                        })
                    })'
                );
                redirect('jadwal', 'refresh');
            } else {
                $this->m_jadwal->tambah_detail_id();
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
}

/* End of file Jadwal.php */
