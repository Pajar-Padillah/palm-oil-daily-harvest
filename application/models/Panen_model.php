
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panen_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'dm');
	}

	
	public function getAllPanen($tanggal_awal, $tanggal_akhir, $status_panen = '')
	{
		$this->db->select('*');
		$this->db->join('unit', 'panen.id_unit = unit.id_unit');
		$this->db->join('afdeling', 'panen.id_afdeling = afdeling.id_afdeling');
		$this->db->join('user', 'panen.id_user = user.id_user');
		// mengganti %20 menjadi spasi
		$status_panen = explode("%20", $status_panen);
		$status_panen = implode(" ", $status_panen);
		if ($status_panen !== '') {
			$this->db->where('panen.status_panen', $status_panen);
		}
		$this->db->where('tanggal_panen >=', $tanggal_awal);
		$this->db->where('tanggal_panen <=', $tanggal_akhir);
		return $this->db->get('panen')->result_array();
	}

	public function getPanenOPSAdministrator($tanggal_awal, $tanggal_akhir)
	{
		$query = "SELECT *, (SELECT count('panen.id_panen') FROM panen WHERE panen.status_panen IN ('selesai') AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ) AS jumlah_panen FROM panen 
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen IN ('selesai') AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
		ORDER BY panen.tanggal_panen DESC
		";
		return $this->db->query($query)->result_array();
	}

	public function getPanenUnitAdministrator($tanggal_awal, $tanggal_akhir)
	{
		$id_unit = $this->session->userdata('id_unit');
		$query = "SELECT *, (SELECT count('panen.id_panen') FROM panen INNER JOIN unit ON panen.id_unit = unit.id_unit WHERE panen.status_panen IN ('accunit', 'selesai')  AND panen.penolak = ''  AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND unit.id_unit = '$id_unit') AS jumlah_panen FROM panen 
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.status_panen IN ('accunit', 'selesai') AND panen.penolak = ''  AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
		AND unit.id_unit = '$id_unit'
		ORDER BY panen.tanggal_panen DESC
		";
		return $this->db->query($query)->result_array();
	}

	public function getPanenAfdelingAdministrator($tanggal_awal, $tanggal_akhir)
	{
		$id_afdeling = $this->session->userdata('id_afdeling');
		$query = "SELECT *, (SELECT count('panen.id_panen') FROM panen INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling WHERE panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'AND panen.penolak IN ('Manajer Unit', '') AND afdeling.id_afdeling = '$id_afdeling') AS jumlah_panen FROM panen 
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND panen.penolak IN ('Manajer Unit', '')
		AND afdeling.id_afdeling = '$id_afdeling'
		ORDER BY panen.tanggal_panen DESC
		";
		return $this->db->query($query)->result_array();
	}

	public function getPanenKeraniAdministrator($tanggal_awal, $tanggal_akhir)
	{
		$id_afdeling = $this->session->userdata('id_afdeling');
		$query = "SELECT *, (SELECT count('panen.id_panen') FROM panen INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling WHERE panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'AND panen.penolak IN ('Manajer Unit', '', 'Asisten Afdeling') AND afdeling.id_afdeling = '$id_afdeling') AS jumlah_panen FROM panen 
		INNER JOIN user ON panen.id_user = user.id_user
		INNER JOIN unit ON panen.id_unit = unit.id_unit
		INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
		WHERE panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND panen.penolak IN ('Manajer Unit', '', 'Asisten Afdeling')
		AND afdeling.id_afdeling = '$id_afdeling'
		ORDER BY panen.tanggal_panen DESC
		";
		return $this->db->query($query)->result_array();
	}

	public function getJumlahStatusPanen($tanggal_awal, $tanggal_akhir, $status_panen)
	{
		if ($status_panen == 'semua') {
			$query = "SELECT *, (SELECT count('panen.status_panen') FROM panen WHERE panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir') AS '$status_panen' FROM panen 
			INNER JOIN user ON panen.id_user = user.id_user
			INNER JOIN unit ON panen.id_unit = unit.id_unit
			INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
			WHERE panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
			ORDER BY panen.tanggal_panen DESC
			";
		} else {
			$query = "SELECT *, (SELECT count('panen.status_panen') FROM panen WHERE panen.status_panen = '$status_panen' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir') AS '$status_panen' FROM panen 
			INNER JOIN user ON panen.id_user = user.id_user
			INNER JOIN unit ON panen.id_unit = unit.id_unit
			INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
			WHERE panen.status_panen = '$status_panen' AND panen.tanggal_panen BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
			ORDER BY panen.tanggal_panen DESC
			";
		}
		return $this->db->query($query);
	}

	public function getJumlahStatusPanenUnitAdministrator($status_panen)
	{
		$id_unit = $this->session->userdata('id_unit');

		if ($status_panen == 'semua') {
			$query = "SELECT *, (SELECT count('panen.status_panen') FROM panen WHERE panen.id_unit = '$id_unit') AS '$status_panen' FROM panen 
			INNER JOIN user ON panen.id_user = user.id_user
			INNER JOIN unit ON panen.id_unit = unit.id_unit
			INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
			WHERE panen.id_unit = '$id_unit'
			ORDER BY panen.tanggal_panen DESC
			";
		} else {
			$query = "SELECT *, (SELECT count('panen.status_panen') FROM panen WHERE panen.status_panen = '$status_panen' AND
				panen.id_unit = '$id_unit') AS '$status_panen' FROM panen 
			INNER JOIN user ON panen.id_user = user.id_user
			INNER JOIN unit ON panen.id_unit = unit.id_unit
			INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
			WHERE panen.status_panen = '$status_panen' AND
			panen.id_unit = '$id_unit'
			ORDER BY panen.tanggal_panen DESC
			";
		}
		return $this->db->query($query);
	}

	public function getJumlahStatusPanenAfdelingAdministrator($status_panen)
	{
		$id_afdeling = $this->session->userdata('id_afdeling');

		if ($status_panen == 'semua') {
			$query = "SELECT *, (SELECT count('panen.status_panen') FROM panen WHERE panen.id_afdeling = '$id_afdeling') AS '$status_panen' FROM panen 
			INNER JOIN user ON panen.id_user = user.id_user
			INNER JOIN unit ON panen.id_unit = unit.id_unit
			INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
			WHERE panen.id_unit = '$id_afdeling'
			ORDER BY panen.tanggal_panen DESC
			";
		} else {
			$query = "SELECT *, (SELECT count('panen.status_panen') FROM panen WHERE panen.status_panen = '$status_panen' AND
				panen.id_afdeling = '$id_afdeling') AS '$status_panen' FROM panen 
			INNER JOIN user ON panen.id_user = user.id_user
			INNER JOIN unit ON panen.id_unit = unit.id_unit
			INNER JOIN afdeling ON panen.id_afdeling = afdeling.id_afdeling
			WHERE panen.status_panen = '$status_panen' AND
			panen.id_unit = '$id_afdeling'
			ORDER BY panen.tanggal_panen DESC
			";
		}
		return $this->db->query($query);
	}


	public function getAllUnit()
	{
		return $this->db->get('unit')->result_array();
	}	

	public function getPanenById($id)
	{
		$this->db->select('*');
		$this->db->join('user', 'panen.id_user = user.id_user');
		$this->db->join('unit', 'panen.id_unit = unit.id_unit');
		$this->db->join('afdeling', 'panen.id_afdeling = afdeling.id_afdeling');
		return $this->db->get_where('panen', ['panen.id_panen' => $id])->row_array();
	}

	public function getPanenByIdUnit()
	{
		$id_unit = $this->session->userdata('id_unit');
		$this->db->select('*');
		$this->db->join('user', 'panen.id_user = user.id_user');
		$this->db->join('unit', 'panen.id_unit = unit.id_unit');
		$this->db->join('afdeling', 'panen.id_afdeling = afdeling.id_afdeling');
		return $this->db->get_where('panen', ['panen.id_unit' => $id_unit])->row_array();
	}

	public function getDetailPanenById($id)
	{
		$this->db->select('*');
		// $this->db->join('panen', 'detail_panen.id_panen = panen.id_panen');
		$this->db->join('unit', 'panen.id_unit = unit.id_unit');
		$this->db->join('afdeling', 'panen.id_afdeling = afdeling.id_afdeling');

		// $this->db->join('paket', 'detail_panen.id_paket = paket.id_paket');
		// $this->db->join('jenis_paket', 'jenis_paket.id_jenis_paket = paket.id_jenis_paket');
		// $this->db->join('member', 'panen.id_member = member.id_member');
		$this->db->join('user', 'panen.id_user = user.id_user');
		return $this->db->get_where('panen', ['panen.id_panen' => $id])->result_array();
	}
	
	public function getJumlahPaketUnitAdministrator()
	{	
		$this->db->select('*');
		$this->db->join('unit', 'unit.id_unit = paket.id_unit');
		$this->db->where('unit.id_unit', $this->session->userdata('id_unit'));
		return $this->db->count_all_results('paket');
	}


	public function kodePanen($tgl_panen, $id_unit, $id_afdeling, $id_user, $table, $field, $initial)
	{
		// ambil kolom terakhir pada table
		$query = "SELECT max($field) AS field FROM panen INNER JOIN unit ON panen.id_unit = unit.id_unit";
		$last_id_panen = $this->db->query($query)->row_array();
		$data_panen = $this->getPanenById($last_id_panen['field']);
		// ambil tanggal
		$just_date = date('dmY', strtotime($tgl_panen));
		// ambil tanggal terakhir pada db
		$last_row_date = substr($data_panen['kode_panen'], 0, 8);
		// jika tanggal tidak sama dengan tanggal sebelumnya, maka atur angka dari 000 kembali
		if ($just_date == $last_row_date) {
			$field = $data_panen['kode_panen'];
		} else {
			// ambil bagian depan kode panen sbg tanggal
			$field = $just_date . $id_unit . $id_afdeling . $id_user . 'T' . '0000';
		}
		// ambil id terakhir dari depan
		$substr = substr($field, -4);
		// Conversi menjadi int
		$conv = (int) $substr;
		// tambahkan increase pada kode
		$inc = $conv + 1;
		
		// membuat kode otomatis cth: 009, 010, 011 dan hasil akhir
		$result_code = $just_date . $id_unit . $id_afdeling . $id_user . $initial . str_pad($inc, 4, "0", STR_PAD_LEFT);
		return $result_code;
	}

	public function createPanen()
	{
		$dataUser = $this->dm->getDataUser();
		$tanggal_panen = date('Y-m-d H:i:s');
		$id_unit = $this->input->post('id_unit', true);
		$id_afdeling = $this->input->post('id_afdeling', true);
		$id_user = $dataUser['id_user'];
		
		$table = 'panen';
		$field = 'id_panen';
		$initial = 'T';
		$kode_panen = $this->kodePanen($tanggal_panen, $id_unit, $id_afdeling, $id_user, $table, $field, $initial);

		

		$data = [
			'kode_panen' => $kode_panen,
			'tanggal_panen' => $tanggal_panen,
			// 'batas_waktu' => $this->input->post('batas_waktu', true),
			// 'tanggal_bayar' => $tanggal_bayar,
			'jumlah_tandan' => $this->input->post('jumlah_tandan', true),
			'tandan_kg' => $this->input->post('tandan_kg', true),
			'rata_tandan' => $this->input->post('rata_tandan', true),
			'brondolan' => $this->input->post('brondolan', true),
			'tandan_mentah' => $this->input->post('tandan_mentah', true),
			'status_panen' => 'accafdeling',
			'id_unit' => $id_unit,
			'id_afdeling' => $id_afdeling,
			'id_user' => $id_user
		];

		$this->db->insert($table, $data);
		$this->session->set_flashdata('message-success', 'Panen ' . $data['kode_panen'] . ' berhasil ditambahkan');

		// kirim kode panen
		// $this->session->unset_userdata(['kode_panen' => $kode_panen]);
		redirect('panen');	
	}

	public function updatePanen($id)
	{
		// ambil data panen dari db
		$data['panen'] = $this->getPanenById($id);
		$id_panen = $data['panen']['id_panen'];

		$data = [
			'jumlah_tandan' => $this->input->post('jumlah_tandan', true),
			'tandan_kg' => $this->input->post('tandan_kg', true),
			'rata_tandan' => $this->input->post('rata_tandan', true),
			'brondolan' => $this->input->post('brondolan', true),
			'tandan_mentah' => $this->input->post('tandan_mentah', true),
			'id_unit' => $this->input->post('id_unit', true),
			'id_afdeling' => $this->input->post('id_afdeling', true)
		];

		$this->db->where('panen.id_panen', $id);
		$this->db->update('panen', $data);
		$data['panen'] = $this->getPanenById($id);
		$this->session->set_flashdata('message-success', 'Panen ' . $data['panen']['kode_panen'] . ' berhasil diubah');
		redirect('panen');
	}

	public function deletePanen($id)
	{
		$this->dm->check_level_bukan_administrator('panen');
		$data['panen'] = $this->getPanenById($id);
		$this->db->delete('panen', ['id_panen' => $id]);
		$this->session->set_flashdata('message-success', 'Panen ' . $data['panen']['kode_panen'] . ' berhasil dihapus');
		redirect('panen');
	}

	public function ubahStatusPanen($id)
	{
		$data['panen'] = $this->getPanenById($id);

		if ($data['panen']['status_panen'] == 'accafdeling') {
			$data = ['status_panen' => 'accunit'];
		} elseif ($data['panen']['status_panen'] == 'accunit') {
			$data = ['status_panen' => 'selesai'];
		} 

		$this->session->set_flashdata('message-success', 'Status Panen ' . $data['panen']['kode_panen'] . ' berhasil diubah!');

		$this->db->where('panen.id_panen', $id);
		$this->db->update('panen', $data);
		redirect('panen');
	}

	public function getDetailPanenByIdPanen($id_panen)
	{
		$this->db->select('*');
		$this->db->join('unit', 'panen.id_unit = unit.id_unit');
		$this->db->join('afdeling', 'panen.id_afdeling = afdeling.id_afdeling');
		$this->db->join('user', 'panen.id_user = user.id_user');

		// $this->db->order_by('panen.id_panen', 'desc');
		return $this->db->get_where('panen', ['panen.id_panen' => $id_panen])->row_array();
	}	

}


