<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_agenda extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    function get_data()
    {
        $table = "t_agenda";
        $select_column = array(
            "id_agenda",
            "agenda_nama",
            "agenda_tgl",
            "agenda_dari",
            "agenda_perihal",
            "agenda_tempat",
            "agenda_waktu"
        );



        $this->db->select($select_column);
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }

    function update($data, $id)
    {
        $exe = $this->db->where('id_agenda', $id);
        $exe = $this->db->update('t_agenda', $data);
        if ($exe) {
            return '1';
        } else {
            return '0';
        }
    }

    function update_det($data, $id)
    {
        $exe = $this->db->where('id_agenda_dispo', $id);
        $exe = $this->db->update('t_agenda_disposisi', $data);
        if ($exe) {
            return '1';
        } else {
            return '0';
        }
    }

    function delete($id_agenda)
    {

        $exe = $this->db->where('id_agenda', $id_agenda);
        $this->db->delete('t_agenda');

        if ($exe) {
            return '1';
        } else {
            return '0';
        }
    }

    function tambah($table, $data)
    {

        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();



        return  $insert_id;
    }


    function upload_agenda($data)
    {

        $this->db->insert('t_file_agenda', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;

        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
    }


    function get_detail_diposisi($id_agenda)
    {

        $table = "t_agenda_disposisi";
        $select_column = array(
            "t_agenda_disposisi.id_agenda_dispo",
            "t_agenda_disposisi.tgl_agenda_dispo",
            "t_agenda_disposisi.dispo_ke_id_bidang",
            "t_agenda_disposisi.dispo_dari_id_bidang",
            "(select nama_bidang from t_bidang where id_bidang = t_agenda_disposisi.dispo_dari_id_bidang)as dari",
            "(select nama_bidang from t_bidang where id_bidang = t_agenda_disposisi.dispo_ke_id_bidang)as ke",
            "nama_user",
            "id_user",

            // "(select id_user from t_bidang where id_bidang = t_agenda_disposisi.dispo_ke_id_bidang)as ke",
            "id_agenda",
            "agenda_keterangan",
            "tgl_agenda_dispo",
            "dispo_keterangan",
            "agenda_perihal",
            "no_agenda",
            "agenda_no_masuk",
            "agenda_no_keluar",
            "agenda_jenis",
            "agenda_diterima_tgl",
            "agenda_dari",
            "agenda_tgl",
            "id_t_agenda",
            "agenda_waktu",
            "agenda_tempat",
            "status"
        );



        $this->db->select($select_column);
        $this->db->from($table);
        $this->db->join('t_agenda', 't_agenda.id_agenda = t_agenda_disposisi.id_t_agenda', 'left');
        $this->db->join('t_user', 't_user.id_user = t_agenda_disposisi.dispo_id_user', 'left');
        $this->db->join('t_file_agenda', 't_agenda.id_agenda = t_file_agenda.t_id_agenda', 'left');
        $this->db->where('t_agenda.id_agenda', $id_agenda);

        $query = $this->db->get();

        // $str = $this->db->last_query();
        // print_r($str);
        // exit();


        return $query->result();
    }
    function update_file_agenda($data, $id)
    {
        $exe = $this->db->where('t_id_agenda', $id);
        $exe = $this->db->update('t_file_agenda', $data);
        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
        if ($exe) {
            return '1';
        } else {
            return '0';
        }
    }



    function get_detail($id_agenda)
    {
        $table = "t_agenda";
        $select_column = array(
            "id_agenda",
            "no_agenda",
            "agenda_no_keluar",
            "agenda_no_masuk",
            "agenda_diterima_tgl",
            "agenda_dari",
            "agenda_perihal",
            "agenda_waktu",
            "agenda_tempat",
            "agenda_jenis",
            "agenda_keterangan",
            "agenda_tgl",
            "status",
            "nama_agenda"
        );
        $this->db->select($select_column);
        $this->db->from($table);
        $this->db->where('t_agenda.id_agenda', $id_agenda);
        $this->db->join('t_file_agenda', 't_agenda.id_agenda = t_file_agenda.t_id_agenda', 'left');
        $query = $this->db->get();
        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
        return $query->row_array();
    }

    function get_detail_sub($id_agenda)
    {
        $table = "t_agenda";
        $select_column = array(
            "id_agenda",
            "no_agenda",
            "agenda_diterima_tgl",
            "agenda_dari",
            "agenda_perihal",
            "agenda_waktu",
            "agenda_tempat",
            "agenda_keterangan",
            "agenda_tgl",
            "status",
            "t_agenda_disposisi.id_agenda_dispo",
            "dispo_ke_sub",
            "dispo_ke_staf",
            "agenda_no_masuk",
            "nama_agenda",
            "tgl_agenda_dispo"
        );
        $this->db->select($select_column);
        $this->db->from($table);
        $this->db->join('t_agenda_disposisi', 't_agenda_disposisi.id_t_agenda = t_agenda.id_agenda', 'left');
        $this->db->join('t_file_agenda', 't_agenda.id_agenda = t_file_agenda.t_id_agenda', 'left');

        $this->db->where('t_agenda.id_agenda', $id_agenda);
        $this->db->where('t_agenda_disposisi.dispo_ke_id_bidang', $this->session->userdata('id_bidang'));
        $query = $this->db->get();
        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
        return $query->row_array();
    }
    ///////////////////////////////////////////////////////////
    function make_query()
    {

        $table = "t_agenda";
        $select_column = array(
            "id_agenda",
            "agenda_tgl",
            "agenda_dari",
            "agenda_perihal",
            "agenda_tempat",
            "agenda_waktu",
            "no_agenda",
            "agenda_no_masuk",
            "status",
            "nama_agenda"
        );


        $order_column = array(null, "agenda_nama", "agenda_perihal", "agenda_tgl", null);

        $this->db->select($select_column);
        $this->db->from($table);
        $this->db->join('t_file_agenda', 't_agenda.id_agenda = t_file_agenda.t_id_agenda', 'left');

        $this->db->where('otorisasi', null);
        // $this->db->where('status', 0);
        $i = 0;
        $order = array('id_agenda' => 'asc');
        $column_search = array('no_agenda', 'agenda_dari', 'agenda_perihal');
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

            // $this->db->group_by('kegiatan_hed.id_kegiatan_hed');
        } else {
            $this->db->order_by('id_agenda', 'DESC');
            // $this->db->group_by('kegiatan_hed.id_kegiatan_hed');
        }
    }
    function make_datatables()
    {

        // $id = $id;
        $this->make_query();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();


        return $query->result();
    }

    function get_filtered_data()
    {
        // $id = $id;
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from('t_agenda');
        // $this->db->where('id_user', $id);
        $i = 0;
        $order = array('id_agenda' => 'asc');
        $column_search = array('no_agenda', 'agenda_dari', 'agenda_perihal');
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        return $this->db->count_all_results();
    }
    /////////////////////////////////////////////////

    function make_query_proses()
    {

        $table = "t_agenda";
        $select_column = array(
            "id_agenda",
            "agenda_tgl",
            "agenda_dari",
            "agenda_perihal",
            "agenda_tempat",
            "agenda_waktu",
            "no_agenda",
            "agenda_no_masuk",
            "agenda_jenis",
            "status",
            "nama_agenda"
        );


        $order_column = array(null, "agenda_nama", "agenda_perihal", "agenda_tgl", null);

        $this->db->select($select_column);
        $this->db->from($table);
        $this->db->join('t_file_agenda', 't_agenda.id_agenda = t_file_agenda.t_id_agenda', 'left');

        // $this->db->where('otorisasi', null);
        $this->db->where('status', 0);
        $this->db->where('agenda_jenis', 2);
        $i = 0;
        $order = array('id_agenda' => 'asc');
        $column_search = array('no_agenda', 'agenda_dari', 'agenda_perihal');
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

            // $this->db->group_by('kegiatan_hed.id_kegiatan_hed');
        } else {
            $this->db->order_by('id_agenda', 'DESC');
            // $this->db->group_by('kegiatan_hed.id_kegiatan_hed');
        }
    }
    function make_datatables_proses()
    {

        // $id = $id;
        $this->make_query_proses();
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        // $str = $this->db->last_query();
        // print_r($str);
        // exit();

        return $query->result();
    }

    function get_filtered_data_proses()
    {
        // $id = $id;
        $this->make_query_proses();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data_proses()
    {
        $this->db->select("*");
        $this->db->from('t_agenda');
        // $this->db->where('id_user', $id);
        $this->db->where('status', 0);

        $this->db->where('agenda_jenis', 2);
        $i = 0;
        $order = array('id_agenda' => 'asc');
        $column_search = array('no_agenda', 'agenda_dari', 'agenda_perihal');
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        return $this->db->count_all_results();
    }
    //////////////////////////////////////
    public function buat_kode_agenda()
    {

        $this->db->select('RIGHT(t_agenda.no_agenda,2) as kode', FALSE);
        $this->db->order_by('id_agenda', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('t_agenda');      //cek dulu apakah ada sudah ada kode di tabel.
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }


        $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        // $kodejadi = "JADWAL/" . date('Y/m/d') . "/" . $kodemax;    // hasilnya ODJ-9921-0001 dst.
        $kodejadi = "0" . $kodemax;    // hasilnya ODJ-9921-0001 dst.


        return $kodejadi;
    }

    function opd()
    {
        $this->db->select("*");
        $this->db->from('t_opd');

        $query = $this->db->get();
        return $query->result();
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function make_query_dispo($id)
    {
        $id = $id;
        $table = "t_agenda_disposisi";
        $select_column = array(
            "t_agenda_disposisi.id_agenda_dispo",
            "t_agenda_disposisi.tgl_agenda_dispo",
            "t_agenda_disposisi.dispo_ke_id_bidang",
            "t_agenda_disposisi.dispo_ke_sub",
            "t_agenda_disposisi.dispo_ke_staf",
            "id_agenda",
            "agenda_keterangan",
            "agenda_perihal",
            "no_agenda",
            "agenda_diterima_tgl",
            "agenda_dari",
            "agenda_tgl",
            "agenda_waktu",
            "agenda_tempat",
            "nama_agenda",
            "agenda_perihal",
            "status",
            "agenda_no_keluar",
            "agenda_no_masuk",
            "otorisasi"
        );
        $order_column = array(null, "agenda_no_keluar", "no_agenda_agenda", null, null);
        $this->db->select($select_column);
        $this->db->from($table);
        $this->db->join('t_agenda', 't_agenda.id_agenda = t_agenda_disposisi.id_t_agenda', 'left');
        $this->db->join('t_file_agenda', 't_file_agenda.t_id_agenda = t_agenda.id_agenda', 'left');
        $this->db->where('t_agenda.agenda_jenis', 2);

        if ($this->session->userdata('id_jabatan') == 5) {
            $this->db->where('t_agenda_disposisi.dispo_id_user', $this->session->userdata('id_user'));
            // $this->db->where('t_agenda.otorisasi', 0);
        } else {

            $this->db->where('t_agenda_disposisi.dispo_ke_id_bidang', $id);
        }

        $i = 0;
        $order = array('id_agenda' => 'asc');
        $column_search = array('agenda_no_keluar', 'agenda_dari', 'agenda_perihal');
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        // if (isset($_POST["search"]["value"])) {
        //     $this->db->like("no_agenda", $_POST["search"]["value"]);
        //     // $this->db->or_like("agenda_perihal", $_POST["search"]["value"]);
        // }
        if (isset($_POST["order"])) {
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

            // $this->db->group_by('kegiatan_hed.id_kegiatan_hed');
        } else {
            $this->db->order_by('id_agenda', 'DESC');
            // $this->db->group_by('kegiatan_hed.id_kegiatan_hed');
        }
    }
    function make_datatables_dispo($id)
    {

        $id = $id;
        $this->make_query_dispo($id);
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();

        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
        return $query->result();
    }

    function get_filtered_data_dispo($id)
    {
        $id = $id;
        $this->make_query_dispo($id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data_dispo($id)
    {
        $this->db->select("*");
        $this->db->from('t_agenda_disposisi');
        $this->db->join('t_agenda', 't_agenda.id_agenda = t_agenda_disposisi.id_t_agenda', 'left');
        // $this->db->where('t_agenda_disposisi.dispo_ke_id_bidang', $id);

        $this->db->where('t_agenda.agenda_jenis', 2);
        if ($this->session->userdata('id_jabatan') == 5) {
            $this->db->where('t_agenda_disposisi.dispo_id_user', $this->session->userdata('id_user'));
            // $this->db->where('t_agenda.otorisasi', 0);
        } else {

            $this->db->where('t_agenda_disposisi.dispo_ke_id_bidang', $id);
        }
        $i = 0;
        $order = array('id_agenda' => 'asc');
        $column_search = array('agenda_no_keluar', 'agenda_dari', 'agenda_perihal');
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        return $this->db->count_all_results();
    }


    /////////////////////////////////////////////////////////////////////////////////////
    function make_query_undangan_keluar($id)
    {
        $id = $id;
        $table = "t_agenda";
        $select_column = array(
            "id_agenda",
            "agenda_keterangan",
            "agenda_perihal",
            "no_agenda",
            "agenda_diterima_tgl",
            "agenda_dari",
            "agenda_tgl",
            "agenda_waktu",
            "agenda_tempat",
            "nama_agenda",
            "agenda_perihal",
            "status",
            "agenda_jenis",
            "agenda_no_keluar",
            "agenda_dari_id_bidang",
            "otorisasi"
        );
        $order_column = array(null, "agenda_no_keluar", "no_agenda", null, null);
        $this->db->select($select_column);
        $this->db->from($table);
        // $this->db->join('t_agenda', 't_agenda.id_agenda = t_agenda_disposisi.id_t_agenda', 'left');
        $this->db->join('t_file_agenda', 't_file_agenda.t_id_agenda = t_agenda.id_agenda', 'left');
        // $this->db->where('t_agenda_disposisi.dispo_ke_id_bidang', $id);



        if ($this->session->userdata('id_jabatan') == 1) {
            $this->db->where('t_agenda.otorisasi', 2);
            // $this->db->or_where('t_agenda.otorisasi', 3);
        }
        if ($this->session->userdata('id_jabatan') == 2) {
            $this->db->where('t_agenda.otorisasi', 1);
            // $this->db->where('t_agenda.otorisasi', 1);
        }
        if ($this->session->userdata('id_jabatan') == 3) {
            $this->db->where('t_agenda.agenda_dari_id_bidang', $this->session->userdata('id_bidang'));
            $this->db->where('t_agenda.otorisasi !=',  1);
            $this->db->where('t_agenda.otorisasi !=', 2);
            // $this->db->where('t_agenda.otorisasi ', 3);
        }
        // if ($this->session->userdata('id_jabatan') == 4) {
        //     $this->db->where('t_agenda.otorisasi ', 4);
        // }

        // if ($this->session->userdata('id_jabatan') == 5) {
        //     $this->db->where('t_agenda.otorisasi ', 5);
        // }



        $i = 0;
        $order = array('id_agenda' => 'asc');
        $column_search = array('agenda_no_keluar', 'agenda_dari', 'agenda_perihal');
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

            // $this->db->group_by('kegiatan_hed.id_kegiatan_hed');
        } else {
            $this->db->order_by('id_agenda', 'DESC');
            // $this->db->group_by('kegiatan_hed.id_kegiatan_hed');
        }
    }
    function make_datatables_undangan_keluar($id)
    {

        $id = $id;
        $this->make_query_undangan_keluar($id);
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();

        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
        return $query->result();
    }

    function get_filtered_data_undangan_keluar($id)
    {
        $id = $id;
        $this->make_query_undangan_keluar($id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data_undangan_keluar($id)
    {
        $this->db->select("*");
        $this->db->from('t_agenda');


        $this->db->join('t_file_agenda', 't_file_agenda.t_id_agenda = t_agenda.id_agenda', 'left');
        // $this->db->join('t_agenda', 't_agenda.id_agenda = t_agenda_disposisi.id_t_agenda', 'left');
        // $this->db->where('otorisasi', 0);
        if ($this->session->userdata('id_jabatan') == 1) {
            $this->db->where('t_agenda.otorisasi', 2);
            // $this->db->or_where('t_agenda.otorisasi', 3);
        }
        if ($this->session->userdata('id_jabatan') == 2) {
            $this->db->where('t_agenda.otorisasi', 1);
        }
        if ($this->session->userdata('id_jabatan') == 3) {
            $this->db->where('t_agenda.agenda_dari_id_bidang', $this->session->userdata('id_bidang'));
            $this->db->where('t_agenda.otorisasi !=',  1);
            $this->db->where('t_agenda.otorisasi !=', 2);
        }

        $i = 0;
        $order = array('id_agenda' => 'asc');
        $column_search = array('agenda_no_keluar', 'agenda_dari', 'agenda_perihal');
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        return $this->db->count_all_results();
    }

    /////////////////////////////////////////////////////////////////////////////////////
    function make_query_undangan_keluar_selesai($id)
    {
        $id = $id;

        $table = "t_agenda";
        $select_column = array(
            // "t_agenda_disposisi.id_agenda_dispo",
            // "t_agenda_disposisi.tgl_agenda_dispo",
            // "t_agenda_disposisi.dispo_ke_id_bidang",
            "id_agenda",
            "agenda_keterangan",
            "agenda_perihal",
            "no_agenda",
            "agenda_diterima_tgl",
            "agenda_dari",
            "agenda_tgl",
            "agenda_waktu",
            "agenda_tempat",
            "nama_agenda",
            "agenda_perihal",
            "agenda_no_keluar",
            "agenda_dari_id_bidang",
            "status",
            "otorisasi"
        );
        $order_column = array(null, "no_agenda", "no_agenda", null, null);
        $this->db->select($select_column);
        $this->db->from($table);
        // $this->db->join('t_agenda', 't_agenda.id_agenda = t_agenda_disposisi.id_t_agenda', 'left');
        $this->db->join('t_file_agenda', 't_file_agenda.t_id_agenda = t_agenda.id_agenda', 'left');
        // $this->db->where('t_agenda_disposisi.dispo_ke_id_bidang', $id);



        if ($this->session->userdata('id_jabatan') == 1) {
            $this->db->where('t_agenda.otorisasi', 3);
        }
        if ($this->session->userdata('id_jabatan') == 2) {
            $this->db->where('t_agenda.agenda_dari_id_bidang', $this->session->userdata('id_bidang'));
            $this->db->where('t_agenda.otorisasi', 3);
            $this->db->where('t_agenda.agenda_jenis', 1); //1 undangan keluar ; 2 undangan masuk
        }
        if ($this->session->userdata('id_jabatan') == 3) {
            $this->db->where('t_agenda.agenda_dari_id_bidang', $this->session->userdata('id_bidang'));
            $this->db->where('t_agenda.otorisasi', 3);
            $this->db->where('t_agenda.agenda_jenis', 1); //1 undangan keluar ; 2 undangan masuk
        }


        // if (isset($_POST["search"]["value"])) {
        //     $this->db->like("no_agenda", $_POST["search"]["value"]);
        //     // $this->db->or_like("agenda_perihal", $_POST["search"]["value"]);
        // }
        $i = 0;
        $order = array('id_agenda' => 'asc');
        $column_search = array('no_agenda', 'agenda_no_keluar', 'agenda_dari', 'agenda_perihal');
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function make_datatables_undangan_keluar_selesai($id)
    {

        $id = $id;
        $this->make_query_undangan_keluar_selesai($id);
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();

        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
        return $query->result();
    }

    function get_filtered_data_undangan_keluar_selesai($id)
    {
        $id = $id;
        $this->make_query_undangan_keluar_selesai($id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data_undangan_keluar_selesai($id)
    {
        $this->db->select("*");
        $this->db->from('t_agenda');


        $this->db->join('t_file_agenda', 't_file_agenda.t_id_agenda = t_agenda.id_agenda', 'left');
        // $this->db->join('t_agenda', 't_agenda.id_agenda = t_agenda_disposisi.id_t_agenda', 'left');
        // $this->db->where('otorisasi', 0);

        if ($this->session->userdata('id_jabatan') == 1) {
            $this->db->where('t_agenda.otorisasi', 3);
            // $this->db->or_where('t_agenda.otorisasi', 3);
        }
        if ($this->session->userdata('id_jabatan') == 2) {
            $this->db->where('t_agenda.agenda_dari_id_bidang', $this->session->userdata('id_bidang'));
            $this->db->where('t_agenda.otorisasi', 3);
            $this->db->where('t_agenda.agenda_jenis', 1); //1 undangan keluar ; 2 undangan masuk
        }
        if ($this->session->userdata('id_jabatan') == 3) {
            $this->db->where('t_agenda.agenda_dari_id_bidang', $this->session->userdata('id_bidang'));
            // $this->db->where('t_agenda.otorisasi', 3);
            $this->db->where('t_agenda.otorisasi', 3);
            $this->db->where('t_agenda.agenda_jenis', 1); //1 undangan keluar ; 2 undangan masuk
        }

        $i = 0;
        $order = array('id_agenda' => 'asc');
        $column_search = array('no_agenda', 'agenda_no_keluar', 'agenda_dari', 'agenda_perihal');
        foreach ($column_search as $item) // loop column 
        {
            if (@$_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        return $this->db->count_all_results();
    }
}
