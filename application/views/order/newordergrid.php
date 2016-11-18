<script>
function orderstatus(order_id){
		var r = confirm("This Will Change Order Status To Delivered?");
	if (r == true) {
	 $.ajax({
type: "GET",
url:"<?php echo site_url();?>/baang/orderstatus",
data:{order_id:order_id},
success: function(data){
	if(data=='success'){
	
	window.location = "<?php echo current_url();?>";
}else if(data=='fail'){
	alert("Unable To Change !!!!!. There is some amount pending for this order.");
	return false;
}
},

});
} else {
     return false;
}
 }
 function cancelthisorder(order_id){
		var r = confirm("Do You Want To Cancel This Order?");
	if (r == true) {
   
		$.ajax({
type: "GET",
url:"<?php echo site_url();?>/baang/cancelthisorder",
data:{order_id:order_id},
success: function(data){
	//alert(data);
	//return false;
if(data=='success'){
	
	window.location = "<?php echo current_url();?>";
}
else if(data=='fail'){
alert("Unable to cancel this order because your order have been started.")
}
else{
	alert("Unable To Cancel This Order");
}
},

});
} else {
     return false;
}
	}
</script>
 <!-- Content Header (Page header) -->
      
		  <!-- Main content -->
        <section class="content">
   <div class="row">
            <div class="col-md-12">
		
        <div class="box box-danger">
                <div style="cursor: move;" class="box-header ui-sortable-handle">
                  <i class="fa fa-shopping-cart"></i>
                  <h3 class="box-title">New Order Details</h3>
                 
                </div>
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					    <th>Order No.</th>
					    <th>Order Date</th>
					    <th>Customer</th>
					  <th>Delivery Charges</th>
					  <th>Delivery Type</th>
					  <th>Payment Mode</th>
                        <th>Sub Total</th>
                        <th>Charity Amount</th>
                        <th>Grand Total</th>
						 <th>Shipping Details</th>
                        <th>Status</th>
                        <th>Action</th>
                       
                      </tr>
                    </thead>
					<tbody>
					<?php 
				/*$usertype1=strtolower($get_user_details['usertype']);
				if($usertype1=='normal'){
				  $getdata = $this->db->query("select * from master_order where status!='cancelled' order by id desc");
				}
				 if (strpos($usertype1,"sea") !== false) {*/
				  $getdata = $this->db->query("select * from master_order where status!='cancelled' and id in (select order_id from product_order_details group by order_id) order by id desc ");
				//}
 if ($getdata->num_rows() > 0) {
                                foreach ($getdata->result_array() as $rows) {
								$id=$rows['id'];
								$order_no=$rows['order_no'];
								$order_date=date('d/m/Y',strtotime($rows['order_date']));
								/*$category_id=$rows['category_id'];
								 $categoryname = $this->baang_model->get_category_byid($category_id);
								$sub_category_id=$rows['sub_category_id'];
								 $subcategoryname = $this->baang_model->get_subcategory_byid($sub_category_id);
								 $product_name=$this->baang_model->get_product_byid($rows['product_id']);
								  $qty=$rows['qty'];
								  $days=$rows['days'];
								  $week=$rows['week'];
								  $price=$rows['price'];*/
								  	$customer_id=$rows['customer_id'];
									 $get_user_details_by_id = $this->baang_model->get_user_details_by_id($customer_id);
								  $delivery_charge=$rows['delivery_charges']==''?'0':$rows['delivery_charges'];
								  $sub_total=$rows['sub_total'];
								  $delivery_time=$rows['delivery_time'];
								  $express_delivery=$rows['express_delivery'];
								  if($express_delivery>0){
									  $delivery_type='Express';
								  }else{
									  $delivery_type='Normal';
								  }
								  $payment_mode=$rows['payment_mode'];
								  $grand_total=$rows['grand_total'];
								  $status=$rows['status'];
								  $charity_amount=$rows['charity_amount'];
								  if($status=='delivered')
									  
									  $statustext='<span class="label label-success">Delivered</span>';
								  else if($status=='cancelled')
									  $statustext='<span class="label label-danger">Cancelled</span>';
								  else{
									   //$statustext='<span class="label label-warning">Pending</span>';
								   $statustext="<a href='javascript::void(0)' onclick='orderstatus(this.id)' id='".$id."' title='Click Here Change Status'><span class='label label-warning'>Pending</span></a>";
								   $canceltext="<a href='javascript::void(0)' onclick='cancelthisorder(this.id)' id='".$id."' title='Click Here To Cancel'><span class='label label-danger'>Cancel Order</span></a>";
								  }
							?>	
                    
                      <tr>
					   <td><a href="<?php echo site_url();?>/baang/orderdetails/<?php echo $id;?>" title="Click Here To View Details"><?php echo $order_no;?></a></td>
                        <td><?php echo $order_date;?></td>
                        <td><?php echo $get_user_details_by_id['name'];?></td>
                        <td>Rs. <?php echo $delivery_charge;?></td>
                        <td><?php echo $delivery_type;?></td>
                        <td><?php echo $payment_mode;?></td>
                        <td>Rs. <?php echo $sub_total;?></td>
                        <td>Rs. <?php echo $charity_amount;?></td>
                        <td>Rs. <?php echo $grand_total;?></td>
						 <td>
						<a href='javascript::void(0)' onclick='shippingdetails(this.id)' id='<?php echo $id;?>' title='Click Here View Shipping Details'><span class='label label-primary'>Shipping Details</span></a>
						</td>
                        <td><?php echo $statustext;?></td>
                        <td><?php echo $canceltext;?></td>
                      
                       
                      </tr>
					  <?php     }		}
 ?>
              
                    </tbody>
                  
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			   </div>
			    </div>
				  </section><!-- /.content -->
			  <script type="text/javascript">
      $(function () {
       
        $('#example1').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": false,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>