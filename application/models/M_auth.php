<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    function verify($tabel, $where)
    {

        $this->db->where($where);
        $this->db->from($tabel);
        $this->db->join('t_jabatan', 't_jabatan.id_jabatan = t_user.id_jabatan', 'left');
        $this->db->join('t_bidang', 't_bidang.id_bidang = t_user.id_bidang', 'left');

        $query = $this->db->get();
        return $query;

        // return $this->db->get();

        // return $query->result();

    }


    function user_by_email($table, $email)
    {


        $this->db->where('email', $email);
        $this->db->from($table);
        return $query = $this->db->get();
    }

    function update_password($id_user, $password)
    {

        $exe = $this->db->where('id_user', $id_user);
        $exe = $this->db->set('password', $password);
        $exe = $this->db->update('user');

        if ($exe) {
            return '1';
        } else {
            return '0';
        }
    }
}
