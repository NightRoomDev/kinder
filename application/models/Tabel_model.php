<?php
class Tabel_model extends CI_Model{

	public function add_table($id_cheildren,$status,$id_cause,$date)
	{
	$sql = 'INSERT INTO tabel(id_cheildren,status,id_cause,date ) VALUES (?,?,?,?)';
	$this->db->query($sql,array($id_cheildren,$status,$id_cause,$date));		
	}

	public function select_tabel()
	{
		$query = $this->db->query('SELECT id_tabel,name_c,surname_c,patronymic_c,tabel.status,name_cause,datet from tabel,cheildren,cause where tabel.id_cause= cause.id_cause and tabel.id_cheildren=cheildren.id_Cheildren '); 
		return $query->result_array();
	}

	public function search($id_groupp,$datet)
	{ 
		$str = ' ';
		//$str1= '*';
		//$sql='SELECT id_groupp,cheildren.id_Cheildren,name_c,surname_c,patronymic_c,tabel.status,name_cause,datet from cheildren LEFT JOIN tabel on  tabel.id_cheildren=cheildren.id_Cheildren LEFT JOIN cause on tabel.id_cause= cause.id_cause where id_groupp=? and (datet=? or datet is null)';
		$sql='SELECT id_groupp,cheildren.id_Cheildren,name_c,surname_c,patronymic_c,tabel.status,name_cause,datet from cheildren ';
		$sql .=' inner JOIN tabel on  tabel.id_cheildren=cheildren.id_Cheildren inner JOIN cause on tabel.id_cause= cause.id_cause ';
		$sql .=' where id_groupp=? and datet=? union ';
		$sql .='SELECT id_groupp,cheildren.id_Cheildren,name_c,surname_c,patronymic_c,? as status,? as name_cause,? as datet ';
		$sql .='from cheildren inner JOIN tabel on  tabel.id_cheildren=cheildren.id_Cheildren inner JOIN ';
		$sql .='cause on tabel.id_cause= cause.id_cause where id_groupp=? and (datet<>? ) union ';
		$sql .='SELECT id_groupp,cheildren.id_Cheildren,name_c,surname_c,patronymic_c, ? as status,? as name_cause,? as datet ';
		$sql .='from cheildren left JOIN tabel on  tabel.id_cheildren=cheildren.id_Cheildren left  JOIN cause ';
		$sql .=' on tabel.id_cause= cause.id_cause where id_groupp=? and (datet is null )';

		$query = $this->db->query($sql,array($id_groupp,$datet,$str,$str,$datet,$id_groupp,$datet,$str,$str,$datet,$id_groupp));
		return $query->result_array();
	}


	public function insert_tabel($id_cheildren,$status,$id_cause,$datet)
	{

	
		$sql = 'insert into tabel(id_cheildren,status,id_cause,datet) values (?,?,?,?)';
		$this->db->query($sql,array($id_cheildren,$status,$id_cause,$datet));
	}

	public function exists_table($id_cheildren) {

		$sql = 'select id_cheildren from cheildren, tabel where tabel.id_cheildren = cheildren.id_Cheildren and tabel.id_cheildren = ?';
		$query = $this->db->query($sql, array($id_cheildren));
		return $query->result_array();

	}

	public function update_tabel($id_cheildren,$status,$id_cause,$datet)
	{
		$sql= 'update tabel set  ?,  ? ,  ?,  ? where '; 
		$this->db->query($sql,array($id_cheildren,$status,$id_cause,$datet));
	}

}



	?>