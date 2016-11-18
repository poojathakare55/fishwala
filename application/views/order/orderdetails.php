<script>
function changestatustodeliver(){
	var checkedNum = $('input[name="deliveredchk[]"]:checked').length;
	
if (!checkedNum) {
   alert("Please Select Record For Changing Status");
   return false;
}else{
	var r = confirm("Do You Want To Change Status To Delivered?");
	if (r == true) {
    return true;
} else {
     return false;
}
}

	//return true;
	}
</script>
 <!-- Content Header (Page header) -->
      
		  <!-- Main content -->
        <section class="content">
   <div class="row">
   <?php if (isset($this->session->userdata['deliver'])) {
  $deliver = ($this->session->userdata['deliver']);
  echo '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i>'. $deliver.'</h4>
                   </div>';
  $this->session->unset_userdata('deliver');
  
}?>
          <div class="col-md-12">
              <div class="box box-solid">
			   <?php
              $attributes = array('id' => 'myform');

echo form_open('baang/changestatustodeliver/'.$orderid, $attributes);?>
                <div class="box-header with-border">
                 <h3 class="box-title">Order No. <?php echo $get_order_details_by_id['order_no'];?> / <?php echo $get_order_details_by_id['customer'];?></h3>
<a href='javascript::void(0)' class="pull-right btn btn-primary" onclick='shippingdetails(this.id)' id='<?php echo $get_order_details_by_id['id'];?>' title='Click Here View Shipping Details'>Shipping Details</a>
<button type="submit" class="btn btn-primary pull-right" onclick="return changestatustodeliver();">Change Status to Deliver</button>               
			   </div><!-- /.box-header -->
                <div class="box-body">
				
                  <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <?php if(!empty($get_product_dates_by_orderid)){
						$srno=0;
	foreach($get_product_dates_by_orderid as $val){
		$srno=$srno+1;
	$dates=date('d/m/Y',strtotime($val)).'-'.date('l',strtotime($val));
	$day=date('N', strtotime($val));
	$get_product_list_by_date=$this->baang_model->get_product_list_by_date($val,$orderid);
	?>
					<div class="panel box box-danger">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a class="collapsed" aria-expanded="false" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $srno;?>">
                            <?php echo $dates;?>
                          </a>
                        </h4>
						<span class="pull-right label label-success"><?php echo count($get_product_list_by_date);?> Products</span>
                      </div>
                      <div style="height: 0px;" aria-expanded="false" id="<?php echo $srno;?>" class="panel-collapse collapse">
                        <div class="box-body">
                         <table class="table">
                          <thead>
						 
                            <tr>
                              
                              <th class="col-md-2">Select</th>
                              <th class="col-md-2">Image</th>
                              <th class="col-md-2">Product Name</th>
                              <th class="col-md-2">Qty.</th>
                              <th class="col-md-2">Price</th>
                              <th class="col-md-2">Total</th>
							   <th class="col-md-2">Clean</th>
                              <th class="col-md-2">Status</th>
                             
                            </tr>
                          </thead>
                          <tbody>
						   <?php if(!empty($get_product_list_by_date)){
							  foreach($get_product_list_by_date as $prodata){
								  $statusfromdb=$prodata['status'];
								  $clean=$prodata['clean'];
								  
								 if($statusfromdb=='delivered')
									  $mysubscriptionstatustext='<span class="label label-success">Delivered</span>';
								  else if($statusfromdb==='cancelled')
									  $mysubscriptionstatustext='<span class="label label-danger">Cancelled</span>';
								   else if($statusfromdb==='pending')
									   $mysubscriptionstatustext='<span class="label label-warning">Pending</span>';
								   else if($statusfromdb==='paused')
									   $mysubscriptionstatustext='<span class="label label-warning">Paused</span>';
								  $get_product_details=$this->baang_model->get_product_details($prodata['product_id']);
								  $converttogram=$prodata['qty']*1000;
		 $getactualqty=$converttogram/500;
		$finalprice=$getactualqty*$get_product_details['price'];
		
								  
							  ?>
						       <tr>
                         
                              <td>
							   <?php if($statusfromdb=='pending'){ ?>
							  <input type="checkbox" id="deliveredchk" name="deliveredchk[]" value='<?php echo $val;?>=<?php echo $prodata['id'];?>'/>
							 <?php } ?>
							  </td>
							    <td><img src="<?php echo $get_product_details['photo'];?>" alt="" width="60" id="selectedphoto"></td>
                              <td><?php echo $get_product_details['product_name'];?></td>
                              <td><?php echo $prodata['qty'];?></td>
                              <td>Rs. <?php echo $get_product_details['price'];?></td>
                              <td>Rs. <?php echo $finalprice;?></td>
							    <td><?php echo $clean;?></td>
                             <td><?php echo $mysubscriptionstatustext;?></td>
                           
                             
                            </tr>
						   <?php }} ?>
                                                      
                                                     </tbody>
                        </table>
                        </div>
                      </div>
                    </div>
                 <?php }} ?>
                  </div>
				  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			   <?php echo form_close();?>
            </div>
			    </div>
				  </section><!-- /.content -->
			 