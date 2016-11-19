<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Baang extends CI_Controller {

	  var $data;
	  function __construct() {
        parent::__construct();
        error_reporting(0);
		// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');
$this->load->library('email');
// Load database
$this->load->model('login_database');
$this->load->model('baang_model');
//$this->load->model('my_class_model');

 $this->load->helper('url');
 
 if (isset($this->session->userdata['logged_in_admin_panel'])) {
	
 $user_id = ($this->session->userdata['logged_in_admin_panel']['userid']);
  
		  $this->data = array(
		  'get_user_details'=>$this->baang_model->get_employee_details_by_id($user_id),
            'get_new_order_count' => $this->baang_model->get_new_order_count(),
            'get_new_customer_count' => $this->baang_model->get_new_customer_count(),
			'nextdate'=>date('Y-m-d', strtotime(' +1 day')).'=pending'
        );
}
 

    }

	public function index()
	{
		 $data = $this->data;
		 
		$data['get_category_for_dashboard']=$this->baang_model->get_category_for_dashboard();
		
		$page='dashboard.php';	
		
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
if (isset($this->session->userdata['logged_in_admin_panel'])) {
	
$data['view_file']=$page;
$this->load->view('v_main',$data);
}
 else {
redirect("baang/user_login_process");
}

		
	}
	// Check for user login process
public function user_login_process() {

$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

if ($this->form_validation->run() == FALSE) {
if(isset($this->session->userdata['logged_in_admin_panel'])){

$this->load->view('v_main');
}else{

$this->load->view('login_form');

}
} else {
$data = array(
'username' => $this->input->post('username'),
'password' => $this->input->post('password')
);
$result = $this->login_database->login($data);
if ($result == TRUE) {

$username = $this->input->post('username');
$result = $this->login_database->read_user_information($username);
if ($result != false) {
$session_data = array(
'userid' => $result[0]->id,
'username' => $result[0]->username
);
// Add user data in session
$this->session->set_userdata('logged_in_admin_panel', $session_data);
header("location: ".site_url()."/baang/index");
}
} else {

$data = array(
'error_message' => 'Invalid Username or Password'
);
$this->load->view('login_form', $data);
}
}
}

// Logout from admin page
public function logout() {

// Removing session data
$sess_array = array(
'username' => '',
'userid' => ''
);
$this->session->unset_userdata('logged_in_admin_panel', $sess_array);
$data['message_display'] = 'Successfully Logout';
$this->load->view('login_form', $data);

}
function categorymanage($id = NULL) {
	 $data = $this->data;
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
			
      $page='category/categorymanage.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
        if ($id) {

            $condition[] = array('where', 'id', $id);
            $select_array = array('table_name' => 'category', 'table_fields' => '*', 'condition' => $condition, 'limit' => '', 'offset' => '');
            $result_data = $this->baang_model->select_data($select_array);
            $data['id'] = $result_data[0]['id'];
           
            $data['category_name'] = $result_data[0]['category_name'];
        }

        $data['view_file'] = $page;
        $this->load->view('v_main', $data);
		 } else {
redirect("baang/user_login_process");
}
    }
 function categorysubmit() {
	 	if (isset($this->session->userdata['logged_in_admin_panel'])) {
        $arr_post_data = $this->input->post();
if ($arr_post_data['id']) {
         $id=$arr_post_data['id'];
			 $jobseeker = $this->db->query("SELECT * FROM category where id='$id'");//get photo value
 $result = $jobseeker->result_array();
	foreach ($result as $client_email => $rows) {
	$profilephoto=$rows['photo'];
	
	}
	if($profilephoto!='')
	{
		if($arr_post_data['photoname']==$profilephoto){
			$filename=$arr_post_data['photoname'];
		}else{
			
			$filename=$this->categoryuploadimage();
		
		}
	}else{
		if($arr_post_data['photoname']!='')
			$filename=$this->categoryuploadimage();
		else
			$filename='';
	}
	
		//end code
}else{
	
	 $filename=$this->categoryuploadimage();

}
        $arr_update_data = array('id' => $arr_post_data['id'],
           'category_name' => $arr_post_data['category_name'],
			 'photo'=>$filename
			
        
        );
        if ($arr_post_data['id']) {
            $id = $arr_post_data['id'];
            $condition = array('id' => $id);
            $this->baang_model->update_record('category', $arr_update_data, $condition);
            $this->session->set_userdata('success', 'Record Updated Successfully');
        } else {
            $this->baang_model->insert_record('category', $arr_update_data);
         $this->session->set_userdata('success', 'Record Saved Successfully');
        }


        redirect('baang/categorymanage');
		 } else {
redirect("baang/user_login_process");
}
    }
	function categoryuploadimage()
{
$filename='';
    $files = $_FILES;
    $cpt = count($_FILES['photo']['name']);
   $info = pathinfo($_FILES['photo']['name']);
 $ext = $info['extension']; // get the extension of the file
 $newname = $i.time().'.'.$ext; 

 $target = 'images/category/'.$_FILES['photo']['name'];
 move_uploaded_file($_FILES['photo']['tmp_name'], $target);
 $filename=$_FILES['photo']['name'];

    
return ($filename);
}
	 function categorygrid() {
		  $data = $this->data;
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
	$page='category/categorygrid.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
    $data['view_file'] = $page;
        $this->load->view('v_main', $data, false);
		 } else {
redirect("baang/user_login_process");
}
    }
	function categorydelete($id) {
			
       
        //delete record
        $condition = array('id' => $id);
        $suc_delete = $this->baang_model->delete_record('category', $condition);
        echo $suc_delete;
		
		
    }
	 function categoryview($id) {
		 $data = $this->data;
		 	if (isset($this->session->userdata['logged_in_admin_panel'])) {
	  $page='category/categorymanage.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
       $condition[] = array('where', 'id', $id);
        $select_array = array('table_name' => 'category', 'table_fields' => '*', 'condition' => $condition, 'limit' => '', 'offset' => '');
        $result_data = $this->baang_model->select_data($select_array);
        $data['id'] = $result_data[0]['id'];
	
        $data['category_name'] = $result_data[0]['category_name'];

        $data['readOnly'] = 'readOnly';
        $data['view_file'] = $page;
       $this->load->view('v_main', $data);
	    } else {
redirect("baang/user_login_process");
}
    }
	function sub_categorymanage($id = NULL) {
		 $data = $this->data;
	$data['get_category_dropdown'] = $this->baang_model->get_category_dropdown();
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
			
      $page='sub_category/sub_categorymanage.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
        if ($id) {

            $condition[] = array('where', 'id', $id);
            $select_array = array('table_name' => 'sub_category', 'table_fields' => '*', 'condition' => $condition, 'limit' => '', 'offset' => '');
            $result_data = $this->baang_model->select_data($select_array);
            $data['id'] = $result_data[0]['id'];
            $data['category_id'] = $result_data[0]['category_id'];
            $data['sub_category_name'] = $result_data[0]['sub_category_name'];
        }

        $data['view_file'] = $page;
        $this->load->view('v_main', $data);
		 } else {
redirect("baang/user_login_process");
}
    }
 function sub_categorysubmit() {
	 	if (isset($this->session->userdata['logged_in_admin_panel'])) {
        $arr_post_data = $this->input->post();

        $arr_update_data = array('id' => $arr_post_data['id'],
           'sub_category_name' => $arr_post_data['sub_category_name'],
			 'category_id' => $arr_post_data['category_id']
			
        
        );
        if ($arr_post_data['id']) {
            $id = $arr_post_data['id'];
            $condition = array('id' => $id);
            $this->baang_model->update_record('sub_category', $arr_update_data, $condition);
           
        } else {
            $this->baang_model->insert_record('sub_category', $arr_update_data);
        
        }


        redirect('baang/sub_categorymanage');
		 } else {
redirect("baang/user_login_process");
}
    }
	 function sub_categorygrid() {
		  $data = $this->data;
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
	$page='sub_category/sub_categorygrid.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
    $data['view_file'] = $page;
        $this->load->view('v_main', $data, false);
		 } else {
redirect("baang/user_login_process");
}
    }
	function sub_categorydelete($id) {
			
       
        //delete record
        $condition = array('id' => $id);
        $suc_delete = $this->baang_model->delete_record('sub_category', $condition);
        echo $suc_delete;
		
		
    }
	 function sub_categoryview($id) {
		  $data = $this->data;
		 $data['get_category_dropdown'] = $this->baang_model->get_category_dropdown();
		 	if (isset($this->session->userdata['logged_in_admin_panel'])) {
	  $page='sub_category/sub_categorymanage.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
       $condition[] = array('where', 'id', $id);
        $select_array = array('table_name' => 'sub_category', 'table_fields' => '*', 'condition' => $condition, 'limit' => '', 'offset' => '');
        $result_data = $this->baang_model->select_data($select_array);
        $data['id'] = $result_data[0]['id'];
		 $data['category_id'] = $result_data[0]['category_id'];
        $data['sub_category_name'] = $result_data[0]['sub_category_name'];

        $data['readOnly'] = 'readOnly';
        $data['view_file'] = $page;
       $this->load->view('v_main', $data);
	    } else {
redirect("baang/user_login_process");
}
    }
	function service_locationmanage($id = NULL) {
	 $data = $this->data;
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
			
      $page='service_location/service_locationmanage.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
        if ($id) {

            $condition[] = array('where', 'id', $id);
            $select_array = array('table_name' => 'service_location', 'table_fields' => '*', 'condition' => $condition, 'limit' => '', 'offset' => '');
            $result_data = $this->baang_model->select_data($select_array);
            $data['id'] = $result_data[0]['id'];
            $data['pincode'] = $result_data[0]['pincode'];
            $data['location'] = $result_data[0]['location'];
            $data['status'] = $result_data[0]['status'];
        }

        $data['view_file'] = $page;
        $this->load->view('v_main', $data);
		 } else {
redirect("baang/user_login_process");
}
    }
 function service_locationsubmit() {
	 	if (isset($this->session->userdata['logged_in_admin_panel'])) {
        $arr_post_data = $this->input->post();

        $arr_update_data = array('id' => $arr_post_data['id'],
           'location' => $arr_post_data['location'],
			 'pincode' => $arr_post_data['pincode'],
			 'status' => $arr_post_data['status']
			
        
        );
        if ($arr_post_data['id']) {
            $id = $arr_post_data['id'];
            $condition = array('id' => $id);
            $this->baang_model->update_record('service_location', $arr_update_data, $condition);
            $this->session->set_userdata('success', 'Record Updated Successfully');
        } else {
            $this->baang_model->insert_record('service_location', $arr_update_data);
         $this->session->set_userdata('success', 'Record Saved Successfully');
        }


        redirect('baang/service_locationmanage');
		 } else {
redirect("baang/user_login_process");
}
    }
	 function service_locationgrid() {
		  $data = $this->data;
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
	$page='service_location/service_locationgrid.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
    $data['view_file'] = $page;
        $this->load->view('v_main', $data, false);
		 } else {
redirect("baang/user_login_process");
}
    }
	function service_locationdelete($id) {
			
       
        //delete record
        $condition = array('id' => $id);
        $suc_delete = $this->baang_model->delete_record('service_location', $condition);
        echo $suc_delete;
		
		
    }
	 function service_locationview($id) {
		 $data = $this->data;
		 	if (isset($this->session->userdata['logged_in_admin_panel'])) {
	  $page='service_location/service_locationmanage.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
       $condition[] = array('where', 'id', $id);
        $select_array = array('table_name' => 'service_location', 'table_fields' => '*', 'condition' => $condition, 'limit' => '', 'offset' => '');
        $result_data = $this->baang_model->select_data($select_array);
        $data['id'] = $result_data[0]['id'];
		 $data['pincode'] = $result_data[0]['pincode'];
        $data['location'] = $result_data[0]['location'];
		 $data['status'] = $result_data[0]['status'];

        $data['readOnly'] = 'readOnly';
        $data['view_file'] = $page;
       $this->load->view('v_main', $data);
	    } else {
redirect("baang/user_login_process");
}
    }
	function employeemanage($id = NULL) {
	 $data = $this->data;
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
			
      $page='employee/employeemanage.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
        if ($id) {

            $condition[] = array('where', 'id', $id);
            $select_array = array('table_name' => 'employee', 'table_fields' => '*', 'condition' => $condition, 'limit' => '', 'offset' => '');
            $result_data = $this->baang_model->select_data($select_array);
            $data['id'] = $result_data[0]['id'];
            $data['name'] = $result_data[0]['name'];
            $data['emailid'] = $result_data[0]['emailid'];
            $data['contactno'] = $result_data[0]['contactno'];
            $data['address'] = $result_data[0]['address'];
            $data['username'] = $result_data[0]['username'];
            $data['usertype'] = $result_data[0]['usertype'];
        }

        $data['view_file'] = $page;
        $this->load->view('v_main', $data);
		 } else {
redirect("baang/user_login_process");
}
    }
 function employeesubmit() {
	 $flag=0;
	 	if (isset($this->session->userdata['logged_in_admin_panel'])) {
        $arr_post_data = $this->input->post();

        $arr_update_data = array('id' => $arr_post_data['id'],
           'name' => $arr_post_data['name'],
			 'emailid' => $arr_post_data['emailid'],
			 'contactno' => $arr_post_data['contactno'],
			 'address' => $arr_post_data['address'],
			 'username' => $arr_post_data['username'],
			 'password' => md5($arr_post_data['password']),
			  'usertype' => $arr_post_data['usertype']
			
        
        );
        if ($arr_post_data['id']) {
			
			$get_employee_details_by_id=$this->baang_model->get_employee_details_by_id($arr_post_data['id']);
			
			 $previoususername=$get_employee_details_by_id['username'];
			 $arr_update_data = array('id' => $arr_post_data['id'],
           'name' => $arr_post_data['name'],
			 'emailid' => $arr_post_data['emailid'],
			 'contactno' => $arr_post_data['contactno'],
			 'address' => $arr_post_data['address'],
			 'username' => $arr_post_data['username'],
			 'usertype' => $arr_post_data['usertype']
			
        
        );
            $id = $arr_post_data['id'];
            $condition = array('id' => $id);
            $this->baang_model->update_record('employee', $arr_update_data, $condition);
            $this->session->set_userdata('success', 'Record Updated Successfully');
			if($previoususername!=$arr_post_data['username']){
				
			$flag=1;
			}
        } else {
            $this->baang_model->insert_record('employee', $arr_update_data);
         $this->session->set_userdata('success', 'Record Saved Successfully');
        }

if($flag==1){
	$this->logout();
}else{
        redirect('baang/employeemanage');
}
		 } else {
redirect("baang/user_login_process");
}
    }
	 function employeegrid() {
		  $data = $this->data;
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
	$page='employee/employeegrid.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
    $data['view_file'] = $page;
        $this->load->view('v_main', $data, false);
		 } else {
redirect("baang/user_login_process");
}
    }
	function employeedelete($id) {
			
       
        //delete record
        $condition = array('id' => $id);
        $suc_delete = $this->baang_model->delete_record('employee', $condition);
        echo $suc_delete;
		
		
    }
	 function employeeview($id) {
		 $data = $this->data;
		 	if (isset($this->session->userdata['logged_in_admin_panel'])) {
	  $page='employee/employeemanage.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
       $condition[] = array('where', 'id', $id);
        $select_array = array('table_name' => 'employee', 'table_fields' => '*', 'condition' => $condition, 'limit' => '', 'offset' => '');
        $result_data = $this->baang_model->select_data($select_array);
        $data['id'] = $result_data[0]['id'];
		  $data['name'] = $result_data[0]['name'];
            $data['emailid'] = $result_data[0]['emailid'];
            $data['contactno'] = $result_data[0]['contactno'];
            $data['address'] = $result_data[0]['address'];
            $data['username'] = $result_data[0]['username'];
			 $data['usertype'] = $result_data[0]['usertype'];

        $data['readOnly'] = 'readOnly';
        $data['view_file'] = $page;
       $this->load->view('v_main', $data);
	    } else {
redirect("baang/user_login_process");
}
    }
	function productmanage($id = NULL) {
		 $data = $this->data;
	$data['get_category_dropdown_for_products'] = $this->baang_model->get_category_dropdown_for_products($this->data['get_user_details']['usertype']);
	$data['get_subcategory_dropdown'] = $this->baang_model->get_subcategory_dropdown();
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
			
      $page='product/productmanage.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
        if ($id) {

            $condition[] = array('where', 'id', $id);
            $select_array = array('table_name' => 'product', 'table_fields' => '*', 'condition' => $condition, 'limit' => '', 'offset' => '');
            $result_data = $this->baang_model->select_data($select_array);
            $data['id'] = $result_data[0]['id'];
            $data['photo'] = $result_data[0]['photo'];
            $data['product_name'] = $result_data[0]['product_name'];
			 $data['category_id'] = $result_data[0]['category_id'];
            $data['sub_category_id'] = $result_data[0]['sub_category_id'];
            $data['price'] = $result_data[0]['price'];
            $data['unit'] = $result_data[0]['unit'];
            $data['description'] = $result_data[0]['description'];
            $data['availability'] = $result_data[0]['availability'];
        }

        $data['view_file'] = $page;
        $this->load->view('v_main', $data);
		 } else {
redirect("baang/user_login_process");
}
    }
 function productsubmit() {
	 	if (isset($this->session->userdata['logged_in_admin_panel'])) {
        $arr_post_data = $this->input->post();
if ($arr_post_data['id']) {
         $id=$arr_post_data['id'];
			 $jobseeker = $this->db->query("SELECT * FROM product where id='$id'");//get photo value
 $result = $jobseeker->result_array();
	foreach ($result as $client_email => $rows) {
	$profilephoto=$rows['photo'];
	
	}
	if($profilephoto!='')
	{
		if($arr_post_data['photoname']==$profilephoto){
			$filename=$arr_post_data['photoname'];
		}else{
			
			$filename=$this->productuploadimage();
		
		}
	}else{
		if($arr_post_data['photoname']!='')
			$filename=$this->productuploadimage();
		else
			$filename='';
	}
	
		//end code
}else{
	
	 $filename=$this->productuploadimage();

}


 
        $arr_update_data = array('id' => $arr_post_data['id'],
           'photo' => $filename,
			 'category_id' => $arr_post_data['category_id'],
			 'sub_category_id' => $arr_post_data['sub_category_id'],
			   'product_name' => $arr_post_data['product_name'],
				 'price' => $arr_post_data['price'],
				 'unit' => $arr_post_data['unit'],
			 'description'=> $arr_post_data['description'],
			 'availability'=> $arr_post_data['availability']
			
        
        );
        if ($arr_post_data['id']) {
            $id = $arr_post_data['id'];
            $condition = array('id' => $id);
            $this->baang_model->update_record('product', $arr_update_data, $condition);
			 $this->session->set_userdata('success', 'Record Updated Successfully');
           
        } else {
            $this->baang_model->insert_record('product', $arr_update_data);
			 $this->session->set_userdata('success', 'Record Saved Successfully');
        
        }


        redirect('baang/productmanage');
		 } else {
redirect("baang/user_login_process");
}
    }
	function productuploadimage()
{
$filename='';
    $files = $_FILES;
    $cpt = count($_FILES['photo']['name']);
   $info = pathinfo($_FILES['photo']['name']);
 $ext = $info['extension']; // get the extension of the file
 $newname = $i.time().'.'.$ext; 

 $target = 'images/product/'.$_FILES['photo']['name'];
 move_uploaded_file($_FILES['photo']['tmp_name'], $target);
 $filename=$_FILES['photo']['name'];

    
return ($filename);
}
	 function productgrid() {
		  $data = $this->data;
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
	$page='product/productgrid.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
    $data['view_file'] = $page;
        $this->load->view('v_main', $data, false);
		 } else {
redirect("baang/user_login_process");
}
    }
	function productdelete($id) {
			
       
        //delete record
        $condition = array('id' => $id);
        $suc_delete = $this->baang_model->delete_record('product', $condition);
        echo $suc_delete;
		
		
    }
	 function productview($id) {
		  $data = $this->data;
		 $data['get_category_dropdown_for_products'] = $this->baang_model->get_category_dropdown_for_products();
		 $data['get_subcategory_dropdown'] = $this->baang_model->get_subcategory_dropdown();
		 	if (isset($this->session->userdata['logged_in_admin_panel'])) {
	  $page='product/productmanage.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
       $condition[] = array('where', 'id', $id);
        $select_array = array('table_name' => 'product', 'table_fields' => '*', 'condition' => $condition, 'limit' => '', 'offset' => '');
        $result_data = $this->baang_model->select_data($select_array);
        $data['id'] = $result_data[0]['id'];
            $data['photo'] = $result_data[0]['photo'];
            $data['product_name'] = $result_data[0]['product_name'];
			 $data['category_id'] = $result_data[0]['category_id'];
            $data['sub_category_id'] = $result_data[0]['sub_category_id'];
            $data['price'] = $result_data[0]['price'];
            $data['unit'] = $result_data[0]['unit'];
            $data['description'] = $result_data[0]['description'];
            $data['availability'] = $result_data[0]['availability'];

        $data['readOnly'] = 'readOnly';
        $data['view_file'] = $page;
       $this->load->view('v_main', $data);
	    } else {
redirect("baang/user_login_process");
}
    }
	function fillsubcategory(){
		$category_id = $this->input->get('category_id');
		 $return[''] = '---please select---';
		 $this->db->where('category_id', $category_id);
   $this->db->order_by("sub_category_name", "asc");
    $query = $this->db->get('sub_category'); 
    foreach($query->result_array() as $row){
        $return[$row['id']] = $row['sub_category_name'];
    }
		 $js = 'id="sub_category_id" class= "form-control" required';

if (isset($readOnly)) {
                                        $js.= 'disabled';
                                    }
echo form_dropdown('sub_category_id', $return,'',$js);
	}
	public function category($category_id)
	{
		 $data = $this->data;
		$data['get_subcategory_for_dashboard']=$this->baang_model->get_subcategory_for_dashboard($category_id);
		$data['category_name']=$this->baang_model->get_category_byid($category_id);
 $page='subcategorydashboard.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
if (isset($this->session->userdata['logged_in_admin_panel'])) {
$data['view_file']=$page;
$this->load->view('v_main',$data);
}
 else {
redirect("baang/user_login_process");
}

		
	}
	 function customergrid() {
		  $data = $this->data;
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
	$page='customer/customergrid.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
    $data['view_file'] = $page;
	$this->db->query("update customer set open='1'");
        $this->load->view('v_main', $data, false);
		 } else {
redirect("baang/user_login_process");
}
    }
	function newordergrid() {
		  $data = $this->data;
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
	$page='order/newordergrid.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	$this->db->query("update master_order set open='1'");
    $data['view_file'] = $page;
        $this->load->view('v_main', $data, false);
		 } else {
redirect("baang/user_login_process");
}
    }
	function cancelordergrid() {
		  $data = $this->data;
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
	$page='order/cancelordergrid.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
    $data['view_file'] = $page;
        $this->load->view('v_main', $data, false);
		 } else {
redirect("baang/user_login_process");
}
    }
	function orderdetails($orderid) {
		  $data = $this->data;
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
				$data['get_order_details_by_id']=$this->baang_model->get_order_details_by_id($orderid);
				$data['get_product_dates_by_orderid']=$this->baang_model->get_product_dates_by_orderid($orderid);
	$page='order/orderdetails.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
    $data['orderid'] = $orderid;
    $data['view_file'] = $page;
        $this->load->view('v_main', $data, false);
		 } else {
redirect("baang/user_login_process");
}
    }
	function walletgrid() {
		  $data = $this->data;
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
	$page='order/walletgrid.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
    $data['view_file'] = $page;
        $this->load->view('v_main', $data, false);
		 } else {
redirect("baang/user_login_process");
}
    }
	function editwallet(){
		$order_id=$this->input->get('order_id'); 
		$get_order_details_by_id=$this->baang_model->get_order_details_by_id($order_id);
		$get_wallet_details_by_id=$this->baang_model->get_wallet_details_by_id($order_id);
		$json['popup']='<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">';
	  $attributes = array('id' => 'editwalletsubmit','class'=>"cart nobottommargin clearfix");

$json['popup'].=form_open('baang/editwalletsubmit', $attributes);
      $json['popup'].='<div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title ">'.$get_order_details_by_id['order_no'].'</h4>
      </div>
      <div class="modal-body">';
	
        $json['popup'].='<p>Wallet Balance</p>
		<div class="input-group margin">
                    <input class="form-control" type="hidden" id="order_id" name="order_id" value='.$order_id.' required>
                    <input class="form-control" type="hidden" id="originalwalletbalance"  value='.$get_wallet_details_by_id['amount'].' required>
                    <input class="form-control" type="number" id="walletbalance" name="walletbalance" value='.$get_wallet_details_by_id['amount'].' required>
                 </div>
				
      </div>
      <div class="modal-footer">
	   <button type="submit" class="btn btn-default">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>';
	   $json['popup'].=form_close();
									$json['popup'].=' 
    </div>

  </div>
  <script>
  $("#editwalletsubmit").submit(function(e)
	{
			var originalwalletbalance = $("#originalwalletbalance").val();
			var walletbalance = $("#walletbalance").val();
			walletbalance=+walletbalance;
			originalwalletbalance=+originalwalletbalance;
			if(walletbalance > originalwalletbalance){
				alert("Amount Should be Less than "+originalwalletbalance);
				return false;
			}
		
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
		
if(data=="success")
			 location.reload();
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				alert("error");
			}
		});
	    e.preventDefault();	
	    e.unbind();
	});
	</script>
  ';
 echo json_encode($json);
	}
	function editwalletsubmit(){
		$arr_post_data=$this->input->post();
		$order_id=$arr_post_data['order_id'];
		$walletbalance=$arr_post_data['walletbalance'];
		$this->db->query("update wallet set amount='$walletbalance' where order_id='$order_id'");
		echo 'success';
	}
	function changestatustodeliver($orderid) {
		ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
	  $flag=false;
        $arr_post_data = $this->input->post();
$arr=$arr_post_data['deliveredchk'];
$count=count($arr)-1;

for($i=0;$i<=$count;$i++)
{
 $postdata=$arr[$i];
 $explode=explode("=",$postdata);
 $dateval=$explode[0];
 $product_main_id=$explode[1];
$getproductdata=$this->db->query("select * from product_order_details where id='$product_main_id'");
			if($getproductdata->num_rows()>0){
				foreach($getproductdata->result_array() as $row){
				
$finalstr='delivered';
 $this->db->query("update product_order_details set status='$finalstr' where id='$product_main_id'");
  $flag=true;

					
				}
				
			}
}
if($flag){
					 $this->session->set_userdata('deliver', 'Status Changed To Delivered');
					 redirect('baang/orderdetails/'.$orderid);
				}

    }
		function orderstatus(){
		$order_id=$this->input->get('order_id'); 
		$get_wallet_details_by_id=$this->baang_model->get_wallet_details_by_id($order_id);
		if($get_wallet_details_by_id['amount']=='0'){
	 $this->db->query("update master_order set status='delivered' where id='$order_id'");
	  echo 'success';
		}else{
			echo 'fail';
		}
	
	}
	public function subcategory($sub_category_id)
	{
		 $data = $this->data;
		$data['get_subcategory_byid']=$this->baang_model->get_subcategory_byid($sub_category_id);
		$data['category_name']=$this->baang_model->get_category_byid($category_id);
 $page='nextdayproductlist.php';
 $data['sub_category_id']=$sub_category_id;
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
if (isset($this->session->userdata['logged_in_admin_panel'])) {
$data['view_file']=$page;
$this->load->view('v_main',$data);
}
 else {
redirect("baang/user_login_process");
}

		
	}
	function cancelthisorder(){
		$order_id=$this->input->get('order_id'); 
		if($order_id!=''){
	
				  $this->db->query("update master_order set status='cancelled' where id='$order_id'");
				   $this->db->query("update wallet set amount='0' where order_id='$order_id'");
				  	 $getstatus=$this->db->query("select * from product_order_details where order_id='$order_id'");
					  if($getstatus->num_rows()>0){
		 foreach($getstatus->result_array() as $val){
			 $statuscancelled='';
			 $id=$val['id'];
			 
					
					$statuscancelled='cancelled';
					$this->db->query("update product_order_details set status='$statuscancelled' where id='$id'");
					
		 }
		  echo 'success'; 
					  }else{
				 echo 'fail';
			 }
				
			 
		 }
	 
	 
		

	}
	 function changepasswordform() {
		  $data = $this->data;
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
	$page='employee/changepasswordform.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
    $data['view_file'] = $page;
        $this->load->view('v_main', $data, false);
		 } else {
redirect("baang/user_login_process");
}
    }
	public function changepasswordformsubmit($id)
	{
		if (isset($this->session->userdata['logged_in_admin_panel'])) {
	    $arr_post_data = $this->input->post();
		if(!empty($arr_post_data)){
			
        $arr_update_data = array(
		'password' => md5($arr_post_data['repeatpassword'])
        
        );
   
if ($id) {
           
            $condition = array('id' => $id);
            $this->baang_model->update_record('employee', $arr_update_data, $condition);
            $this->session->set_userdata('changepassword', 'Password Changed Successfully');
			
        }
          
	$this->logout();

		}
		} else {
redirect('baang/index');
}
}
function testimonialmanage($id = NULL) {
	 $data = $this->data;
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
			
      $page='testimonial/testimonialmanage.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
        if ($id) {

            $condition[] = array('where', 'id', $id);
            $select_array = array('table_name' => 'testimonial', 'table_fields' => '*', 'condition' => $condition, 'limit' => '', 'offset' => '');
            $result_data = $this->baang_model->select_data($select_array);
            $data['id'] = $result_data[0]['id'];
            $data['name'] = $result_data[0]['name'];
            $data['location'] = $result_data[0]['location'];
            $data['description'] = $result_data[0]['description'];
        }

        $data['view_file'] = $page;
        $this->load->view('v_main', $data);
		 } else {
redirect("baang/user_login_process");
}
    }
 function testimonialsubmit() {
	  $data = $this->data;
	 	if (isset($this->session->userdata['logged_in_admin_panel'])) {
        $arr_post_data = $this->input->post();

        $arr_update_data = array('id' => $arr_post_data['id'],
            'name' => $arr_post_data['name'],
            'location' => $arr_post_data['location'],
            'description' => $arr_post_data['description']
			
        
        );
        if ($arr_post_data['id']) {
            $id = $arr_post_data['id'];
            $condition = array('id' => $id);
            $this->baang_model->update_record('testimonial', $arr_update_data, $condition);
           
        } else {
            $this->baang_model->insert_record('testimonial', $arr_update_data);
        
        }


        redirect('baang/testimonialmanage');
		 } else {
redirect("baang/user_login_process");
}
    }
	 function testimonialgrid() {
		  $data = $this->data;
			if (isset($this->session->userdata['logged_in_admin_panel'])) {
	$page='testimonial/testimonialgrid.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
    $data['view_file'] = $page;
        $this->load->view('v_main', $data, false);
		 } else {
redirect("baang/user_login_process");
}
    }
	function testimonialdelete($id) {
			
       
        //delete record
        $condition = array('id' => $id);
        $suc_delete = $this->baang_model->delete_record('testimonial', $condition);
        echo $suc_delete;
		
		
    }
	 function testimonialview($id) {
		  $data = $this->data;
		 	if (isset($this->session->userdata['logged_in_admin_panel'])) {
	  $page='testimonial/testimonialmanage.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
       $condition[] = array('where', 'id', $id);
        $select_array = array('table_name' => 'testimonial', 'table_fields' => '*', 'condition' => $condition, 'limit' => '', 'offset' => '');
        $result_data = $this->baang_model->select_data($select_array);
        $data['id'] = $result_data[0]['id'];
          $data['name'] = $result_data[0]['name'];
            $data['location'] = $result_data[0]['location'];
            $data['description'] = $result_data[0]['description'];

        $data['readOnly'] = 'readOnly';
        $data['view_file'] = $page;
       $this->load->view('v_main', $data);
	    } else {
redirect("baang/user_login_process");
}
    }
	function deletecustomer() {
	
        $arr_post_data = $this->input->post();
$arr=$arr_post_data['deletechk'];
$count=count($arr)-1;

for($i=0;$i<=$count;$i++)
{
 $id=$arr[$i];
$delquery = $this->db->query("delete from customer where id='$id'");
$this->session->set_userdata('success', 'Record Deleted Successfully');
//end code
}

 redirect('baang/customergrid');
    }
	function shippingdetails(){
		$order_id=$this->input->get('order_id'); 
		$get_order_details_by_id=$this->baang_model->get_order_details_by_id($order_id);
		$json['popup']='<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">';
	  $attributes = array('id' => 'editwalletsubmit','class'=>"cart nobottommargin clearfix");

$json['popup'].=form_open('baang/editwalletsubmit', $attributes);
      $json['popup'].='<div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title ">Shipping Details For '.$get_order_details_by_id['order_no'].'</h4>
      </div>
      <div class="modal-body">';
	
        $json['popup'].='
		<div class="row">
	<div class="col-md-4"><strong>Name</strong></div><div class="col-md-4">'.$get_order_details_by_id['get_shippingdetails_byid']['shipping_name'].'</div>
			</div>	
			<div class="row">
	<div class="col-md-4"><strong>Email Id</strong></div><div class="col-md-4">'.$get_order_details_by_id['get_shippingdetails_byid']['shipping_emailid'].'</div>
			</div>	
			<div class="row">
	<div class="col-md-4"><strong>Address</strong></div><div class="col-md-4">'.$get_order_details_by_id['get_shippingdetails_byid']['shipping_address'].'</div>
			</div>	
			<div class="row">
	<div class="col-md-4"><strong>Pincode</strong></div><div class="col-md-4">'.$get_order_details_by_id['get_shippingdetails_byid']['shipping_pincode'].'</div>
			</div>	
			<div class="row">
	<div class="col-md-4"><strong>Contact No.</strong></div><div class="col-md-4">'.$get_order_details_by_id['get_shippingdetails_byid']['shipping_contactno'].'</div>
			</div>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>';
	   $json['popup'].=form_close();
									$json['popup'].=' 
    </div>

  </div>

  ';
 echo json_encode($json);
	}
}

/* End of file baang.php */
/* Location: ./application/controllers/baang.php */