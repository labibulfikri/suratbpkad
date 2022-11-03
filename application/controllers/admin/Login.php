<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('admin/login');
    }
    public function cek_login()
    {

        $nip = $this->input->post('nip');
        $password = $this->input->post('password');

        $where = array(
            'nip' => $nip,
            'password_admin' => md5($password)
        );

        $cek = $this->m_auth->verify("admin", $where)->num_rows();
        $dt = $this->m_auth->verify("admin", $where)->row();

        if ($cek >= 1) {

            $data_session = array(
                'status' => "login",
                'username' => $dt->username,
                'id_admin' => $dt->id_admin,
                'nama' => $dt->nama_admin,
                'email' => $dt->email_admin,
                'role' => $dt->role,

            );

            $this->session->set_userdata($data_session);
            // $this->session->set_flashdata('pesan', $user_name);
        } else {
            echo $this->session->set_flashdata('pesan', "<div class='alert alert-danger alert-dismissable' style='margin-top:20px'>
      Login Gagal , Coba Lagi !</h4> 
    </div>");

            redirect(base_url("admin/Login"));
        }
        redirect(base_url("admin/Home"));
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url("admin/login"));
    }

    function lupa_password()
    {
        $this->load->view('user/lupa_password');
    }

    function cek_email()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', array(
            'required'      => 'Harus Di isi.',
            'valid_email'   =>  'Email Salah'
        ));
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/user_login');
        } else {
            $email = $this->input->post('email');

            $cek = $this->m_auth->user_by_email("user", $email)->num_rows();
            $data['dt'] = $this->m_auth->user_by_email("user", $email)->row();


            if ($cek >= 1) {
                $this->load->view('user/reset_password', $data);
            } else {
                echo "<script>
      alert('Email Belum Terdaftar');
      window.location.href='lupa_password';
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
      window.location.href = ' " . base_url('Home/logout') . "';
      </script>";

                // redirect(base_url("Auth"));
            } else {
            }
        }
    }
}
