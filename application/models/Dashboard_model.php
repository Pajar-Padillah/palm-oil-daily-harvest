<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	
	public function check_status_login()
	{
		// jika belum login pindahkan ke halaman user
		if (!$this->session->userdata('id_user')) {
			redirect('auth/index');
		}
	}

	public function check_level_bukan_administrator($table)
	{
		$jabatan = $this->session->userdata('jabatan');
		$id_unit = $this->session->userdata('id_unit');
		$id_afdeling = $this->session->userdata('id_afdeling');
		$dataUser = $this->getDataUser();
		
		// Jika admninistrator tapi harus sesuai unit
		if ($jabatan == 'Kepala Bagian Operasional') {
			// cek unit
			if ($dataUser['id_unit'] !== $id_unit) {
				$this->session->set_flashdata('message-failed', 'Pengguna ' . $dataUser['username'] . ' tidak memiliki hak akses menghapus data ' . $table);
				
				redirect($table);
			}
		// jika bukan super administrator
		} elseif ($jabatan !== 'Administrator') {
			$this->session->set_flashdata('message-failed', 'Pengguna ' . $dataUser['username'] . ' tidak memiliki hak akses menghapus data ' . $table);
			
			redirect($table);
		} 
	}

	public function id_user()
	{
		return $this->session->userdata('id_user');
	}

	public function getDataUser()
	{
		$id_user = $this->session->userdata('id_user');
		$this->db->select('*');
		$this->db->join('unit', 'user.id_unit = unit.id_unit');
		$this->db->join('afdeling', 'user.id_afdeling = afdeling.id_afdeling');
		$this->db->join('biodata', 'user.id_user = biodata.id_user');
		return $this->db->get_where('user', ['user.id_user' => $id_user])->row_array();
	}	

	// public function createBiodata()
	// {
	// 	$data = [
	// 		'nama_lengkap' => $this->input->post('nama_lengkap', true),
	// 		'tempat_lahir' => $this->input->post('tempat_lahir', true),
	// 		'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
	// 		'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
	// 		'golongan_darah' => $this->input->post('golongan_darah', true),
	// 		'telepon' => $this->input->post('telepon', true),
	// 		'email' => $this->input->post('email', true),
	// 		'alamat' => $this->input->post('alamat', true),
	// 		'foto' => $this->input->post('foto', true),
	// 		'id_user' => $this->id_user()
	// 	];
	// 	$this->db->insert('biodata', $data);
	// 	$this->session->set_flashdata('message-success', 'Biodata berhasil ditambahkan');

	// 	redirect('dashboard/biodata');
	// }
}
