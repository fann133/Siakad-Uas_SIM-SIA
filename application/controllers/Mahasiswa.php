<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public function index()
	{
		$filter = null; //array('angkatan' => '2021', 'YEAR(lahir_mhs)' => '2003', 'MONTH(lahir_mhs)' => '11');
		$limit = null;
		$this->data['judul'] = "Mahasiswa";
		$this->data['judul1'] = "Data Mahasiswa";
		$this->data['listdata'] = $this->db->order_by('nim', 'ASC' )
			->join('m_prodi', 'm_prodi.id_prodi = m_mhs.prodi_id', 'left')
			->get_where('m_mhs', $filter, $limit)->result_array();
		$this->load->view('mhs/v_index', $this->data);
	}

	
	public function tambah()
	{
		$this->data['judul'] = "Tambah Mahasiswa";
		$this->data['judul1'] = "Tambah Data Mahasiswa";
		$this->data['action'] = 'mahasiswa/tambah_aksi';
		$this->data['header_class'] = 'text-success';
		$this->data['panel_class'] = 'panel-success';
        $this->data['btn_class'] = 'btn-success';
		$this->data['data'] = [
			'id_mhs'=> null,
			'nama_mhs'=> null,
			'nim'=> null,
			'kelamin_mhs' => null,
			'lahir_mhs' => null,
			'agama_mhs' => null,
			'angkatan' => null,
			'telepon_mhs' => null,
			'alamat_mhs' => null
		];
		$this->load->view('mhs/v_edit', $this->data);
	}
	public function tambah_aksi()
	{
		$data['nama_mhs'] = $this->input->post('nama');
		$data['nim'] = $this->input->post('nim');
		$data['kelamin_mhs'] = $this->input->post('kelamin');
		$data['lahir_mhs'] = $this->input->post('lahir');
		$data['agama_mhs'] = $this->input->post('agama');
		$data['angkatan'] = $this->input->post('angkatan');
		$data['telepon_mhs'] = $this->input->post('telepon');
		$data['alamat_mhs'] = $this->input->post('alamat');
		$check = $this->db->get_where('m_mhs', array('nim'=> $data['nim']))->row_array();
		if (!empty($check)) {
			$this->session->set_flashdata('notif', notif('danger', 'Kesalahan', 'NIM sudah ada'));
			redirect('mahasiswa/tambah');
		}
		$query = $this->db->set('id_mhs', 'UUID()', FALSE)->insert('m_mhs', $data);
		if ($this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('notif', notif('success', 'Peringatan', 'Data Berhasil di Tambahkan'));
			redirect('mahasiswa');
		}else{
			redirect('mahasiswa/tambah/');
		}
	}

	public function ubah($id)
{
    $this->data['judul'] = "Ubah Mahasiswa";
    $this->data['judul1'] = "Form Ubah Mahasiswa";
    $this->data['action'] = 'mahasiswa/ubah_aksi/'.$id;
    $this->data['panel_class'] = 'panel-warning';
    $this->data['btn_class'] = 'btn-warning';
    $this->data['header_class'] = 'text-warning';
    $this->data['data'] = $this->db->get_where('m_mhs', array('id_mhs'=> $id))->row_array();
    $this->load->view('mhs/v_edit', $this->data);
}

	public function ubah_aksi($id)
	{
		$data['nama_mhs'] = $this->input->post('nama');
		$data['nim'] = $this->input->post('nim');
		$data['kelamin_mhs'] = $this->input->post('kelamin');
		$data['lahir_mhs'] = $this->input->post('lahir');
		$data['agama_mhs'] = $this->input->post('agama');
		$data['angkatan'] = $this->input->post('angkatan');
		$data['telepon_mhs'] = $this->input->post('telepon');
		$data['alamat_mhs'] = $this->input->post('alamat');
		// $check = $this->db->get_where('m_mhs', array('nim'=> $data['nim']))->row_array(); //dari pak galih
		$this->db->where('nim', $data['nim']); //Modifikasi dari chat gpt
		$this->db->where('id_mhs !=', $id); //Modifikasi dari chat gpt
		$check = $this->db->get('m_mhs')->row_array(); //Modifikasi dari chat gpt
		if (!empty($check)) {
			$this->session->set_flashdata('notif', notif('danger', 'Kesalahan', 'NIM sudah ada'));
			redirect('mahasiswa/ubah/'. $id);
		}
		$query = $this->db->where(array('id_mhs'=> $id))->update('m_mhs', $data);
		if ($this->db->affected_rows() > 0 ) {		
		$this->session->set_flashdata('notif', notif('success', 'Peringatan', 'Data Berhasil diubah'));
			redirect('mahasiswa');
		}else{
			$this->session->set_flashdata('notif', notif('warning', 'Peringatan', 'Gagal, Data Belum diubah'));
			redirect('mahasiswa/ubah/'. $id);
		}
	}
	public function hapus($id)
	{
		$query = $this->db->where(array('id_mhs'=> $id))->delete('m_mhs');
		if ($this->db->affected_rows() > 0 ) {
			redirect('mahasiswa');
		}else{
			redirect();
		}
	}
}
?>