<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_surat');
        $this->load->library('Pdf');
        $this->load->library('encryption');
    }
    public function index()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {
            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/data_surat',
                'footer' => 'layout/footer',
                'title' => 'Surat Masuk',
            );
            $this->load->view($data['masterpage'], $data);
        }
    }

    public function surat_dispo()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {


            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/data_surat_dispo',
                'footer' => 'layout/footer',
                'title' => 'Surat Masuk',
            );
            $this->load->view($data['masterpage'], $data);
        }
    }

    public function surat_proses()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {


            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/data_surat_proses',
                'footer' => 'layout/footer',
                'title' => 'Surat Masuk',
            );
            $this->load->view($data['masterpage'], $data);
        }
    }


    function fetch_surat()
    {

        $fetch_data = $this->m_surat->make_datatables();

        $data = array();
        $a = 1;
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $a++;
            if ($row->nama_surat != null) {
                $sub_array[] = '<a target="_blank" href="' . base_url('assets2/file_surat/' . $row->nama_surat . '') . '"> <br><img width="30px" src="' . base_url('assets2/download.png') . ' "> </a>';
            } else {
                $sub_array[] = '';
            }
            $sub_array[] = '<table> <th> <b> Nomor Surat </b> </th> <th> <b> : </b> </th> <th> ' . $row->no_surat . '  </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->surat_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->surat_tanggal . '</td></tr> </tr><tr><td> Perihal </td> <td> : </td> <td> ' . $row->surat_perihal . '</td></tr></table> ';

            if ($row->status == 0) {

                $sub_array[] = " ";
                $sub_array[] = '<a href="' . base_url('admin/surat/disposisi?id_surat=' . $row->id_surat . '') . ' "" class="btn btn-success btn-xs"> <i class="far fa-edit"> Disposisi</i></a> | <a href="' . base_url('admin/surat/edit?id_surat=' . $row->id_surat . '') . ' "" class="btn btn-warning btn-xs"> <i class="far fa-edit"> Edit</i></a> ';
            } else {
                $sub_array[] = '<a target="_blank" href="' . base_url('admin/surat/cetak_surat_pdf?id_surat=' . $row->id_surat . '') . '"" class="btn btn-info btn-xs"> <i class="far fa-file"> Cetak</i></a>';
                // $sub_array[] = '<a href="' . base_url('admin/surat/lihat_disposisi?id_surat=' . $row->id_surat . '') . ' "" class="btn btn-success btn-xs"> <i class="far fa-edit"> Lihat Disposisi</i>  </a> ';
                if ($this->session->userdata('id_jabatan') == 1) {
                    $sub_array[] = '<a href="' . base_url('admin/surat/lihat_disposisi?id_surat=' . $row->id_surat . '') . ' "" class="btn btn-success btn-xs"> <i class="far fa-edit"> Lihat Disposisi</i>  </a>';
                } else {
                    $sub_array[] = '<a href="' . base_url('admin/surat/lihat_disposisi?id_surat=' . $row->id_surat . '') . ' "" class="btn btn-success btn-xs"> <i class="far fa-edit"> Lihat Disposisi</i>  </a> | <a href="' . base_url('admin/surat/disposisi_sub?id_surat=' . $row->id_surat . '') . ' "" class="btn btn-success btn-xs"> <i class="far fa-edit"> Disposisi</i></a>';
                }
            }



            $data[] = $sub_array;
        }
        $output = array(
            "draw"                      =>     intval($_POST["draw"]),
            "recordsTotal"              =>     $this->m_surat->get_all_data(),
            "recordsFiltered"           =>     $this->m_surat->get_filtered_data(),
            "data"                      =>     $data
        );
        echo json_encode($output);
    }

    function fetch_surat_proses()
    {

        $fetch_data = $this->m_surat->make_datatables_proses();

        $data = array();
        $a = 1;
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $a++;
            if ($row->nama_surat != null) {
                $sub_array[] = '<a target="_blank" href="' . base_url('assets2/file_surat/' . $row->nama_surat . '') . '"> <br><img width="30px" src="' . base_url('assets2/download.png') . ' "> </a>';
            } else {
                $sub_array[] = '';
            }
            $sub_array[] = '<table> <th> <b> Nomor Surat </b> </th> <th> <b> : </b> </th> <th> ' . $row->no_surat . '  </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->surat_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->surat_tanggal . '</td></tr> </tr><tr><td> Perihal </td> <td> : </td> <td> ' . $row->surat_perihal . '</td></tr></table> ';

            if ($row->status == 0) {

                $sub_array[] = '<a href="' . base_url('admin/surat/edit_proses?id_surat=' . $row->id_surat . '') . ' "" class="btn btn-warning btn-xs"> <i class="far fa-edit"> Edit</i></a> ';
            } else {
                $sub_array[] = '<a target="_blank" href="' . base_url('admin/surat/cetak_surat_pdf?id_surat=' . $row->id_surat . '') . '"" class="btn btn-info btn-xs"> <i class="far fa-file"> Cetak</i></a>';
            }
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                      =>     intval($_POST["draw"]),
            "recordsTotal"              =>     $this->m_surat->get_all_data_proses(),
            "recordsFiltered"           =>     $this->m_surat->get_filtered_data_proses(),
            "data"                      =>     $data
        );
        echo json_encode($output);
    }


    function fetch_surat_disp()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {

            $id = $this->session->userdata('id_bidang');


            $fetch_data = $this->m_surat->make_datatables_dispo($id);

            $data = array();
            $a = 1;
            foreach ($fetch_data as $row) {
                $sub_array = array();
                $sub_array[] = $a++;
                if ($row->nama_surat != null) {
                    $sub_array[] = '<a target="_blank" href="' . base_url('assets2/file_surat/' . $row->nama_surat . '') . '"> <br><img width="30px" src="' . base_url('assets2/download.png') . ' "> </a>';
                } else {
                    $sub_array[] = '';
                }
                $sub_array[] = '<table> <th> <b> Nomor Surat </b> </th> <th> <b> : </b> </th> <th> ' . $row->no_surat . '  </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->surat_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->surat_tanggal . '</td></tr> </tr><tr><td> Perihal </td> <td> : </td> <td> ' . $row->surat_perihal . '</td></tr></table> ';

                if ($this->session->userdata('id_jabatan') != 5 and $row->disposisi_ke_sub == null) {

                    $sub_array[] = '<a target="_blank" href="' . base_url('admin/surat/cetak_surat_pdf?id_surat=' . $row->id_surat . '') . '"" class="btn btn-info btn-xs"> <i class="far fa-file"> Cetak</i></a> ';
                    $sub_array[] = '<a href="' . base_url('admin/surat/disposisi_sub?id_surat=' . $row->id_surat . '') . ' "" class="btn btn-success btn-xs"> <i class="far fa-edit"> Disposisi </i></a> <br> <a href="' . base_url('admin/surat/lihat_disposisi?id_surat=' . $row->id_surat . '') . ' "" class="btn btn-success btn-xs"> <i class="far fa-edit"> Lihat Disposisi</i>  </a>';
                } else if ($this->session->userdata('id_jabatan') == 4 and $row->disposisi_ke_staf == null) {
                    $sub_array[] = '<a target="_blank" href="' . base_url('admin/surat/cetak_surat_pdf?id_surat=' . $row->id_surat . '') . '"" class="btn btn-info btn-xs"> <i class="far fa-file"> Cetak</i></a> ';
                    $sub_array[] = '<a href="' . base_url('admin/surat/disposisi_sub?id_surat=' . $row->id_surat . '') . ' "" class="btn btn-success btn-xs"> <i class="far fa-edit"> Disposisi </i></a><br> <a href="' . base_url('admin/surat/lihat_disposisi?id_surat=' . $row->id_surat . '') . ' "" class="btn btn-success btn-xs"> <i class="far fa-edit"> Lihat Disposisi</i>  </a>';
                } else {

                    $sub_array[] = '<a target="_blank" href="' . base_url('admin/surat/cetak_surat_pdf?id_surat=' . $row->id_surat . '') . '"" class="btn btn-info btn-xs"> <i class="far fa-file"> Cetak</i></a>';
                    $sub_array[] = ' <a href="' . base_url('admin/surat/lihat_disposisi?id_surat=' . $row->id_surat . '') . ' "" class="btn btn-success btn-xs"> <i class="far fa-edit"> Lihat Disposisi</i>  </a>';
                }

                $data[] = $sub_array;
            }
            $output = array(
                "draw"                      =>     intval($_POST["draw"]),
                "recordsTotal"              =>     $this->m_surat->get_all_data_dispo($id),
                "recordsFiltered"           =>     $this->m_surat->get_filtered_data_dispo($id),
                "data"                      =>     $data
            );
            echo json_encode($output);
        }
    }

    function history_datanya()
    {
        $id_surat = $this->input->post('id_surat');
        $datanya = $this->m_surat->data_history_dispo($id_surat);
        // var_dump($datanya);
        // exit();
        echo json_encode($datanya);
    }

    function tambah_data_surat()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {
            $kode = $this->m_surat->buat_kode_surat();
            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'kode' => $kode,
                'content' => 'admin/entry_surat_masuk',
                // 'content' => 'admin/data_surat',
                'footer' => 'layout/footer',
                'title' => 'Entry Surat Masuk',
            );
            $this->load->view($data['masterpage'], $data);
        }
    }
    function tambah()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {

            if (isset($_POST['surat_keterangan'])) {

                $surat_keterangan = $_POST['surat_keterangan'];
                echo "<br>";
                for ($i = 0; $i < count($surat_keterangan); $i++) {

                    // echo $surat_keterangan[$i] . "<br>";
                    //  $surat_keterangan[$i] . "<br>";
                }
            }


            $surat_ket = (implode(";", $surat_keterangan));
            // jika status 1 terdisposisi dan jika 0 belum disposisi 
            $data = array(
                'no_surat' => $this->input->post('no_surat'),
                'surat_dari' => $this->input->post('surat_dari'),
                'surat_diterima_tgl' => $this->input->post('surat_diterima_tgl'),
                'no_agenda_surat' => $this->input->post('no_agenda_surat'),
                'surat_tanggal' => $this->input->post('surat_tanggal'),
                'surat_keterangan' => $surat_ket,
                'status' => 0, //surat belum terdisposisi
                'surat_perihal' => $this->input->post('surat_perihal')
            );
            $exe = $this->m_surat->tambah('t_surat', $data);



            $surat_file = $this->input->post('surat_file');
            $config['upload_path'] = './assets2/file_surat/';
            $config['allowed_types'] = 'pdf|JPEG|JPG|png|jpg';
            $config['max_size'] = 2000;


            $this->load->library('upload', $config);
            if ($this->upload->do_upload('surat_file')) {

                $fileData = $this->upload->data();
                $upload = [
                    'nama_surat' => $fileData['file_name'],
                    'id_surat' => $exe
                ];
                $dt = $this->m_surat->upload_surat($upload);
            }

            // window.location.href ='" . base_url('admin/surat') . "';
            if ($exe > 0) {
                echo "<script type='text/javascript'>
            alert(' Berhasil ');
            window.location.href ='" . base_url('admin/surat/surat_proses') . "';
            </script>";
            }
        }
    }

    function surat_edit()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {


            // jika status 1 terdisposisi dan jika 0 belum disposisi 
            $data = array(
                'no_surat' => $this->input->post('no_surat'),
                'surat_dari' => $this->input->post('surat_dari'),
                'surat_diterima_tgl' => $this->input->post('surat_diterima_tgl'),
                'no_agenda_surat' => $this->input->post('no_agenda_surat'),
                'surat_tanggal' => $this->input->post('surat_tanggal'),
                'status' => 0,
                'surat_perihal' => $this->input->post('surat_perihal')
            );
            $exe = $this->m_surat->update($data, $this->input->post('id_surat'));


            $id_surat_det = $this->input->post('id_surat');
            $old_surat = $this->input->post('old_surat');
            $config['upload_path'] = './assets2/file_surat/';
            $config['allowed_types'] = 'pdf';
            // $config['max_size'] = 5000;
            $config['file_name'] = 'Surat-' . date('dmY') . '-' . substr(
                md5(rand()),
                0,
                10
            );

            $this->load->library('upload', $config);

            if ($_FILES['new_surat_file']['name'] != null) {

                if ($this->upload->do_upload('new_surat_file')) {

                    if (file_exists("./assets2/file_surat/" . $old_surat)) {
                        unlink("./assets2/file_surat/" . $old_surat);
                    }

                    $cek = $this->db->get_where(
                        't_file_surat',
                        array('id_surat' => $id_surat_det)
                    )->row_array();

                    if ($cek == null) {
                        $upload = [
                            'id_surat' => $id_surat_det,
                            'nama_surat' => $this->upload->data('file_name')
                        ];
                        $dt = $this->m_surat->upload_surat($upload);
                    } else {
                        $upload = [
                            'nama_surat' => $this->upload->data('file_name')
                        ];
                        $dt = $this->m_surat->update_file_surat($upload, $id_surat_det);
                    }

                    if ($dt > 0) {
                        echo "<script type='text/javascript'>
                            alert(' Berhasil ');
                             window.location.href ='" . base_url('admin/surat') . "';
                            </script>";
                    } else {
                        echo "<script type='text/javascript'>
                            alert(' Gagal ');
                            window.location.href ='" . base_url('admin/surat') . "';
                            </script>";
                    }
                }
            } else {
                echo "<script type='text/javascript'>
                            alert(' Berhasil ');
                             window.location.href ='" . base_url('admin/surat') . "';
                            </script>";
            }
        }
    }



    function edit()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {
            $id = $this->input->get('id_surat');
            $get_data = $this->m_surat->get_detail($id);


            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/surat_edit',
                'get_data' => $get_data,
                'footer' => 'layout/footer',
                'title' => 'Surat Disposisi ',
            );

            $this->load->view($data['masterpage'], $data);
            // echo json_encode($get_det);
        }
    }


    function edit_proses()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {
            $id = $this->input->get('id_surat');
            $get_data = $this->m_surat->get_detail($id);


            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/surat_edit_proses',
                'get_data' => $get_data,
                'footer' => 'layout/footer',
                'title' => 'Edit Surat ',
            );

            $this->load->view($data['masterpage'], $data);
            // echo json_encode($get_det);
        }
    }


    function surat_edit_proses()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {


            // jika status 1 terdisposisi dan jika 0 belum disposisi 
            $data = array(
                'no_surat' => $this->input->post('no_surat'),
                'surat_dari' => $this->input->post('surat_dari'),
                'surat_diterima_tgl' => $this->input->post('surat_diterima_tgl'),
                'no_agenda_surat' => $this->input->post('no_agenda_surat'),
                'surat_tanggal' => $this->input->post('surat_tanggal'),
                'status' => 0,
                'surat_perihal' => $this->input->post('surat_perihal')
            );
            $exe = $this->m_surat->update($data, $this->input->post('id_surat'));

            $id_surat_det = $this->input->post('id_surat');
            $old_surat = $this->input->post('old_surat');
            $config['upload_path'] = './assets2/file_surat/';
            $config['allowed_types'] = 'pdf';
            // $config['max_size'] = 5000;
            $config['file_name'] = 'Surat-' . date('dmY') . '-' . substr(md5(rand()), 0, 10);

            $this->load->library('upload', $config);

            if ($_FILES['new_surat_file']['name'] != null) {

                if ($this->upload->do_upload('new_surat_file')) {

                    if (file_exists("./assets2/file_surat/" . $old_surat)) {
                        unlink("./assets2/file_surat/" . $old_surat);
                    }

                    $cek = $this->db->get_where('t_file_surat', array('id_surat' => $id_surat_det))->row_array();

                    if ($cek == null) {
                        $upload = [
                            'id_surat' => $id_surat_det,
                            'nama_surat' => $this->upload->data('file_name')
                        ];
                        $dt = $this->m_surat->upload_surat($upload);
                    } else {
                        $upload = [
                            'nama_surat' => $this->upload->data('file_name')
                        ];
                        $dt = $this->m_surat->update_file_surat($upload, $id_surat_det);
                    }

                    if ($dt > 0) {
                        echo "<script type='text/javascript'>
                            alert(' Berhasil ');
                             window.location.href ='" . base_url('admin/surat/surat_proses') . "';
                            </script>";
                    } else {
                        echo "<script type='text/javascript'>
                            alert(' Gagal ');
                            window.location.href ='" . base_url('admin/surat/surat_proses') . "';
                            </script>";
                    }
                }
            } else {
                echo "<script type='text/javascript'>
                            alert(' Berhasil ');
                             window.location.href ='" . base_url('admin/surat/surat_proses') . "';
                            </script>";
            }
        }
    }
    function disposisi()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {
            $id = $this->input->get('id_surat');
            $get_data = $this->m_surat->get_detail($id);

            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/surat_disposisi',
                'get_data' => $get_data,
                'footer' => 'layout/footer',
                'title' => 'Surat Disposisi ',
            );

            $this->load->view($data['masterpage'], $data);
            // echo json_encode($get_det);
        }
    }


    function disposisi_sub()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {
            $id = $this->input->get('id_surat');
            $get_data = $this->m_surat->get_detail_dispo($id);

            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/surat_disposisi_sub',
                'get_data' => $get_data,
                'footer' => 'layout/footer',
                'title' => 'Surat Disposisi ',
            );

            $this->load->view($data['masterpage'], $data);
            // echo json_encode($get_det);
        }
    }

    function lihat_disposisi()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {
            $id = $this->input->get('id_surat');
            $get_data = $this->m_surat->get_detail($id);

            $det = $this->m_surat->get_detail_diposisi($id);
            // var_dump($det);
            // exit();

            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/lihat_disposisi',
                'get_data' => $get_data,
                'det' => $det,
                'footer' => 'layout/footer',
                'title' => 'History Disposisi ',
            );

            $this->load->view($data['masterpage'], $data);
        }
    }


    function disposisi_edit()
    {

        $disposisi_bidang = $this->input->post('disposisi_ke_id_bidang');
        $tgl_disp = date("Y-m-d H:i:s");

        for ($i = 0; $i < count($disposisi_bidang); $i++) {
            // $insert_disp = $this->ins
            $data = array(
                'id_t_surat' => $this->input->post('id_surat'),
                'tgl_surat_disposisi' => $tgl_disp,
                'disposisi_dari_id_bidang' => $this->session->userdata('id_bidang'),
                'disposisi_dari_id_jabatan' => $this->session->userdata('id_jabatan'),
                'disposisi_ke_id_bidang' => $disposisi_bidang[$i]

            );
            $exe = $this->m_surat->tambah('t_surat_disposisi', $data);
        }

        if (isset($_POST['surat_keterangan'])) {

            $surat_keterangan = $_POST['surat_keterangan'];
            for ($i = 0; $i < count($surat_keterangan); $i++) {

                // echo $surat_keterangan[$i] . "<br>";
                //  $surat_keterangan[$i] . "<br>";
            }
        }


        $surat_ket = (implode("", $surat_keterangan));


        $update = array(
            'status' => 1,
            'surat_keterangan' => $surat_ket
        );
        $update_t_surat = $this->m_surat->update($update, $this->input->post('id_surat'));

        if ($exe > 0) {
            echo "<script type='text/javascript'>
            alert(' Berhasil ');
            window.location.href ='" . base_url('admin/surat') . "';
            </script>";
        }
    }


    function disposisi_sub_proses()
    {

        $disposisi_bidang = $this->input->post('disposisi_ke_id_bidang');
        $id_surat_disposisi = $this->input->post('id_surat_disposisi');

        $tgl_disp = date("Y-m-d H:i:s");

        if (isset($_POST['disposisi_keterangan'])) {

            $disposisi_keterangan = $_POST['disposisi_keterangan'];
            for ($i = 0; $i < count($disposisi_keterangan); $i++) {

                // echo $disposisi_keterangan[$i] . "<br>";
                //  $disposisi_keterangan[$i] . "<br>";
            }
        }


        $surat_ket = (implode("", $disposisi_keterangan));


        if ($this->session->userdata('id_jabatan') == 4) {
            for ($i = 0; $i < count($disposisi_bidang); $i++) {
                // $insert_disp = $this->ins
                $data = array(
                    'id_t_surat' => $this->input->post('id_surat'),
                    'tgl_surat_disposisi' => $tgl_disp,
                    'disposisi_dari_id_bidang' => $this->session->userdata('id_bidang'),
                    'disposisi_dari_id_jabatan' => $this->session->userdata('id_jabatan'),
                    'disposisi_id_user' => $disposisi_bidang[$i],
                    'disposisi_ke_sub' => 1,
                    'disposisi_keterangan' => $surat_ket

                );
                $exe = $this->m_surat->tambah('t_surat_disposisi', $data);
            }
        } else {

            for ($i = 0; $i < count($disposisi_bidang); $i++) {
                // $insert_disp = $this->ins
                $data = array(
                    'id_t_surat' => $this->input->post('id_surat'),
                    'tgl_surat_disposisi' => $tgl_disp,
                    'disposisi_dari_id_bidang' => $this->session->userdata('id_bidang'),
                    'disposisi_dari_id_jabatan' => $this->session->userdata('id_jabatan'),
                    'disposisi_ke_id_bidang' => $disposisi_bidang[$i],
                    'disposisi_ke_sub' => 1,
                    'disposisi_keterangan' => $surat_ket

                );
                $exe = $this->m_surat->tambah('t_surat_disposisi', $data);
            }
        }
        if ($this->session->userdata('id_jabatan') == 1) {
            $update = array(
                'status' => 1,
                'surat_keterangan' => $surat_ket
            );
            $update_t_surat = $this->m_surat->update($update, $this->input->post('id_surat'));
        } else if ($this->session->userdata('id_jabatan') == 2) {
            $update = array(
                'disposisi_ke_sub' => 1,
                // 'surat_keterangan' => $surat_ket
            );
            // $update_t_surat = $this->m_surat->update($update, $this->input->post('id_surat'));
            $update_surat = $this->m_surat->update_det($update, $id_surat_disposisi);
        } else if ($this->session->userdata('id_jabatan') == 3) {

            $update = array(
                'disposisi_ke_sub' => 1,
                // 'surat_keterangan' => $surat_ket
            );
            // $update_t_surat = $this->m_surat->update($update, $this->input->post('id_surat'));
            $update_surat = $this->m_surat->update_det($update, $id_surat_disposisi);
        } else {
            $update = array(
                'disposisi_ke_staf' => 1,
                'disposisi_ke_sub' => 1,
                // 'surat_keterangan' => $surat_ket
            );
            // $update_t_surat = $this->m_surat->update($update, $this->input->post('id_surat'));
            $update_surat = $this->m_surat->update_det($update, $id_surat_disposisi);
        }


        // $update = array(
        //     'status' => 1,
        //     'surat_keterangan' => $surat_ket
        // );
        // $update_t_surat = $this->m_surat->update($update, $this->input->post('id_surat'));

        if ($exe > 0) {
            echo "<script type='text/javascript'>
            alert(' Berhasil ');
            window.location.href ='" . base_url('admin/surat/surat_dispo') . "';
            </script>";
        }
    }

    function detail()
    {
        $id = $this->input->post('id');
        $get_det = $this->m_tahanan->get_detail($id);
        echo json_encode($get_det);
    }


    function cetak_surat_pdf()
    {

        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Surat Disposisi');
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');
        $pdf->AddPage();

        $id_surat = $this->input->get('id_surat');
        $data['data_s'] = $this->m_surat->get_detail_diposisi($id_surat);
        $data['data_d'] = $this->m_surat->get_detail($id_surat);


        $content = $this->load->view('admin/pdf_surat', $data, true);


        // $pdf->Write(5,  $this->load->view($data['masterpage'], $data));
        $pdf->Write(5, '', '', 0, 'L', true, 0, false, false, 0);
        $pdf->writeHTML($content, true, false, true, false, '');
        ob_end_clean();
        $pdf->Output('admin/pengaduan_elaksa.pdf', 'I');
    }
}
