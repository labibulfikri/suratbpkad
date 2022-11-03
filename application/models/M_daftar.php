<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_daftar extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
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

    function datakota($a)
    {


        $table = "regencies";
        $select_column = array(
            "regencies.id",
            "regencies.province_id",
            "regencies.name"
        );
        $this->db->select($select_column);

        if ($a == null || $a == "") {

            $this->db->where('regencies.province_id', 35);
        } else {
            $this->db->where('regencies.province_id', 35);
            $this->db->like('regencies.name', $a);
        }

        $this->db->from($table);
        $this->db->join('provinces', 'provinces.id = regencies.province_id');

        $query = $this->db->get();

        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
        return $query->result_array();
    }


    function datakecamatan($id, $search)
    {
        $table = "districts";
        $select_column = array(
            "districts.id",
            "districts.regency_id",
            "districts.name"
        );
        $this->db->select($select_column);

        if ($search == null || $search == "") {

            $this->db->where('districts.regency_id', 0);
        } else {
            // $this->db->where('regencies.province_id', 35);
            $this->db->where('districts.regency_id', $id);
            $this->db->like('districts.name', $search);
        }

        $this->db->from($table);
        $this->db->join('regencies', 'regencies.id = districts.regency_id');

        $query = $this->db->get();

        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
        return $query->result_array();
    }


    function datakelurahan($id, $search)
    {
        $table = "villages";
        $select_column = array(
            "villages.id",
            "villages.district_id",
            "villages.name"
        );
        $this->db->select($select_column);

        if ($search == null || $search == "") {

            $this->db->where('villages.district_id', 0);
        } else {
            // $this->db->where('regencies.province_id', 35);
            $this->db->where('villages.district_id', $id);
            $this->db->like('villages.name', $search);
        }

        $this->db->from($table);
        $this->db->join('districts', 'districts.id = villages.district_id');

        $query = $this->db->get();

        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
        return $query->result_array();
    }

    function registrasi($data)
    {

        $this->db->insert('user', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
}
