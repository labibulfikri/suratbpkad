<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda_keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_agenda_keluar');
        $this->load->model('m_surat');
        $this->load->library('Pdf');
        $this->load->library('encryption');
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {


            $kode = $this->m_agenda_keluar->buat_kode_agenda();
            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'kode' => $kode,
                'content' => 'agenda_keluar/entry_agenda_keluar',
                'footer' => 'layout/footer',
                'title' => ' Daftar Agenda',
            );
            $this->load->view($data['masterpage'], $data);
        }
    }


    function tambah_agenda_keluar()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {


            if ($this->session->userdata('id_jabatan') == 1) {
                $otorisasi = 2;
            } else if ($this->session->userdata('id_jabatan') == 2) {
                $otorisasi = 1;
            } else {
                $otorisasi = 0;
            }

            if ($this->session->userdata('id_jabatan') == 5) {

                $dari = $this->session->userdata('id_bidang');
                $this->db->query("SELECT
                                id_user,
                                nama_user,
                                a.atasan_id_bidang,
                                t_user.id_bidang,
                                a.nama_bidang,
                            b.nama_bidang as atasan,
                            c.nama_bidang as atasan_lagi,
                                c.id_bidang
                            FROM
                                t_bidang a
                                LEFT JOIN t_user ON t_user.id_bidang = a.id_bidang	
                                LEFT JOIN t_bidang b ON b.id_bidang = a.atasan_id_bidang 

                                LEFT JOIN t_bidang c ON c.id_bidang = b.atasan_id_bidang 
                                where id_jabatan=5");
                $query = $this->db->get()->row_array();
            }else if (){
                
            }


            $data = array(
                'no_agenda' => $this->input->post('no_agenda'),
                'agenda_keluar_no' => $this->input->post('agenda_no_keluar'),
                'agenda_dari' => $query['nama_bidang'],
                'agenda_diterima_tgl' => $this->input->post('agenda_diterima_tgl'),
                // 'no_agenda_agenda' => $this->input->post('no_agenda_agenda'),
                'agenda_tgl' => $this->input->post('agenda_tanggal'),
                'agenda_waktu' => $this->input->post('agenda_waktu'),
                'agenda_tempat' => $this->input->post('agenda_tempat'),
                'status' => 0,
                'agenda_jenis' => 1,
                'otorisasi' => $otorisasi,
                'agenda_perihal' => $this->input->post('agenda_perihal'),
                'agenda_dari_id_bidang' => $dari
            );

            $exe = $this->m_agenda_keluar->tambah('t_agenda_keluar', $data);
            $agenda_file = $this->input->post('agenda_file');
            $config['upload_path'] = './assets2/file_agenda/';
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = 'undangan-keluar-' . date('dmY') . '-' . substr(md5(rand()), 0, 10);

            // $config['max_size'] = 2000;


            $this->load->library('upload', $config);
            if ($this->upload->do_upload('agenda_file')) {

                $fileData = $this->upload->data();
                $upload = [
                    'nama_agenda' => $this->upload->data('file_name'),
                    't_id_agenda' => $exe
                ];
                $dt = $this->m_agenda->upload_agenda($upload);
            }
            if ($exe > 0) {
                echo "<script type='text/javascript'>
            alert(' Berhasil ');
            window.location.href ='" . base_url('admin/agenda/agenda_keluar_otorisasi') . "';
            </script>";
            }
        }
    }
}
