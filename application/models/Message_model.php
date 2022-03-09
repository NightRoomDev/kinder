<?php

class Message_model extends CI_Model{

	public function add_message($date_end_m,$date_start_m,$id_cause,$text_message,$id_parent)
	
	
	{
				
		$sql = 'insert into message(date_end_m,date_start_m,id_cause,text_message,id_parent) values(?,?,?,?,?)';	
		$this->db->query($sql,array($date_end_m,$date_start_m,$id_cause,$text_message,$id_parent));
		
	}

	public function message_my_children($id_Cheildren) {

		$sql = 'select id_message, text_message, date_start_m, date_end_m, name_cause from message, cause, cheildren, parent where message.id_cause = cause.id_cause and parent.id_Cheildren = cheildren.id_Cheildren and parent.id_parent = message.id_parent and parent.id_Cheildren = ?';	
		$query=$this->db->query($sql, array($id_Cheildren));
		return $query->result_array();

	}


	public function message_vospet($id) {


		$sql = 'select message.id_message, message.text_message, parent.surname, parent.name, parent.patronymic, message.date_start_m, message.date_end_m, cause.name_cause from message, cause, worker, groupp, parent, cheildren where message.id_cause = cause.id_cause and message.id_parent = parent.id_parent and worker.id_groupp = groupp.id_groupp and cheildren.id_Cheildren = parent.id_Cheildren and cheildren.id_groupp = groupp.id_groupp and worker.id_groupp = ? group by id_message';
		$query = $this->db->query($sql, array($id));
		return $query->result_array();

	}

}