<?

class Cause_model extends CI_Model{

public function select_cause()
{
	$query = $this->db->query('select * from cause'); 
	return $query->result_array();
}



}

?>