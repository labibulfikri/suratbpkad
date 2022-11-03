<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jadwal extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_data_besok()
    {
        $hari = date('Y-m-d');
        $besok = str_replace('-', '/', $hari);
        $tomorrow = date('Y-m-d', strtotime($besok . "+1 days"));

        $query = "SELECT A.*,nama_bidang,kode_bidang,agenda_waktu, ( SELECT COUNT( id_t_agenda ) FROM t_agenda_disposisi WHERE id_t_agenda = A.id_agenda 
	AND t_agenda_disposisi.dispo_dari_id_jabatan =1) AS jumlah 
FROM
	t_agenda A 
    	LEFT JOIN `t_agenda_disposisi` ON A.id_agenda = `t_agenda_disposisi`.`id_t_agenda`
	LEFT JOIN `t_bidang` ON `t_bidang`.`id_bidang` = `t_agenda_disposisi`.`dispo_ke_id_bidang` 
where a.agenda_tgl = '$tomorrow' 
	and t_agenda_disposisi.dispo_dari_id_jabatan=1 ";

        // where a.agenda_tgl >= now()-interval 1 day";
        $return = $this->db->query($query)->result();
        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
        return $return;
    }

    function get_data_besok_lagi()
    {
        $hari = date('Y-m-d');
        $besok = str_replace('-', '/', $hari);
        $tomorrow = date('Y-m-d', strtotime($besok . "+2 days"));

        $query = "SELECT A.*,nama_bidang,kode_bidang,agenda_waktu, ( SELECT COUNT( id_t_agenda ) FROM t_agenda_disposisi WHERE id_t_agenda = A.id_agenda 
	AND t_agenda_disposisi.dispo_dari_id_jabatan =1) AS jumlah 
FROM
	t_agenda A 
    	LEFT JOIN `t_agenda_disposisi` ON A.id_agenda = `t_agenda_disposisi`.`id_t_agenda`
	LEFT JOIN `t_bidang` ON `t_bidang`.`id_bidang` = `t_agenda_disposisi`.`dispo_ke_id_bidang` 
where a.agenda_tgl = '$tomorrow' 
	and t_agenda_disposisi.dispo_dari_id_jabatan=1 ";

        // where a.agenda_tgl >= now()-interval 1 day";
        $return = $this->db->query($query)->result();
        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
        return $return;
    }
    function get_data()
    {
        $hari = date('Y-m-d');

        // $table = "t_agenda_disposisi";
        // $select_column = array(
        // "t_agenda_disposisi.id_agenda_dispo",
        // "t_agenda_disposisi.tgl_agenda_dispo",
        // "t_agenda_disposisi.dispo_ke_id_bidang",
        // "id_agenda",
        // "agenda_keterangan",
        // "agenda_perihal",
        // "no_agenda",
        // "agenda_diterima_tgl",
        // "agenda_dari",
        // "agenda_tgl",
        // "agenda_waktu",
        // "agenda_tempat",
        // "nama_bidang",
        // "t_agenda.status",
        // "count(id_agenda)as jml"
        // );
        // SELECT
        // 	A.*,
        // --  	nama_bidang,
        // 	agenda_waktu,
        // -- 	kode_bidang,
        // 	( SELECT nama_bidang FROM t_bidang WHERE id_bidang = A.dispo_dari_id_bidang ) AS nama1,	
        // 	( SELECT nama_bidang  FROM t_bidang WHERE id_bidang = A.dispo_ke_id_bidang) AS nama2
        // FROM
        // 	t_agenda_disposisi A
        // 	LEFT JOIN `t_agenda` ON A.id_t_agenda = `t_agenda`.`id_agenda`
        // $this->db->select($select_column);
        // $this->db->from($table);
        // $this->db->join('t_agenda', 't_agenda.id_agenda = t_agenda_disposisi.id_t_agenda', 'left');
        // $this->db->join('t_bidang', 't_bidang.id_bidang = t_agenda_disposisi.dispo_ke_id_bidang ', 'left');
        // where jadwal_tgl >= now()-interval 1 day  and jadwal_tgl <= now()+interval 3 day 
        // $this->db->where('t_agenda.agenda_tgl >= now()-interval 1 day');
        // $this->db->group_by('id_agenda');
        $query = "SELECT A.*,nama_bidang,agenda_waktu,kode_bidang, ( SELECT COUNT( id_t_agenda ) FROM t_agenda_disposisi WHERE id_t_agenda = A.id_agenda 
	AND t_agenda_disposisi.dispo_dari_id_jabatan =1) AS jumlah 
FROM
	t_agenda A 
    	LEFT JOIN `t_agenda_disposisi` ON A.id_agenda = `t_agenda_disposisi`.`id_t_agenda`
	 JOIN `t_bidang` ON `t_bidang`.`id_bidang` = `t_agenda_disposisi`.`dispo_ke_id_bidang` 
where a.agenda_tgl = '$hari' 
	and t_agenda_disposisi.dispo_dari_id_jabatan=1";

        // where a.agenda_tgl >= now()-interval 1 day";
        $return = $this->db->query($query)->result();
        // $str = $this->db->last_query();
        // print_r($str);
        // exit();
        return $return;
    }

    function get_data_disp()
    {

        $table = "t_agenda_disposisi";
        $select_column = array(
            "t_agenda_disposisi.id_agenda_dispo",
            "t_agenda_disposisi.tgl_agenda_dispo",
            "t_agenda_disposisi.dispo_ke_id_bidang",
            "id_agenda",
            "agenda_keterangan",
            "agenda_perihal",
            "no_agenda",
            "agenda_diterima_tgl",
            "agenda_dari",
            "agenda_tgl",
            "agenda_waktu",
            "agenda_tempat",
            "nama_bidang",
            "t_agenda.status"
        );



        $this->db->select($select_column);
        $this->db->from($table);
        $this->db->join('t_agenda', 't_agenda.id_agenda = t_agenda_disposisi.id_t_agenda', 'left');
        $this->db->join('t_bidang', 't_bidang.id_bidang = t_agenda_disposisi.dispo_ke_id_bidang ', 'left');
        // where jadwal_tgl >= now()-interval 1 day  and jadwal_tgl <= now()+interval 3 day 
        $this->db->where('t_agenda.agenda_tgl >= now()-interval 1 day');
        // $this->db->group_by('id_agenda');

        $query = $this->db->get();

        return $query->result();
    }
}
