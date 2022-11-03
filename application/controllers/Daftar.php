<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_daftar');
        $this->load->library('session');
        $this->load->library('form_validation');
    }


    public function index($data = NULL, $page = NULL)
    {
        $this->load->view('user/daftar_user');
    }

    function daftar_user()
    {


        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('id_district', 'kecamatan', 'required', array(
            'required'      => 'Harus Di isi.',
        ));
        $this->form_validation->set_rules('alamat', 'alamat', 'required', array(
            'required'      => 'Harus Di isi.',
        ));
        $this->form_validation->set_rules('jenis_kelamin', 'jk', 'required');
        $this->form_validation->set_rules('id_regencie', 'kota', 'required', array(
            'required'      => 'Harus Di isi.'
        ));
        $this->form_validation->set_rules('id_village', 'kelurahan', 'required', array(
            'required'      => 'Harus Di isi.',
        ));
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', array(
            'required'      => 'Harus Di isi.',
            'is_unique'     => 'Email Sudah Di Daftarkan.',
            'valid_email'   =>  'Email Salah'
        ));
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]', array(
            'required'      => 'Harus Di isi.',
            'matches'     => 'Password Harus sama.'
        ));


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/daftar_user');
        } else {

            $data = array(
                'nama'      => $this->input->post('nama'),
                'email'     => $this->input->post('email'),
                'password'  => md5($this->input->post('password1')),
                'telp'      => $this->input->post('telp'),
                'nik'             => $this->input->post('nik'),
                'jenis_kelamin'             => $this->input->post('jenis_kelamin'),
                'id_district'      => $this->input->post('id_district'),
                'id_regencie'      => $this->input->post('id_regencie'),
                'id_village'      => $this->input->post('id_village'),
                'alamat'      => $this->input->post('alamat'),
                'foto_user'      => 'default.jpg'
            );

            $res = $this->m_daftar->registrasi($data);

            if ($res >= 0) {

                echo $this->session->set_flashdata('pesan', "<div class='alert alert-success alert-dismissable' style='margin-top:20px'>
        <h4>Daftar Berhasil Silahkan Login Kembali !</h4>
        </div>");
                redirect(base_url("auth"));
            } else {
                $this->load->view('user/daftar_user');
            }
        }
    }


    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url("c_login"));
    }

    function get_kota()
    {
        $a = $this->input->get('search');
        $kota = $this->m_daftar->datakota($a);


        echo json_encode($kota);
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
