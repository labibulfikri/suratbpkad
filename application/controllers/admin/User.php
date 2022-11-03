<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_profil');
        // $this->load->model('m_pengaduan');
        $this->load->model('m_daftar');
        $this->load->model('m_home');
        // $this->load->model('admin/m_pengaduan_admin');
        $this->load->library('session');
        $this->load->library('form_validation');
    }


    public function index($data = NULL, $page = NULL)
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else if ($this->session->userdata('role') == null) {
            redirect('auth/logout');
        } else {

            $id_admin = $this->session->userdata('id_admin');


            $data_pribadi = $this->M_profil->admin_by_id($id_admin);
            $data_user = $this->db->get('user')->result();

            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar_admin',
                'sidebar' => 'layout/sidebar_admin',
                'content' => 'admin/data_user',
                'footer' => 'layout/footer',
                'title' => 'Home',
                'id_admin' => $id_admin,
                'data_user' => $data_user,
                'data_pribadi' => $data_pribadi

            );
            $this->load->view($data['masterpage'], $data);
        }
    }

    function detail($id_user)
    {


        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else if ($this->session->userdata('role') == null) {
            redirect('auth/logout');
        } else {

            $id_admin = $this->session->userdata('id_admin');
            // $data_nik = $this->m_home->data_nik($id_admin);

            $id_user = decrypt_url($id_user);
            $data_nik = $this->m_home->data_nik($id_user);

            $data_pribadi = $this->M_profil->user_by_id($id_user);

            $get_kota = $this->get_kota();
            $get_kota = $this->get_kota();
            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar_admin',
                'sidebar' => 'layout/sidebar_admin',
                'content' => 'admin/detail_user',
                'footer' => 'layout/footer',
                'title' => 'Home',
                'id_admin' => $id_admin,
                'data_nik' => $data_nik,
                // 'get_det' => $get_det,
                'data_pribadi' => $data_pribadi,
                'get_kota' =>  $get_kota

            );
            $this->load->view($data['masterpage'], $data);
        }
    }


    function get_kota()
    {
        $a = $this->input->get('search');
        $kota = $this->m_daftar->datakota($a);


        return $kota;
    }

    function get_kec()
    {
        $id = $this->input->get('id');
        $search = $this->input->get('search');

        $kec = $this->m_daftar->datakecamatan($id, $search);
        echo json_encode($kec);
    }


    function get_kelurahan()
    {
        $id = $this->input->get('id');
        $search = $this->input->get('search');

        $lurah = $this->m_daftar->datakelurahan($id, $search);
        echo json_encode($lurah);
    }
}
