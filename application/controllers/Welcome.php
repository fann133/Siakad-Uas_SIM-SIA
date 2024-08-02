<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->data['judul'] = "Sistem Informasi Akademik";
		$this->data['nama'] = "Menu Aplikasi";
		$this->load->view('v_index', $this->data);
	}
	public function login()
	{
		$this->load->view('v_login');
	}	
}