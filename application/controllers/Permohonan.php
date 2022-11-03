<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    public function index()
    {
        $data = array(
            'masterpage' => 'layout/layout',
            'navbar' => 'layout/navbar',
            'sidebar' => 'layout/sidebar',
            'content' => 'home',
            'footer' => 'layout/footer',
            'title' => 'Home',
        );
        $this->load->view($data['masterpage'], $data);
    }

    public function tambah()
    {

        $get_data = $this->db->get('tahanan')->result();
        var_dump($get_data);
        exit();
        $data = array(
            'masterpage' => 'layout/layout',
            'navbar' => 'layout/navbar',
            'sidebar' => 'layout/sidebar',
            'content' => 'user/tambah_data',
            'get_data' => $get_data,
            // 'footer' => 'layout/footer',
            'title' => 'Home',
        );
        $this->load->view($data['masterpage'], $data);
    }
}
