<?php

class Vid_zabolevnia extends CI_Model{

	public function visible_viz_zabolev()
	{
				
		$sql = 'select * from vid_zabolevania';	
        $query = $this->db->query($sql);
        return $query->result_array();
		
    }

    
}