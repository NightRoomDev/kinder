<?php

class Parent_model extends CI_Model{

	public function add_parent($name,$surname,$patronymic,$phone,$login,$password,$id_Cheildren, $mesto_work, $position, $email, $stepen_rodstva)
	
	
	{
				
		$sql = 'insert into parent(name,surname,patronymic,phone,login,password,id_Cheildren, mesto_work, position, e_mail, stepen_rodstva) values(?,?,?,?,?,?,?, ?, ?, ?, ?)';	
		$this->db->query($sql,array($name,$surname,$patronymic,$phone, $login,$password,$id_Cheildren, $mesto_work, $position, $email, $stepen_rodstva));
		
	}

	public function visible_fio($id_parent) {

		$sql = 'select * from parent where id_parent = ?';
		$query = $this->db->query($sql, $id_parent);
		return $query->result_array();

	}
	
}

