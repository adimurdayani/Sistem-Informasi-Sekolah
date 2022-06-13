<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dashboard');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth', 'refresh');
        } else {
            $data['title'] = "Dashboard";
            $data['session'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row();
            $data['get_config'] = $this->db->get('tb_konfigurasi')->row();

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
            $data['total_kontak'] = $this->db->get('guru')->num_rows();
            $data['total_team'] = $this->db->get('siswa')->num_rows();

            $this->db->limit(4);
            $data['get_tentang'] = $this->db->get('tb_tentang')->row();

            $data['get_total_hits'] = $this->m_dashboard->get_total();
            $this->load->view('template/header', $data, FALSE);
            $this->load->view('template/topbar', $data, FALSE);
            $this->load->view('template/sidebar', $data, FALSE);
            $this->load->view('index', $data, FALSE);
        }
    }

    public function total_data()
    {
        $get_kontak_total = $this->db->get('tb_kontak')->num_rows();
        $get_komentar_total = $this->db->get('tb_komentar')->num_rows();

        $result['total_kontak'] = $get_kontak_total;
        $result['total_komentar'] = $get_komentar_total;
        echo json_encode($result);
    }
}

/* End of file Dashboard.php */
