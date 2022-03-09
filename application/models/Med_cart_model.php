<?php

class Med_cart_model extends CI_Model{

	public function add_spavka($id_Сheildren, $date_nach, $date_kon, $id_zabolevania, $tip_zapisi, $text_zapisi)
	{
				
		$sql = 'INSERT INTO med_cart(id_Сheildren, date_nach, date_kon, id_zabolevania, tip_zapisi, text_zapisi) VALUES (?,?,?,?, ?, ?)';	
	    $this->db->query($sql, array($id_Сheildren, $date_nach, $date_kon, $id_zabolevania, $tip_zapisi, $text_zapisi));

    }

    public function visible_med_cart() {

        $sql = 'select surname_c, name_c, cheildren.groupp_heal, deviation, date_nach, date_kon, naim_zabolevania, tip_zapisi, text_zapisi from vid_zabolevania, med_cart, cheildren where med_cart.id_Сheildren = cheildren.id_Cheildren and med_cart.id_zabolevania = vid_zabolevania.id_zabolevania';
        $query = $this->db->query($sql);
        
        return $query->result_array();

    }

    public function filter_med_cart($naim_zabolevania) {

        $sql = "select surname_c, name_c, cheildren.groupp_heal, deviation, date_nach, date_kon, naim_zabolevania, tip_zapisi, text_zapisi from vid_zabolevania, med_cart, cheildren where med_cart.id_Сheildren = cheildren.id_Cheildren and med_cart.id_zabolevania = vid_zabolevania.id_zabolevania and vid_zabolevania.naim_zabolevania like '%".$naim_zabolevania."%'";
        $query = $this->db->query($sql);
        return $query->result_array();

    }

    public function filter_groupp_heal($groupp_heal) {

        $sql = "select surname_c, name_c, cheildren.groupp_heal, deviation, date_nach, date_kon, naim_zabolevania, tip_zapisi, text_zapisi from vid_zabolevania, med_cart, cheildren where med_cart.id_Сheildren = cheildren.id_Cheildren and med_cart.id_zabolevania = vid_zabolevania.id_zabolevania and cheildren.groupp_heal like '%".$groupp_heal."%'";
        $query = $this->db->query($sql);
        return $query->result_array();

    }

    public function filter_med_procedure($med_procedure_name) {

        $sql = "select surname_c, name_c, med_cart.groupp_heal, deviation, date_nach, date_kon, tip_zapisi, text_zapisi from med_cart, cheildren where med_cart.id_Сheildren = cheildren.id_Cheildren and med_cart.text_zapisi like '%".$med_procedure_name."%'";
        $query = $this->db->query($sql);
        return $query->result_array();

    }


    public function visible_med_cart_two() {

        $sql = 'select surname_c, name_c, med_cart.groupp_heal, deviation, date_nach, date_kon, tip_zapisi, text_zapisi from med_cart, cheildren where med_cart.id_Сheildren = cheildren.id_Cheildren';
        $query = $this->db->query($sql);
        
        return $query->result_array();

    }

    public function update_grouppHeal($groupp_heal, $date_kon, $id_cheildren) {


        $sql = 'update cheildren set groupp_heal = ? where id_Cheildren = ?';
        $this->db->query($sql, array($groupp_heal, $id_cheildren));

            // var_dump($this->db->query);


        $sql = 'insert into med_cart(tip_zapisi, text_zapisi, date_nach, id_Сheildren) values (?, ?, ?, ?)';
        $this->db->query($sql, array('Группа здоровья',$groupp_heal, $date_kon, $id_cheildren));
    }


    public function add_med_procedure($tip_zapisi, $text_zapisi, $date, $id_cheildren) {

        $sql = 'insert into med_cart(tip_zapisi, text_zapisi, date_nach, id_Сheildren) values (?, ?, ?, ?)';
        $this->db->query($sql, array($tip_zapisi, $text_zapisi, $date, $id_cheildren));

    }


    public function analiz_zdorov(){
        $sql=' SELECT name_groupp,K,K1,round(P1) as P1,K2,round(P2) as P2,K3,round(P3) as P3,K4,round(P4) as P4,K5,round(P5) as P5 FROM analiz';

            $query = $this->db->query($sql); 
            return $query->result_array();
            
    }


    public function analiz_zabolev($date1,$date2,$obshee) {
        $sql='SELECT naim_zabolevania,count(*) as K,count(*)/?*100 as P from vid_zabolevania, med_cart 
         where vid_zabolevania.id_zabolevania=med_cart.id_zabolevania and 
         (date_nach BETWEEN ? and ? or date_kon BETWEEN ? and ? or (date_nach< ? and date_kon> ?)) group by naim_zabolevania';
        $query = $this->db->query($sql,array($obshee,$date1,$date2,$date1,$date2,$date1,$date2));
        return $query->result_array();

    }
    public function obshee($date1,$date2){
        $sql='SELECT count(*) as obshee from vid_zabolevania, med_cart where vid_zabolevania.id_zabolevania=med_cart.id_zabolevania and (date_nach BETWEEN ? and ? or date_kon BETWEEN ? and ? or (date_nach< ? and date_kon> ?))';
       
        $query = $this->db->query($sql,array($date1,$date2,$date1,$date2,$date1,$date2));
       return $query->row_array();
       
    }
    public function template_report($sql){
        $query = $this->db->query($sql);
        return $query->result_array();

	}
    
}