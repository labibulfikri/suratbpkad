<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_agenda_keluar extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function buat_kode_agenda()
    {

        $this->db->select('RIGHT(t_agenda_keluar.no_agenda,2) as kode', FALSE);
        $this->db->order_by('id_agenda', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('t_agenda_keluar'); //cek dulu apakah ada sudah ada kode di tabel.
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada
            $kode = 1;
        }


        $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        // $kodejadi = "JADWAL/" . date('Y/m/d') . "/" . $kodemax; // hasilnya ODJ-9921-0001 dst.
        $kodejadi = "0" . $kodemax; // hasilnya ODJ-9921-0001 dst.


        return $kodejadi;
    }

    function tambah($table, $data)
    {

        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();



        return  $insert_id;
    }
}
