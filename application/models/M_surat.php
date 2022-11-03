
    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class M_surat extends CI_Model
    {

        public function __construct()
        {
            parent::__construct();
        }


        function get_data()
        {
            $table = "t_surat";
            $select_column = array(
                "id_surat",
                "no_surat",
                "kategori_surat",
                "surat_dari",
                "surat_masuk_tgl",
                "surat_disposisi_tgl",
            );



            $this->db->select($select_column);
            $this->db->from($table);
            $query = $this->db->get();
            return $query->result();
        }

        function update($data, $id)
        {
            $exe = $this->db->where('id_surat', $id);
            $exe = $this->db->update('t_surat', $data);
            if ($exe) {
                return '1';
            } else {
                return '0';
            }
        }

        function update_det($data, $id)
        {
            $exe = $this->db->where('id_surat_disposisi', $id);
            $exe = $this->db->update('t_surat_disposisi', $data);
            if ($exe) {
                return '1';
            } else {
                return '0';
            }
        }

        function update_file_surat($data, $id)
        {
            $exe = $this->db->where('id_surat', $id);
            $exe = $this->db->update('t_file_surat', $data);
            // $str = $this->db->last_query();
            // print_r($str);
            // exit();
            if ($exe) {
                return '1';
            } else {
                return '0';
            }
        }

        function delete($id_surat)
        {

            $exe = $this->db->where('id_surat', $id_surat);
            $this->db->delete('t_surat');

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
        function upload_surat($data)
        {

            $this->db->insert('t_file_surat', $data);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }

        function get_detail_diposisi($id_surat)
        {

            $table = "t_surat_disposisi";
            $select_column = array(
                "t_surat_disposisi.id_surat_disposisi",
                "t_surat_disposisi.tgl_surat_disposisi",
                "t_surat_disposisi.disposisi_ke_id_bidang",
                "t_surat_disposisi.disposisi_dari_id_bidang",
                "(select nama_bidang from t_bidang where id_bidang = t_surat_disposisi.disposisi_dari_id_bidang)as dari",
                "(select nama_bidang from t_bidang where id_bidang = t_surat_disposisi.disposisi_ke_id_bidang)as ke",
                "t_surat.id_surat",
                "nama_user",
                "id_user",
                "surat_keterangan",
                "disposisi_keterangan",
                "surat_perihal",
                "no_surat",
                "nama_surat",
                "surat_diterima_tgl",
                "surat_dari",
                "no_agenda_surat",
                "surat_tanggal",
                "tgl_surat_disposisi",
                "status"
            );
            $this->db->select($select_column);
            $this->db->from($table);
            $this->db->join('t_surat', 't_surat.id_surat = t_surat_disposisi.id_t_surat', 'left');

            $this->db->join('t_user', 't_user.id_user = t_surat_disposisi.disposisi_id_user', 'left');
            $this->db->join('t_file_surat', 't_surat.id_surat = t_file_surat.id_surat', 'left');
            $this->db->where('t_surat.id_surat', $id_surat);

            $query = $this->db->get();

            // $str = $this->db->last_query();
            // print_r($str);
            // exit();


            return $query->result();
        }

        function get_detail($id_surat)
        {
            $table = "t_surat";
            $select_column = array(
                "t_surat_disposisi.id_surat_disposisi",
                "t_surat.id_surat",
                "no_surat",
                "surat_diterima_tgl",
                "surat_dari",
                "surat_perihal",
                "no_agenda_surat",
                "surat_keterangan",
                "surat_tanggal",
                "status",
                "disposisi_dari_id_bidang",
                "disposisi_ke_id_bidang",
                "disposisi_dari_id_jabatan",
                "nama_surat"
            );
            $this->db->select($select_column);
            $this->db->from($table);
            $this->db->join('t_surat_disposisi', 't_surat_disposisi.id_t_surat = t_surat.id_surat', 'left');
            $this->db->join('t_file_surat', 't_surat.id_surat = t_file_surat.id_surat', 'left');
            $this->db->where('t_surat.id_surat', $id_surat);
            $query = $this->db->get();
            // $str = $this->db->last_query();
            // print_r($str);
            // exit();

            return $query->row_array();
        }

        function get_detail_dispo($id_surat)
        {
            $table = "t_surat";
            $select_column = array(
                "t_surat_disposisi.id_surat_disposisi",
                "t_surat.id_surat",
                "no_surat",
                "surat_diterima_tgl",
                "surat_dari",
                "surat_perihal",
                "no_agenda_surat",
                "surat_keterangan",
                "surat_tanggal",
                "status",
                "disposisi_dari_id_bidang",
                "disposisi_ke_id_bidang",
                "disposisi_dari_id_jabatan",
                "nama_surat"
            );
            $this->db->select($select_column);
            $this->db->from($table);
            $this->db->join('t_surat_disposisi', 't_surat_disposisi.id_t_surat = t_surat.id_surat', 'left');
            $this->db->join('t_file_surat', 't_surat.id_surat = t_file_surat.id_surat', 'left');
            $this->db->where('t_surat.id_surat', $id_surat);
            $this->db->where('t_surat_disposisi.disposisi_ke_id_bidang', $this->session->userdata('id_bidang'));
            $query = $this->db->get();
            // $str = $this->db->last_query();
            // print_r($str);
            // exit();

            return $query->row_array();
        }
        /////////////////////////////////////////////////////////////////
        function make_query()
        {

            $table = "t_surat";
            $select_column = array(

                "no_surat",
                "surat_diterima_tgl",
                "surat_dari",
                "no_agenda_surat",
                "surat_tanggal",
                "status",
                "t_surat.id_surat",
                "surat_keterangan",
                "surat_perihal",
                "nama_surat",
            );


            $order_column = array(null, "no_surat", "no_agenda_surat", null, null);
            $this->db->select($select_column);
            $this->db->from($table);
            $this->db->join('t_file_surat', 't_surat.id_surat = t_file_surat.id_surat', 'left');
            // if ($this->session->userdata('id_jabatan') ==  2) {

            //     $this->db->join('t_surat_disposisi', 't_surat_disposisi.id_t_surat = t_surat.id_surat', 'left');
            //     $this->db->where('t_surat.status', 0);
            //     // $this->db->where('t_surat_disposisi.disposisi_ke_id_bidang', $this->session->userdata('id_jabatan'));
            // }


            $i = 0;
            $order = array('id_surat' => 'asc');
            $column_search = array('no_surat', 'surat_dari', 'surat_perihal');
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
            } else {
                $this->db->order_by('id_surat', 'DESC');
            }
        }
        function make_datatables()
        {
            $this->make_query();
            if ($_POST["length"] != -1) {
                $this->db->limit($_POST['length'], $_POST['start']);
            }
            $query = $this->db->get();

            // $str = $this->db->last_query();
            // print_r($str);
            // exit();
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
            $this->db->from('t_surat');
            // $this->db->where('id_user', $id);
            // if ($this->session->userdata('id_jabatan') ==  2) {

            //     $this->db->where('t_surat.status', 0);
            // }
            $i = 0;
            $order = array('id_surat' => 'asc');
            $column_search = array('no_surat', 'surat_dari', 'surat_perihal');
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

        //////////////////////////////////////////////////
        function make_query_proses()
        {

            $table = "t_surat";
            $select_column = array(

                "no_surat",
                "surat_diterima_tgl",
                "surat_dari",
                "no_agenda_surat",
                "surat_tanggal",
                "status",
                "t_surat.id_surat",
                "surat_keterangan",
                "surat_perihal",
                "nama_surat",
            );


            $order_column = array(null, "no_surat", "no_agenda_surat", null, null);
            $this->db->select($select_column);
            $this->db->from($table);
            $this->db->join('t_file_surat', 't_surat.id_surat = t_file_surat.id_surat', 'left');
            $this->db->where('t_surat.status', 0);
            // if ($this->session->userdata('id_jabatan') ==  2) {

            //     $this->db->join('t_surat_disposisi', 't_surat_disposisi.id_t_surat = t_surat.id_surat', 'left');
            //     // $this->db->where('t_surat_disposisi.disposisi_ke_id_bidang', $this->session->userdata('id_jabatan'));
            // }


            $i = 0;
            $order = array('id_surat' => 'asc');
            $column_search = array('no_surat', 'surat_dari', 'surat_perihal');
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
            } else {
                $this->db->order_by('id_surat', 'DESC');
            }
        }
        function make_datatables_proses()
        {
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
            $this->db->from('t_surat');

            $this->db->join('t_file_surat', 't_surat.id_surat = t_file_surat.id_surat', 'left');
            $this->db->where('t_surat.status', 0);
            $i = 0;
            $order = array('id_surat' => 'asc');
            $column_search = array('no_surat', 'surat_dari', 'surat_perihal');
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

        public function buat_kode_surat()
        {

            $this->db->select('RIGHT(t_surat.no_agenda_surat,2) as kode', FALSE);
            $this->db->order_by('id_surat', 'DESC');
            $this->db->limit(1);
            $query = $this->db->get('t_surat');      //cek dulu apakah ada sudah ada kode di tabel.
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
            $table = "t_surat_disposisi";
            $select_column = array(
                "t_surat_disposisi.id_surat_disposisi",
                "t_surat_disposisi.tgl_surat_disposisi",
                "t_surat_disposisi.disposisi_ke_id_bidang",
                "t_surat_disposisi.disposisi_dari_id_bidang",
                "t_surat.id_surat",
                "surat_keterangan",
                "surat_perihal",
                "no_surat",
                "surat_diterima_tgl",
                "surat_dari",
                "no_agenda_surat",
                "surat_tanggal",
                "status_disposisi_sub",
                "disposisi_ke_sub",
                "disposisi_ke_staf",
                "status_disposisi_staf",
                "status",
                "nama_surat"
            );
            $this->db->select($select_column);
            $this->db->from($table);
            $this->db->join('t_surat', 't_surat.id_surat = t_surat_disposisi.id_t_surat', 'left');
            $this->db->join('t_file_surat', 't_surat.id_surat = t_file_surat.id_surat', 'left');

            // $this->db->where('t_surat_disposisi.disposisi_ke_id_bidang', $id);

            if ($this->session->userdata('id_jabatan') == 5) {
                $this->db->where('t_surat_disposisi.disposisi_id_user', $this->session->userdata('id_user'));
                // $this->db->where('t_agenda.otorisasi', 0);
            } else {

                $this->db->where('t_surat_disposisi.disposisi_ke_id_bidang', $id);
            }

            // if ($this->session->userdata('id_jabatan') == 3) {
            //     $this->db->where('t_surat_disposisi.disposisi_dari_id_bidang !=', $this->session->userdata('id_bidang'));
            // }


            $i = 0;
            $order = array('id_surat' => 'asc');
            $column_search = array('no_surat', 'surat_dari', 'no_agenda_surat', 'surat_perihal');
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
                $this->db->order_by($order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

                // $this->db->group_by('kegiatan_hed.id_kegiatan_hed');
            } else {
                $this->db->order_by('id_surat', 'DESC');
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
            $this->db->from('t_surat_disposisi');

            $this->db->join('t_surat', 't_surat.id_surat = t_surat_disposisi.id_t_surat', 'left');
            $this->db->join('t_file_surat', 't_surat.id_surat = t_file_surat.id_surat', 'left');
            // $this->db->where('t_surat_disposisi.disposisi_ke_id_bidang', $id);

            if ($this->session->userdata('id_jabatan') == 5) {
                $this->db->where('t_surat_disposisi.disposisi_id_user', $this->session->userdata('id_user'));
                // $this->db->where('t_agenda.otorisasi', 0);
            } else {

                $this->db->where('t_surat_disposisi.disposisi_ke_id_bidang', $id);
            }
            $i = 0;
            $order = array('id_surat' => 'asc');
            $column_search = array('no_surat', 'surat_dari', 'no_agenda_surat', 'surat_perihal');
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

        function data_history_dispo($id)
        {

            $id = $id;


            $table = "t_surat_disposisi";
            $select_column = array(
                // "t_surat_disposisi.id_surat_disposisi",
                // "t_surat_disposisi.tgl_surat_disposisi",
                // "t_surat_disposisi.disposisi_ke_id_bidang",

                "t_surat_disposisi.id_surat_disposisi",
                "t_surat_disposisi.tgl_surat_disposisi",
                "(SELECT a.nama_bidang from t_bidang a where t_surat_disposisi.disposisi_dari_id_bidang = a.id_bidang) as dari",
                "(SELECT a.nama_bidang from t_bidang a where t_surat_disposisi.disposisi_ke_id_bidang = a.id_bidang) as ke",
                "t_surat.id_surat",
                "surat_keterangan",
                "surat_perihal",
                "no_surat",
                "surat_diterima_tgl",
                "surat_dari",
                "no_agenda_surat",
                "surat_tanggal",
                "status_disposisi_sub",
                "status_disposisi_staf",
                "t_surat.status"
            );
            $this->db->select($select_column);
            $this->db->from($table);
            $this->db->join('t_surat', 't_surat.id_surat = t_surat_disposisi.id_t_surat', 'left');
            $this->db->join('t_bidang', 't_bidang.id_bidang = t_surat_disposisi.disposisi_ke_id_bidang', 'left');
            $this->db->where('t_surat.id_surat', $id);
            $query = $this->db->get();
            // $str = $this->db->last_query();
            // print_r($str);
            // exit();
            return $query->result();
        }
    }
