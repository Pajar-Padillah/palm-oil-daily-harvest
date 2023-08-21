<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'dm');
	}

	public function check_login()
	{
		// Mengambil variabel yang diinput
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);

		// Cek apakah ada akun yang sesuai dengan yang diinputkan username
		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				// Menset userdata atau session
				$data = [
					'id_user' => $user['id_user'],
					'jabatan' => $user['jabatan'],
					'id_unit' => $user['id_unit'],
					'id_afdeling' => $user['id_afdeling'],
					'username' => $user['username']
				];
				$this->session->set_userdata($data);
				redirect('auth/index');

			} else {
				$this->session->set_flashdata('message-failed', 'Password yang anda masukkan salah');
				redirect('Auth/index');
			}
		} else {
			$this->session->set_flashdata('message-failed', 'Username yang anda masukkan salah');
			redirect('Auth/index');
		}
	}
}