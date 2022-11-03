<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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


            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar_admin',
                'sidebar' => 'layout/sidebar_admin',
                'content' => 'admin/profil',
                'footer' => 'layout/footer',
                'title' => 'Home',
                'id_admin' => $id_admin,
                'data_pribadi' => $data_pribadi

            );
            $this->load->view($data['masterpage'], $data);
        }
    }
    function upload_ktp()
    {


        $this->form_validation->set_rules('nik', 'Nik', 'required|trim|is_unique[nik_user.nik]|max_length[16]', array(
            'required'      => 'Harus Di isi.',
            'is_unique'     => 'NIK Harus Berbeda.'
        ));
        // $this->form_validation->set_rules('file', '', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo "alert('gagal validation')";
        } else {

            $nik = $this->input->post('nik');
            $id_admin = $this->input->post('id_admin');

            $config['upload_path'] = './assets/images/foto_ktp/';
            $config['allowed_types'] = 'jpeg|JPEG|JPG|png|jpg';
            $config['max_size'] = 2000;


            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {

                $fileData = $this->upload->data();
                $upload = [
                    'foto' => $fileData['file_name'],
                    'id_admin' => $id_admin,
                    'nik' => $nik
                ];
                $dt = $this->M_profil->upload_nik($upload);

                if ($dt > 1) {
                    echo "<script type='text/javascript'>
                        alert(' Berhasil ');
                        window.location.href = '" . base_url('profile/profil') . "';
                        </script>";
                } else {
                    echo "<script type='text/javascript'>
                        alert(' Gagal ');
                        window.location.href ='" . base_url('profile') . "';
                        </script>";
                }
            } else {
                echo "<script type='text/javascript'>
                    alert(' Gagal " . $this->upload->display_errors() . "');
                    window.location.href = 'index';
                    </script>";
            }
        }
    }


    function update_ktp()
    {


        $this->form_validation->set_rules('nik', 'Nik', 'required|trim|max_length[16]', array(
            'required'      => 'Harus Di isi.',
            'is_unique'     => 'NIK Harus Berbeda.'
        ));

        if ($this->form_validation->run() == FALSE) {
            echo "alert('gagal validation')";
        } else {

            $nik = $this->input->post('nik');
            $id_admin = $this->input->post('id_admin');
            $old_image = $this->input->post('old_image');
            $new_image = $_FILES['new_image']['name'];


            if ($new_image == TRUE) {
                // $update_image = rand() . "" . str_replace(' ', '-', $_FILES['new_image']['name']);
                // $update_image = rand() . "" . str_replace(' ', '-', $_FILES['new_image']['name']);



                // $config['encrypt_name'] = TRUE;
                $config['upload_path'] = './assets/images/foto_ktp/';
                $config['allowed_types'] = 'jpeg|JPEG|JPG|png|jpg';
                $config['max_size'] = 2000;
                $update_image = time() . $_FILES["new_image"]['name'];
                $config['file_name'] = $update_image;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('new_image')) {

                    if (file_exists("./assets/images/foto_ktp/" . $old_image)) {
                        unlink("./assets/images/foto_ktp/" . $old_image);
                    }
                    $fileData = $this->upload->data();

                    $upload = [
                        // 'foto' => $config['encrypt_name'],
                        'foto' => $update_image,
                        'nik' => $nik
                    ];



                    $dt = $this->M_profil->update_nik($upload, $id_admin);
                    if ($dt > 0) {
                        echo "<script type='text/javascript'>
                            alert(' Berhasil ');
                            window.location.href = 'profil';
                            </script>";
                    } else {
                        echo "<script type='text/javascript'>
                            alert(' Gagal ');
                            window.location.href = 'profil';
                            </script>";
                    }
                } else {
                    echo "<script type='text/javascript'>
                        alert(' Gagal " . $this->upload->display_errors() . "');
                        window.location.href = 'profil';
                        </script>";
                }
            } else {
                $update_image = $old_image;
            }
            $upload = [
                'foto' => $update_image,
                'nik' => $nik
            ];
            $dt = $this->M_profil->update_nik($upload, $id_admin);
            if ($dt > 0) {
                echo "<script type='text/javascript'>
                    alert(' Berhasil ');
                    window.location.href = 'profil';
                    </script>";
            } else {
                echo "<script type='text/javascript'>
                    alert(' Gagal ');
                    window.location.href = 'profil';
                    </script>";
            }
        }
    }


    function profil()
    {


        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else if ($this->session->userdata('role') == null) {
            redirect('auth/logout');
        } else {

            $id_admin = $this->session->userdata('id_admin');
            $data_nik = $this->m_home->data_nik($id_admin);

            $data_pribadi = $this->M_profil->user_by_id($id_admin);

            $get_kota = $this->get_kota();
            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar_admin',
                'sidebar' => 'layout/sidebar_admin',
                'content' => 'admin/profil',
                'footer' => 'layout/footer',
                'title' => 'Home',
                'id_admin' => $id_admin,
                'data_nik' => $data_nik,
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

    function update_admin()
    {
        $id_admin = $this->input->post('id_admin');
        $data = array(
            'nama_admin' => $this->input->post('nama'),
            'alamat_admin' => $this->input->post('alamat'),
            'email_admin' => $this->input->post('email'),
            'telp_admin' => $this->input->post('telp'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),

        );

        $exe = $this->M_profil->update_admin($id_admin, $data);

        if ($exe > 0) {
            echo "<script type='text/javascript'>
            alert(' Berhasil ');
            window.location.href = ' " . base_url('admin/profile') . "';
            </script>";
        } else {
            echo "<script type='text/javascript'>
            alert(' Gagal ');
            window.location.href = ' " . base_url('admin/profile') . "';
            </script>";
        }
    }


    function do_ganti_password()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {
            $id_admin = $this->session->userdata('id_admin');


            $data_pribadi = $this->M_profil->admin_by_id($id_admin);


            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar_admin',
                'sidebar' => 'layout/sidebar_admin',
                'content' => 'admin/ganti_password_admin',
                'title' => 'Data Uuer',
                'data_pribadi' => $data_pribadi,
            );
            $this->load->view($data['masterpage'], $data);
        }
    }
    function ganti_password()
    {
        $this->form_validation->set_rules('password_lama', 'password', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]', array(
            'required'      => 'Harus Di isi.',
            'matches'     => 'Password Harus sama.'
        ));
        if ($this->form_validation->run() == FALSE) {
            redirect('admin/profile/do_ganti_password');
        } else {
            $password_lama = md5($this->input->post('password_lama'));
            $cek_old = $this->M_profil->cek_old($password_lama);

            if ($cek_old == false) {
                $this->session->set_flashdata('error', 'Old password not match!');
                echo "<script type='text/javascript'>
                alert(' Gagal ');
                window.location.href = ' " . base_url('admin/profile/do_ganti_password') . "';
                </script>";
            } else {

                $data = array('password_admin' => md5($this->input->post('password1')));

                $id_admin = $this->session->userdata('id_admin');

                $this->M_profil->update_pass_admin($id_admin, $data);
                $this->session->sess_destroy();
                echo "<script type='text/javascript'>
                alert(' Password Berhasil Diganti');
                window.location.href = ' " . base_url('admin/login') . "';
                </script>";
            }
        }
    }
}
