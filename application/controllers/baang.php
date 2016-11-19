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
$this->load->library('facebook'); // Automatically picks appId and secret from config
 $this->load->helper('url');
 if (!empty($this->session->userdata['logged_in_baang_panel'])) {
	 $cartitemcount=0;
	  if (isset($this->session->userdata['cart_item'])) {
$cartitemcount=count($this->session->userdata('cart_item'));
 }
 $user_id = ($this->session->userdata['logged_in_baang_panel']['user_id']);
  $this->data = array(
		   'get_user_details'=>$this->baang_model->get_user_details_by_id($user_id),
		   'cartitemcount'=>$cartitemcount,
		   'get_payumoney'=>$this->baang_model->get_payumoney()
          );
		  
}else{
	 $user = $this->facebook->getUser();
	   if (!$user) {
	  $this->data = array(
		    'login_url'=>$this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url().'baang/facebooklogin', 
                'scope' => array("email") // permissions here
            ))
          );
	   }
}


    }

	public function index()
	{
		 $data = $this->data;
		  $data['title']="Home";
		 $data['get_testimonials'] = $this->baang_model->get_testimonials();
		 $data['get_category_list'] = $this->baang_model->get_category_list();
		 $data['get_service_location'] = $this->baang_model->get_service_location();
  $page='home.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
		    $data['view_file'] = $page;
    $this->load->view('v_main', $data);

}
public function category($param1)
	{
		
		 $data = $this->data;
		  $category_id=$this->baang_model->get_category_id($param1);
		 $data['title']=$this->baang_model->get_category_byid($category_id);
	 $data['category_name'] = $this->baang_model->get_category_byid($category_id);
	
	
	  $data['get_category_list'] = $this->baang_model->get_category_list();
	 $data['get_subcategory_byid'] = $this->baang_model->get_subcategory_byid($category_id);
  $page='product.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
		    $data['view_file'] = $page;
    $this->load->view('v_main', $data);

}
public function pincodecheck(){
	$pincode=$this->input->post('pincode');
	$getpincode=$this->db->query("select * from service_location where pincode='$pincode'");
	if($getpincode->num_rows()>0){
		echo 'success';
	}else{
		echo 'fail';
	}
}
 public function login()
	{
		
	$arr_post_data = $this->input->post();
	

		if(!empty($arr_post_data)){
			
			$this->form_validation->set_rules('loginemailid', 'Username', 'trim|required|xss_clean');
$this->form_validation->set_rules('loginpassword', 'Password', 'trim|required|xss_clean');

if ($this->form_validation->run() == FALSE) {
	
if(isset($this->session->userdata['logged_in_baang_panel'])){
	 echo 'success';
}else{
echo 'fail';
}
} else {
$data = array(
'username' => $this->input->post('loginemailid'),
'password' => $this->input->post('loginpassword')
);
$result = $this->login_database->login($data);
if ($result == TRUE) {

$username = $this->input->post('loginemailid');
$result = $this->login_database->read_user_information($username);

if ($result != false) {
$session_data = array(
'user_id' => $result[0]->id,
'emailid' => $result[0]->emailid,
);
// Add user data in session
$this->session->set_userdata('logged_in_baang_panel', $session_data);
	echo 'success';
}
} else {
echo 'fail';
}
}
		}
 
}
 public function register()
	{
		 $config = Array(
				'protocol' 	=> 'mail',
				'wordwrap' 	=> FALSE,
				'charset' 	=> 'utf-8',
				'crlf' 		=> '\r\n',
				'newline' 	=> '\r\n',
				'mailtype' 	=> 'html'
				);	
	    $arr_post_data = $this->input->post();
		if(!empty($arr_post_data)){
			
			$eventdate=$arr_post_data['dob'];
 $replaceformat=str_replace('/','-',$eventdate);
$explodedate=explode('-',$replaceformat);
 $eventdate=$explodedate[2].'-'.$explodedate[1].'-'.$explodedate[0];
 
 
$this->form_validation->set_rules('emailid', 'Email', 'required|valid_email|is_unique[customer.emailid]');
$this->form_validation->set_message('is_unique', 'Email Id is already exists');
        $arr_update_data = array('id' => '',
		'name' => $arr_post_data['name'],
            'emailid' => $arr_post_data['emailid'],
			'password' => md5($arr_post_data['password']),
			'forget_password' => $arr_post_data['password'],
			'address' => $arr_post_data['address'],
			'pincode' => $arr_post_data['pincode'],
			
			'contactno' => $arr_post_data['contactno'],
			'dob' => $eventdate,
        'open'=>0
        );
      if ($this->form_validation->run() == TRUE) // Only add new option if it is unique
{  

            $this->baang_model->insert_record('customer', $arr_update_data);
			/*$message="Thank You For Registering Into Baang";
			$this->load->library('email', $config); 
		$this->email->from("info@prolifiquetech.com", "Prolifiquetech");
		$this->email->to($arr_post_data['emailid']);
		$this->email->subject("Registeration Successfully Done");
		$this->email->message($message);
		$this->email->send();*/
			echo 'success';
}else{
	echo 'fail';
		}
		}
}
 public function profileupdate()
	{
		if (isset($this->session->userdata['logged_in_baang_panel'])) {
	    $arr_post_data = $this->input->post();
		if(!empty($arr_post_data)){
			
        $arr_update_data = array('id' => $arr_post_data['id'],
		'name' => $arr_post_data['name'],
			'address' => $arr_post_data['address'],
			'pincode' => $arr_post_data['pincode'],
			
			'contactno' => $arr_post_data['contactno'],
			'dob' => $arr_post_data['dob']
        
        );
   
if ($arr_post_data['id']) {
            $id = $arr_post_data['id'];
            $condition = array('id' => $id);
            $this->baang_model->update_record('customer', $arr_update_data, $condition);
            $this->session->set_userdata('profile', 'Profile Updated Successfully');
        }
          
		redirect('profile-'.$arr_post_data['id']);	

		}
		} else {
redirect('baang/index');
}
}
public function logout() {
  $page='home.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	$data['view_file'] = $page;
// Removing session data
$sess_array = array(
'emailid' => '',
'user_id'=>''
);
$this->session->unset_userdata('logged_in_baang_panel', $sess_array);
// Logs off session from website
        $this->facebook->destroySession();
		unset($_SESSION['access_token']);
        // Make sure you destory website session as well.
 redirect('baang/index','refresh');
}
function addproductpopup(){
	 $data = $this->data;
		$product_id=$this->input->get('product_id'); 
		$current_url=$this->input->get('current_url'); 
		$get_product_details=$this->baang_model->get_product_details($product_id);
		$product_name=$get_product_details['product_name'];
		$get_unit_dropdown=$this->baang_model->get_unit_dropdown($get_product_details['product_name']);
		$category_name=$this->baang_model->get_category_byid($get_product_details['category_id']);
		 $get_order_dropdown = $this->baang_model->get_order_dropdown($data['get_user_details']['id']);
		$content=$cleanchk=$fishunit=$fishday=$fishstatus=$fromdate=$enddate=$fishcategory='';
		$visibility='display:block;';
		$orderno='';
		$js = 'id="order_no" class= "sm-form-control" onchange="fillorderid(this.value)"';
$orderno.='<label style="margin-bottom:0px">Add To Existing Order</label>';
$orderno.=form_dropdown('order_no', $get_order_dropdown,"",$js);
		//if (strpos(strtolower($category_name),'fish') !== false) {
			$content= "* Product Weighed Before Cleaning and Cutting <br/>* Cleaned with bones retained";
			$cleanchk='<input type="checkbox" name="cleanchk" id="cleanchk"/> Do You Want This Fish To be Cleaned';
			$fishunit='<div class="product-price">Unit: <span>'.$get_product_details['unit'].'</span></div>';
			$fishday=date('N',strtotime(date('Y-m-d')));
			$fishstatus=$fishday.'=pending';
			$fromdate=date('d/m/Y', strtotime(' +1 day'));
			$enddate=date('d/m/Y', strtotime(' +1 day'));
			$visibility='display:none;';
			$fishcategory='fish';
			$orderno='';
		//}
		
			$json=array();
	$json['popup']='<div class="modal-dialog " >

     <div class="modal-body">
      
                        <div class=" col-md-12 clearfix product-desc" style="background:#fff; padding:7px;">';
						$attributes = array('id' => 'addproductincart','class'=>"cart nobottommargin clearfix");

$json['popup'].=form_open('baang/addproductincart', $attributes);
						 $json['popup'].='<input type="hidden" id="product_id" name="product_id" value="'.$get_product_details['id'].'"/>
       <input type="hidden" id="product_name" name="product_name" value="'.$get_product_details['product_name'].'"/>
       <input type="hidden" id="price" name="price" value="'.$get_product_details['price'].'"/>
       <input type="hidden" id="originalprice" name="originalprice" value="'.$get_product_details['price'].'"/>
       <input type="hidden" id="current_url" name="current_url" value="'.$current_url.'"/>
       <input type="hidden" id="fishcategory" name="fishcategory" value="'.$fishcategory.'"/>
		
	   <div id="addproductincartmsg"></div>
	  '.$content.'
	   
						<div class="col-md-12 clearfix " style="padding:0px; margin-bottom:10px;">
						<div class="col-md-4">
                            <div class=" " style="height:150px;"><img src="'.$get_product_details['photo'].'" style="height:150px; width:150px;"></div>
							</div>
							<div class="col-md-8">
							<div class="product-price h2 product_name">'.$get_product_details['product_name'].'</div>
							<div class="product-price price">Price: <i class="fa fa-lg fa-inr"></i> <span>'.$get_product_details['price'].'</span></div>
							'.$fishunit.'
                        
								<div class="quantity clearfix" style="margin-bottom:10px">
                                    <label style="margin-bottom:0px">Select Quantity <i>(in kg)</i></label>';
									
									//$js = 'id="unit" class= "sm-form-control" required onchange="fetchproductdetailsbyunit(this.value)"';

//$json['popup'].=form_input('unit', $get_unit_dropdown,$get_product_details['unit'],$js);
/*$param = array(
              'name'        => 'unit',
              'id'          => 'unit',
             'placeholder'=>'Enter Qty',
              'required'   => 'true',
              'type'   => 'text',
			  'onkeyup'=>'calculateamount(this.value)',
			  'onkeypress'=>"return isNumberKey(event);",
              'class'        => 'sm-form-control'
            );
			$json['popup'].=form_input($param);*/
			$param = array(
              '0.5'        => '0.5',
              '1'          => '1',
             '1.5'=>'1.5',
              '2'   => '2',
              '2.5'   => '2.5',
			  '3'=>'3',
			  '3.5'=>"3.5",
              '4'        => '4',
              '4.5'        => '4.5',
              '5'        => '5',
              '5.5'        => '5.5',
              '6'        =>  '6' ,
              '6.5'        => '6.5' ,
              '7'        => '7',
              '7.5'        => '7.5',
              '8'        => '8',
              '8.5'        => '8.5',
              '9'        => '9',
              '9.5'        => '9.5',
              '10'        => '10',
            );
$js1 = 'id="unit" class= "sm-form-control" required onchange="calculateamount(this.value)"';
$json['popup'].=form_dropdown('unit', $param,"",$js1);
$json['popup'].=$orderno;
                                $json['popup'].=$cleanchk.'
								  
								   <input type="hidden" name="clean" id="clean" value=""/>
								</div>
                          
                            <div class="clear"></div>
                            </div>
							</div>
                        
                          <div class="col-md-12 clearfix">
						
						  <p class="description">'.$get_product_details['description'].'</p>
                            <div class="product-meta nobottommargin" >
							
								
                                   
								
								
								<div class="clear"></div>
								
								
								</div>
								
								<button type="submit" class="button pull-right button-small button-rounded button-green">Fill My Box</button>';
									$json['popup'].=form_close();
									$json['popup'].=' 
									<script>
   function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}
						
	$("#cleanchk").click(function(event) {   

    if(this.checked) {
       $("#clean").val("Cleaned");
    }else{
		$("#clean").val("")
	}
});								

$("#addproductincart").submit(function(e)
	{
		
		//$("#addproductincartmsg").html("Adding......");
		
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
			
// $("#addproductincartmsg").html(data);
			window.location = data;
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$("#addproductincartmsg").html("error");
			}
		});
	    e.preventDefault();	
	    e.unbind();
	});
									</script>
									
                            </div>
							</div>
                        </div>

      </div>
      
    

  </div>';
			echo json_encode($json);
}
function fetchproductdetailsbyunit(){
	$product_name=$this->input->get('product_name'); 
	$unit=$this->input->get('unit'); 
$json=array();
$query =$this->db->query("select * from product where product_name='$product_name' and unit='$unit'");

if ( $query->num_rows() > 0 )
    {
     foreach($query->result_array() as $row){
		  $json['id']=$row['id'];
        $json['photo']=base_url().'admin/images/product/'.$row['photo'];
        $json['product_name']=$row['product_name'];
        $json['price']=$row['price'];
        $json['unit']=$row['unit'];
        $json['description']=$row['description'];
					   
	 }
    
    }
echo json_encode($json);
}
function addproductincart(){
		$arr_post_data=$this->input->post(); 
		//$json=json_encode($arr_post_data,JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_APOS);
		//$itemArray=json_decode($json,true);
		
		 $product_id=$arr_post_data['product_id'];
		$unit=$arr_post_data['unit'];
		$get_product_details=$this->baang_model->get_product_details($product_id);
		
		$status='pending';
		$itemArray = array(
		$product_id =>
		array(
		'product_id'=>$arr_post_data["product_id"],
		'product_name'=>$arr_post_data["product_name"],
		'price'=>$arr_post_data["price"],
		'qty'=>$arr_post_data["unit"],
		'status'=>$status,
		'clean'=>$arr_post_data["clean"],
		)
		);
		$result=array();
		//if(!empty($this->session->userdata('cart_item'))) {
		$cart_item=$this->session->userdata('cart_item');
		if(!empty($cart_item)) {
		
				//if(in_array($arr_post_data["product_id"],$this->session->userdata['cart_item'])) {
					//search for same product in cart if yes then nothing is added
					if($this->find_key_value($this->session->userdata['cart_item'],'product_id',$arr_post_data["product_id"])) {
					
					/*foreach($this->session->userdata['cart_item'] as $k => $v) {
							if($arr_post_data["product_id"] == $k)
								$this->session->userdata['cart_item'][$k]["unit"] = $unit;
					}*/
				} else {
					//print_r($this->session->userdata['cart_item']);
					//print_r($itemArray);
					
					$this->session->set_userdata('cart_item',array_merge($this->session->userdata['cart_item'],$itemArray));

				}
			} else {
				
				$this->session->set_userdata('cart_item', $itemArray);
			}
			//print_r($this->session->userdata['cart_item']);
			 $this->session->set_userdata('cartmsg', 'Product Added To Cart');
			echo $arr_post_data['current_url'];
}
function find_key_value($array, $key, $val)
{
    foreach ($array as $item)
    {
       if (is_array($item))
       {
           $this->find_key_value($item, $key, $val);
       }

        if (isset($item[$key]) && $item[$key] == $val) return true;
    }

    return false;
}
function cart(){
	if(isset($this->session->userdata['logged_in_baang_panel'])){
		
	$data = $this->data;
	$data['title']='Cart';
	$data['get_category_list'] = $this->baang_model->get_category_list();
  $page='cart.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
		    $data['view_file'] = $page;
    $this->load->view('v_main', $data);
	}else{
		redirect('baang/index');
	}
}
function removeitem($product_id){
	if(isset($this->session->userdata['logged_in_baang_panel'])){
	$data = $this->data;
	$flag=false;
 if(!empty($this->session->userdata["cart_item"])) {
	// print_r($this->session->userdata['cart_item']);
foreach($this->session->userdata['cart_item'] as $key => $value) {
	foreach($value as $key1 => $value1) {
		
    if ($value1 == $product_id) {
		
        foreach($value as $deleteKey => $deleteValue) {
			unset($this->session->userdata['cart_item'][$key]); //remove item from cart using key from multidimensional array
			 $this->session->set_userdata('cart_item',$this->session->userdata['cart_item']); //again set the array in cart ....important step
		  $flag=true;
        }
        break;
    }
	}
}
		if($flag){
			redirect('cart');
		}	
		}
	}else{
		redirect('baang/index');
	}
}
function checkout(){
	if(isset($this->session->userdata['logged_in_baang_panel'])){
		if (isset($this->session->userdata['cart_item'])) {
	$data = $this->data;
		$data['title']='Checkout';
  $page='checkout.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
		    $data['view_file'] = $page;
    $this->load->view('v_main', $data);
		}else{
		redirect('baang/index');
	}
	}else{
		redirect('baang/index');
	}
}
 function checkoutsubmit() {


	 	if (isset($this->session->userdata['logged_in_baang_panel'])) {
			if (isset($this->session->userdata['cart_item']) && !empty($this->session->userdata['cart_item'])) {
			 $data = $this->data;
        $arr_post_data = $this->input->post();
		
$flag=false;
       $order_arr_data = array('id' => '',
		'order_no' => $this->baang_model->generateorderno(),
		'order_date' => date('Y-m-d'),
		'customer_id' =>  $data['get_user_details']['id'],
           'delivery_charges' => $arr_post_data['delivery_charges'],
           'express_delivery' => $arr_post_data['express_delivery'],
			 'sub_total' => $arr_post_data['sub_total'],
			 'charity_amount' => $arr_post_data['charity_amount'],
			 'grand_total' => $arr_post_data['grand_total'],
			 'payment_mode' => $arr_post_data['payment_mode'],
			 'status' => "pending"
		
        );
       
            $master_orderid=$this->baang_model->insert_record('master_order', $order_arr_data);
			
			
        if($master_orderid){
			// save shipping data
			$shipping_arr_data = array('id' => '',
		'order_id' => $master_orderid,
           'shipping_name' => $arr_post_data['shipping_name'],
			 'shipping_emailid' => $arr_post_data['shipping_emailid'],
			 'shipping_address' => $arr_post_data['shipping_address'],
			 'shipping_pincode' => $arr_post_data['shipping_pincode'],
			 'shipping_contactno' => $arr_post_data['shipping_contactno']
			
        
        );
       $this->baang_model->insert_record('shipping', $shipping_arr_data);
			
			// save wallet data
			$wallet_arr_data = array('id' => '',
		'order_id' => $master_orderid,
           'amount' => $arr_post_data['grand_total']
		);
       $this->baang_model->insert_record('wallet', $wallet_arr_data);
			
			//save product order
			//product order details
			
				 foreach ($this->session->userdata['cart_item'] as $item){
	$get_product_details=$this->baang_model->get_product_details($item['product_id']);

	
	 $product_order_arr_data = array('id' => '',
		'order_id' => $master_orderid,
		'category_id' => $get_product_details['category_id'],
		'sub_category_id' =>  $get_product_details['sub_category_id'],
           'product_id' => $get_product_details['id'],
		   'qty' => $item['qty'],
			 'price' => $item['price'],
			 'status' => $item['status'],
			 'clean' => $item['clean']
			
			
        
        );
       $this->baang_model->insert_record('product_order_details', $product_order_arr_data);
				 }
			
			
			
			 //$this->session->set_userdata('order', 'Your Order is Successfully Placed');
			 //code for empty cart
			foreach($this->session->userdata['cart_item'] as $key => $value) {
	foreach($value as $key1 => $value1) {
		
   
        foreach($value as $deleteKey => $deleteValue) {
			unset($this->session->userdata['cart_item'][$key]); //remove item from cart using key from multidimensional array
			 $this->session->set_userdata('cart_item',$this->session->userdata['cart_item']); //again set the array in cart ....important step
		  $flag=true;
        }
        break;
   
	}
}
//end code
if($flag){
			 redirect('baang/cashondeliverysuccess/'.$master_orderid);
}
		}
 }
		 } else {
redirect('baang/index');
}
    }
	public function profile($profileid)
	{
		
		if (isset($this->session->userdata['logged_in_baang_panel'])) {
		 $data = $this->data;
		 $data['profileid']=$profileid;
	$data['get_total_wallet']=$this->baang_model->get_total_wallet($profileid);
	$data['get_product_dates_by_customerid']=$this->baang_model->get_product_dates_by_customerid($profileid);

	$data['get_order_list_by_customerid']=$this->baang_model->get_order_list_by_customerid($profileid);
  $page='profile.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
		    $data['view_file'] = $page;
    $this->load->view('v_main', $data);

} else {
redirect('baang/index');
}
	}
	public function cancelproduct(){
		 $data = $this->data;
		$flag=false;
		    $arr_post_data = $this->input->get();
			$product_main_id=$arr_post_data['product_main_id'];
			$dateval=$arr_post_data['dateval'];
			$getproductdata=$this->db->query("select * from product_order_details where id='$product_main_id'");
			if($getproductdata->num_rows()>0){
				foreach($getproductdata->result_array() as $row){
					 $mysubscriptionstatus=$row['status'];
				
  $finalstr='cancelled';
 $this->db->query("update product_order_details set status='$finalstr' where id='$product_main_id'");
  $flag=true;
	
				}
				if($flag){
					 $this->session->set_userdata('cancel', 'Your Order is Successfully Cancelled');
					echo 'success';
				}
			}
	}
	
	/*function cancelthisorder(){
		$order_id=$this->input->get('order_id'); 
		if($order_id!=''){
	 $query=$this->db->query("select min(fromdate) as fromdate from product_order_details where order_id='$order_id'");
	 if($query->num_rows()>0){
		 foreach($query->result_array() as $row){
			 if(date('Y-m-d')<$row['fromdate']){
				  $this->db->query("update master_order set status='cancelled' where id='$order_id'");
				   $this->session->set_userdata('cancel', 'Your Order is Successfully Cancelled');
				 echo 'success'; 
			 }else{
				 echo 'fail';
			 }
		 }
	 }
	 
		}
	
	}*/
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
			  $mysubscriptionstatus=$val['status'];
			 
					
					$statuscancelled='cancelled';
					$this->db->query("update product_order_details set status='$statuscancelled' where id='$id'");
					 $this->session->set_userdata('cancel', 'Your Order is Successfully Cancelled');
		 }
		  echo 'success'; 
					  }else{
				 echo 'fail';
			 }
				
			
		 }
	 
	 
		

	}
			
	
	function paymentsuccessurl(){
		 $data = $this->data;
		$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$additionalCharges=$_POST["additionalCharges"];
//$salt="XVnB61y2";
//$salt="BV1QBwCv";
$salt=$data['get_payumoney']['salt'];
If (!empty($additionalCharges)) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
		 
       if ($hash != $posted_hash) {
	         $data['message']='<li style="margin-bottom:12px"><i class="icon-play" style="font-size:12px"></i>Invalid Transaction. Please try again</li>';
		   }
	   else {
           	   
			   $flag=false;
if (isset($this->session->userdata['order_array']) && !empty($this->session->userdata['order_array'])) {

		 $order_arr_data = array('id' => '',
		'order_no' => $this->session->userdata['order_array']['order_no'],
		'order_date' => $this->session->userdata['order_array']['order_date'],
		'customer_id' =>  $this->session->userdata['order_array']['customer_id'],
           'delivery_charges' => $this->session->userdata['order_array']['delivery_charges'],
           'express_delivery' => $this->session->userdata['order_array']['express_delivery'],
			 'sub_total' => $this->session->userdata['order_array']['sub_total'],
			 'grand_total' => $this->session->userdata['order_array']['grand_total'],
			 'payment_mode' => $this->session->userdata['order_array']['payment_mode'],
			 'status' => $this->session->userdata['order_array']['status'],
			 'charity_amount' => $this->session->userdata['order_array']['charity_amount']
		
        );
       
            $master_orderid=$this->baang_model->insert_record('master_order', $order_arr_data);
	 if($master_orderid){
			// save shipping data
			$shipping_arr_data = array('id' => '',
		'order_id' => $master_orderid,
           'shipping_name' => $this->session->userdata['order_array']['shipping_name'],
			 'shipping_emailid' => $this->session->userdata['order_array']['shipping_emailid'],
			 'shipping_address' => $this->session->userdata['order_array']['shipping_address'],
			 'shipping_pincode' => $this->session->userdata['order_array']['shipping_pincode'],
			 'shipping_contactno' => $this->session->userdata['order_array']['shipping_contactno']
			
        
        );
       $this->baang_model->insert_record('shipping', $shipping_arr_data);
			
			// save wallet data
			$wallet_arr_data = array('id' => '',
		'order_id' => $master_orderid,
           'amount' => $this->session->userdata['order_array']['grand_total']
		);
       $this->baang_model->insert_record('wallet', $wallet_arr_data);
			
			//save product order
			//product order details
			
				 foreach ($this->session->userdata['cart_item'] as $item){
	$get_product_details=$this->baang_model->get_product_details($item['product_id']);
	
	$from_date=$item['fromdate'];
 $replaceformat=str_replace('/','-',$from_date);
$explodedate=explode('-',$replaceformat);
 $fromdate=$explodedate[2].'-'.$explodedate[1].'-'.$explodedate[0];
	
	 $to_date=$item['todate'];
 $application_deadlinereplaceformat=str_replace('/','-',$to_date);
$application_deadlineexplodedate=explode('-',$application_deadlinereplaceformat);
 $todate=$application_deadlineexplodedate[2].'-'.$application_deadlineexplodedate[1].'-'.$application_deadlineexplodedate[0];
 
	
	 $product_order_arr_data = array('id' => '',
		'order_id' => $master_orderid,
		'category_id' => $get_product_details['category_id'],
		'sub_category_id' =>  $get_product_details['sub_category_id'],
           'product_id' => $get_product_details['id'],
			'qty' => $item['qty'],
			 'price' => $item['price'],
			 'status' => $item['status'],
			 'clean' => $item['clean']
			
			
        
        );
       $this->baang_model->insert_record('product_order_details', $product_order_arr_data);
				 }
			
			
			
			// $this->session->set_userdata('order', 'Your Order is Successfully Placed');
			 //code for order array
			foreach($this->session->userdata['order_array'] as $key => $value) {
	
   
			unset($this->session->userdata['order_array'][$key]); //remove item from cart using key from multidimensional array
			 $this->session->set_userdata('order_array',$this->session->userdata['order_array']); //again set the array in cart ....important step
		    
}
//end code
			 //code for empty cart
			foreach($this->session->userdata['cart_item'] as $key => $value) {
	foreach($value as $key1 => $value1) {
		
   
        foreach($value as $deleteKey => $deleteValue) {
			unset($this->session->userdata['cart_item'][$key]); //remove item from cart using key from multidimensional array
			 $this->session->set_userdata('cart_item',$this->session->userdata['cart_item']); //again set the array in cart ....important step
		  $flag=true;
        }
        break;
   
	}
}
//end code
if($flag){
			//echo 'done';
}
		}
	
}
			 $data['cartitemcount']=count($this->session->userdata('cart_item'));  
         $data['message']='<li style="margin-bottom:12px"><i class="icon-play" style="font-size:12px"></i>	Thank You. Your order status is '.$status.'.</li>

<li style="margin-bottom:12px"><i class="icon-play" style="font-size:12px"></i>Your Transaction ID for this transaction is <b>'.$txnid.'</b>
</li>
<li style="margin-bottom:12px"><i class="icon-play" style="font-size:12px"></i>We have received a payment of <b>Rs. '.$amount.'</b>. Your order will soon be shipped.</li>';
	   
		   } 
		 $this->session->set_userdata('paymentsuccessurl', 'Congratulations, welcome to fishwala family with every order/subscription you help a needy');
		// redirect('/');
		
  $page='success.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
		    $data['view_file'] = $page;
    $this->load->view('v_main', $data);
	}
	function paymentfailureurl(){
		 $data = $this->data;
		$data['status']=$_POST["status"];
$data['firstname']=$_POST["firstname"];
$data['amount']=$_POST["amount"];
$data['txnid']=$_POST["txnid"];

$data['posted_hash']=$_POST["hash"];
$data['key']=$_POST["key"];
$data['productinfo']=$_POST["productinfo"];
$data['email']=$_POST["email"];
$data['additionalCharges']=$_POST["additionalCharges"];
//$salt="XVnB61y2";
//$data['salt']="BV1QBwCv";
$data['salt']=$data['get_payumoney']['salt'];

/*If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
  
       if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
		   }
	   else {

         echo "<h3>Your order status is ". $status .".</h3>";
         echo "<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";
          
		 } */
		 //$this->session->set_userdata('paymentfailureurl', 'Oops !!!!!!! Something Went Wrong');
		// redirect('/');
		 $page='failure.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
		    $data['view_file'] = $page;
    $this->load->view('v_main', $data);
	}
	public function cashondeliverysuccess($master_orderid){
		$data = $this->data;
		$this->session->set_userdata('paymentsuccessurl', 'Congratulations, welcome to fishwala family with every order/subscription you help a needy');
		$get_order_details_by_id=$this->baang_model->get_order_details_by_id($master_orderid);
		      $data['message']='<li style="margin-bottom:12px"><i class="icon-play" style="font-size:12px"></i>	Thank You. Your order status is success.</li>

<li style="margin-bottom:12px"><i class="icon-play" style="font-size:12px"></i>Your Order No. for this Order is <b>'.$get_order_details_by_id['order_no'].'</b>
</li>
<li style="margin-bottom:12px"><i class="icon-play" style="font-size:12px"></i>Your order will soon be shipped.</li>';
	   
		 $page='success.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
		    $data['view_file'] = $page;
    $this->load->view('v_main', $data);
	}
	public function about_us()
	{
		 $data = $this->data;
		  $data['title']='About Us';
  $page='about_us.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
		    $data['view_file'] = $page;
    $this->load->view('v_main', $data);

}
public function privacypolicy()
	{
		 $data = $this->data;
		  $data['title']='Privacy Policy';
  $page='privacypolicy.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
		    $data['view_file'] = $page;
    $this->load->view('v_main', $data);

}
public function terms_conditions()
	{
		 $data = $this->data;
		  $data['title']='Terms';
  $page='terms.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
		    $data['view_file'] = $page;
    $this->load->view('v_main', $data);

}
public function our_work()
	{
		 $data = $this->data;
		  $data['title']='Our Work';
  $page='our_work.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
		    $data['view_file'] = $page;
    $this->load->view('v_main', $data);

}
public function contact_us()
	{
		 $data = $this->data;
		  $data['title']='Contact Us';
  $page='contact_us.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
		    $data['view_file'] = $page;
    $this->load->view('v_main', $data);

}
 public function changepasswordform($id)
	{
		if (isset($this->session->userdata['logged_in_baang_panel'])) {
	    $arr_post_data = $this->input->post();
		if(!empty($arr_post_data)){
			
        $arr_update_data = array(
		'password' => md5($arr_post_data['repeatpassword'])
        
        );
   
if ($id) {
           
            $condition = array('id' => $id);
            $this->baang_model->update_record('customer', $arr_update_data, $condition);
            $this->session->set_userdata('changepassword', 'Password Changed Successfully');
			
        }
          
	$this->logout();

		}
		} else {
redirect('baang/index');
}
}


	function forget_password(){

	$data = $this->data;
  $page='forget_password.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
		    $data['view_file'] = $page;
    $this->load->view('v_main', $data);
		
	
}
function forgetpasswordsubmit(){
	 $config = Array(
				'protocol' 	=> 'mail',
				'wordwrap' 	=> FALSE,
				'charset' 	=> 'utf-8',
				'crlf' 		=> '\r\n',
				'newline' 	=> '\r\n',
				'mailtype' 	=> 'html'
				);
	$emailid=$this->input->post('emailid');
 $query = $this->db->query("select * from customer where emailid='$emailid'"); 
 if($query->num_rows()>0){
	  foreach($query->result_array() as $row){
        $forget_password = $row['forget_password'];
    }
	$message="Your Password For Email ID ".$emailid;
	$message.="\nYour Password: ".$forget_password;
			$this->load->library('email', $config); 
		$this->email->from("support@fishwala.me", "Baang");
		$this->email->to($emailid);
		$this->email->subject("Password For Baang");
		$this->email->message($message);
		$this->email->send();
	 echo 'success';
 }else{
	 echo 'fail';
 }
}
public function testimonial()
	{
		 $data = $this->data;
		  $data['title']='Testimonial';
  $page='testimonial.php';
    $data['get_testimonials'] = $this->baang_model->get_testimonials();
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
		    $data['view_file'] = $page;
    $this->load->view('v_main', $data);

}
public function faq()
	{
		 $data = $this->data;
		  $data['title']='FAQ';
  $page='faq.php';
	if ( ! file_exists(APPPATH.'/views/'.$page))
	{
		// Whoops, we don't have a page for that!
		show_404();
	}
	
		    $data['view_file'] = $page;
    $this->load->view('v_main', $data);

}
function contactformsubmit(){
	 $config = Array(
				'protocol' 	=> 'mail',
				'wordwrap' 	=> FALSE,
				'charset' 	=> 'utf-8',
				'crlf' 		=> '\r\n',
				'newline' 	=> '\r\n',
				'mailtype' 	=> 'html'
				);
	$arr_post_data=$this->input->post();
print_r($arr_post_data);
	$message=$arr_post_data['message'].$arr_post_data['emailid'];
			$this->load->library('email', $config); 
		$this->email->from("support@fishwala.me", $arr_post_data['name']);
		$this->email->to("support@fishwala.me");
		$this->email->subject($arr_post_data['name']);
		$this->email->message($message);
		$this->email->send();
	 echo 'success';
 
}
public function facebooklogin(){

	
        // OR
        // You can pass different one like this
        //$this->load->library('facebook', array(
        //    'appId' => 'APP_ID',
        //    'secret' => 'SECRET',
        //    ));

		$user = $this->facebook->getUser();
        
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
				$facebookid=$data['user_profile']['id'];
				       $arr_update_data = array(
		'name' => $data['user_profile']['name'],
		'facebookid' => $data['user_profile']['id'],
        );
     $exists=$this->db->query("select * from customer where facebookid='$facebookid'");
		
		if($exists->num_rows()==0){
            $this->baang_model->insert_record('customer', $arr_update_data);
		}
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }

        if ($user) {
//code for session and redirecting to our site
 $getlogin=$this->db->query("select * from customer where facebookid='$facebookid'");
 if($getlogin->num_rows()){
	 $user_id=$emailid='';
	 foreach($getlogin->result_array() as $val){
		 $user_id=$val['id'];
		 $emailid=$val['emailid'];
	 }
	 $session_data = array(
'user_id' => $user_id,
'emailid' => $emailid,
);
// Add user data in session
$this->session->set_userdata('logged_in_baang_panel', $session_data);

        redirect('baang/index','refresh');
    }
 

            $data['logout_url'] = site_url().'baang/facebooklogout'; // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url().'baang/facebooklogin', 
                'scope' => array("email") // permissions here
            ));
        }
     
    $this->load->view('login', $data);	

	}
	 public function facebooklogout(){

        

        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.

        redirect('baang/facebooklogin');
    }
	public function googlelogin(){

//	error_reporting(E_ALL);
// Include two files from google-php-client library in controller
require_once APPPATH . "libraries/google-api-php-client-master/src/Google/autoload.php";
include APPPATH . "libraries/google-api-php-client-master/src/Google/Client.php";
include APPPATH . "libraries/google-api-php-client-master/src/Google/Service/Oauth2.php";
	
// Store values in variables from project created in Google Developer Console
$client_id = '690775726135-k1pq5imn08n328bm3705sp9olglsh4fu.apps.googleusercontent.com';
$client_secret = 'Qoanj-kYK2DVA5GkDhqKyTxg';
$redirect_uri = site_url().'baang/googlelogin/';
$simple_api_key = 'AIzaSyD_rYxwjWc-dpRpl_gM8QiHO4BZRLK1FQw';

// Create Client Request to access Google API
$client = new Google_Client();

$client->setApplicationName("PHP Google OAuth Login Example");
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->setDeveloperKey($simple_api_key);
$client->addScope("https://www.googleapis.com/auth/userinfo.email");

// Send Client Request
$objOAuthService = new Google_Service_Oauth2($client);

// Add Access Token to Session
if (isset($_GET['code'])) {
$client->authenticate($_GET['code']);
$_SESSION['access_token'] = $client->getAccessToken();
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

// Set Access Token to make Request
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
$client->setAccessToken($_SESSION['access_token']);
}

// Get User Data from Google and store them in $data
if ($client->getAccessToken()) {
	
$userData = $objOAuthService->userinfo->get();
/*print_r($userData);
echo $userData->id;*/
 $googleid=$userData->id;
				       $arr_update_data = array(
		'name' => $userData->given_name.' '.$userData->family_name,
		'googleid' => $googleid,
		'emailid' => $userData->email,
        );
     $exists=$this->db->query("select * from customer where googleid='$googleid'");
		
		if($exists->num_rows()==0){
            $this->baang_model->insert_record('customer', $arr_update_data);
		}

		//code for session and redirecting to our site
$getlogin=$this->db->query("select * from customer where googleid='$googleid'");
 if($getlogin->num_rows()){
	 $user_id=$emailid='';
	 foreach($getlogin->result_array() as $val){
		 $user_id=$val['id'];
		 $emailid=$val['emailid'];
	 }
	 $session_data = array(
'user_id' => $user_id,
'emailid' => $emailid,
);
// Add user data in session
$this->session->set_userdata('logged_in_baang_panel', $session_data);

        redirect('baang/index','refresh');
    }
	
$data['userData'] = $userData;
$_SESSION['access_token'] = $client->getAccessToken();
} else {
$authUrl = $client->createAuthUrl();

$data['authUrl'] = $authUrl;
}
$data['view_file'] = 'google_authentication.php';
// Load view and send values stored in $data
$this->load->view('v_main', $data);
}
public function googlelogout() {
unset($_SESSION['access_token']);
redirect(base_url());
}
}

/* End of file tourism.php */
/* Location: ./application/controllers/tourism.php */