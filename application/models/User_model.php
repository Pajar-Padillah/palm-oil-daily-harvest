<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'dm');
	}

	// public function getAllUserLevel()
	// {

	// 	$this->db->select('*');
	// 	$this->db->from('user');
	// 	$this->db->join('level', 'user.id_level = level.id_level');
		// $this->db->where('level.id_level') == '1' or $this->db->where('level.id_level')== '2';
	// 	return $this->db->get('');
	// }

	public function getAllUser()
	{
		$this->db->select('*');
		$this->db->join('unit', 'user.id_unit = unit.id_unit');
		$this->db->join('afdeling', 'user.id_afdeling = afdeling.id_afdeling');
		return $this->db->get('user')->result_array();
	}

	// public function getUser12()
	// {
	// 	$this->db->select('*');
	// 	$this->db->join('unit', 'user.id_unit = unit.id_unit');
	// 	$this->db->join('afdeling', 'user.id_afdeling = afdeling.id_afdeling');
	// 	$this->db->join('level', 'user.id_level = level.id_level');
	// 	$id_level = array('1', '2');
	// 	$this->db->where_in('user.id_level', $id_level);
	// 	return $this->db->get('user')->result_array();
	// }

	// public function getUser345()
	// {
	// 	$this->db->select('*');
	// 	$this->db->join('unit', 'user.id_unit = unit.id_unit');
	// 	$this->db->join('afdeling', 'user.id_afdeling = afdeling.id_afdeling');
	// 	$this->db->join('level', 'user.id_level = level.id_level');
	// 	$id_level = array('3', '4', '5');
	// 	$this->db->where_in('user.id_level', $id_level);
	// 	return $this->db->get('user')->result_array();
	// }

	// public function getUnit345()
	// {
	// 	$this->db->select('*');
	// 	$this->db->join('unit', 'user.id_unit = unit.id_unit');
	// 	$this->db->join('afdeling', 'user.id_afdeling = afdeling.id_afdeling');
	// 	$this->db->join('level', 'user.id_level = level.id_level');
	// 	$id_unit = array('Rejosari', 'Bekri');
	// 	$this->db->where_in('user.id_unit', $id_unit);
	// 	return $this->db->get('user')->result_array();
	// }

	public function getUserUnitAdministrator()
	{
		$this->db->select('*');
		$this->db->join('unit', 'user.id_unit = unit.id_unit');
		$id_unit = $this->session->userdata('id_unit');
		$this->db->where('unit.id_unit', $id_unit);
		return $this->db->get('user')->result_array();
	}

	public function getAllUnit()
	{
		return $this->db->get('unit')->result_array();
	}

	// public function getAllLevel()
	// {
	// 	return $this->db->get('level')->result_array();
	// }

	public function getUserByUsername($username)
	{
		$this->db->select('*');
		$this->db->join('biodata', 'biodata.id_user = user.id_user');
		return $this->db->get_where('user', ['user.username' => $username])->row_array();
	}

	public function getUserByUsernameNoJoin($username)
	{
		return $this->db->get_where('user', ['user.username' => $username])->row_array();
	}

	public function getUserById($id)
	{
		return $this->db->get_where('user', ['user.id_user' => $id])->row_array();
	}

	public function getUserByIdAllData($id)
	{
		$this->db->select('*');
		$this->db->join('biodata', 'biodata.id_user = user.id_user');
		$this->db->join('unit', 'unit.id_unit = user.id_unit');
		// $this->db->join('level', 'user.id_level = level.id_level');
		return $this->db->get_where('user', ['user.id_user' => $id])->row_array();
	}

	public function createUser()
	{
		$data = [
			'username' => $this->input->post('username', true),
			// 'jabatan' => $this->input->post('jabatan', true),
			'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
			'jabatan' => $this->input->post('jabatan', true),
			'id_unit' => $this->input->post('id_unit', true),
			'id_afdeling' => $this->input->post('id_afdeling', true)

		];
		$this->db->insert('user', $data);
		$this->session->set_flashdata('message-success', 'Pengguna ' . $data['username'] . ' berhasil ditambahkan');
		// redirect('user/createBiodata/' . $data['username']);
		redirect('user/index');
	}

	public function createBiodata()
	{
		$this->db->set('foto', 'default.png');

		$foto = $_FILES['foto']['name'];
		if ($foto) {
			$config['upload_path'] = './assets/img/img_profiles/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				$new_foto = $this->upload->data('file_name');
				$this->db->set('foto', $new_foto);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$data = [
			'nama_lengkap' => $this->input->post('nama_lengkap', true),
			'tempat_lahir' => $this->input->post('tempat_lahir', true),
			'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
			'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
			'telepon' => $this->input->post('telepon', true),
			'email' => $this->input->post('email', true),
			'alamat' => $this->input->post('alamat', true),
			'id_user' => $this->input->post('id_user', true)
		];

		$this->db->insert('biodata', $data);
		$this->session->set_flashdata('message-success', 'Biodata Pengguna ' . $data['nama_lengkap'] . ' berhasil ditambahkan');
		redirect('dashboard');
	}


	public function updateUser($id)
	{
		$this->dm->check_level_bukan_administrator('user');

		$data = [

			'jabatan' => $this->input->post('jabatan', true),
			'id_unit' => $this->input->post('id_unit', true),

			'id_afdeling' => $this->input->post('id_afdeling', true)
		];		
		$this->db->where('user.id_user', $id);
		$this->db->update('user', $data);
		$user = $this->getUserById($id);
		$this->session->set_flashdata('message-success', 'Pengguna ' . $user['username'] . ' berhasil diubah');
		redirect('user');
	}

	public function updateBiodataProfile()
	{
		$foto = $_FILES['foto']['name'];
		if ($foto) {
			$config['upload_path'] = './assets/img/img_profiles/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				$new_foto = $this->upload->data('file_name');
				$this->db->set('foto', $new_foto);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$data = [
			'nama_lengkap' => $this->input->post('nama_lengkap', true),
			'tempat_lahir' => $this->input->post('tempat_lahir', true),
			'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
			'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
			'telepon' => $this->input->post('telepon', true),
			'email' => $this->input->post('email', true),
			'alamat' => $this->input->post('alamat', true)
		];

		$dataUser = $this->dm->getDataUser();
		$id_user = $this->input->post('id_user', true);
		$this->db->where('biodata.id_user', $id_user);
		$this->db->update('biodata', $data);
		$this->session->set_flashdata('message-success', 'Biodata Pengguna ' . $dataUser['username'] . ' berhasil diubah');

		redirect('user/index');
	}

	public function deleteUser($id)
	{
		$this->dm->check_level_bukan_administrator('user');
		$user = $this->getUserById($id);
		$this->db->delete('user', ['id_user' => $id]);
		$this->session->set_flashdata('message-success', 'Pengguna ' . $user['username'] . ' berhasil dihapus');
		redirect('user');
	}


}
