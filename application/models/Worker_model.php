<?

class Worker_model extends CI_Model{

	public function select_worker()
	{
		$query = $this->db->query('select FIO, login, role, tel from worker'); 
		return $query->result_array();
	}

	public function insert_worker($FIO, $login, $password, $tel, $role, $id_groupp) {

		$sql = 'insert into worker (FIO, login, password, tel, role, id_groupp) values (?, ?, ?, ?, ?, ?)';
		$query = $this->db->query($sql, array($FIO, $login, $password, $tel, $role, $id_groupp));

	}

}

?>