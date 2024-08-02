<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {
	public function index()
	{
		$filter = null; //array('angkatan' => '2021', 'YEAR(lahir_mhs)' => '2003', 'MONTH(lahir_mhs)' => '11');
		$limit = null;
		$this->data['judul'] = "Matkul";
		$this->data['judul1'] = "Data Matkul";
		$this->data['listdata'] = $this->db->order_by('kode_mk', 'ASC' )
			->join('m_prodi', 'm_prodi.id_prodi = m_matkul.prodi_id', 'left')
			->get_where('m_matkul', $filter, $limit)->result_array();
		$this->load->view('matkul/v_index', $this->data);
	}

	
	public function tambah()
	{
		$this->data['judul'] = "Tambah Matkul";
		$this->data['judul1'] = "Tambah Data Matkul";
		$this->data['action'] = 'matkul/tambah_aksi';
		$this->data['header_class'] = 'text-success';
		$this->data['panel_class'] = 'panel-success';
        $this->data['btn_class'] = 'btn-success';
		$this->data['data'] = [
			'id_mk'=> null,
			'kode_mk'=> null,
			'nama_mk'=> null,
			'sks_mk' => null,
			'jenis_mk' => null,
			'semester_mk' => null
		];
		$this->load->view('matkul/v_edit', $this->data);
	}
	public function tambah_aksi()
	{
		$data['kode_mk'] = $this->input->post('kode');
		$data['nama_mk'] = $this->input->post('matkul');
		$data['sks_mk'] = $this->input->post('jumlah');
		$data['jenis_mk'] = $this->input->post('jenis');
		$data['semester_mk'] = $this->input->post('semester');
		$check = $this->db->get_where('m_matkul', array('kode_mk'=> $data['kode_mk']))->row_array();
		if (!empty($check)) {
			$this->session->set_flashdata('notif', notif('danger', 'Kesalahan', 'Kode Mk sudah ada'));
			redirect('matkul/tambah/');
		}
		$query = $this->db->set('id_mK', 'UUID()', FALSE)->insert('m_matkul', $data);
		if ($this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('notif', notif('success', 'Peringatan', 'Data Berhasil di Tambahkan'));
			redirect('matkul');
		}else{
			redirect('matkul/tambah/');
		}
	}

	public function ubah($id)
{
    $this->data['judul'] = "Ubah Matkul";
    $this->data['judul1'] = "Form Ubah Matkul";
    $this->data['action'] = 'matkul/ubah_aksi/'.$id;
    $this->data['panel_class'] = 'panel-warning';
    $this->data['btn_class'] = 'btn-success';
    $this->data['header_class'] = 'text-warning';
    $this->data['data'] = $this->db->get_where('m_matkul', array('id_mk'=> $id))->row_array();
    $this->load->view('matkul/v_edit', $this->data);
}

	public function ubah_aksi($id)
	{
		$data['kode_mk'] = $this->input->post('kode');
		$data['nama_mk'] = $this->input->post('matkul');
		$data['sks_mk'] = $this->input->post('jumlah');
		$data['jenis_mk'] = $this->input->post('jenis');
		$data['semester_mk'] = $this->input->post('semester');
		// $check = $this->db->get_where('m_matkul', array('kode_mk'=> $data['kode_mk']))->row_array(); //dari pak galih
		$this->db->where('kode_mk', $data['kode_mk']); //Modifikasi dari chat gpt
		$this->db->where('id_mk !=', $id); //Modifikasi dari chat gpt
		$check = $this->db->get('m_matkul')->row_array(); //Modifikasi dari chat gpt
		if (!empty($check)) {
			$this->session->set_flashdata('notif', notif('danger', 'Kesalahan', 'Kode Mk sudah ada'));
			redirect('matkul/ubah/' . $id);
		}
		$query = $this->db->where(array('id_mk'=> $id))->update('m_matkul', $data);
		if ($this->db->affected_rows() > 0 ) {		
		$this->session->set_flashdata('notif', notif('success', 'Peringatan', 'Data Berhasil diubah'));
			redirect('matkul');
		}else{
			$this->session->set_flashdata('notif', notif('warning', 'Peringatan', 'Gagal, Data Belum diubah'));
			redirect('matkul/ubah/'. $id);
		}
	}
	public function hapus($id)
	{
		$query = $this->db->where(array('id_mk'=> $id))->delete('m_matkul');
		if ($this->db->affected_rows() > 0 ) {
			redirect('matkul');
		}else{
			redirect();
		}
	}
}
?>