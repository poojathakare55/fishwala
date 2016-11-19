<?php

Class Login_Database extends CI_Model {
 function __construct()
	{
		$this->load->database();
	}

// Read data using username and password
public function login($data) {
$email=$data['username'];
$password=md5($data['password']);
$query=$this->db->query("SELECT * FROM customer WHERE emailid = '$email' and password='$password'");

if ($query->num_rows() == 1) {
	
return true;
} else {
return false;
}
}

// Read data from database to show data in admin page
public function read_user_information($username) {

$condition = "emailid =" . "'" . $username . "'";
$this->db->select('*');
$this->db->from('customer');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

}

?>