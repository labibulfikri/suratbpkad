<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
		$this->load->model('m_jadwal');
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
				'content' => 'user/home',
				'footer' => 'layout/footer',
				'title' => ' Selamat Datang Di aplikasi disposisi Surat & Undangan BPKAD'
			);
			$this->load->view($data['masterpage'], $data);
		}
	}


	function gethari($hari)
	{
		$harinya = $hari;

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
		return $getHari;
	}
}
