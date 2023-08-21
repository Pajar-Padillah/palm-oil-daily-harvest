<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Afdeling_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'dm');
	}

	public function getAllAfdeling()
	{
		$this->db->select('*');
		$this->db->from('unit');
		$this->db->join('afdeling', 'afdeling.id_unit = unit.id_unit');
		$this->db->order_by('nama_unit', 'desc');
		return $this->db->get('');
	}

	public function getAfdeling()
	{
		$this->db->select('*');
		// $this->db->from('unit');
		$this->db->join('unit', 'afdeling.id_unit = unit.id_unit');
		return $this->db->get('afdeling')->result_array();
	}

	public function getAfdById($id)
	{
		$this->db->select('*');
		$this->db->join('unit', 'afdeling.id_unit = unit.id_unit');
		return $this->db->get_where('afdeling', ['afdeling.id_afdeling' => $id])->row_array();
	}

	public function getAfdelingById($id)
	{
		return $this->db->get_where('afdeling', ['afdeling.id_afdeling' => $id])->row_array();
	}

	public function createAfdeling()
	{
		$data = [
			'id_unit' => $this->input->post('id_unit', true),
			'nama_afdeling' => $this->input->post('nama_afdeling', true)
		];

		$this->db->insert('afdeling', $data);
		$this->session->set_flashdata('message-success', $data['nama_afdeling'] . ' berhasil ditambahkan');
		redirect('afdeling');
	}

	public function updateAfdeling($id)
	{
		$data['afdeling'] = $this->getAfdById($id);

		$dataUser = $this->dm->getDataUser();
		$data = [

			'id_unit' => $this->input->post('id_unit', true),
			'nama_afdeling' => $this->input->post('nama_afdeling', true),
		];

		$this->db->where('afdeling.id_afdeling', $id);
		$this->db->update('afdeling', $data);
		$data['afdeling'] = $this->getAfdById($id);

		$this->session->set_flashdata('message-success', $data['nama_afdeling'] . ' berhasil diubah');
		redirect('afdeling');
	}

	public function deleteAfdeling($id)
	{
		
		$this->dm->check_level_bukan_administrator('user');
		// if ($id_level !== '1') {
		// 	$this->session->set_flashdata('message-failed', 'Pengguna ' . $dataUser['username'] . ' tidak memiliki hak akses menghapus data Unit');
		// 	redirect('afdeling');
		// }

		$user = $this->getAfdelingById($id);
		$this->db->delete('afdeling', ['id_afdeling' => $id]);
		
		$this->session->set_flashdata('message-success', 'Unit ' . $data['unit']['nama_unit'] . ' berhasil dihapus');
		redirect('afdeling');
	}


}
