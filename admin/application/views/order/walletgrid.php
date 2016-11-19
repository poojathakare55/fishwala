<script>
function editwallet(order_id){
	
	 $.ajax({
type: "GET",
url:"<?php echo site_url();?>/baang/editwallet",
data:{order_id:order_id},
dataType: 'json',
success: function(data){
	
	$("#walletmodal").html(data['popup']);
	  $('#walletmodal').modal('show');
},

});

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
                  <h3 class="box-title">Customer Order Details</h3>
                 
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
                        <th>Sub Total</th>
						 <th>Charity Amount</th>
                        <th>Grand Total</th>
						 <th>Shipping Details</th>
                        <th>Wallet Balance</th>
                       
                      </tr>
                    </thead>
					<tbody>
					<?php 
				  $getdata = $this->db->query("select mo.*,w.* from master_order mo left join wallet w on w.order_id=mo.id order by mo.id desc");
 if ($getdata->num_rows() > 0) {
                                foreach ($getdata->result_array() as $rows) {
								$id=$rows['order_id'];
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
								  $delivery_charge=$rows['delivery_charge']==''?'0':$rows['delivery_charge'];
								   $express_delivery=$rows['express_delivery'];
								  if($express_delivery>0){
									  $delivery_type='Express';
								  }else{
									  $delivery_type='Normal';
								  }
								  $sub_total=$rows['sub_total'];
								  $grand_total=$rows['grand_total'];
								  $status=$rows['status'];
								  $walletamount=$rows['amount'];
								    $charity_amount=$rows['charity_amount'];
								  if($status=='delivered')
									  $statustext='<span class="label label-success">Delivered</span>';
								  else if($status=='cancelled')
									  $statustext='<span class="label label-danger">Cancelled</span>';
								  else
									   $statustext='<span class="label label-warning">Pending</span>';
								   
								     if($walletamount!='0')
									  $wallettext="<a href='javascript::void(0)' onclick='editwallet(this.id)' id='".$id."' title='Click Here Edit Wallet'><span class='label label-danger'>Rs. ".$walletamount."</span></a>";
								   else
									   $wallettext='<span class="label label-success">Rs. 0</span>';
							?>	
                    
                      <tr>
					   <td>
					   <input type="hidden" id="order_id" value="<?php echo $id;?>"/>
					   <a href="<?php echo site_url();?>/baang/orderdetails/<?php echo $id;?>" title="Click Here To View Details"><?php echo $order_no;?></a></td>
                        <td><?php echo $order_date;?></td>
                        <td><?php echo $get_user_details_by_id['name'];?></td>
                        <td>Rs. <?php echo $delivery_charge;?></td>
						 <td><?php echo $delivery_type;?></td>
                        <td>Rs. <?php echo $sub_total;?></td>
						 <td>Rs. <?php echo $charity_amount;?></td>
                        <td>Rs. <?php echo $grand_total;?></td>
						 <td>
						<a href='javascript::void(0)' onclick='shippingdetails(this.id)' id='<?php echo $id;?>' title='Click Here View Shipping Details'><span class='label label-primary'>Shipping Details</span></a>
						</td>
                        <td><?php echo $wallettext;?></td>
                      
                       
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