<?php
class Groupp_model extends CI_Model{

	public function select_groupp()
	{
		$query = $this->db->query('select * from groupp'); 
		return $query->result_array();
	}
/* 	public function groupps()
 {
	 $query = $this->db->query('SELECT id_groupp,name_groupp,plan_count_cheildren,status from groupp');
	 return $query->result_array();
 } */

 	public function select_groupp_id($id) {
 		$sql = 'SELECT * FROM groupp where id_groupp = ?';
 		$query = $this->db->query($sql , array($id)); 
		return $query->result_array();
 	}
	
	public function add_groupp($name_groupp,$plan_count_cheildren,$tip_groupp)
{	
	
$sql = 'INSERT INTO groupp( name_groupp, plan_count_cheildren, status, tip_groupp) VALUES (?,?,?,?)';
$this->db->query($sql,array($name_groupp,$plan_count_cheildren,0,$tip_groupp));	
	
}
	

	
	
}
?>