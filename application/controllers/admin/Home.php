<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
        $this->load->model('m_jadwal');
        // $this->load->model('m_pengaduan');
    }
    public function index()
    {

        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else if ($this->session->userdata('role') == null) {
            redirect('auth/logout');
        } else {

            $id_user = $this->session->userdata('id_user');
            $data_nik = $this->m_home->data_nik($id_user);

            $count_jadwal =  $this->db->count_all_results('jadwal');
            $pending =  $this->m_jadwal->count_pending();
            // $pending =  $this->m_jadwal->count_status(0);
            // $menunggu_verify =  $this->m_jadwal->count_status(1);
            $verify =  $this->m_jadwal->count_status(2);
            $selesai =  $this->m_jadwal->count_status(3);


            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar_admin',
                'sidebar' => 'layout/sidebar_admin',
                'content' => 'admin/home',
                'footer' => 'layout/footer',
                'title' => 'Home',
                'data_nik' => $data_nik,
                'count_jadwal' => $count_jadwal,
                'pending' => $pending,
                'verify' => $verify,
                // 'menunggu_verify' => $menunggu_verify,
                'selesai' => $selesai,
            );
            $this->load->view($data['masterpage'], $data);
        }
    }
}
