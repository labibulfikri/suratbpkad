<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('layout/login');
    }
    public function cek_login()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'username' => $username,
            'password' => md5($password)
        );

        $cek = $this->m_auth->verify("t_user", $where)->num_rows();
        $dt = $this->m_auth->verify("t_user", $where)->row();


        if ($cek >= 1) {

            $data_session = array(
                'status' => "login",
                'username' => $dt->username,
                'nama_jabatan' => $dt->nama_jabatan,
                'id_jabatan' => $dt->id_jabatan,
                'id_bidang' => $dt->id_bidang,
                'nama_bidang' => $dt->nama_bidang,
                'id_user' => $dt->id_user,
                'nama_user' => $dt->nama_user
            );

            $this->session->set_userdata($data_session);
            // $this->session->set_flashdata('pesan', $user_name);
        } else {
            echo $this->session->set_flashdata('pesan', "<div class='alert alert-danger alert-dismissable' style='margin-top:20px'>
      Login Gagal , Coba Lagi !</h4> 
    </div>");

            redirect(base_url("Auth"));
        }
        redirect(base_url("Home"));
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url("auth"));
    }

    function lupa_password()
    {
        $this->load->view('user/forgot_password');
    }

    function cek_username()
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim|valid_username', array(
            'required'      => 'Harus Di isi.',
            'valid_username'   =>  'username Salah'
        ));
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/user_login');
        } else {
            $username = $this->input->post('username');

            $cek = $this->m_auth->user_by_username("user", $username)->num_rows();
            $data['dt'] = $this->m_auth->user_by_username("user", $username)->row();


            if ($cek >= 1) {
                $this->load->view('user/reset_password', $data);
            } else {
                echo "<script>
      alert('username Belum Terdaftar');
      window.location.href='" . base_url('auth/lupa_password') . "';
      </script>";

                // $this->load->view('user/lupa_password');
            }
        }
    }

    function ad_reset_password()
    {

        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]', array(
            'required'      => 'Harus Di isi.',
            'matches'     => 'Password Harus sama.'
        ));

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('user/lupa_password');
            // $this->load->view('user/reset_password', $data);
        } else {

            $id_user = $this->input->post('id_user');
            $password = md5($this->input->post('password1'));

            $update = $this->m_auth->update_password($id_user, $password);

            if ($update) {
                echo "<script>
      alert('Password berhasil diperbarui');
      window.location.href = ' " . base_url('auth/logout') . "';
      </script>";

                // redirect(base_url("Auth"));
            } else {
            }
        }
    }
}
