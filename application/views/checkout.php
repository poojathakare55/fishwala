<?php 
//print_r($this->session->userdata['cart_item']);
$MERCHANT_KEY = $get_payumoney['merchant_key'];

$SALT = $get_payumoney['salt'];
$furl=site_url().'baang/paymentfailureurl';
$surl=site_url().'baang/paymentsuccessurl';

// End point - change to https://secure.payu.in for LIVE mode
//$PAYU_BASE_URL = "https://test.payu.in";
$PAYU_BASE_URL = $get_payumoney['url'];
$action = '';

$posted = array();
if(!empty($_POST)) {
   
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
  
}//stores order details in session

$order_array=array(
'order_no' => $this->baang_model->generateorderno(),
		'order_date' => date('Y-m-d'),
		'customer_id' =>  $get_user_details['id'],
           'delivery_charges' => $posted['delivery_charges'],
            'express_delivery' => $posted['express_delivery'],
			 'sub_total' => $posted['sub_total'],
			 'grand_total' => $posted['grand_total'],
			 'payment_mode' => $posted['payment_mode'],
			 'status' => "pending",
			 'charity_amount' => $posted['charity_amount'],
			  'shipping_name' => $posted['shipping_name'],
			 'shipping_emailid' => $posted['shipping_emailid'],
			 'shipping_address' => $posted['shipping_address'],
			 'shipping_pincode' => $posted['shipping_pincode'],
			 'shipping_contactno' => $posted['shipping_contactno']
);

 $this->session->set_userdata('order_array',$order_array);

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
   $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
   // $posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;

    $hash = strtolower(hash('sha512', $hash_string));
     $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
if (isset($this->session->userdata['cart_item']) && !empty($this->session->userdata['cart_item'])) {
	$productinfo=json_encode($this->session->userdata['cart_item']);
	$productinfo="productinfo";
	    foreach ($this->session->userdata['cart_item'] as $item){
			//echo $item['product_id'];
		}
}
$cashchk=$payumoneychk='';
if(strtolower($posted['payment_mode'])=='cash on delivery'){
	$cashchk='checked="true"';
	$action='checkoutsubmit';
}
if(strtolower($posted['payment_mode'])=='payumoney'){
	$payumoneychk='checked="true"';
	
}

?>
<script>

    var hash = '<?php echo $hash ?>';

	
    function submitPayuForm() {
		
      if(hash == '') {
		 
        return;
      }
      var payuForm = document.forms.payuForm;
    payuForm.submit();
    }
	
  </script>
    <body onload="submitPayuForm()">
		<!-- Page Title
		============================================= -->
			<!-- Page Title
		============================================= -->
		<?php 

	$buttonname='Checkout';
	$categoryimage='pagetitle2.png';
	$fcolor='blcolor';

?>
		<section id="page-title" style="background:url('<?php echo base_url();?>images/<?php echo $categoryimage;?>')no-repeat; ">

			<div class="container clearfix" >
				<h1 >Cart</h1>
				
			</div>

		</section><!-- #page-title end --><!-- #page-title end -->

		<!-- Content
		============================================= -->
	 <form action="<?php echo $action;?>" method="post" name="payuForm">
	  <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? $surl : $posted['surl'] ?>" />
      <input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? $furl : $posted['furl'] ?>" />
     <textarea name="productinfo" style="display:none;"><?php echo $productinfo; ?></textarea>
	  	<input type="hidden" name="service_provider" value="payu_paisa" size="64" />
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					

					<div class="row clearfix">
						<div class="col-md-6">
							<h3>Billing Details</h3>

	                    
	                            <div class="col_half">
	                                <label for="billing-form-name">Name:</label>
	                                <input type="text" id="checkoutname" name="firstname" value="<?php echo $get_user_details['name'];?>" class="sm-form-control" readOnly/>
	                            </div>

	                            <div class="col_half col_last">
	                                <label for="billing-form-lname">Email ID:</label>
	                                <input type="text" id="checkoutemailid" name="email" value="<?php echo $get_user_details['emailid'];?>" class="sm-form-control" readOnly/>
	                            </div>

	                            <div class="clear"></div>
 <div class="col_full">
	                                <label for="billing-form-address">Address:</label>
	                                <input type="text" id="checkoutaddress" name="address" value="<?php echo $get_user_details['address'];?>" class="sm-form-control" readOnly/>
	                            </div>

	                          
 <div class="col_half ">
	                                <label for="billing-form-phone">Pin Code:</label>
                                	<input type="text" id="checkoutpincode1" name="pincode1" value="<?php echo $get_user_details['pincode'];?>" class="sm-form-control" readOnly/>
	                            </div>
 <div class="col_half col_last">
	                                <label for="billing-form-phone">Contact No:</label>
                                	<input type="text" id="checkoutcontactno" name="phone" value="<?php echo $get_user_details['contactno'];?>" class="sm-form-control" readOnly/>
	                            </div>
	                        <div class="col_full ">
	                                <input type="checkbox" id="same_as" name="same_as" value="" style="width:15px; height:15px;"><label for="billing-form-phone">Same As Billing Details</label>
	                            </div>
						</div>
						<div class="col-md-6">
							<h3 class="">Shipping Details</h3>


	
	                           <div class="col_half">
	                                <label for="billing-form-name">Name:</label>
	                                <input type="text" id="shipping_name" name="shipping_name" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" class="sm-form-control" required/>
	                            </div>

	                            <div class="col_half col_last">
	                                <label for="billing-form-lname">Email ID:</label>
	                                <input type="text" id="shipping_emailid" name="shipping_emailid" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" class="sm-form-control" required/>
	                            </div>

	                            <div class="clear"></div>
 <div class="col_full">
	                                <label for="billing-form-address">Address:</label>
	                                <input type="text" id="shipping_address" name="shipping_address" value="<?php echo (empty($posted['shipping_address'])) ? '' : $posted['shipping_address']; ?>" class="sm-form-control" required/>
	                            </div>

	                          
 <div class="col_half ">
	                                <label for="billing-form-phone">Pin Code:</label>
                                	<input type="text" id="shipping_pincode" name="shipping_pincode" value="<?php echo (empty($posted['shipping_pincode'])) ? '' : $posted['shipping_pincode']; ?>" class="sm-form-control" />
	                            </div>
 <div class="col_half col_last">
	                                <label for="billing-form-phone">Contact No:</label>
                                	<input type="text" id="shipping_contactno" name="shipping_contactno" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" class="sm-form-control" required/>
	                            </div>

								
	                   
						</div>
						<div class="clear bottommargin"></div>
						<div class="col-md-6">
							<div class="table-responsive clearfix">
								<h4>Payment Method</h4>
 <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Cash On Delivery
 <input type="radio" name="payment_mode" id="payment_mode" value="Cash On Delivery" <?php echo $cashchk;?> required/>
 </div>
	                          
	                             
	                            <div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Pay With Debit / Credit / Net Banking
								 <input type="radio" name="payment_mode" id="payment_mode" value="PayUMoney" <?php echo $payumoneychk;?> required/>
								</div>
	                           
							</div>
						</div>
					<?php	if (isset($this->session->userdata['cart_item'])) {
	
    $item_total = $deliverycharge=$existingordertotal=0;
	 foreach ($this->session->userdata['cart_item'] as $item){
	$get_product_details=$this->baang_model->get_product_details($item['product_id']);
	$item_total=$item_total+$item['price'];
	if($item['order_id']==''){
	$existingordertotal=$existingordertotal+$item['price'];
	}
	 }
	
if($existingordertotal<=250){
	$deliverycharge=50;
}
$grandtotal=$item_total+$deliverycharge;
if($posted['charity_amount']>0){
 $charitygrandtotal = ceil(($grandtotal+$posted['express_delivery']) / 10) * 10;
}else{
	$charitygrandtotal=$grandtotal+$posted['express_delivery'];
}

?>

						<div class="col-md-6">
							<div class="table-responsive">
								<h4>Cart Totals</h4>

								<table class="table cart">
									<tbody>
										<tr class="cart_item">
											<td class="notopborder cart-product-name" width="200px">
												<strong>Subtotal</strong>
											</td>

											<td class="notopborder cart-product-name">
												<span class="amount">Rs. <?php echo $item_total;?></span>
												<input type="hidden" id="sub_total" name="sub_total" value="<?php echo $item_total;?>" class="sm-form-control"/>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Delivery Charges</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount delivery_charges">Rs. <?php echo $deliverycharge;?></span>
												<input type="hidden" id="delivery_charges" name="delivery_charges" value="<?php echo $deliverycharge;?>" class="sm-form-control"/>
												<input type="hidden" id="original_delivery_charges" name="original_delivery_charges" value="<?php echo $deliverycharge;?>" class="sm-form-control"/>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Grand Total</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount color lead grandtotal"><strong>Rs. <?php echo $charitygrandtotal;?></strong></span>
												<input type="hidden" id="grand_total" name="grand_total" value="<?php echo $charitygrandtotal;?>" class="sm-form-control"/>
												<input type="hidden" id="amount" name="amount" value="<?php echo $charitygrandtotal;?>" class="sm-form-control"/>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
											<?php 
											
											 ?>
												<strong>Express Delivery  <i class="fa fa-lg fa-info-circle " data-toggle="tooltip" data-placement="top" title="" data-original-title="Get your delivery in 30 min."> </i>
												<input type="hidden" name="express_delivery" value="<?php echo (empty($posted['express_delivery'])) ? '0' : $posted['express_delivery'] ?>" id="express_delivery"/>
												</strong>
												<?php  ?>
											</td>

											<td class="cart-product-name">
											<input type="checkbox" name="<?php echo $grandtotal;?>" id="expresschk"/> 
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
											<?php 
											
											if ($grandtotal % 10 != 0){ ?>
												<strong>Round Of Amount for Charity  <img src="<?php echo base_url();?>images/charity.png" width="25px" data-toggle="tooltip" data-placement="top" title="" data-original-title="We automatically rounds up each purchase to the nearest x10 value & donates the spare change. Everyone can spare pennies, right? The change is automatically donated to causes & nonprofits. Incorporate giving into your everyday living & feel good about your purchases because you are helping build a better world"> 
												
												</strong>
												<?php } ?>
											</td>

											<td class="cart-product-name">
												<?php if ($grandtotal % 10 != 0){ ?>	
								<input type="checkbox" name="<?php echo $grandtotal;?>" id="charitychk"/> 
								<?php } ?>
								<input type="hidden" name="originalgrandamount" value="<?php echo $grandtotal;?>" id="originalgrandamount"/>
								<input type="hidden" name="charity_amount" value="<?php echo (empty($posted['charity_amount'])) ? '0' : $posted['charity_amount'] ?>" id="charity_amount"/>
								
											</td>
										</tr>
										
									</tbody>
								</table>

							</div>
							 <?php if(!$hash) { ?>
							<button type="submit" class="button button-3d fright" id="register-form-submit" name="register-form-submit" value="Submit">Place Order</button>
							<?php } ?>
						</div>
					<?php } ?>
					</div>
				</div>

			</div>

		</section><!-- #content end -->
		<?php echo form_close();?>
		</body>
