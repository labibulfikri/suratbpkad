<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_agenda');
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
            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/data_agenda',
                'footer' => 'layout/footer',
                'title' => ' Daftar Agenda',
            );
            $this->load->view($data['masterpage'], $data);
        }
    }


    function fetch_agenda()
    {

        $fetch_data = $this->m_agenda->make_datatables();



        $data = array();
        $a = 1;
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $a++;
            if ($row->nama_agenda != null) {
                $sub_array[] = '<a target="_blank" href="' . base_url('assets2/file_agenda/' . $row->nama_agenda . '') . '"> <br><img width="30px" src="' . base_url('assets2/download.png') . ' "> </a>';
            } else {
                $sub_array[] = '';
            }
            $sub_array[] = '<table> <th> <b> Nomor Undangan </b> </th> <th> <b> : </b> </th> <th> ' . $row->agenda_no_masuk . '  </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->agenda_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->agenda_tgl . '</td></tr><tr><td> Waktu </td> <td> : </td> <td> ' . $row->agenda_waktu . '</td></tr> <tr><td> Tempat </td> <td> : </td> <td> ' . $row->agenda_tempat . '</td></tr> <tr><td> Perihal </td> <td> : </td> <td> ' . $row->agenda_perihal . '</td></tr></table> ';
            if ($row->status == 0) {
                $sub_array[] = "";
                $sub_array[] = '<a href="' . base_url('admin/agenda/disposisi_agenda?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-edit"> Disposisi</i> </a>|<br> <a href="' . base_url('admin/agenda/edit?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-warning btn-sm"> <i class="far fa-edit"> Edit</i>   </a>';
            } else {
                $sub_array[] = '<a target="_blank" href="' . base_url('admin/agenda/cetak_agenda_pdf?id_agenda=' . $row->id_agenda . '') . '"" class="btn btn-info btn-sm"> <i class="far fa-print"> Cetak</i></a>';
                $sub_array[] = '<a href="' . base_url('admin/agenda/lihat_disposisi?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file"> Lihat Disposisi</i>  </a>';
            }



            $data[] = $sub_array;
        }
        $output = array(
            "draw"                      =>     intval($_POST["draw"]),
            "recordsTotal"              =>     $this->m_agenda->get_all_data(),
            "recordsFiltered"           =>     $this->m_agenda->get_filtered_data(),
            "data"                      =>     $data
        );
        echo json_encode($output);
    }


    function fetch_agenda_proses()
    {

        $fetch_data = $this->m_agenda->make_datatables_proses();



        $data = array();
        $a = 1;
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $a++;
            if ($row->nama_agenda != null) {
                $sub_array[] = '<a target="_blank" href="' . base_url('assets2/file_agenda/' . $row->nama_agenda . '') . '"> <br><img width="30px" src="' . base_url('assets2/download.png') . ' "> </a>';
            } else {
                $sub_array[] = '';
            }
            $sub_array[] = '<table> <th> <b> Nomor Undangan </b> </th> <th> <b> : </b> </th> <th> ' . $row->agenda_no_masuk . '  </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->agenda_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->agenda_tgl . '</td></tr><tr><td> Waktu </td> <td> : </td> <td> ' . $row->agenda_waktu . '</td></tr><tr><td> Tempat </td> <td> : </td> <td> ' . $row->agenda_tempat . '</td></tr><tr><td> Perihal </td> <td> : </td> <td> ' . $row->agenda_perihal . '</td></tr></table> ';
            if ($row->status == 0) {
                $sub_array[] = "";
                $sub_array[] = '<a href="' . base_url('admin/agenda/agenda_edit_proses?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-warning btn-sm"> <i class="far fa-edit"> Edit</i>   </a>';
            } else {
                $sub_array[] = '<a target="_blank" href="' . base_url('admin/agenda/cetak_agenda_pdf?id_agenda=' . $row->id_agenda . '') . '"" class="btn btn-info btn-sm"> <i class="far fa-print"> Cetak</i></a>';
                $sub_array[] = '<a href="' . base_url('admin/agenda/lihat_disposisi?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file"> Lihat Disposisi</i>  </a>';
            }



            $data[] = $sub_array;
        }
        $output = array(
            "draw"                      =>     intval($_POST["draw"]),
            "recordsTotal"              =>     $this->m_agenda->get_all_data_proses(),
            "recordsFiltered"           =>     $this->m_agenda->get_filtered_data_proses(),
            "data"                      =>     $data
        );
        echo json_encode($output);
    }

    function tambah_data_agenda()
    {

        // $opd = $this->m_surat->opd();
        $kode = $this->m_agenda->buat_kode_agenda();
        // var_dump($kode);
        // exit();

        $data = array(
            'masterpage' => 'layout/layout',
            'navbar' => 'layout/navbar',
            'sidebar' => 'layout/sidebar',
            'kode' => $kode,
            'content' => 'admin/entry_agenda_masuk',
            // 'content' => 'admin/data_surat',
            'footer' => 'layout/footer',
            'title' => 'Entry Undangan Masuk ',
        );
        $this->load->view($data['masterpage'], $data);
    }



    function tambah()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {

            $data = array(
                'no_agenda' => $this->input->post('no_agenda'),
                'agenda_no_masuk' => $this->input->post('agenda_no_masuk'),
                'agenda_dari' => $this->input->post('agenda_dari'),
                'agenda_diterima_tgl' => $this->input->post('agenda_diterima_tgl'),
                // 'no_agenda_agenda' => $this->input->post('no_agenda_agenda'),
                'agenda_tgl' => $this->input->post('agenda_tanggal'),
                'agenda_waktu' => $this->input->post('agenda_waktu'),
                'agenda_tempat' => $this->input->post('agenda_tempat'),
                'status' => 0,
                'agenda_jenis' => 2,
                'agenda_perihal' => $this->input->post('agenda_perihal')
            );

            $exe = $this->m_agenda->tambah('t_agenda', $data);
            $agenda_file = $this->input->post('agenda_file');
            $config['upload_path'] = './assets2/file_agenda/';
            $config['allowed_types'] = 'pdf|JPEG|JPG|png|jpg';
            $config['max_size'] = 2000;


            $this->load->library('upload', $config);
            if ($this->upload->do_upload('agenda_file')) {

                $fileData = $this->upload->data();
                $upload = [
                    'nama_agenda' => $fileData['file_name'],
                    't_id_agenda' => $exe
                ];
                $dt = $this->m_agenda->upload_agenda($upload);
            }



            if ($exe > 0) {
                echo "<script type='text/javascript'>
            alert(' Berhasil ');
            window.location.href ='" . base_url('admin/agenda/agenda_proses') . "';
            </script>";
            }
        }
    }



    public function agenda_proses()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {


            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/data_agenda_proses',
                'footer' => 'layout/footer',
                'title' => 'Undangan Masuk',
            );
            $this->load->view($data['masterpage'], $data);
        }
    }


    function agenda_edit()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {


            $data = array(
                'no_agenda' => $this->input->post('no_agenda'),
                'agenda_no_masuk' => $this->input->post('agenda_no_masuk'),
                'agenda_dari' => $this->input->post('agenda_dari'),
                'agenda_diterima_tgl' => $this->input->post('agenda_diterima_tgl'),
                'agenda_tgl' => $this->input->post('agenda_tanggal'),
                'agenda_waktu' => $this->input->post('agenda_waktu'),
                'agenda_tempat' => $this->input->post('agenda_tempat'),
                'status' => 0,
                'agenda_perihal' => $this->input->post('agenda_perihal')
            );


            $exe = $this->m_agenda->update($data, $this->input->post('id_agenda'));
            $id_agenda_det = $this->input->post('id_agenda');
            $old_agenda = $this->input->post('old_agenda');
            $new_agenda_file = $_FILES['new_agenda_file']['name'];


            // if ($new_agenda_file == TRUE) {

            $config['upload_path'] = './assets2/file_agenda/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 5000;
            // $update_file = rand();
            // $update_file = time() . $_FILES['new_agenda_file']['name'];
            // $config['file_name'] = $update_file;
            $config['file_name'] = 'undangan-' . date('dmY') . '-' . substr(md5(rand()), 0, 10);


            $this->load->library('upload', $config);
            if ($_FILES['new_agenda_file']['name'] != null) {

                if ($this->upload->do_upload('new_agenda_file')) {

                    if (file_exists("./assets2/file_agenda/" . $old_agenda)) {
                        unlink("./assets2/file_agenda/" . $old_agenda);
                    }

                    $cek = $this->db->get_where('t_file_agenda', array('t_id_agenda' => $id_agenda_det))->row_array();

                    if ($cek == null) {
                        $upload = [
                            't_id_agenda' => $id_agenda_det,
                            'nama_agenda' => $this->upload->data('file_name')
                        ];
                        $dt = $this->m_agenda->upload_agenda($upload);
                    } else {
                        $upload = [
                            'nama_agenda' => $this->upload->data('file_name')
                        ];
                        $dt = $this->m_agenda->update_file_agenda($upload, $id_agenda_det);
                    }

                    if ($dt > 0) {
                        echo "<script type='text/javascript'>
                            alert(' Berhasil ');
                             window.location.href ='" . base_url('admin/agenda') . "';
                            </script>";
                    } else {
                        echo "<script type='text/javascript'>
                            alert(' Gagal ');
                            window.location.href ='" . base_url('admin/agenda') . "';
                            </script>";
                    }
                }
            } else {
                echo "<script type='text/javascript'>
                            alert(' Berhasil ');
                             window.location.href ='" . base_url('admin/agenda') . "';
                            </script>";
            }
        }
    }



    function do_agenda_edit()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {


            $data = array(
                'no_agenda' => $this->input->post('no_agenda'),
                'agenda_no_masuk' => $this->input->post('agenda_no_masuk'),
                'agenda_dari' => $this->input->post('agenda_dari'),
                'agenda_diterima_tgl' => $this->input->post('agenda_diterima_tgl'),
                'agenda_tgl' => $this->input->post('agenda_tanggal'),
                'agenda_waktu' => $this->input->post('agenda_waktu'),
                'agenda_tempat' => $this->input->post('agenda_tempat'),
                'status' => 0,
                'agenda_perihal' => $this->input->post('agenda_perihal')
            );


            $exe = $this->m_agenda->update($data, $this->input->post('id_agenda'));

            $id_agenda_det = $this->input->post('id_agenda');
            $old_agenda = $this->input->post('old_agenda');
            $config['upload_path'] = './assets2/file_agenda/';
            $config['allowed_types'] = 'pdf';
            // $config['max_size'] = 5000;
            $config['file_name'] = 'undangan-masuk-' . date('dmY') . '-' . substr(md5(rand()), 0, 10);

            $this->load->library('upload', $config);


            if ($_FILES['new_agenda_file']['name'] != null) {

                if ($this->upload->do_upload('new_agenda_file')) {

                    if (file_exists("./assets2/file_agenda/" . $old_agenda)) {
                        unlink("./assets2/file_agenda/" . $old_agenda);
                    }

                    $cek = $this->db->get_where('t_file_agenda', array('t_id_agenda' => $id_agenda_det))->row_array();
                    if ($cek == null) {
                        $upload = [
                            't_id_agenda' => $id_agenda_det,
                            'nama_agenda' => $this->upload->data('file_name')
                        ];
                        $dt = $this->m_agenda->upload_agenda($upload);
                    } else {
                        $upload = [
                            'nama_agenda' => $this->upload->data('file_name')
                        ];
                        $dt = $this->m_agenda->update_file_agenda($upload, $id_agenda_det);
                    }
                    if ($dt > 0) {
                        echo "<script type='text/javascript'>
                            alert(' Berhasil ');
                             window.location.href ='" . base_url('admin/agenda/agenda_proses') . "';
                            </script>";
                    } else {
                        echo "<script type='text/javascript'>
                            alert(' Gagal ');
                            window.location.href ='" . base_url('admin/agenda/agenda_proses') . "';
                            </script>";
                    }
                }
            } else {
                echo "<script type='text/javascript'>
                            alert(' Berhasil ');
                             window.location.href ='" . base_url('admin/agenda/agenda_proses') . "';
                            </script>";
            }
        }
    }

    function disposisi_agenda()
    {
        $id = $this->input->get('id_agenda');

        $get_data = $this->m_agenda->get_detail($id);

        $data = array(
            'masterpage' => 'layout/layout',
            'navbar' => 'layout/navbar',
            'sidebar' => 'layout/sidebar',
            'content' => 'admin/agenda_disposisi',
            'get_data' => $get_data,
            'footer' => 'layout/footer',
            'title' => 'Disposisi Undangan ',
        );

        $this->load->view($data['masterpage'], $data);
        // echo json_encode($get_det);
    }


    function disposisi_agenda_edit()
    {

        $disposisi_bidang = $this->input->post('disposisi_ke_id_bidang');
        $tgl_disp = date("Y-m-d H:i:s");

        for ($i = 0; $i < count($disposisi_bidang); $i++) {
            // $insert_disp = $this->ins
            $data = array(
                'id_t_agenda' => $this->input->post('id_agenda'),
                'tgl_agenda_dispo' => $tgl_disp,
                'dispo_dari_id_bidang' => $this->session->userdata('id_bidang'),
                'dispo_dari_id_jabatan' => $this->session->userdata('id_jabatan'),
                'dispo_ke_id_bidang' => $disposisi_bidang[$i]

            );
            $exe = $this->m_agenda->tambah('t_agenda_disposisi', $data);
        }

        if (isset($_POST['agenda_keterangan'])) {

            $agenda_keterangan = $_POST['agenda_keterangan'];
            for ($i = 0; $i < count($agenda_keterangan); $i++) {

                // echo $agenda_keterangan[$i] . "<br>";
                //  $agenda_keterangan[$i] . "<br>";
            }
        }


        $agenda_ket = (implode("", $agenda_keterangan));


        $update = array(
            'status' => 1,
            'agenda_keterangan' => $agenda_ket
        );
        $update_t_agenda = $this->m_agenda->update($update, $this->input->post('id_agenda'));

        if ($exe > 0) {
            echo "<script type='text/javascript'>
            alert(' Berhasil ');
            window.location.href ='" . base_url('admin/agenda') . "';
            </script>";
        }
    }



    function disposisi_sub_proses()
    {

        $disposisi_bidang = $this->input->post('disposisi_ke_id_bidang');
        $id_agenda_dispo = $this->input->post('id_agenda_dispo');

        $tgl_disp = date("Y-m-d H:i:s");

        if (isset($_POST['agenda_keterangan'])) {

            $agenda_keterangan = $_POST['agenda_keterangan'];
            for ($i = 0; $i < count($agenda_keterangan); $i++) {

                // echo $agenda_keterangan[$i] . "<br>";
                //  $agenda_keterangan[$i] . "<br>";
            }
        }


        $agenda_ket = (implode("", $agenda_keterangan));


        if ($this->session->userdata('id_jabatan') == 4) {

            for ($i = 0; $i < count($disposisi_bidang); $i++) {
                // $insert_disp = $this->ins
                $data = array(
                    'id_t_agenda' => $this->input->post('id_agenda'),
                    'tgl_agenda_dispo' => $tgl_disp,
                    'dispo_dari_id_bidang' => $this->session->userdata('id_bidang'),
                    'dispo_dari_id_jabatan' => $this->session->userdata('id_jabatan'),
                    'dispo_id_user' => $disposisi_bidang[$i],
                    'dispo_keterangan' => $agenda_ket

                );
                $exe = $this->m_agenda->tambah('t_agenda_disposisi', $data);
            }
        } else {

            for ($i = 0; $i < count($disposisi_bidang); $i++) {
                // $insert_disp = $this->ins
                $data = array(
                    'id_t_agenda' => $this->input->post('id_agenda'),
                    'tgl_agenda_dispo' => $tgl_disp,
                    'dispo_dari_id_bidang' => $this->session->userdata('id_bidang'),
                    'dispo_dari_id_jabatan' => $this->session->userdata('id_jabatan'),
                    'dispo_ke_id_bidang' => $disposisi_bidang[$i],
                    'dispo_keterangan' => $agenda_ket

                );
                $exe = $this->m_agenda->tambah('t_agenda_disposisi', $data);
            }
        }

        if ($this->session->userdata('id_jabatan') == 1) {
            $update = array(
                'status' => 1,
                // 'surat_keterangan' => $surat_ket
            );
            $update_t_surat = $this->m_agenda->update($update, $this->input->post('id_surat'));
        } else if ($this->session->userdata('id_jabatan') == 2) {
            $update = array(
                'dispo_ke_sub' => 1,
                // 'surat_keterangan' => $surat_ket
            );
            // $update_t_surat = $this->m_agenda->update($update, $this->input->post('id_surat'));
            $update_surat = $this->m_agenda->update_det($update, $id_agenda_dispo);
        } else if ($this->session->userdata('id_jabatan') == 3) {

            $update = array(
                'dispo_ke_sub' => 1,
                // 'surat_keterangan' => $surat_ket
            );
            // $update_t_surat = $this->m_agenda->update($update, $this->input->post('id_surat'));
            $update_surat = $this->m_agenda->update_det($update, $id_agenda_dispo);
        } else {
            $update = array(
                'dispo_ke_staf' => 1,
                'dispo_ke_sub' => 1,
                // 'surat_keterangan' => $surat_ket
            );
            // $update_t_surat = $this->m_agenda->update($update, $this->input->post('id_surat'));
            $update_surat = $this->m_agenda->update_det($update, $id_agenda_dispo);
        }



        if ($exe > 0) {
            echo "<script type='text/javascript'>
            alert(' Berhasil ');
            window.location.href ='" . base_url('admin/agenda/agenda_dispo') . "';
            </script>";
        }
    }
    function edit()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {
            $id = $this->input->get('id_agenda');
            $get_data = $this->m_agenda->get_detail($id);


            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/agenda_edit',
                'get_data' => $get_data,
                'footer' => 'layout/footer',
                'title' => 'Undangan Disposisi ',
            );

            $this->load->view($data['masterpage'], $data);
            // echo json_encode($get_det);
        }
    }

    function agenda_edit_proses()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {
            $id = $this->input->get('id_agenda');
            $get_data = $this->m_agenda->get_detail($id);


            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/agenda_edit_proses',
                'get_data' => $get_data,
                'footer' => 'layout/footer',
                'title' => 'Undangan Disposisi ',
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
            $id = $this->input->get('id_agenda');

            $get_data = $this->m_agenda->get_detail($id);
            $det = $this->m_agenda->get_detail_diposisi($id);

            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/lihat_disposisi_agenda',
                'get_data' => $get_data,
                'det' => $det,
                'footer' => 'layout/footer',
                'title' => 'History Disposisi Undangan Masuk ',
            );

            $this->load->view($data['masterpage'], $data);
            // echo json_encode($get_det);
        }
    }


    function cetak_agenda_pdf()
    {

        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Undangan Disposisi');
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');
        $pdf->AddPage();

        $id_agenda = $this->input->get('id_agenda');
        $data['data_s'] = $this->m_agenda->get_detail_diposisi($id_agenda);
        $data['data_d'] = $this->m_agenda->get_detail($id_agenda);

        $content = $this->load->view('admin/pdf_agenda', $data, true);


        // $pdf->Write(5,  $this->load->view($data['masterpage'], $data));
        $pdf->Write(5, '', '', 0, 'L', true, 0, false, false, 0);
        $pdf->writeHTML($content, true, false, true, false, '');
        ob_end_clean();
        $pdf->Output('admin/pengaduan_elaksa.pdf', 'I');
    }

    public function agenda_dispo()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {
            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/data_agenda_dispo',
                'footer' => 'layout/footer',
                'title' => 'Undangan Masuk',
            );
            $this->load->view($data['masterpage'], $data);
        }
    }

    function fetch_agenda_keluar()
    {

        if ($this->session->userdata('id_jabatan') == 1) {
            $id = $this->session->userdata('id_bidang');
            $fetch_data = $this->m_agenda->make_datatables_undangan_keluar($id);


            $data = array();
            $a = 1;
            foreach ($fetch_data as $row) {
                $sub_array = array();
                $sub_array[] = $a++;
                if ($row->nama_agenda != null) {
                    $sub_array[] = '<a target="_blank" href="' . base_url('assets2/file_agenda/' . $row->nama_agenda . '') . '"> <br><img width="30px" src="' . base_url('assets2/download.png') . ' "> </a>';
                } else {
                    $sub_array[] = '';
                }
                $sub_array[] = '<table> <th> <b> Nomor Undangan </b> </th> <th> <b> : </b> </th> <th> ' . $row->agenda_no_keluar . '  </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->agenda_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->agenda_tgl . '</td></tr><tr><td> Waktu </td> <td> : </td> <td> ' . $row->agenda_waktu . '</td></tr><tr><td> Perihal </td> <td> : </td> <td> ' . $row->agenda_perihal . '</td></tr></table> ';
                if ($row->otorisasi == 2 and $row->agenda_dari_id_bidang == 6) {
                    $sub_array[] = "";
                    $sub_array[] = '<button type="submit" class="btn btn-danger SwalBtn2"  id="' . $row->id_agenda . '" > Otorisasi </button>|<br> <a href="' . base_url('admin/agenda/edit_agenda_keluar?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-warning btn-sm"> <i class="far fa-edit"> Edit</i>   </button>';
                } else {
                    $sub_array[] = "";
                    $sub_array[] = '<button type="submit" class="btn btn-danger SwalBtn2" daribidang="' . $row->agenda_dari_id_bidang . '" id="' . $row->id_agenda . '" > Otorisasi </button>';
                }


                $data[] = $sub_array;
            }
            $output = array(
                "draw"                      =>     intval($_POST["draw"]),
                "recordsTotal"              =>     $this->m_agenda->get_all_data_undangan_keluar($id),
                "recordsFiltered"           =>     $this->m_agenda->get_filtered_data_undangan_keluar($id),
                "data"                      =>     $data
            );
            echo json_encode($output);
        } else if ($this->session->userdata('id_jabatan') == 2) {
            $id = $this->session->userdata('id_bidang');
            $fetch_data = $this->m_agenda->make_datatables_undangan_keluar($id);


            $data = array();
            $a = 1;
            foreach ($fetch_data as $row) {
                $sub_array = array();
                $sub_array[] = $a++;
                if ($row->nama_agenda != null) {
                    $sub_array[] = '<a target="_blank" href="' . base_url('assets2/file_agenda/' . $row->nama_agenda . '') . '"> <br><img width="30px" src="' . base_url('assets2/download.png') . ' "> </a>';
                } else {
                    $sub_array[] = '';
                }
                $sub_array[] = '<table> <th> <b> Nomor Undangan </b> </th> <th> <b> : </b> </th> <th> ' . $row->agenda_no_keluar . '  </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->agenda_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->agenda_tgl . '</td></tr><tr><td> Waktu </td> <td> : </td> <td> ' . $row->agenda_waktu . '</td></tr><tr><td> Perihal </td> <td> : </td> <td> ' . $row->agenda_perihal . '</td></tr></table> ';
                if ($row->otorisasi == 1 and $row->agenda_dari_id_bidang == 1) {
                    $sub_array[] = "";
                    $sub_array[] = '<button type="submit" class="btn btn-danger SwalBtn1"  id="' . $row->id_agenda . '" > Otorisasi </button>|<br> <a href="' . base_url('admin/agenda/edit_agenda_keluar?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-warning btn-sm"> <i class="far fa-edit"> Edit</i>   </button>';
                } else {
                    $sub_array[] = "";
                    $sub_array[] = '<button type="submit" class="btn btn-danger SwalBtn1"  id="' . $row->id_agenda . '" > Otorisasi </button>';
                }

                $data[] = $sub_array;
            }
            $output = array(
                "draw"                      =>     intval($_POST["draw"]),
                "recordsTotal"              =>     $this->m_agenda->get_all_data_undangan_keluar($id),
                "recordsFiltered"           =>     $this->m_agenda->get_filtered_data_undangan_keluar($id),
                "data"                      =>     $data
            );
            echo json_encode($output);
        } else {
            $id = $this->session->userdata('id_bidang');
            $fetch_data = $this->m_agenda->make_datatables_undangan_keluar($id);


            $data = array();
            $a = 1;
            foreach ($fetch_data as $row) {
                $sub_array = array();
                $sub_array[] = $a++;
                if ($row->nama_agenda != null) {
                    $sub_array[] = '<a target="_blank" href="' . base_url('assets2/file_agenda/' . $row->nama_agenda . '') . '"> <br><img width="30px" src="' . base_url('assets2/download.png') . ' "> </a>';
                } else {
                    $sub_array[] = '';
                }
                $sub_array[] = '<table> <th> <b> Nomor Undangan </b> </th> <th> <b> : </b> </th> <th> ' . $row->agenda_no_keluar . '  </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->agenda_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->agenda_tgl . '</td></tr><tr><td> Waktu </td> <td> : </td> <td> ' . $row->agenda_waktu . '</td></tr><tr><td> Perihal </td> <td> : </td> <td> ' . $row->agenda_perihal . '</td></tr></table> ';
                if ($row->otorisasi == 0) {
                    $sub_array[] = "";
                    $sub_array[] = '<button type="submit" class="btn btn-danger SwalBtn1"  id="' . $row->id_agenda . '" > Otorisasi </button>|<br> <a href="' . base_url('admin/agenda/edit_agenda_keluar?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-warning btn-sm"> <i class="far fa-edit"> Edit</i>   </button>';
                } else {
                    $sub_array[] = '<a target="_blank" href="' . base_url('admin/agenda/cetak_agenda_pdf?id_agenda=' . $row->id_agenda . '') . '"" class="btn btn-info btn-sm"> <i class="far fa-print"> Cetak</i></a>';
                    // $sub_array[] = '<a href="' . base_url('admin/agenda/lihat_disposisi?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file"> Lihat Disposisi</i>  </a> | <a href="' . base_url('admin/agenda/disposisi_agenda_sub?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file">  Disposisi</i>  </a>';
                    $sub_array[] = '';
                }
                if ($row->otorisasi == 3 and $row->agenda_dari_id_bidang == $this->session->userdata('id_bidang')) {
                    $sub_array[] = '<a target="_blank" href="' . base_url('admin/agenda/cetak_agenda_pdf?id_agenda=' . $row->id_agenda . '') . '"" class="btn btn-info btn-sm"> <i class="far fa-print"> Cetak</i></a>';
                    $sub_array[] = '<a href="' . base_url('admin/agenda/lihat_disposisi?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file"> Lihat Disposisi</i>  </a> | <a href="' . base_url('admin/agenda/disposisi_agenda_sub?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file">  Disposisi</i>  </a>';
                }
                // else {
                $sub_array[] = ' ';
                $sub_array[] = ' ';
                // }



                $data[] = $sub_array;
            }
            $output = array(
                "draw"                      =>     intval($_POST["draw"]),
                "recordsTotal"              =>     $this->m_agenda->get_all_data_undangan_keluar($id),
                "recordsFiltered"           =>     $this->m_agenda->get_filtered_data_undangan_keluar($id),
                "data"                      =>     $data
            );
            echo json_encode($output);
        }
    }
    function fetch_agenda_disp()
    {

        $id = $this->session->userdata('id_bidang');

        $fetch_data = $this->m_agenda->make_datatables_dispo($id);


        $data = array();
        $a = 1;
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $a++;
            if ($row->nama_agenda != null) {
                $sub_array[] = '<a target="_blank" href="' . base_url('assets2/file_agenda/' . $row->nama_agenda . '') . '"> <br><img width="30px" src="' . base_url('assets2/download.png') . ' "> </a>';
            } else {
                $sub_array[] = '';
            }
            $sub_array[] = '<table> <th> <b> Nomor Undangan </b> </th> <th> <b> : </b> </th> <th> ' . $row->agenda_no_masuk . '  </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->agenda_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->agenda_tgl . '</td></tr><tr><td> Waktu </td> <td> : </td> <td> ' . $row->agenda_waktu . '</td></tr><tr><td> Perihal </td> <td> : </td> <td> ' . $row->agenda_perihal . '</td></tr></table> ';
            // if ($row->status == 0) {
            //     $sub_array[] = "";
            //     $sub_array[] = '<a href="' . base_url('admin/agenda/disposisi_agenda?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-edit"> Disposisi</i> </a>|<br> <a href="' . base_url('admin/agenda/edit?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-warning btn-sm"> <i class="far fa-edit"> Edit</i>   </a>';
            // } else {
            //     $sub_array[] = '<a target="_blank" href="' . base_url('admin/agenda/cetak_agenda_pdf?id_agenda=' . $row->id_agenda . '') . '"" class="btn btn-info btn-sm"> <i class="far fa-print"> Cetak</i></a>';
            //     $sub_array[] = '<a href="' . base_url('admin/agenda/lihat_disposisi?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file"> Lihat Disposisi</i>  </a> | <a href="' . base_url('admin/agenda/disposisi_agenda_sub?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file">  Disposisi</i>  </a>';
            // }
            if ($this->session->userdata('id_jabatan') != 5 and $row->dispo_ke_sub == null) {
                $sub_array[] = '<a target="_blank" href="' . base_url('admin/agenda/cetak_agenda_pdf?id_agenda=' . $row->id_agenda . '') . '"" class="btn btn-info btn-sm"> <i class="far fa-print"> Cetak</i></a>';
                $sub_array[] = ' <a href="' . base_url('admin/agenda/disposisi_agenda_sub?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file">  Disposisi</i>  </a>| <a href="' . base_url('admin/agenda/lihat_disposisi?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file"> Lihat Disposisi</i>  </a>';
            } else if ($this->session->userdata('id_jabatan') == 4 and $row->dispo_ke_staf == null) {
                $sub_array[] = '<a target="_blank" href="' . base_url('admin/agenda/cetak_agenda_pdf?id_agenda=' . $row->id_agenda . '') . '"" class="btn btn-info btn-sm"> <i class="far fa-print"> Cetak</i></a>';
                $sub_array[] = ' <a href="' . base_url('admin/agenda/disposisi_agenda_sub?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file">  Disposisi</i>  </a> |  <a href="' . base_url('admin/agenda/lihat_disposisi?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file"> Lihat Disposisi</i>  </a>';
            } else {

                $sub_array[] = '<a target="_blank" href="' . base_url('admin/agenda/cetak_agenda_pdf?id_agenda=' . $row->id_agenda . '') . '"" class="btn btn-info btn-sm"> <i class="far fa-print"> Cetak</i></a>';
                $sub_array[] = ' <a href="' . base_url('admin/agenda/lihat_disposisi?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file"> Lihat Disposisi</i>  </a> ';
            }

            $data[] = $sub_array;
        }
        $output = array(
            "draw"                      =>     intval($_POST["draw"]),
            "recordsTotal"              =>     $this->m_agenda->get_all_data_dispo($id),
            "recordsFiltered"           =>     $this->m_agenda->get_filtered_data_dispo($id),
            "data"                      =>     $data
        );
        echo json_encode($output);
    }


    function update_otorisasi()
    {

        $id_agenda = $this->input->post('id_agenda');
        $dispo_dari_id_bidang = $this->input->post('dispo_dari_id_bidang');
        if ($this->session->userdata('id_jabatan') == 1) {
            $data = array('otorisasi' => 3);
            $tgl_disp = date("Y-m-d H:i:s");
            $update = $this->m_agenda->update($data, $id_agenda);


            if ($update) {
                $data = array(
                    'id_t_agenda' => $this->input->post('id_agenda'),
                    'tgl_agenda_dispo' => $tgl_disp,
                    'dispo_dari_id_bidang' => $this->session->userdata('id_bidang'),
                    'dispo_dari_id_jabatan' => $this->session->userdata('id_jabatan'),
                    'dispo_ke_id_bidang' => $dispo_dari_id_bidang
                );
                $exe = $this->m_agenda->tambah('t_agenda_disposisi', $data);
            }
        } else if ($this->session->userdata('id_jabatan') == 2) {
            $data = array('otorisasi' => 2);
            $update = $this->m_agenda->update($data, $id_agenda);
        } else {
            $data = array('otorisasi' => 1);
            $update = $this->m_agenda->update($data, $id_agenda);
        }
    }
    function disposisi_agenda_sub()
    {
        $id = $this->input->get('id_agenda');

        $get_data = $this->m_agenda->get_detail_sub($id);

        $data = array(
            'masterpage' => 'layout/layout',
            'navbar' => 'layout/navbar',
            'sidebar' => 'layout/sidebar',
            'content' => 'admin/agenda_disposisi_sub',
            'get_data' => $get_data,
            // 'det' => $det,
            'footer' => 'layout/footer',
            'title' => 'Disposisi Undangan ',
        );

        $this->load->view($data['masterpage'], $data);
        // echo json_encode($get_det);
    }


    function edit_agenda_keluar()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {
            $id = $this->input->get('id_agenda');
            $get_data = $this->m_agenda->get_detail($id);


            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/agenda_edit_keluar',
                'get_data' => $get_data,
                'footer' => 'layout/footer',
                'title' => 'Edit Undangan Keluar ',
            );

            $this->load->view($data['masterpage'], $data);
            // echo json_encode($get_det);
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
            $dari = $this->session->userdata('id_bidang');
            $this->db->select('nama_bidang');
            $this->db->from('t_bidang');
            $this->db->where('id_bidang', $dari);
            $query = $this->db->get()->row_array();
            $data = array(
                'no_agenda' => $this->input->post('no_agenda'),
                'agenda_no_keluar' => $this->input->post('agenda_no_keluar'),
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

            $exe = $this->m_agenda->tambah('t_agenda', $data);
            $agenda_file = $this->input->post('agenda_file');
            $config['upload_path'] = './assets2/file_agenda/';
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = 'undangan-' . date('dmY') . '-' . substr(md5(rand()), 0, 10);

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
    function tambah_data_agenda_keluar()
    {

        $kode = $this->m_agenda->buat_kode_agenda();

        $data = array(
            'masterpage' => 'layout/layout',
            'navbar' => 'layout/navbar',
            'sidebar' => 'layout/sidebar',
            'kode' => $kode,
            'content' => 'admin/entry_agenda_keluar',
            // 'content' => 'admin/data_surat',
            'footer' => 'layout/footer',
            'title' => 'Undangan Keluar ',
        );
        $this->load->view($data['masterpage'], $data);
    }



    function agenda_edit_keluar()
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

            $data = array(
                'agenda_no_keluar' => $this->input->post('agenda_no_keluar'),
                'agenda_dari' => $this->input->post('agenda_dari'),
                'agenda_diterima_tgl' => $this->input->post('agenda_diterima_tgl'),
                // 'no_agenda_agenda' => $this->input->post('no_agenda_agenda'),
                'agenda_tgl' => $this->input->post('agenda_tanggal'),
                'agenda_waktu' => $this->input->post('agenda_waktu'),
                'agenda_tempat' => $this->input->post('agenda_tempat'),
                'status' => 0,
                'otorisasi' => $otorisasi,
                'agenda_perihal' => $this->input->post('agenda_perihal')
            );


            $exe = $this->m_agenda->update($data, $this->input->post('id_agenda'));
            $id_agenda_det = $this->input->post('id_agenda');
            $old_agenda = $this->input->post('old_agenda');
            $config['upload_path'] = './assets2/file_agenda/';
            $config['allowed_types'] = 'pdf';
            // $config['max_size'] = 5000;
            $config['file_name'] = 'undangan-keluar-' . date('dmY') . '-' . substr(md5(rand()), 0, 10);

            $this->load->library('upload', $config);


            if ($_FILES['new_agenda_file']['name'] != null) {

                if ($this->upload->do_upload('new_agenda_file')) {

                    if (file_exists("./assets2/file_agenda/" . $old_agenda)) {
                        unlink("./assets2/file_agenda/" . $old_agenda);
                    }

                    $cek = $this->db->get_where('t_file_agenda', array('t_id_agenda' => $id_agenda_det))->row_array();

                    if ($cek == null) {
                        $upload = [
                            't_id_agenda' => $id_agenda_det,
                            'nama_agenda' => $this->upload->data('file_name')
                        ];
                        $dt = $this->m_agenda->upload_agenda($upload);
                    } else {
                        $upload = [
                            'nama_agenda' => $this->upload->data('file_name')
                        ];
                        $dt = $this->m_agenda->update_file_agenda($upload, $id_agenda_det);
                    }

                    if ($dt > 0) {
                        echo "<script type='text/javascript'>
                            alert(' Berhasil ');
                             window.location.href ='" . base_url('admin/agenda/agenda_keluar_otorisasi') . "';
                            </script>";
                    } else {
                        echo "<script type='text/javascript'>
                            alert(' Gagal ');
                            window.location.href ='" . base_url('admin/agenda/agenda_keluar_otorisasi') . "';
                            </script>";
                    }
                }
            } else {
                echo "<script type='text/javascript'>
                            alert(' Berhasil ');
                             window.location.href ='" . base_url('admin/agenda/agenda_keluar_otorisasi') . "';
                            </script>";
            }
        }
    }


    public function agenda_keluar_otorisasi()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {
            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/data_agenda_keluar',
                'footer' => 'layout/footer',
                'title' => 'Undangan Keluar',
            );
            $this->load->view($data['masterpage'], $data);
        }
    }

    public function agenda_keluar_otorisasi_selesai()
    {
        if ($this->session->userdata('status') != 'login') {

            redirect('auth/logout');
        } else {
            $data = array(
                'masterpage' => 'layout/layout',
                'navbar' => 'layout/navbar',
                'sidebar' => 'layout/sidebar',
                'content' => 'admin/data_agenda_keluar_selesai',
                'footer' => 'layout/footer',
                'title' => 'Undangan Keluar',
            );
            $this->load->view($data['masterpage'], $data);
        }
    }

    function fetch_agenda_keluar_selesai()
    {
        if ($this->session->userdata('id_jabatan') == 1) {
            $id = $this->session->userdata('id_bidang');
            $fetch_data = $this->m_agenda->make_datatables_undangan_keluar_selesai($id);


            $data = array();
            $a = 1;
            foreach ($fetch_data as $row) {
                $sub_array = array();
                $sub_array[] = $a++;
                if ($row->nama_agenda != null) {
                    $sub_array[] = '<a target="_blank" href="' . base_url('assets2/file_agenda/' . $row->nama_agenda . '') . '"> <br><img width="30px" src="' . base_url('assets2/download.png') . ' "> </a>';
                } else {
                    $sub_array[] = '';
                }
                $sub_array[] = '<table> <th> <b> Nomor Undangan </b> </th> <th> <b> : </b> </th> <th> ' . $row->agenda_jenis = (1) ? $row->agenda_no_keluar . ' </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->agenda_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->agenda_tgl . '</td></tr><tr><td> Waktu </td> <td> : </td> <td> ' . $row->agenda_waktu . '</td></tr><tr><td> Perihal </td> <td> : </td> <td> ' . $row->agenda_perihal . '</td></tr></table> ' : $row->no_agenda . '  </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->agenda_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->agenda_tgl . '</td></tr><tr><td> Waktu </td> <td> : </td> <td> ' . $row->agenda_waktu . '</td></tr><tr><td> Perihal </td> <td> : </td> <td> ' . $row->agenda_perihal . '</td></tr></table> ';
                // if ($row->otorisasi == 3 and $row->agenda_dari_id_bidang == 6) {
                if ($row->otorisasi == 3) {
                    $sub_array[] = '<a target="_blank" href="' . base_url('admin/agenda/cetak_agenda_pdf?id_agenda=' . $row->id_agenda . '') . '"" class="btn btn-info btn-sm"> <i class="far fa-print"> Cetak</i></a>';
                    $sub_array[] = '<a href="' . base_url('admin/agenda/lihat_disposisi?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file"> Lihat Disposisi</i>  </a> ';
                } else {
                    $sub_array[] = '';
                    $sub_array[] = '';
                }

                $data[] = $sub_array;
            }
            $output = array(
                "draw"                      =>     intval($_POST["draw"]),
                "recordsTotal"              =>     $this->m_agenda->get_all_data_undangan_keluar_selesai($id),
                "recordsFiltered"           =>     $this->m_agenda->get_filtered_data_undangan_keluar_selesai($id),
                "data"                      =>     $data
            );
            echo json_encode($output);
        } else if ($this->session->userdata('id_jabatan') == 2) {
            $id = $this->session->userdata('id_bidang');
            $fetch_data = $this->m_agenda->make_datatables_undangan_keluar_selesai($id);


            $data = array();
            $a = 1;
            foreach ($fetch_data as $row) {
                $sub_array = array();
                $sub_array[] = $a++;
                if ($row->nama_agenda != null) {
                    $sub_array[] = '<a target="_blank" href="' . base_url('assets2/file_agenda/' . $row->nama_agenda . '') . '"> <br><img width="30px" src="' . base_url('assets2/download.png') . ' "> </a>';
                } else {
                    $sub_array[] = '';
                }
                // $sub_array[] = '<table> <th> <b> Nomor Undangan </b> </th> <th> <b> : </b> </th> <th> ' . $row->agenda_no_keluar . '  </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->agenda_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->agenda_tgl . '</td></tr><tr><td> Waktu </td> <td> : </td> <td> ' . $row->agenda_waktu . '</td></tr><tr><td> Perihal </td> <td> : </td> <td> ' . $row->agenda_perihal . '</td></tr></table> ';
                $sub_array[] = '<table> <th> <b> Nomor Undangan </b> </th> <th> <b> : </b> </th> <th> ' . $row->agenda_jenis = (1) ? $row->agenda_no_keluar . ' </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->agenda_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->agenda_tgl . '</td></tr><tr><td> Waktu </td> <td> : </td> <td> ' . $row->agenda_waktu . '</td></tr><tr><td> Perihal </td> <td> : </td> <td> ' . $row->agenda_perihal . '</td></tr></table> ' : $row->no_agenda . '  </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->agenda_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->agenda_tgl . '</td></tr><tr><td> Waktu </td> <td> : </td> <td> ' . $row->agenda_waktu . '</td></tr><tr><td> Perihal </td> <td> : </td> <td> ' . $row->agenda_perihal . '</td></tr></table> ';
                if ($row->otorisasi == 3 and $row->agenda_dari_id_bidang == 1) {
                    $sub_array[] = '<a target="_blank" href="' . base_url('admin/agenda/cetak_agenda_pdf?id_agenda=' . $row->id_agenda . '') . '"" class="btn btn-info btn-sm"> <i class="far fa-print"> Cetak</i></a>';
                    $sub_array[] = '<a href="' . base_url('admin/agenda/lihat_disposisi?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file"> Lihat Disposisi</i>  </a>';
                } else {
                    $sub_array[] = '';
                    $sub_array[] = '';
                    // $sub_array[] = '<a href="' . base_url('admin/agenda/disposisi_agenda?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-edit"> Disposisi</i> </a>';
                }
                // else {
                //     $sub_array[] = '<a target="_blank" href="' . base_url('admin/agenda/cetak_agenda_pdf?id_agenda=' . $row->id_agenda . '') . '"" class="btn btn-info btn-sm"> <i class="far fa-print"> Cetak</i></a>';
                //     $sub_array[] = '<a href="' . base_url('admin/agenda/lihat_disposisi?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file"> Lihat Disposisi</i>  </a> | <a href="' . base_url('admin/agenda/disposisi_agenda_sub?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file">  Disposisi</i>  </a>';
                // }



                $data[] = $sub_array;
            }
            $output = array(
                "draw"                      =>     intval($_POST["draw"]),
                "recordsTotal"              =>     $this->m_agenda->get_all_data_undangan_keluar_selesai($id),
                "recordsFiltered"           =>     $this->m_agenda->get_filtered_data_undangan_keluar_selesai($id),
                "data"                      =>     $data
            );
            echo json_encode($output);
        } else {
            $id = $this->session->userdata('id_bidang');
            $fetch_data = $this->m_agenda->make_datatables_undangan_keluar_selesai($id);


            $data = array();
            $a = 1;
            foreach ($fetch_data as $row) {
                $sub_array = array();
                $sub_array[] = $a++;
                if ($row->nama_agenda != null) {
                    $sub_array[] = '<a target="_blank" href="' . base_url('assets2/file_agenda/' . $row->nama_agenda . '') . '"> <br><img width="30px" src="' . base_url('assets2/download.png') . ' "> </a>';
                } else {
                    $sub_array[] = '';
                }
                // $sub_array[] = '<table> <th> <b> Nomor Undangan </b> </th> <th> <b> : </b> </th> <th> ' . $row->agenda_no_keluar . '  </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->agenda_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->agenda_tgl . '</td></tr><tr><td> Waktu </td> <td> : </td> <td> ' . $row->agenda_waktu . '</td></tr><tr><td> Perihal </td> <td> : </td> <td> ' . $row->agenda_perihal . '</td></tr></table> ';
                $sub_array[] = '<table> <th> <b> Nomor Undangan </b> </th> <th> <b> : </b> </th> <th> ' . $row->agenda_jenis = (1) ? $row->agenda_no_keluar . ' </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->agenda_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->agenda_tgl . '</td></tr><tr><td> Waktu </td> <td> : </td> <td> ' . $row->agenda_waktu . '</td></tr><tr><td> Perihal </td> <td> : </td> <td> ' . $row->agenda_perihal . '</td></tr></table> ' : $row->no_agenda . '  </th> <tr><td> Dari </td> <td> : </td> <td> ' . $row->agenda_dari . '</td></tr><tr><td> Tanggal </td> <td> : </td> <td> ' . $row->agenda_tgl . '</td></tr><tr><td> Waktu </td> <td> : </td> <td> ' . $row->agenda_waktu . '</td></tr><tr><td> Perihal </td> <td> : </td> <td> ' . $row->agenda_perihal . '</td></tr></table> ';
                if ($row->otorisasi == 3 and $row->agenda_dari_id_bidang == 5) {
                    $sub_array[] = '<a target="_blank" href="' . base_url('admin/agenda/cetak_agenda_pdf?id_agenda=' . $row->id_agenda . '') . '"" class="btn btn-info btn-sm"> <i class="far fa-print"> Cetak</i></a>';
                    $sub_array[] = '<a href="' . base_url('admin/agenda/lihat_disposisi?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-file"> Lihat Disposisi</i>  </a>';
                } else {
                    $sub_array[] = '';
                    $sub_array[] = '<a href="' . base_url('admin/agenda/disposisi_agenda?id_agenda=' . $row->id_agenda . '') . ' "" class="btn btn-success btn-sm"> <i class="far fa-edit"> Disposisi</i> </a>';
                }


                $data[] = $sub_array;
            }
            $output = array(
                "draw"                      =>     intval($_POST["draw"]),
                "recordsTotal"              =>     $this->m_agenda->get_all_data_undangan_keluar_selesai($id),
                "recordsFiltered"           =>     $this->m_agenda->get_filtered_data_undangan_keluar_selesai($id),
                "data"                      =>     $data
            );
            echo json_encode($output);
        }
    }
}
