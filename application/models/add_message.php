<?php

class add_message extends CI_Model{

	public function select_message(){
	
		$sql = 'select * from message,cause where message.id_cause=cause.id_cause ';	
		$query=$this->db->query($sql);
		return $query->result_array();
	}
}
