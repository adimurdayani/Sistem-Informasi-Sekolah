<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Struktur extends CI_Controller
{

    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            redirect('auth/block');
        } else {
            $data['title'] = 'Struktur Organisasi';
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();
            $data['get_struktur'] = $this->db->get('tb_struktur_org')->row();
            $data['get_struktur_total'] = $this->db->get('tb_struktur_org')->num_rows();

            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('index', $data, FALSE);
            $this->load->view('template/footer', $data, FALSE);
        }
    }

    public function tambah()
    {
        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "Data gagal disimpan!"
                    })
                })'
            );
            redirect('struktur', 'refresh');
        } else {
            $config['upload_path']    = './assets/backend/images/upload/';
            $config['allowed_types']  = 'jpg|png|jpeg|svg';
            $config['max_size']       = '1024';
            $config['encrypt_name']    = TRUE;

            $this->load->library('upload', $config);

            if (!empty($_FILES['image'])) {
                # code...
                $this->upload->do_upload('image');
                $data_image = $this->upload->data();
                $file_image = $data_image['file_name'];
            }

            $data = [
                'judul' => $this->input->post('judul'),
                'image' => $file_image,
                'keterangan' => $this->input->post('keterangan'),
                'slug' => slug($this->input->post('judul')),
                'created_at' => date("d M Y"),
                'updated_at' => date("d M Y")
            ];
            $this->db->insert('tb_struktur_org', $data);
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
            redirect('struktur', 'refresh');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'error',
                '$(document).ready(function(e) {
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "Oops...",
                        text: "Data gagal disimpan!"
                    })
                })'
            );
            redirect('struktur', 'refresh');
        } else {
            $id = $this->input->post('id');

            $config['upload_path']    = './assets/backend/images/upload/';
            $config['allowed_types']  = 'jpg|png|jpeg|svg';
            $config['max_size']       = '1024';
            $config['encrypt_name']    = TRUE;

            $this->load->library('upload', $config);

            if (!empty($_FILES['image'])) {
                # code...
                $this->upload->do_upload('image');
                $data_image = $this->upload->data();
                $file_image = $data_image['file_name'];
            }

            $data_img = $this->db->get_where('tb_struktur_org', ['id' => $id])->row();
            if ($data_img->image != null) {
                $target_img = './assets/backend/images/upload/' . $data_img->image;
                unlink($target_img);
            }

            $data = [
                'judul' => $this->input->post('judul'),
                'image' => $file_image,
                'keterangan' => $this->input->post('keterangan'),
                'slug' => slug($this->input->post('judul')),
                'updated_at' => date("d M Y")
            ];
            $this->db->where('id', $id);
            $this->db->update('tb_struktur_org', $data);
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
            redirect('struktur', 'refresh');
        }
    }

    public function hapus($id)
    {
        $data_gambar = $this->db->get_where('tb_struktur_org', ['id' => $id])->row();
        if ($data_gambar->image != null) {
            $target_gambar = './assets/backend/images/upload/' . $data_gambar->image;
            unlink($target_gambar);
        }

        $this->db->delete('tb_struktur_org', ['id' => $id]);
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
        redirect('struktur', 'refresh');
    }
}

/* End of file Konfigurasi.php */
