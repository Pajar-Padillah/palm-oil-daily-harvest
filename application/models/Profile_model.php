<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {
	

	public function id_user()
	{
		return $this->session->userdata('id_user');
	}

	public function getDataUser()
	{
		$id_user = $this->session->userdata('id_user');
		$this->db->select('*');
		$this->db->join('unit', 'user.id_unit = unit.id_unit');
		$this->db->join('biodata', 'user.id_user = biodata.id_user');
		return $this->db->get_where('user', ['user.id_user' => $id_user])->row_array();
	}

	
	public function updateBiodata()
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
			'alamat' => $this->input->post('alamat', true),
		];

		$dataUser = $this->dm->getDataUser();
		$id_user = $this->input->post('id_user', true);
		$this->db->where('biodata.id_user', $id_user);
		$this->db->update('biodata', $data);
		$this->session->set_flashdata('message-success', 'Biodata Pengguna ' . $dataUser['username'] . ' berhasil diubah');
		
		redirect('profile');
	}



	public function changePassword()
	{
		$dataUser = $this->dm->getDataUser();
		$password_old = $this->input->post('password_old', true);
		$password_new = $this->input->post('password_new', true);
		
		if (password_verify($password_old, $dataUser['password'])) {
			$password_hash = password_hash($password_new, PASSWORD_DEFAULT);
			$data = [
				'password' => $password_hash
			];
			
			$this->db->where('user.id_user', $this->dm->id_user());
			$this->db->update('user', $data);
			$this->session->set_flashdata('message-success', 'Pengguna ' . $dataUser['username'] . ' berhasil mengubah Password');
			
			redirect('profile/index');
		} else {
			$this->session->set_flashdata('message-failed', 'Pengguna ' . $dataUser['username'] . ' gagal mengubah Password! Password tidak sesuai dengan password lama');
			
			redirect('profile/index');
			return false;
		}
	}

}
