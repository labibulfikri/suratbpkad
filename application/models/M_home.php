
    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class M_home extends CI_Model
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
    }
