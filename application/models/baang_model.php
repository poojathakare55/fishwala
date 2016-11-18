<?php
class Baang_model extends CI_Model {

	 function __construct()
	{
		$this->load->database();
	}
	//For insert data  
	  
	function insert_record($table_name,$data_array)            
	{
		//echo "<pre>";print_r($data_array);echo "</pre>";
		$this->db->insert($table_name, $data_array); 	
		$id = $this->db->insert_id();
		return $id;
	}

	//For delete data
	
	function delete_record($table_name,$condition)             
	{
		//pr($condition);
		$this->db->delete($table_name,$condition); 
		if($this->db->affected_rows())
		return true;
	}
	
	//For update data	
	
	function update_record($table_name,$data_array,$condition)  
	{
		$this->db->update($table_name, $data_array, $condition);
		if($this->db->affected_rows())
		return true;
	}
	//For listing data

	function select_data($parameters)						   
	{
		//echo "<pre>";print_r($parameters);echo "</pre>";
		
		$table_name=$parameters['table_name'];
		$table_field=$parameters['table_fields'];
		$condition=$parameters['condition'];
		$limit=$parameters['limit'];
		$offset=$parameters['offset'];
		
		if(isset($parameters['order']) && isset($parameters['order_by_field'])) 
		{
			$order=$parameters['order'];
			$order_by_field=$parameters['order_by_field'];
		}	
	
		$this->db->select($table_field);
		$this->db->from($table_name);
		
		if(!empty($condition))
		{
			foreach($condition as $cond_k => $cond_v)
			{
				if(isset($cond_v[3]))
				$this->db->$cond_v[0]($cond_v[1], $cond_v[2],$cond_v[3]);
				else
				$this->db->$cond_v[0]($cond_v[1], $cond_v[2]);
			}
		}
		if(isset($order_by_field) && $order_by_field!='' && isset($order) &&  $order!='')
		{
			$this->db->order_by($order_by_field,$order);
		}	
		

		if(isset($limit) && $limit!='')
		{
			$this->db->limit($limit,$offset);
		}	

		$query = $this->db->get();	
		$result = $query->result_array();
		//echo $this->db->last_query();
		//echo "<pre>";print_r($result);echo "</pre>";
		
		return $result;
	}
	
function get_category_dropdown() {
    $return[''] = '---please select---';
   $this->db->order_by("category_name", "asc");
    $query = $this->db->get('category'); 
    foreach($query->result_array() as $row){
        $return[$row['id']] = $row['category_name'];
    }
    return $return;
}
function get_category_dropdown_for_products($param=NULL) {
	if (strpos(strtolower($param),'sea') !== false) {
   $seacondition=" AND lower(category_name) like '%fish%'";
}
    $return[''] = '---please select---';
    $query = $this->db->query("select * from category where id in (select category_id from sub_category group by category_id) order by category_name asc"); 
    foreach($query->result_array() as $row){
        $return[$row['id']] = $row['category_name'];
    }
    return $return;
}
function get_subcategory_dropdown() {
    $return[''] = '---please select---';
   $this->db->order_by("sub_category_name", "asc");
    $query = $this->db->get('sub_category'); 
    foreach($query->result_array() as $row){
        $return[$row['id']] = $row['sub_category_name'];
    }
    return $return;
}	

function get_category_byid($id)
{
$return='';

$this->db->select('*');
$this->db->from('category');
$this->db->where('id', $id );
$query = $this->db->get();
if ( $query->num_rows() > 0 )
    {
       foreach($query->result_array() as $row){
        $return=$row['category_name'];
    }
    }
	
 return ($return);
}
function get_subcategory_byid($id)
{
$return='';

$this->db->select('*');
$this->db->from('sub_category');
$this->db->where('id', $id );
$query = $this->db->get();
if ( $query->num_rows() > 0 )
    {
       foreach($query->result_array() as $row){
        $return=$row['sub_category_name'];
    }
    }
	
 return ($return);
}
function get_category_for_dashboard() {
	
    $return = '';
    $query = $this->db->query("SELECT c.id as id,c.category_name as category_name, COUNT(p.category_id) AS category_id FROM category c LEFT JOIN product_order_details p ON c.id=p.category_id where p.status='pending' GROUP BY c.id "); 
    $return=$query->result_array();
      
    return $return;
}
function get_subcategory_for_dashboard($category_id) {
    $return = '';
    $query = $this->db->query("SELECT c.id,c.sub_category_name as sub_category_name, COUNT(p.sub_category_id) AS sub_category_id FROM sub_category c LEFT JOIN product_order_details p ON c.id=p.sub_category_id where c.category_id='$category_id' and p.status='pending' GROUP BY c.id "); 
    $return=$query->result_array();
      
    return $return;
}
function get_new_order_count() {
    $return = '';
    $query = $this->db->query("SELECT count(*) as id from master_order where open='0'"); 
    $return=$query->result_array();
     if ( $query->num_rows() > 0 )
    {
       foreach($query->result_array() as $row){
        $return=$row['id'];
    }
	}
	 return $return;
}
function get_new_customer_count() {
    $return = '';
    $query = $this->db->query("SELECT count(*) as id from customer where open='0'"); 
    
     if ( $query->num_rows() > 0 )
    {
       foreach($query->result_array() as $row){
        $return=$row['id'];
    }
	}
	 return $return;
}
function get_product_byid($id)
{
$return='';

$this->db->select('*');
$this->db->from('product');
$this->db->where('id', $id );
$query = $this->db->get();
if ( $query->num_rows() > 0 )
    {
       foreach($query->result_array() as $row){
        $return=$row['product_name'];
    }
    }
	
 return ($return);
}
function get_user_details_by_id($id)
{
	
$return=array();

$query =$this->db->query("select * from customer where id='$id'");

if ( $query->num_rows() > 0 )
    {
     foreach($query->result_array() as $row){
		  $return['id']=$row['id'];
        $return['name']=$row['name'];
        $return['emailid']=$row['emailid'];
        $return['address']=$row['address'];
        $return['pincode']=$row['pincode'];
        $return['contactno']=$row['contactno'];
       
        $return['dob']=$row['dob'];
					   
	 }
    
    }
	
 return ($return);
}
function get_order_details_by_id($id)
{
	
$return=array();

$query =$this->db->query("select * from master_order where id='$id'");

if ( $query->num_rows() > 0 )
    {
     foreach($query->result_array() as $row){
		  $return['id']=$row['id'];
        $return['order_no']=$row['order_no'];
        $return['order_date']=$row['order_date'];
		$customer_id=$row['customer_id'];
		$get_user_details_by_id = $this->baang_model->get_user_details_by_id($customer_id);
        $return['customer']=$get_user_details_by_id['name'];
        $return['delivery_charges']=$row['delivery_charges'];
        $return['sub_total']=$row['sub_total'];
        $return['grand_total']=$row['grand_total'];
			$return['get_shippingdetails_byid'] = $this->baang_model->get_shippingdetails_byid($id);			   
	 }
    
    }
	
 return ($return);
}
function get_multipledays_bynumber($id) {
 $return='';
$explodeid=explode(",",$id);
$count=count($explodeid)-1;
for($i=0;$i<=$count;$i++){
$explodedid=$explodeid[$i];
if($explodedid!=''){
        $return.=date("l", mktime(0,0,0,8,$explodedid,2011)).',';
    
}
	}
 return rtrim($return,',');
}
function get_employee_details_by_id($id)
{
	
$return=array();

$query =$this->db->query("select * from employee where id='$id'");

if ( $query->num_rows() > 0 )
    {
     foreach($query->result_array() as $row){
		  $return['id']=$row['id'];
        $return['name']=$row['name'];
        $return['emailid']=$row['emailid'];
        $return['address']=$row['address'];
        $return['contactno']=$row['contactno'];
        $return['usertype']=$row['usertype'];
        $return['username']=$row['username'];
        $return['password']=md5($row['password']);
					   
	 }
    
    }
	
 return ($return);
}
function get_wallet_details_by_id($id)
{
	
$return=array();

$query =$this->db->query("select * from wallet where order_id='$id'");

if ( $query->num_rows() > 0 )
    {
     foreach($query->result_array() as $row){
		  $return['id']=$row['id'];
        $return['amount']=$row['amount'];
					   
	 }
    
    }
	
 return ($return);
}
function get_product_dates_by_customerid($id)
{
	
$return=array();

$query =$this->db->query("select * from product_order_details where order_id in (select id from master_order where customer_id='$id' and status!='delivered' order by id desc)");

if ( $query->num_rows() > 0)
    {
     foreach($query->result_array() as $row){
		 $product_id=$row['product_id'];
		 $fromdate=$row['fromdate'];
		 $enddate=$row['todate'];
		 $days=$row['days'];
		 $selecteddates=$row['selecteddates'];
	//	$datelist=$this->baang_model->getDatesFromRange($fromdate, $enddate); //get dates between two date
	
		//get date list based on days selected between two dates
		
		$explodeclass=explode(',',$selecteddates);
		
					$count=count($explodeclass)-1;
					for($j=0;$j<=$count;$j++){
						$dates=trim($explodeclass[$j]," ");
						 if($dates!=''){
							// echo $product_id.'=='.$dates.',';
							 $return[]=$dates;
						/*for ($i = strtotime($fromdate); $i <= strtotime($enddate); $i = strtotime('+1 day', $i)) {
  if (date('N', $i) == $daynumber){ 
    $return[]=date('Y-m-d', $i); 
		
  }
}*/	
						 }
					}
		//echo '<br/>';

	 }
    
    }
	sort($return,SORT_REGULAR); //sort dates in ascending order
 return array_unique($return);
}
function get_product_dates_by_orderid($id)
{
	
$return=array();

$query =$this->db->query("select mo.*,pod.* from product_order_details pod left join master_order mo on mo.id=pod.order_id where pod.order_id='$id' and mo.status!='delivered' order by mo.id desc");

if ( $query->num_rows() > 0)
    {
     foreach($query->result_array() as $row){
		 $product_id=$row['product_id'];
		$return[]=$row['order_date'];

	 }
    
    }
	sort($return,SORT_REGULAR); //sort dates in ascending order
 return array_unique($return);
}
function get_product_list_by_date($date,$id)
{
	
$return=array();

//$query =$this->db->query("select * from product_order_details where order_id in (select id from master_order where customer_id='$id' and status!='delivered' order by id desc) and '$date' BETWEEN fromdate and todate and status!='delivered'");
$query =$this->db->query("select mo.*,pod.* from product_order_details pod left join master_order mo on mo.id=pod.order_id where pod.order_id='$id' and mo.status!='delivered' order by mo.id desc");

if ( $query->num_rows() > 0 )
    {
		$return=$query->result_array();
    }
 return $return;
}
function get_product_details($product_id)
{
	
$return=array();

$query =$this->db->query("select * from product where id='$product_id'");

if ( $query->num_rows() > 0 )
    {
     foreach($query->result_array() as $row){
		  $return['id']=$row['id'];
        $return['photo']=base_url().'/images/product/'.$row['photo'];
        $return['product_name']=$row['product_name'];
        $return['price']=$row['price'];
        $return['unit']=$row['unit'];
        $return['category_id']=$row['category_id'];
        $return['sub_category_id']=$row['sub_category_id'];
        $return['description']=$row['description'];
					   
	 }
    
    }
	
 return ($return);
}
function get_shippingdetails_byid($id)
{
	
$return=array();
$result=array();
$query =$this->db->query("select * from shipping where order_id = '$id'");

if ( $query->num_rows() > 0 )
    {
		
     foreach($query->result_array() as $row){
		  $return['shipping_name']=$row['shipping_name'];
		  $return['shipping_emailid']=$row['shipping_emailid'];
		  $return['shipping_address']=$row['shipping_address'];
		  $return['shipping_pincode']=$row['shipping_pincode'];
		  $return['shipping_contactno']=$row['shipping_contactno'];
		 
		
     }
	 
    }
	
 return ($return);
}
}
?>