<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	public function index()
	{
		$filter = null;
		$limit = null;
		$this->data['judul'] = "Dosen";
		$this->data['judul1'] = "Data Dosen";
		$this->data['listdata'] = $this->db->order_by('nidn', 'ASC' )
			->join('m_prodi', 'm_prodi.id_prodi = m_dosen.prodi_id', 'left')
			->get_where('m_dosen', $filter, $limit)->result_array();
		$this->load->view('dosen/v_index', $this->data);
	}

	
	public function tambah()
	{
		$this->data['judul'] = "Tambah Dosen";
		$this->data['judul1'] = "Form Tambah Dosen";
		$this->data['action'] = 'dosen/tambah_aksi';
		$this->data['header_class'] = 'text-success';
		$this->data['panel_class'] = 'panel-success';
        $this->data['btn_class'] = 'btn-success';
		$this->data['data'] = [
			'id_dosen'=> null,
			'nama_dosen'=> null,
			'nidn'=> null,
			'telepon_dosen' => null,
			'alamat_dosen' => null
		];
		$this->load->view('dosen/v_edit', $this->data);
	}
	public function tambah_aksi()
	{
		$data['nama_dosen'] = $this->input->post('nama');
		$data['nidn'] = $this->input->post('nidn');
		$data['telepon_dosen'] = $this->input->post('telepon');
		$data['alamat_dosen'] = $this->input->post('alamat');
		$check = $this->db->get_where('m_dosen', array('nidn'=> $data['nidn']))->row_array();
		if (!empty($check)) {
			$this->session->set_flashdata('notif', notif('danger', 'Kesalahan', 'NIDN sudah ada'));
			redirect('dosen/tambah/');
		}
		$query = $this->db->set('id_dosen', 'UUID()', FALSE)->insert('m_dosen', $data);
		if ($this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('notif', notif('success', 'Peringatan', 'Data Berhasil di Tambahkan'));
			redirect('dosen');
		}else{
			redirect('dosen/tambah/');
		}
	}

	public function ubah($id)
	{
		$this->data['judul'] = "Ubah Dosen";
		$this->data['judul1'] = "Form Ubah Dosen";
		$this->data['action'] = 'dosen/ubah_aksi/'.$id;
		$this->data['panel_class'] = 'panel-warning';
   		$this->data['btn_class'] = 'btn-success';
    	$this->data['header_class'] = 'text-warning';
		$this->data['data'] = $this->db->get_where('m_dosen', array('id_dosen'=> $id))->row_array();
		$this->load->view('dosen/v_edit', $this->data);
	}

	public function ubah_aksi($id)
	{
		$data['nama_dosen'] = $this->input->post('nama');
		$data['nidn'] = $this->input->post('nidn');
		$data['telepon_dosen'] = $this->input->post('telepon');
		$data['alamat_dosen'] = $this->input->post('alamat');
		// $check = $this->db->get_where('m_dosen', array('nidn'=> $data['nidn']))->row_array(); // dari pak galih
		$this->db->where('nidn', $data['nidn']); //Modifikasi dari chat gpt
		$this->db->where('id_dosen !=', $id); //Modifikasi dari chat gpt
		$check = $this->db->get('m_dosen')->row_array(); //Modifikasi dari chat gpt
		if (!empty($check)) {
			$this->session->set_flashdata('notif', notif('danger', 'Kesalahan', 'NIDN sudah ada'));
			redirect('dosen/ubah/' . $id);
		}
		$query = $this->db->where(array('id_dosen'=> $id))->update('m_dosen', $data);
		if ($this->db->affected_rows() > 0 ) {		
		$this->session->set_flashdata('notif', notif('success', 'Peringatan', 'Data Berhasil diubah'));
			redirect('dosen');
		}else{
			$this->session->set_flashdata('notif', notif('warning', 'Kesalahan', 'Gagal, Data Belum diubah'));
			redirect('dosen/ubah/'. $id);
		}
	}
	public function hapus($id)
	{
		$query = $this->db->where(array('id_dosen'=> $id))->delete('m_dosen');
		if ($this->db->affected_rows() > 0 ) {
			redirect('dosen');
		}else{
			redirect();
		}
	}
}
?>