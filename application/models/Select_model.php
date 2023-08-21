<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Select_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'dm');
	}
	
	public function getdataUnit()
	{
		$query =  $this->db->query("SELECT * FROM unit ORDER BY nama_unit  ASC");

		return $query->result();
	}

	public function getdataafd($id_unit)
	{
		$query =  $this->db->query("SELECT * FROM afdeling WHERE id_unit = '$id_unit' ORDER BY nama_afdeling  ASC");

		return $query->result();
	}
}