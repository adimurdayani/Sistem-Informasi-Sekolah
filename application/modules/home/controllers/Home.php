<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_galeri');
    }

    public function index()
    {
        $data['title'] = "Home";
        $date = date("Y-m-d");

        // jumlah pengujung sekarang
        $this->db->group_by('ip');
        $pengunjung_hariini = $this->db->get_where('tb_visitor', ['date' => $date])->num_rows();
        $db_pengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM tb_visitor")->row();

        // total pengunjung
        $total_pengunjung = isset($db_pengunjung->hits) ? ($db_pengunjung->hits) : 0;
        $batas_waktu = time() - 300;

        // jumlah pengujung online
        $pengunjung_online = $this->db->query("SELECT * FROM tb_visitor WHERE online > '" . $batas_waktu . "'")->num_rows();

        $data['pengunjung_hariini'] = $pengunjung_hariini;
        $data['total_pengunjung'] = $total_pengunjung;
        $data['pengunjung_online'] = $pengunjung_online;

        $data['get_galeri'] = $this->m_galeri->get_galeri();
        $data['get_kategori'] = $this->db->get('tb_katgaleri')->result();
        $data['total_siswa'] = $this->db->get('siswa')->num_rows();

        $this->db->limit(6);
        $data['get_guru'] = $this->db->get('guru')->result();
        $this->load->view('home/template/header', $data, FALSE);
        $this->load->view('home/template/topbar', $data, FALSE);
        $this->load->view('home/template/crouser', $data, FALSE);
        $this->load->view('home/index', $data, FALSE);
        $this->load->view('home/template/footer', $data, FALSE);
    }

    public function profile()
    {
        $data['title'] = "Profile";
        $this->db->limit(3);
        $data['get_guru'] = $this->db->get('guru')->result();
        $this->load->view('home/template/header', $data, FALSE);
        $this->load->view('home/template/topbar', $data, FALSE);
        $this->load->view('home/profil', $data, FALSE);
        $this->load->view('home/template/footer', $data, FALSE);
    }

    public function galeri()
    {
        $data['title'] = "Galeri";
        $data['get_galeri'] = $this->m_galeri->get_galeri();
        $data['get_kategori'] = $this->db->get('tb_katgaleri')->result();
        $this->load->view('home/template/header', $data, FALSE);
        $this->load->view('home/template/topbar', $data, FALSE);
        $this->load->view('home/galeri', $data, FALSE);
        $this->load->view('home/template/footer', $data, FALSE);
    }

    public function pendaftaran()
    {
        $data['title'] = "Pendaftaran";
        $this->load->view('home/template/header', $data, FALSE);
        $this->load->view('home/template/topbar', $data, FALSE);
        $this->load->view('home/pendaftaran', $data, FALSE);
        $this->load->view('home/template/footer', $data, FALSE);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Siswa';
        $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
        $data['get_config'] = $this->db->get('tb_konfigurasi')->row();

        $this->m_siswa->validasi();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('home/template/header', $data, FALSE);
            $this->load->view('home/template/topbar', $data, FALSE);
            $this->load->view('home/pendaftaran', $data, FALSE);
            $this->load->view('home/template/footer', $data, FALSE);
        } else {
            $this->m_home->tambah();
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
            redirect('home/pendaftaran', 'refresh');
        }
    }
}

/* End of file Home.php */
