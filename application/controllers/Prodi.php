<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {
	public function index()
	{
		$filter = null;
		$limit = null;
		$this->data['judul'] = "Prodi";
		$this->data['judul1'] = "Data Prodi";
        $this->data['listdata'] = $this->db->order_by('fakultas', 'ASC')
        ->get('m_prodi', $limit)->result_array();
		$this->load->view('prodi/v_index', $this->data);
	}

	
	public function tambah()
	{
		$this->data['judul'] = "Tambah Prodi";
		$this->data['judul1'] = "Form Tambah Prodi";
		$this->data['action'] = 'prodi/tambah_aksi';
		$this->data['header_class'] = 'text-success';
		$this->data['panel_class'] = 'panel-success';
        $this->data['btn_class'] = 'btn-success';
		$this->data['fakultas_list'] = $this->db->distinct()
                                            ->select('fakultas')
                                            ->from('m_prodi')
                                            ->order_by('fakultas')
                                            ->get()
                                            ->result_array();
		$this->data['data'] = [
			'id_prodi'=> null,
			'nama_prodi'=> null,
			'kode_prodi'=> null,
			'fakultas' => null,
			'ketua_prodi' => null
		];
		$this->load->view('prodi/v_edit', $this->data);
	}
	public function tambah_aksi()
	{
		$data['nama_prodi'] = $this->input->post('nama');
		$data['kode_prodi'] = $this->input->post('kode');
		$data['fakultas'] = $this->input->post('fakultas');
		$data['ketua_prodi'] = $this->input->post('ketua');
		$check = $this->db->get_where('m_prodi', array('kode_prodi'=> $data['kode_prodi']))->row_array();
		if (!empty($check)) {
			$this->session->set_flashdata('notif', notif('danger', 'Kesalahan', 'Kode Prodi sudah ada'));
			redirect('prodi/tambah/');
		}
		$query = $this->db->set('id_prodi', 'UUID()', FALSE)->insert('m_prodi', $data);
		if ($this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('notif', notif('success', 'Peringatan', 'Data Berhasil di Tambahkan'));
			redirect('prodi');
		}else{
			redirect('prodi/tambah/');
		}
	}

	public function ubah($id)
	{
		$this->data['judul'] = "Ubah Prodi";
		$this->data['judul1'] = "Form Ubah Prodi";
		$this->data['action'] = 'prodi/ubah_aksi/'.$id;
		$this->data['panel_class'] = 'panel-warning';
   		$this->data['btn_class'] = 'btn-success';
    	$this->data['header_class'] = 'text-warning';
		$this->data['data'] = $this->db->get_where('m_prodi', array('id_prodi'=> $id))->row_array();
		$this->load->view('prodi/v_edit', $this->data);
	}

	public function ubah_aksi($id)
	{
		$data['nama_prodi'] = $this->input->post('nama');
		$data['kode_prodi'] = $this->input->post('kode');
		$data['fakultas'] = $this->input->post('fakultas');
		$data['ketua_prodi'] = $this->input->post('ketua');
		// $check = $this->db->get_where('m_dosen', array('nidn'=> $data['nidn']))->row_array(); // dari pak galih
		$this->db->where('kode_prodi', $data['kode_prodi']); //Modifikasi dari chat gpt
		$this->db->where('id_prodi !=', $id); //Modifikasi dari chat gpt
		$check = $this->db->get('m_prodi')->row_array(); //Modifikasi dari chat gpt
		if (!empty($check)) {
			$this->session->set_flashdata('notif', notif('danger', 'Kesalahan', 'Kode Prodi sudah ada'));
			redirect('prodi/ubah/' . $id);
		}
		$query = $this->db->where(array('id_prodi'=> $id))->update('m_prodi', $data);
		if ($this->db->affected_rows() > 0 ) {		
		$this->session->set_flashdata('notif', notif('success', 'Peringatan', 'Data Berhasil diubah'));
			redirect('prodi');
		}else{
			$this->session->set_flashdata('notif', notif('warning', 'Kesalahan', 'Gagal, Data Belum diubah'));
			redirect('prodi/ubah/'. $id);
		}
	}
	public function hapus($id)
	{
		$query = $this->db->where(array('id_prodi'=> $id))->delete('m_prodi');
		if ($this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('notif', notif('success', 'Berhasil', 'Prodi Berhasil di hapus'));
			redirect('prodi');
		}else{
			redirect();
		}
	}
}
?>