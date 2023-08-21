<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'dm');
	}
	
	public function getAllLevel()
	{
		return $this->db->get('level')->result_array();
	}

	public function getLevelById($id)
	{
		return $this->db->get_where('level', ['level.id_level' => $id])->row_array();
	}

	public function createLevel()
	{
		$data = [
			'nama_level' => $this->input->post('nama_level', true)
		];

		$this->db->insert('level', $data);
		$this->session->set_flashdata('message-success', 'Level ' . $data['nama_level'] . ' berhasil ditambahkan');
		redirect('level');
	}

	public function updateLevel($id)
	{
		$data = [
			'nama_level' => $this->input->post('nama_level', true)
		];
		
		$this->db->where('level.id_level', $id);
		$this->db->update('level', $data);
		$this->session->set_flashdata('message-success', 'Level ' . $data['nama_level'] . ' berhasil diubah');
		redirect('level');
	}

	public function deleteLevel($id)
	{
		$dataUser = $this->dm->getDataUser();
		// if ($id_level !== '1') {
		// 	$this->session->set_flashdata('message-failed', 'Pengguna ' . $dataUser['username'] . ' tidak memiliki hak akses menghapus data Level');
		// 	redirect('level');
		// }
		$data['level'] = $this->getLevelById($id);
		$this->db->delete('level', ['id_level' => $id]);
		$this->session->set_flashdata('message-success', 'Level ' . $data['level']['nama_level'] . ' berhasil dihapus');
		redirect('level');
	}

}
