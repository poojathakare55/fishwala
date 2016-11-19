<?php

function get_domain() {
	 $ci=& get_instance();
    $ci->load->database(); 
	$domains=array();
	$ci->db->select('*');
		
		 $ci->db->group_by('domain');
		$query = $ci->db->get('pro_domain');
		if($query->num_rows > 0){
			foreach ($query->result_array() as $row){
				$domains[]=$row['domain'];
        }
			
		}
 //$domains = array('gmail.com', 'yahoo.com', 'hotmail.com');
    return $domains;
}

?>