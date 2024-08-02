<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krs extends CI_Controller {
	public function index()
	{
		$this->load->view('krs/v_index');
	}
	public function tambah()
	{
		$this->load->view('krs/v_add');
	}
	public function ubah()
	{
		$this->load->view('krs/v_edit');
	}
	public function hapus()
	{
		$this->load->view('krs/v_delete');
	}	
}
?>