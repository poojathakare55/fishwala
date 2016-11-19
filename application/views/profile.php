<script>		$(function() {									new JsDatePick({			useMode:2,			target:"dob1",			dateFormat:"%d/%m/%Y"					});		  });		</script>
		<!--- pause-->
		<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->

      <div class="modal-body">
	  <div class="col-md-12" style="padding:16px; background:#fff; text-align:center">
	  Pause Your Subscription<br><br>
       <a href="" class="btn btn-success text-center" >Pause Subscription</a>
	   </div>
      </div>
    
    
  </div>
</div>
		<!--- pause-->
		
		<!--- remove product-->
		<!-- Modal -->
<div id="products" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->

      <div class="modal-body">
	  <div class="col-md-12" style="padding:16px; background:#fff; text-align:center">
	  Remove Selected Product From List<br><br>
       <a href="" class="btn btn-success text-center" >Remove This Product</a>
	   </div>
      </div>
    
    
  </div>
</div>
		<!--- pause-->
		
        <!-- Page Title
        ============================================= -->


        <section id="page-title">

            <div class="container clearfix">
                <h1>Hello, <?php echo $get_user_details['name'];?></h1>
                
            </div>

        </section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
        <section id="content" >

            <div class="content-wrap" style="padding:40px 0px;">
 <?php if (isset($this->session->userdata['profile'])) {
  $success = ($this->session->userdata['profile']);
  echo '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i>'. $success.'</h4>
                   </div>';
  $this->session->unset_userdata('profile');
  
}
if (isset($this->session->userdata['cancel'])) {
  $cancel = ($this->session->userdata['cancel']);
  echo '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i>'. $cancel.'</h4>
                   </div>';
  $this->session->unset_userdata('cancel');
  
}

?>
                <div class="container clearfix">

                

						<ul id="myTab2" class="nav nav-pills boot-tabs">
						 <?php /*<li><a href="#home2" data-toggle="tab">My Subscription</a></li>
						 */ ?>
						  <li  class="active"><a href="#profile3" data-toggle="tab">Payment Status</a></li>
						  <li><a href="#profile4" data-toggle="tab">Edit Profile</a></li>						  <li><a href="#profile5" data-toggle="tab">Change Password</a></li>
						 
						</ul>
						<div id="myTabContent2" class="tab-content">
						 <?php /* <div class="tab-pane fade in " id="home2">
						   <?php
              $attributes = array('id' => 'subscriptionform');

echo form_open('baang/changestatustopause/'.$profileid, $attributes);?>
						  <div class="col-md-12 clearfix">
										<h4 class="pull-left">Your Subscription</h4>										
										</div>
							<div class="clearfix col-md-12">
										
										
										 <div class="accordion accordion-bg clearfix">
<?php if(!empty($get_product_dates_by_customerid)){
	foreach($get_product_dates_by_customerid as $val){
	$dates=date('d/m/Y',strtotime($val)).'-'.date('l',strtotime($val));
	$day=date('N', strtotime($val));
	
	$get_product_list_by_date=$this->baang_model->get_product_list_by_date($val,$profileid);
	
	?>
											<!-- list -->
                            <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i><?php echo $dates;?>
							<span class="badge" style="float:right; margin:13px;"><?php echo count($get_product_list_by_date);?> Products</span>
							</div>
                            <div class="acc_content table-responsive clearfix" style="background:#fafafa">
							
							<table class="table">
                          <thead>
						 
                            <tr> <th class="col-md-3">Order No.</th>
                              <th class="col-md-2">Product Name</th>
                              <th class="col-md-2">Qty.</th>
                              <th class="col-md-2">Price</th>
                              <th class="col-md-2">Status</th>
                              <th class="col-md-2">Action</th>
                            </tr>
                          </thead>
                          <tbody>
						   <?php if(!empty($get_product_list_by_date)){
							  foreach($get_product_list_by_date as $prodata){ $orderid=$prodata['order_id'];								  $get_order_details_by_id=$this->baang_model->get_order_details_by_id($orderid);
								  $statusfromdb=$prodata['status'];
								    $orderid=$prodata['order_id'];
								  $get_order_details_by_id=$this->baang_model->get_order_details_by_id($orderid);
								 if($statusfromdb=='delivered')
									  $mysubscriptionstatustext='<span class="label label-success">Delivered</span>';
								  else if($statusfromdb==='cancelled')
									  $mysubscriptionstatustext='<span class="label label-danger">Cancelled</span>';
								   else if($statusfromdb==='pending')
									   $mysubscriptionstatustext='<span class="label label-warning">Pending</span>';
								    else if($statusfromdb==='paused')
									   $mysubscriptionstatustext='<span class="label label-warning">Paused</span>';
								  $get_product_details=$this->baang_model->get_product_details($prodata['product_id']);
							  ?>
						       <tr>
							  <td><?php echo $get_order_details_by_id['order_no'];?></td>
                              <td><?php echo $get_product_details['product_name'];?></td>
                              <td><?php echo $prodata['qty'];?></td>
                              <td><i class="fa fa-inr"></i> <?php echo $prodata['price'];?></td>
                             <td><?php echo $mysubscriptionstatustext;?></td>
                             <td>
							 <?php
							 if(date('Y-m-d') == $val){
								 
							 if($statusfromdb=='pending'){ ?>
							 <a href="javascript::void(0)" onclick="cancelthisproduct('<?php echo $prodata['id'];?>','<?php echo $val;?>')" id="14" title="Click Here To Cancel This Product"><span class="label label-success ">Cancel This Product</span></a>
							 <?php }
							 
							 } ?>							
							</td>
                            </tr>
						   <?php }} ?>
                                                      
                                                     </tbody>
                        </table>
										
							</div>
<?php }} ?>
						<!-- list end -->
						
									
										

                        </div>

										
										
										
								
									</div>
									
								  <?php echo form_close();?>	
						  </div>
						
						  <div class="line"></div> */?>
						  <div class="tab-pane table-responsive fade" id="profile3">
						  <h4>My Payment Status</h4>
							<p>Total Account Balance: <span class="h2" style="background:<?php echo $get_total_wallet>0?'red':'green';?>; color:#fff; display:inline-block; padding:0px 10px; border-radius:4px;"><?php echo '<i class="fa fa-inr"></i> '.$get_total_wallet;?></span></p>
							
							<?php if(!empty($get_order_list_by_customerid)){ ?>
							<table class="table">
                          <thead>
                            <tr>
                              
                              <th class="col-md-2">Order No.</th>
                              <th class="col-md-2">Order Date</th>
                              <th class="col-md-2">Delivery Charges</th>
                                                           <th class="col-md-2">Payment Mode</th>
                              <th class="col-md-2">Sub Total</th>                              <th class="col-md-2">Amount to Charity</th>
                              <th class="col-md-2">Total</th>
                              <th class="col-md-2">Account Balance</th>
                              <th  class="col-md-2">Status</th>
							  <th class="col-md-2">Action</th>
                            </tr>
                          </thead>
                          <tbody>
						  <?php foreach($get_order_list_by_customerid as $row){
							   $orderid=$row['open'];
        $order_no=$row['order_no'];
        $order_date=date('d/m/Y',strtotime($row['order_date']));
		$customer_id=$row['customer_id'];
		$get_user_details_by_id = $this->baang_model->get_user_details_by_id($customer_id);
        $customer=$get_user_details_by_id['name'];
        $delivery_charges=$row['delivery_charges'];
              $payment_mode=$row['payment_mode'];
        $sub_total=$row['sub_total'];        $charity_amount=$row['charity_amount'];
        $grand_total=$row['grand_total'];
        $status=$row['status'];
        $wallet=$row['amount'];
		 if($status=='delivered')
									  $statustext='<span class="label label-success">Delivered</span>';
								  else if($status=='cancelled')
									  $statustext='<span class="label label-danger">Cancelled</span>';
								  else
									   $statustext='<span class="label label-warning">Pending</span>';
								   
								   if($wallet==0){
									   $wallettext='<span class="label label-success"><i class="fa fa-inr"></i> '.$wallet.'</span>';
								   }else{
									     $wallettext='<span class="label label-danger"><i class="fa fa-inr"></i> '.$wallet.'</span>';
								   }
							  ?>
                            <tr>
                         
                              <td><?php echo $order_no;?></td>
                              <td><?php echo $order_date;?></td>
                              <td><i class="fa fa-inr"></i> <?php echo $delivery_charges;?></td>
                                                          <td><?php echo $payment_mode;?></td>
                              <td><i class="fa fa-inr"></i> <?php echo $sub_total;?></td>                              <td><i class="fa fa-inr"></i> <?php echo $charity_amount;?></td>
                              <td><i class="fa fa-inr"></i> <?php echo $grand_total;?></td>
                              <td><?php echo $wallettext;?></td>
                             <td><?php echo $statustext;?></td>
							  <td>
							 <?php if($status=='pending'){ ?>
							 <a href="javascript::void(0)" onclick="cancelthisorder('<?php echo $orderid;?>')" id="14" title="Click Here To Cancel This Order"><span class="label label-success ">Cancel This Order</span></a>
   <?php } ?>							
							</td>
                            </tr>
                           <?php } ?>
                          </tbody>
                        </table>
							<?php } ?>
						 
						  </div>
						

							  <div class="tab-pane fade" id="profile4">
						  <h3>Update Profile</h3>
							<div class="col-md-12">
							     
<?php
             $attributes = array('id' => '','class'=>"");

echo form_open('baang/profileupdate', $attributes);?>
                        
                                <div class="col_half">
                                    <label for="billing-form-name">Name:</label>
                                    <input id="id" name="id" value="<?php echo $get_user_details['id'];?>" class="sm-form-control" required  type="hidden">
                                    <input id="name" name="name" value="<?php echo $get_user_details['name'];?>" class="sm-form-control" required  type="text">
                                </div>

                             

                                <div class="clear"></div>
								
								<div class="col_half">
                                    <label for="billing-form-phone">Date Of Birth:</label>
                                    <input id="dob1" name="dob" value="<?php echo $get_user_details['dob'];?>" required class="sm-form-control" readonly type="text">
                                </div>
 <div class="col_half">
                                    <label for="billing-form-address">Address:</label>
                                    <textarea id="address" name="address"  class="sm-form-control" required type="text"><?php echo $get_user_details['address'];?></textarea>
                                </div>

                              
 <div class="col_half ">
                                    <label for="billing-form-phone">Pin Code:</label>
                                    <input id="pincode"  min="1" max="6" name="pincode" value="<?php echo $get_user_details['pincode'];?>" required class="sm-form-control" onkeypress="return isNumberKey(event);" type="text">
                                </div>
 <div class="col_half">
                                    <label for="billing-form-phone">Contact No:</label>
                                    <input id="contactno" name="contactno" value="<?php echo $get_user_details['contactno'];?>" required class="sm-form-control" onkeypress="return isNumberKey(event);" type="text">
                                </div>
								 
								 <div class="col_half pull-left text-right">
                                    <input type="submit" value="Update Profile" class="button button-3d button-small col-md-4 button-rounded button-green pull-right" >
                                </div>
								<?php echo form_close();?>
							</div>
							
							
						  </div>						    <div class="tab-pane fade" id="profile5">						  <h3>Change Password</h3>							<div class="col-md-12">							     <?php             $attributes = array('id' => 'changepasswordform','class'=>"");echo form_open('baang/changepasswordform/'.$get_user_details['id'], $attributes);?>                                                        <div class="col_half">                                    <label for="billing-form-name">Enter New Password:</label>                                    <input id="changepassword" name="changepassword" class="sm-form-control" required  type="password" placeholder="Enter New Password">                                </div> <div class="col_half">                                    <label for="billing-form-name">Repeat New Password:</label>                                    <input id="repeatpassword" name="repeatpassword" class="sm-form-control" required  type="password" placeholder="Repeat New Password">                                </div>								 <div class="col_half pull-left text-right">                                    <input type="submit" value="Update" class="button button-3d button-small col-md-4 button-rounded button-green pull-right" >                                </div>								<?php echo form_close();?>							</div>																				  </div>
						
						</div>

                </div>

            </div>

        </section><!-- #content end -->

      