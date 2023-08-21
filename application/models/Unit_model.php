<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'dm');
	}

	public function getAllUnit()
	{
		return $this->db->get('unit')->result_array();
	}

	public function getJabatan()
	{
		return $this->db->get_where('user', ['user.jabatan'])->row_array();
	}

	public function getUnitById($id)
	{
		return $this->db->get_where('unit', ['unit.id_unit' => $id])->row_array();
	}	
	
	public function createUnit()
	{
		$this->db->set('foto_unit', 'default.jpg');

		$foto = $_FILES['foto_unit']['name'];
		if ($foto) {
			$config['upload_path'] = './assets/img/img_unit/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto_unit')) {
				$new_foto = $this->upload->data('file_name');
				$this->db->set('foto_unit', $new_foto);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$data = [
			'nama_unit' => $this->input->post('nama_unit', true),
			'luas_unit' => $this->input->post('luas_unit', true),
			'jumlah_pohon' => $this->input->post('jumlah_pohon', true),
			'telepon_unit' => $this->input->post('telepon_unit', true),
			'alamat_unit' => $this->input->post('alamat_unit', true),
			'manajer_unit' => $this->input->post('manajer_unit', true),
			'map' => $this->input->post('map', true)

		];

		$this->db->insert('unit', $data);
		$this->session->set_flashdata('message-success', 'Unit ' . $data['nama_unit'] . ' berhasil ditambahkan');
		redirect('unit');
	}

	public function updateUnit()
	{
		$foto = $_FILES['foto_unit']['name'];
		if ($foto) {
			$config['upload_path'] = './assets/img/img_unit/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('foto_unit')) {
				$new_foto = $this->upload->data('file_name');
				$this->db->set('foto_unit', $new_foto);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$data = [
			'nama_unit' => $this->input->post('nama_unit', true),
			'luas_unit' => $this->input->post('luas_unit', true),
			'jumlah_pohon' => $this->input->post('jumlah_pohon', true),
			'telepon_unit' => $this->input->post('telepon_unit', true),
			'alamat_unit' => $this->input->post('alamat_unit', true),
			'manajer_unit' => $this->input->post('manajer_unit', true),
			'map' => $this->input->post('map', true)
		];

		
		$id_unit = $this->input->post('id_unit', true);
		$this->db->where('unit.id_unit', $id_unit);
		$this->db->update('unit', $data);
		$this->session->set_flashdata('message-success', 'Unit ' . $data['nama_unit'] . ' berhasil diubah');
		redirect('unit');
	}

	public function deleteUnit($id)
	{
		$dataUser = $this->dm->getDataUser();
		// if ($id_level !== '1') {
		// 	$this->session->set_flashdata('message-failed', 'Pengguna ' . $dataUser['username'] . ' tidak memiliki hak akses menghapus data Unit');
		// 	redirect('unit');
		// }
		$data['unit'] = $this->getUnitById($id);
		$this->db->delete('unit', ['id_unit' => $id]);
		$this->session->set_flashdata('message-success', 'Unit ' . $data['unit']['nama_unit'] . ' berhasil dihapus');
		redirect('unit');
	}

}
