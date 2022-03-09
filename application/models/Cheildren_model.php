<?

class Cheildren_model extends CI_Model{

	// Вывод списка всех детей
	public function select_cheildren()
	{
		$query = $this->db->query('select * from cheildren where status_chl = 1'); 
		return $query->result_array();
	}

	// Ввод нового ребенка
	public function add_cheildren($name_c,$surname_c,$patronymic_c,$rost,$id_groupp,$date_birthday, $ves, $pol)
	{	
		$sql = 'INSERT INTO cheildren(name_c, surname_c, patronymic_c, rost, id_groupp, date_birthday, ves, pol) VALUES (?,?,?,?,?,?,?,?)';
		$this->db->query($sql,array($name_c,$surname_c,$patronymic_c,$rost,$id_groupp,$date_birthday, $ves, $pol));	
	}

	// ...
	public function cheildrens()
	{
		$query = $this->db->query('SELECT id_Cheildren, surname_c, name_c, patronymic_c, rost, ves, pol, name_groupp, date_birthday FROM cheildren, groupp WHERE cheildren.id_groupp = groupp.id_groupp and status_chl = 1');
		return $query->result_array();
	}

	// Вывод детей относительно группы
    public function children_from_groupp($id_groupp) {
		$sql = 'select id_Cheildren, surname_c, name_c from cheildren, groupp where cheildren.id_groupp = groupp.id_groupp and cheildren.id_groupp = ? and status_chl = 1';
		$query = $this->db->query($sql, array($id_groupp));
		return $query->result_array();
	}

	// Просмотр сведений о ребенке
	public function children_svedenia($id_children) {
		$sql = 'select surname_c, name_c,patronymic_c, pol, rost, ves, name_groupp,date_birthday,surname,name,surname,patronymic from cheildren,groupp,parent where cheildren.id_groupp=groupp.id_groupp and parent.id_cheildren=cheildren.id_cheildren  and cheildren.id_Cheildren = ? and status_chl = 1';
		$query = $this->db->query($sql, array($id_children));
		return $query->result_array();
	}


	//Добавление записей родителя
	public function sved_o_parents($name,$surname,$patronymic,$phone,$mesto_work,$position,$e_mail,$id_Cheildren, $login, $password){
		$sql = 'INSERT INTO parent(name,surname,patronymic,phone,mesto_work,position,e_mail,id_Cheildren, login, password) values (?,?,?,?,?,?,?,?, ?, ?)';		
		$this->db->query($sql,array($name,$surname,$patronymic,$phone,$mesto_work,$position,$e_mail,$id_Cheildren, $login, $password));

	}

	public function info_childern($id_children) {

		$sql = 'select surname_c, name_c, patronymic_c, name_groupp, rost, ves, pol, groupp_heal, date_birthday from cheildren, groupp where cheildren.id_groupp = groupp.id_groupp and cheildren.id_Cheildren = ?';
		$query = $this->db->query($sql, array($id_children));
		return $query->result_array();

	}
	
	// ДОбавление записей в мед карту
	public function sved_med_cart($groupp_heal, $date, $deviation, $id_Cheildren,$disease) {

		$sql = 'INSERT INTO med_cart (groupp_heal, date_nach, deviation, id_Сheildren,disease) values (?, ?, ?, ?, ?)';
		$this->db->query($sql, array($groupp_heal, $date, $deviation, $id_Cheildren, $disease));

	}

	public function children_date_for_inputs($id_children) {

		$sql = 'select * from cheildren where id_Cheildren = ?';
		$query = $this->db->query($sql, array($id_children));
		return $query->result_array();

	}

	// Корректировка личных дел 
	public function update_private_data($surname_c, $name_c, $patronymic_c, $date_birthday, $rost, $ves, $pol, $id_children) {

		$sql = 'update cheildren set surname_c = ?, name_c = ?, patronymic_c = ?, date_birthday = ?, rost = ?, ves = ?, pol = ? where id_Cheildren = ?';
		$this->db->query($sql, array($surname_c, $name_c, $patronymic_c, $date_birthday, $rost, $ves, $pol, $id_children));
	}

	public function update_status_chl($id_children) {

		$sql = 'update cheildren set status_chl = 0 where id_Cheildren = ?';
		$this->db->query($sql, array($id_children));

	}
	

}
?>