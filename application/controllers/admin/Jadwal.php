<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('encryption');
    }
    public function index()
    {
        echo "asda";
        $this->load->view('layout/front_jadwal');
    }
}
