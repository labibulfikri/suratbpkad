
    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class M_profil extends CI_Model
    {

        public function __construct()
        {
            parent::__construct();
        }

        function data_nik($id)
        {
            $table = "user";
            $select_column = array(
                "user.id_user",
                "nama",
                "alamat",
                "foto",
                "nik_user.nik",
                "nik_user.id_nik",
                // "foto_nik.id_nik"
            );



            $this->db->select($select_column);
            $this->db->from($table);
            $this->db->where('user.id_user', $id);

            $this->db->join('nik_user', 'nik_user.id_user = user.id_user');
            // $this->db->join('id_foto', 'nik_user.id_user = user.id_user');
            $query = $this->db->get();
            return $query->row_array();
        }



        function verify($tabel, $where)
        {
            // return $this->db->get_where($tabel,$where);
            $this->db->where($where);
            // $this->db->where("user.user_name", $id_tanah_kosong);
            $this->db->from($tabel);
            // $this->db->join('bidang', 'bidang.id_bidang = user.id_bidang');
            $this->db->join('bidang', 'bidang.id_bidang = user.id_bidang', 'left');
            $this->db->join('jabatan', 'jabatan.id_jabatan = user.id_jabatan');
            // $this->db->join('berkas_bap', 'berkas_bap.id_tanah_kosong = tanah_kosong.id_tanah_kosong');
            return $query = $this->db->get();

            // $str = $this->db->last_query();
            // print_r($str); exit();
            // return $query->result();

        }
        function upload_nik($data)
        {

            $this->db->insert('nik_user', $data);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }

        function update_nik($data, $id)
        {

            $exe = $this->db->where('id_user', $id);
            $exe = $this->db->update('nik_user', $data);
            if ($exe) {
                return '1';
            } else {
                return '0';
            }
        }

        function registrasi($data)
        {

            $this->db->insert('nik_user', $data);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }

        public function update_user($id, $data)
        {
            $exe = $this->db->where('id_user', $id);
            $exe = $this->db->update('user', $data);
            if ($exe) {
                return '1';
            } else {
                return '0';
            }
        }

        public function update_admin($id, $data)
        {
            $exe = $this->db->where('id_admin', $id);
            $exe = $this->db->update('admin', $data);
            if ($exe) {
                return '1';
            } else {
                return '0';
            }
        }


        public function cek_old($password_lama)
        {

            $this->db->where('password', $password_lama);
            $query = $this->db->get('user');
            return $query->result();;
        }

        public function update_pass($id, $password)
        {
            $exe = $this->db->where('id_user', $id);
            $exe = $this->db->update('user', $password);
            if ($exe) {
                return '1';
            } else {
                return '0';
            }
        }

        public function update_pass_admin($id, $password)
        {
            $exe = $this->db->where('id_admin', $id);
            $exe = $this->db->update('admin', $password);
            if ($exe) {
                return '1';
            } else {
                return '0';
            }
        }



        function user_by_id($id)
        {
            $table = "user";
            $select_column = array(
                "user.id_user",
                "nama",
                "alamat",
                "email",
                "jenis_kelamin",
                "id_village",
                "villages.name as kelurahan",
                "regencies.name as kota",
                "districts.name as kecamatan",
                "id_regencie",
                "id_district",
                "telp",
                "nik_user.id_nik",
                "nik_user.foto",
                "nik_user.nik",
                "nik_user.id_user"
                // "foto_nik.id_nik"
            );



            $this->db->select($select_column);
            $this->db->from($table);
            $this->db->where('user.id_user', $id);

            // $this->db->join('user', 'user.id_user = pengaduan.id_user', 'left');
            $this->db->join('nik_user', 'nik_user.id_user = user.id_user', 'left');
            $this->db->join('regencies', 'regencies.id = user.id_regencie', 'left');
            $this->db->join('districts', 'districts.id = user.id_district', 'left');
            $this->db->join('villages', 'villages.id = user.id_village', 'left');
            $query = $this->db->get();
            return $query->row_array();
        }


        function admin_by_id($id)
        {
            $table = "admin";
            $select_column = array(

                "nip",
                "nama_admin",
                "alamat_admin",
                "alamat_admin",
                "email_admin",
                "id_admin",
                "jenis_kelamin",
                "telp_admin",
                // "foto_nik.id_nik"
            );



            $this->db->select($select_column);
            $this->db->from($table);
            $this->db->where('admin.id_admin', $id);

            // $this->db->join('user', 'user.id_user = pengaduan.id_user', 'left');
            // $this->db->join('nik_user', 'nik_user.id_user = user.id_user', 'left');
            // $this->db->join('regencies', 'regencies.id = user.id_regencie', 'left');
            // $this->db->join('districts', 'districts.id = user.id_district', 'left');
            // $this->db->join('villages', 'villages.id = user.id_village', 'left');
            $query = $this->db->get();
            return $query->row_array();
        }
    }
