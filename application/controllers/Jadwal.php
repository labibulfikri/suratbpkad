<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_jadwal');
        // $this->load->model('m_pengaduan');
    }
    public function index()
    {

        $hari = date('D');

        $harinya = $hari;
        $besok = str_replace('-', '/', $hari);

        $tomorrow = date('d-m-Y', strtotime($besok . "+1 days"));
        $tomorrow_day = date('D', strtotime($besok . "+1 days"));

        $besoklagi = date('d-m-Y', strtotime($besok . "+2 days"));
        $besoklagi_day = date('D', strtotime($besok . "+2 days"));

        switch ($harinya) {
            case 'Sun':
                $getHari = "Minggu";
                break;
            case 'Mon':
                $getHari = "Senin";
                break;
            case 'Tue':
                $getHari = "Selasa";
                break;
            case 'Wed':
                $getHari = "Rabu";
                break;
            case 'Thu':
                $getHari = "Kamis";
                break;
            case 'Fri':
                $getHari = "Jumat";
                break;
            case 'Sat':
                $getHari = "Sabtu";
                break;
            default:
                $getHari = "Salah";
                break;
        }
        switch ($tomorrow_day) {
            case 'Sun':
                $getbesok = "Minggu";
                break;
            case 'Mon':
                $getbesok = "Senin";
                break;
            case 'Tue':
                $getbesok = "Selasa";
                break;
            case 'Wed':
                $getbesok = "Rabu";
                break;
            case 'Thu':
                $getbesok = "Kamis";
                break;
            case 'Fri':
                $getbesok = "Jumat";
                break;
            case 'Sat':
                $getbesok = "Sabtu";
                break;
            default:
                $getbesok = "Salah";
                break;
        }
        switch ($besoklagi_day) {
            case 'Sun':
                $getbesok_lagi = "Minggu";
                break;
            case 'Mon':
                $getbesok_lagi = "Senin";
                break;
            case 'Tue':
                $getbesok_lagi = "Selasa";
                break;
            case 'Wed':
                $getbesok_lagi = "Rabu";
                break;
            case 'Thu':
                $getbesok_lagi = "Kamis";
                break;
            case 'Fri':
                $getbesok_lagi = "Jumat";
                break;
            case 'Sat':
                $getbesok_lagi = "Sabtu";
                break;
            default:
                $getbesok_lagi = "Salah";
                break;
        }




        $data['datanya'] = $this->m_jadwal->get_data();

        // $data['coba'] = 
        // var_dump($data['coba']);
        // exit();

        $data['datanya_besok'] = $this->m_jadwal->get_data_besok();
        $data['datanya_besok_lagi'] = $this->m_jadwal->get_data_besok_lagi();

        $data['hariini'] = $getHari;
        $data['besok'] = $tomorrow;
        $data['getbesok'] = $getbesok;
        $data['getbesoklagi'] = $getbesok_lagi;
        $data['besoklagi'] = $besoklagi;




        // $this->load->view('layout/front_jadwal', $data);
        $this->load->view('layout/front_jadwal2', $data);
    }
}
