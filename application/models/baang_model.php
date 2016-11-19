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
	function get_category_list()
{
$return='';

$query =$this->db->query("select * from category  order by id desc");

if ( $query->num_rows() > 0 )
    {
     
        $return=$query->result_array();
    
    }
	
 return ($return);
}
function get_service_location()
{
$return='';

$query =$this->db->query("select * from service_location where lower(status)='enable' order by id desc");

if ( $query->num_rows() > 0 )
    {
     
        $return=$query->result_array();
    
    }
	
 return ($return);
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
function get_subcategory_byid($category_id)
{
$return='';

$query =$this->db->query("select * from sub_category where category_id='$category_id' order by id asc");

if ( $query->num_rows() > 0 )
    {
     
        $return=$query->result_array();
    
    }
	
 return ($return);
}
function get_productdetails_byid($sub_category_id)
{
$return='';

//$query =$this->db->query("select * from product where sub_category_id='$sub_category_id' order by id desc");
$query =$this->db->query("SELECT prod.* FROM product AS prod JOIN ( SELECT product_name, MIN(price) AS price FROM product GROUP BY product_name ) AS price ON prod.product_name = price.product_name AND prod.price = price.price AND prod.sub_category_id='$sub_category_id' order by prod.id desc ");

if ( $query->num_rows() > 0 )
    {
     
        $return=$query->result_array();
    
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
        $return['dob']=date('d/m/Y',strtotime($row['dob']));
	 }
    
    }
	
 return ($return);
}

function get_product_details($product_id)
{
	
$return=array();

$query =$this->db->query("select * from product where id='$product_id'");

if ( $query->num_rows() > 0 )
    {
     foreach($query->result_array() as $row){
		  $return['id']=$row['id'];
        $return['photo']=base_url().'admin/images/product/'.$row['photo'];
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
function get_unit_dropdown($product_name) {
    $return[''] = '---please select---';
	$this->db->where('product_name', $product_name );
   $this->db->order_by("unit", "asc");
    $query = $this->db->get('product'); 
    foreach($query->result_array() as $row){
        $return[$row['unit']] = $row['unit'];
    }
    return $return;
}
function generateorderno(){
	$orderno='';
	$id='';
	 $test=$this->db->query("select max(id) as id from master_order limit 1");
  foreach($test->result_array() as $y)
    {
        $id = $y['id'];
    }
	if($id=="" && $id==null)
	{
	$num=1;
	$orderno="ORD".$num;
	}
	else
	{
  $test2=$this->db->query("select * from master_order where id='$id'");
 foreach($test2->result_array() as $y)
    {
        $code = $y['order_no'];
    }
    $number=substr($code, 3);
    $count = $number + 1;
    $orderno = "ORD" . $count;
	}
	return $orderno;
}
function get_total_wallet($id)
{
	
$return='';

$query =$this->db->query("select sum(amount) as amount from wallet where order_id in (select id from master_order where customer_id='$id' and status='pending')");

if ( $query->num_rows() > 0 )
    {
     foreach($query->result_array() as $row){
		  $return=$row['amount'];
       
					   
	 }
    
    }
	
 return ($return);
}
function get_order_list_by_customerid($id)
{
	
$return=array();

$query =$this->db->query("select mo.*,w.*,mo.id as open from master_order mo left join wallet w on w.order_id=mo.id where mo.customer_id='$id' order by mo.id desc");

if ( $query->num_rows() > 0 )
    {
    
		  $return=$query->result_array();
	
    
    }
	
 return ($return);
}
function getDatesFromRange($start, $end) {
    $interval = new DateInterval('P1D');

    $realEnd = new DateTime($end);
    $realEnd->add($interval);

    $period = new DatePeriod(
         new DateTime($start),
         $interval,
         $realEnd
    );

    foreach($period as $date) { 
        $array[] = $date->format('Y-m-d'); 
    }

    return $array;
}
function get_product_dates_by_customerid($id)
{
	
$return=array();

$query =$this->db->query("select mo.*,pod.* from product_order_details pod left join master_order mo on mo.id=pod.order_id where mo.customer_id='$id' and mo.status!='delivered' order by mo.id desc");

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
$query =$this->db->query("select pod.* from product_order_details pod left join master_order mo on mo.id=pod.order_id where mo.customer_id='$id' and pod.status!='delivered' and mo.order_date = '$date' order by pod.id desc");

if ( $query->num_rows() > 0 )
    {
		$return=$query->result_array();
    }
 return $return;
}
function get_payumoney()
{
	
$return=array();

$query =$this->db->query("select * from payumoney where status='1'");

if ( $query->num_rows() > 0 )
    {
     foreach($query->result_array() as $row){
		  $return['id']=$row['id'];
        $return['merchant_key']=$row['merchant_key'];
        $return['salt']=$row['salt'];
        $return['url']=$row['url'];
					   
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
					   
	 }
    
    }
	
 return ($return);
}
function get_order_dropdown($id) {
    $return[''] = '---please select---';
    $query = $this->db->query("select * from master_order where status='pending' and customer_id='$id' order by id desc"); 
    foreach($query->result_array() as $row){
        $return[$row['id']] = $row['order_no'];
    }
    return $return;
}
function get_testimonials()
{
$return='';

$query =$this->db->query("select * from testimonial order by id desc");

if ($query->num_rows() > 0)
    {
     
        $return=$query->result_array();
   
    }
	
 return ($return);
}
function get_category_id($category_name) {
    $return = '';
    $query = $this->db->query("select * from category where alphanum(category_name)='$category_name'"); 
	
    foreach($query->result_array() as $row){
        $return= $row['id'];
    }
    return $return;
}
}
?>