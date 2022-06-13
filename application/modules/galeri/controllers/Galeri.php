<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_galeri');
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
            $data['get_galeri'] = $this->m_galeri->get_galeri();

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
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {
            $data['title'] = 'Tambah Galeri';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_kategori'] = $this->db->get('tb_katgaleri')->result();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('tambah', $data, FALSE);
            $this->load->view('template/footer', $data, FALSE);
        }
    }

    public function post()
    {
        $this->form_validation->set_rules('token', 'token', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "Gambar gagal disimpan!"
                    })
                })'
            );
            redirect('galeri/tambah', 'refresh');
        } else {

            $config['upload_path']    = './assets/backend/images/galeri/';
            $config['allowed_types']  = 'jpg|png|jpeg';
            $config['max_size']       = '1024';
            $config['encrypt_name']    = TRUE;

            $this->load->library('upload', $config);

            if (!empty($_FILES['img_galeri'])) {
                # code...
                $this->upload->do_upload('img_galeri');
                $data_img = $this->upload->data();
                $file_img = $data_img['file_name'];
            }

            $data = [
                'kategori_id' => $this->input->post('kategori_id'),
                'img_galeri' => $file_img,
                'keterangan' => $this->input->post('keterangan'),
                'created_at' => date("d M Y"),
                'updated_at' => date("d M Y"),
            ];

            $this->db->insert('tb_galeri', $data);
            $this->session->set_flashdata(
                'success',
                '$(document).ready(function(e) {
                    Swal.fire({
                        type: "success",
                        title: "Sukses",
                        text: "Gambar berhasil disimpan!"
                    })
                })'
            );
            redirect('galeri', 'refresh');
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
            $data['title'] = 'Edit Galeri';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $decode = base64_decode($id);
            $data['get_galeri'] = $this->db->get_where('tb_galeri', ['id' => $decode])->row();
            $data['get_kategori'] = $this->db->get('tb_katgaleri')->result();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('edit', $data, FALSE);
            $this->load->view('template/footer', $data, FALSE);
        }
    }

    public function update()
    {
        $this->form_validation->set_rules('token', 'token', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "Gambar gagal disimpan!"
                    })
                })'
            );
            redirect('galeri/tambah', 'refresh');
        } else {

            $id = $this->input->post('id');

            $config['upload_path']    = './assets/backend/images/galeri/';
            $config['allowed_types']  = 'jpg|png|jpeg';
            $config['max_size']       = '1024';
            $config['encrypt_name']    = TRUE;

            $this->load->library('upload', $config);

            if (!empty($_FILES['img_galeri'])) {
                # code...
                $this->upload->do_upload('img_galeri');
                $data_img = $this->upload->data();
                $file_img = $data_img['file_name'];
            }

            $data = [
                'kategori_id' => $this->input->post('kategori_id'),
                'img_galeri' => $file_img,
                'keterangan' => $this->input->post('keterangan'),
                'created_at' => date("d M Y")
            ];

            $this->db->where('id', $id);
            $this->db->update('tb_galeri', $data);
            $this->session->set_flashdata(
                'success',
                '$(document).ready(function(e) {
                    Swal.fire({
                        type: "success",
                        title: "Sukses",
                        text: "Gambar berhasil diupdate!"
                    })
                })'
            );
            redirect('galeri', 'refresh');
        }
    }

    public function hapus_galeri($id)
    {
        $decode = base64_decode($id);

        $data_gambar = $this->db->get_where('tb_galeri', ['id' => $decode])->row();
        if ($data_gambar->img_galeri != null) {
            $target_gambar = './assets/backend/images/galeri/' . $data_gambar->img_galeri;
            unlink($target_gambar);
        }

        $this->db->delete('tb_galeri', ['id' => $decode]);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Galeri berhasil dihapus!"
                })
            })'
        );
        redirect('galeri', 'refresh');
    }

    public function hapus_all_galeri()
    {
        $id = $_POST['id'];

        $this->db->where_in('id', $id);
        $data_gambar = $this->db->get('tb_galeri')->result();
        foreach ($data_gambar as $d) {
            if ($d->img_galeri != null) {
                $target_gambar = './assets/backend/images/galeri/' . $d->img_galeri;
                unlink($target_gambar);
            }
        }

        $this->m_galeri->delete($id);
        $this->session->set_flashdata(
            'success',
            '$(document).ready(function(e) {
                Swal.fire({
                    type: "success",
                    title: "Sukses",
                    text: "Semua data galeri berhasil dihapus!"
                })
            })'
        );
        redirect('galeri');
    }

    public function detail($id)
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {
            $data['title'] = 'Detail Galeri';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $decode = base64_decode($id);
            $data['get_galeri'] = $this->db->get_where('tb_galeri', ['id' => $decode])->row();
            $data['get_kategori'] = $this->db->get('tb_katgaleri')->result();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('detail', $data, FALSE);
            $this->load->view('template/footer', $data, FALSE);
        }
    }
}

/* End of file Konfigurasi.php */
