<?php
class Vhod extends CI_Model{
	
public function autoriz($login,$password) { /* Авторизация */ 

$sql = 'select id_worker,login,password, role, id_groupp from worker where login=? and password=?'; 
$query = $this->db->query ($sql, array($login,$password)); 
return $query->row(); 

} /* Авторизация */
public function autoriz_parent($login,$password) { /* Авторизация */ 

$sql = 'select * from parent where (login=? or phone=? or e_mail=?)  and password=?'; 
$query = $this->db->query ($sql, array($login,$login,$login,$password)); 
return $query->row(); 


}
}
?>