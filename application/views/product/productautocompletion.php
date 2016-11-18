<?php


$this->db->select('*');
		$this->db->like('product_name', $q);
		 $this->db->group_by('product_name'); 
		$query = $this->db->get('product');
		if($query->num_rows > 0){
			foreach ($query->result_array() as $row){
				$new_row['label']=htmlentities(stripslashes($row['product_name']));
        $new_row['value']=htmlentities(stripslashes($row['product_name']));
	
        $row_set[] = $new_row; //build an array
			}
			
			echo json_encode($row_set); //format the array into json data
		}


?> 
 