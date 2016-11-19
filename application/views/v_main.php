<!DOCTYPE html>
<?php

$name='';
$name=$get_user_details['name'];

?>
<html dir="ltr" lang="en-US">
<head>
<?php include 'meta.php'; ?>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    
	
    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/dark.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/magnific-popup.css" type="text/css" />
<meta name="alexaVerifyID" content="uKinQGovvsCGBllWN_KcLMHfMbc"/>
    <link rel="stylesheet" href="<?php echo base_url();?>css/responsive.css" type="text/css" />
	
	
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<!-- for jquery pramod-->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>js/plugins.js"></script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="<?php echo base_url();?>include/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>include/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
  
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>include/rs-plugin/css/settings.css" media="screen" />
<link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url();?>images/favicon.ico" type="image/x-icon">
	


    <title>Fishwala</title>

     <style>

        .revo-slider-emphasis-text {
            font-size: 64px;
            font-weight: 700;
            letter-spacing: -1px;
            font-family: 'Raleway', sans-serif;
            padding: 15px 20px;
            border-top: 2px solid #FFF;
            border-bottom: 2px solid #FFF;
        }

        .revo-slider-desc-text {
            font-size: 20px;
            font-family: 'Lato', sans-serif;
            width: 650px;
            text-align: center;
            line-height: 1.5;
        }

        .revo-slider-caps-text {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 3px;
            font-family: 'Raleway', sans-serif;
        }
		.logocont{z-index: 3; width: 800px; max-width: 800px;}
		.namecont{z-index: 3; width: 880px; max-width: 880px;}
		.tagcont{z-index: 3; width: 730px; max-width: 730px; white-space: normal;}
		.btncont{border-radius:20px; background:#1be8b5}
@media screen and (max-width: 768px)
{
.revo-slider-emphasis-text {
            font-size: 44px !important;
			margin-bottom:10px;
        }

        .revo-slider-desc-text {
            font-size: 22px !important;
			margin-bottom:10px;
        }

        .revo-slider-caps-text {
            font-size: 26px !important;
			margin-bottom:10px;
        }
		.logocont{z-index: 3; width: 630px; max-width:630px; margin-bottom:20px;}
		.namecont{z-index: 3; width: 910px; max-width: 910px;}
		.tagcont{z-index: 3; width: 770px; max-width: 770px; white-space: normal;}
		.btncont{border-radius:20px; background:#1be8b5}
}

@media screen and (max-width: 568px)
{
.revo-slider-emphasis-text {
            font-size: 45px !important;
			margin-bottom:-20px !important;
        }

        .revo-slider-desc-text {
            font-size: 24px !important;
			margin-bottom:10px
        }

        .revo-slider-caps-text {
            font-size: 24px !important;
			margin-bottom:10px
        }
		.logocont{z-index: 3; width: 280px; margin-bottom:70px;  max-width: 280px; }
		.namecont{z-index: 3; width: 910px; margin-bottom:70px;  max-width: 910px;}
		.tagcont{z-index: 3; width: 750px; max-width: 750px; white-space: normal;}
		.btncont{border-radius:20px; background:#1be8b5}
}
    </style>

	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>jsDatePick_ltr.min.css" />

<script type="text/javascript" src="<?php echo base_url();?>jsDatePick.min.1.3.js"></script>
<script>
<?php if (isset($this->session->userdata['paymentsuccessurl'])) { ?>
window.onload = function(){
   $('#paymentsuccessurl').modal('show');
}
<?php } ?>
<?php if (isset($this->session->userdata['paymentfailureurl'])) { ?>
window.onload = function(){
   $('#paymentfailureurl').modal('show');
}
<?php } ?>
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72733818-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body class="stretched" >
<div class="modal fade addprodlogin" role="dialog">
  <div class="modal-dialog modal-sm" style=" background:#fff; ">

    <!-- Modal content-->
     <div class="modal-body">
        <!--Add To Cart -->
<div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

						<div class="acctitle acctitlec " style="background:#1be8b5; color:#fff;"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Sign in to your Account</div>
						<div class="acc_content clearfix" style="display: block;">
							
							<?php
              $attributes = array('id' => 'productloginform','class'=>"nobottommargin");

echo form_open('baang/login', $attributes);?>
<input type="hidden" id="addprodloginproductid" name="addprodloginproductid"/>
 <div id="productloginmsg"></div>
 <?php /*
								<div class="col_full">
									   <a href="<?php echo $login_url;?>" style="margin:5px 0px; width:100% !important" class=" " ><!--<i class="icon-facebook" style="font-size:18px; padding-top:7px"></i>    &nbsp; &nbsp;Sign in with Facebook-->
									  <center>	<img src="<?php echo base_url();?>images/fb.png" ></center>
									  </a>
									  <a href="<?php echo site_url();?>baang/googlelogin" style="margin:5px 0px; width:100% !important" class="col-md-12"><!--<i class="icon-gplus" style="font-size:18px; padding-top:7px"></i> &nbsp; &nbsp; Sign in with Google-->
<center>									  <center>	<img src="<?php echo base_url();?>images/google.png"></center>
									  </a>
									 
								</div>*/?>
								<div class="col_full" style="padding:5px 10px; text-align:center">
									OR
									</div>
								<div class="col_full">
									<input type="email" placeholder="Username" name="loginemailid" id="loginemailid" required value="" class="form-control">
								</div>

								<div class="col_full">
									<input type="password" placeholder="Password" name="loginpassword" id="loginpassword" required value="" class="form-control">
								</div>

								<div class="col-md-12 clearfix" style="padding: 10px;">
									<button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" type="submit" value="login">Sign In</button>
									<a href="<?php echo site_url();?>/baang/forget_password" class="fright">Forgot Password?</a>
									
									
								</div>
								   
							<?php echo form_close();?>
						</div>

						<div class="acctitle" style="background:#1be8b5; color:#fff;"><i class="acc-closed  icon-user4"></i><i class="acc-open icon-ok-sign"></i>New User? Join Today</div>
						<div class="acc_content clearfix" style="display: none;">
						  <?php
             $attributes = array('id' => 'registerform','class'=>"nobottommargin");

echo form_open('baang/register', $attributes);?>

<div id="registermsg"></div>
									<div class="col_full">
									<input type="text" id="name" name="name" value="" placeholder="Your Name" required class="form-control">
								</div>

								<div class="col_full">
									<input type="email" placeholder="Your Email ID" name="emailid" id="emailid" required class="form-control">
								</div>
								
								<div class="col_full">
									<input type="text" id="dob" name="dob" value="" readonly placeholder="Date Of Birth (dd/mm/yyyy)" required class="form-control">
								</div>
								
<div class="col_full">
									<input type="password" id="password" name="password" value="" placeholder="password" required class="form-control">
								</div>
								<div class="col_full">
									<textarea id="address" name="address" placeholder="Address" class="form-control" required></textarea>
								</div>
<div class="col_full">
									<input type="text" id="pincode" name="pincode" placeholder="Pin Code" min="1" maxlength="6"  onkeypress="return isNumberKey(event);" value="" required class="form-control">
								</div>
								<div class="col_full">
									<input type="text" id="contactno" name="contactno" placeholder="Contact No." min="1"  maxlength="10" onkeypress="return isNumberKey(event);"  value="" class="form-control">
								</div>

								


								<div class="col_full nobottommargin">
									<button type="submit" class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Register Now</button>
								<button type="reset" id="reset" class="button button-3d button-black nomargin" >Cancel</button>
								</div>
							<?php echo form_close();?>
						</div>

					</div>
<!--Add To Cart -->
      </div>
      
    
		<!--Add To Cart -->
      </div>
      
    

  </div>
  
  
  
  <div class="modal fade addprodlogit" role="dialog">
  
       <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
     
       <?php
              $attributes = array('id' => 'headerloginform','class'=>"nobottommargin");

echo form_open('baang/login', $attributes);?>

                                    <h3 class="center backgroundmain" style=" padding:10px;">Sign In </h3>
<div id="headerloginmsg"></div>
 <?php /*
								<div class="col_full clearfix" style="padding:5px ">
                                       
                                   <a href="<?php echo $login_url;?>" style="margin:5px 0px; width:100% !important" class=" " ><!--<i class="icon-facebook" style="font-size:18px; padding-top:7px"></i>    &nbsp; &nbsp;Sign in with Facebook-->
									  <center>	<img src="<?php echo base_url();?>images/fb.png" ></center>
									  </a>
									  <a href="<?php echo site_url();?>baang/googlelogin" style="margin:5px 0px; width:100% !important" class="col-md-12"><!--<i class="icon-gplus" style="font-size:18px; padding-top:7px"></i> &nbsp; &nbsp; Sign in with Google-->
<center>									  <center>	<img src="<?php echo base_url();?>images/google.png"></center>
									  </a>
									 
									
									</div> */ ?>
									<div class="col_full" style="padding:5px 10px; text-align:center">
									OR
									</div>
                                    <div class="col_full" style="padding:5px 10px;">
                                      <input type="email" placeholder="Username" name="loginemailid" id="loginemailid" required value="" class="form-control">
                                    </div>

                                    <div class="col_full" style="padding:5px 10px;">
                                      	<input type="password" placeholder="Password" name="loginpassword" id="loginpassword" required value="" class="form-control">
                                    </div>

                                     <div class="col_full" style="padding:5px 10px;">
                                       	<button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" type="submit" value="login">Sign In</button>
                                       	
                                        <a href="<?php echo site_url();?>/baang/forget_password" class="fright small">Forgot Password?</a>
                                    
									
									</div>
                                     
									  
                               <?php echo form_close();?>
     
     
    </div>

  </div>

    

  </div>
  
</div>
<div id="paymentsuccessurl" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
     
     	<?php
if (isset($this->session->userdata['paymentsuccessurl'])) {
  $paymentsuccessurl = ($this->session->userdata['paymentsuccessurl']);
  echo '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i>'. $paymentsuccessurl.'</h4>
                   </div>';
  $this->session->unset_userdata('paymentsuccessurl');
  
}?>
    <?php
if (isset($this->session->userdata['changepassword'])) {
  $changepassword = ($this->session->userdata['changepassword']);
  echo '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i>'. $changepassword.'</h4>
                   </div>';
  $this->session->unset_userdata('changepassword');
  
}?> 
    </div>

  </div>
</div>
<div id="paymentfailureurl" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
     
     	<?php
if (isset($this->session->userdata['paymentfailureurl'])) {
  $paymentfailureurl = ($this->session->userdata['paymentfailureurl']);
  echo '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i>'. $paymentfailureurl.'</h4>
                   </div>';
  $this->session->unset_userdata('paymentfailureurl');
  
}?>
     
    </div>

  </div>
</div>
   <!-- modal -->
     <div class="modal fade" id="openpopup" role="dialog" >
    
  </div> 
  <!--add product -->
<div class="modal fade prdlist" role="dialog">
  <div class="modal-dialog modal-lg" >

    <!-- Modal content-->
     <div class="modal-body">
        <!--Add To Cart -->

                        <div class=" col-md-12 clearfix product-desc backgroundmain" style=" padding:7px;">
						
						
 <div class="heading-block center " >
                            <h4 class="white-color no-margin">CHOOSE FROM HUNDREDS OF 
FRESH PRODUCE</h4>
                            </div>
						
						 <?php

				  if(!empty($get_category_list)){
					  $cnt=0;
					   foreach($get_category_list as $key=>$rows){ 
					   $cnt++;
					   $category_id=$rows['id'];
					   $photo=$rows['photo'];
					   $category_name1=$rows['category_name'];
					    $url='category/'.preg_replace("![^a-z0-9]+!i", "", $category_name1);
			$url=site_url().preg_replace('/[^A-Za-z0-9]+/', '/', $url);
					?>
                        <div class="col_one_fifth  nobottommargin center" style="margin:5px 13px;" data-animate="bounceIn">
                          <a href="<?php echo $url;?>" class="itmsell"> 
						   <figure>
						   <?php if($photo!=''){?>
						   <img width="100px" src="<?php echo base_url();?>admin/images/category/<?php echo $photo;?>">
						   <?php }else{?>
						    <img src="<?php echo base_url();?>admin/images/category/default_product.png">
						     <?php } ?>
						   </figure>
                            <h5  class="white-color"><?php echo $category_name1;?></h5></a>
                        </div>

				  <?php }} ?>
  </div>
                      

      </div>
      
    

  </div>
</div>

<!--Product Modal -->
 <div class="modal fade checkqtymodal" role="dialog">
  <div class="modal-dialog modal-lg" >

    <!-- Modal content-->
     <div class="modal-body">
        <!--Add To Cart -->

                        <div class=" col-md-12 clearfix product-desc backgroundmain" style=" padding:7px;">
						
						
 <div class="heading-block center " >
                            <h4 class="white-color no-margin">
							Please Select Atleast One Quantity for Order 
							</h4>
						 <?php

				  if(!empty($get_category_list)){
					  $cnt=0;
					   foreach($get_category_list as $key=>$rows){ 
					   $cnt++;
					   $category_id=$rows['id'];
					   $photo=$rows['photo'];
					   $category_name1=$rows['category_name'];
					    $url='category/'.preg_replace("![^a-z0-9]+!i", "", $category_name1);
			$url=site_url().preg_replace('/[^A-Za-z0-9]+/', '/', $url);
					   if (strpos(strtolower($category_name1),'fish') !== false) { //true when fish word is there
					   }else{
?>
                        <div class="col-md-2 nobottommargin center" data-animate="bounceIn">
                           <a href="<?php echo $url;?>" class="itmsell"> 
						   <figure>
						   <?php if($photo!=''){?>
						   <img src="<?php echo base_url();?>admin/images/category/<?php echo $photo;?>">
						   <?php }else{?>
						    <img src="<?php echo base_url();?>admin/images/category/default_product.png">
						     <?php } ?>
						   </figure>
                            <h5  class="white-color"><?php echo $category_name1;?></h5></a>
                        </div>

				  <?php }}} ?>
                            </div>
						
						
 
                        </div>

      </div>
      
    

  </div>
</div>
  <!--proced modal -->
<div class="modal fade proceedmodal" role="dialog">
  <div class="modal-dialog modal-lg" >

    <!-- Modal content-->
     <div class="modal-body">
        <!--Add To Cart -->

                        <div class=" col-md-12 clearfix product-desc backgroundmain" style=" padding:7px;">
						
						
 <div class="heading-block center " >
                            <h4 class="white-color no-margin">
							Your Cart
							</h4>
							<?php	
							if (isset($this->session->userdata['cart_item'])) {
	
    $item_total = $deliverycharge=$deliverychargetotal=0;
	$$enabledeliverycharge='disable';
?>
					<div class="table-responsive bottommargin">

						<table class="table cart  "style="width:80%; margin-left:10%;" >
							<thead>
								<tr>
									<th class="cart-product-thumbnail">Image</th>
									<th class="cart-product-name">Product Name</th>
									<th class="cart-product-price">Qty.</th>
									<th class="cart-product-quantity">Price</th>
									<!--<th class="cart-product-quantity">Action</th>-->
								</tr>
							</thead>
							<tbody>
							<?php	
						
    foreach ($this->session->userdata['cart_item'] as $item){
	$get_product_details=$this->baang_model->get_product_details($item['product_id']);
	$item_total=$item_total+$item['price'];
	if($item['order_id']==''){
		$enabledeliverycharge='enable';
		$deliverychargetotal=$deliverychargetotal+$item['price'];
	}

		?>
								<tr class="cart_item">
									

									<td class="cart-product-thumbnail">
										<a href="#"><img width="64" height="64" src="<?php echo $get_product_details['photo'];?>" alt="Pink Printed Dress"></a>
									</td>

									<td class="cart-product-name">
										<a href="#" class="white-color"><?php echo $item['product_name']; ?></a>
									
									</td>
<td class="cart-product-quantity">
										<div class="quantity clearfix">
										<span class="amount"><?php echo $item["qty"]; ?></span>
											<input type="hidden" name="quantity" value="<?php echo $item["qty"]; ?>" class="qty" readonly />
											
										</div>
									</td>
									<td class="cart-product-price">
										<span class="amount"><i class="fa fa-rupees"></i> Rs. <?php echo $item["price"]; ?></span>
									</td>
									<?php /*
									<td class="cart-product-price">
										<a href="<?php echo site_url();?>/baang/removeitem/<?php echo $item['product_id'];?>" title="Click Here To Remove This Item" style="color:red;">
										Remove
										</a>
									</td>*/ ?>

									

									
								</tr>
							<?php
}
if($deliverychargetotal<=250 && $enabledeliverycharge=='enable'){
	$deliverycharge=50;
	$note="<span class='label label-danger'>Orders Below Rs. 250 attract a delivery charge of Rs.50</span>";
}
$grandtotal=$item_total+$deliverycharge;
?>
								
							</tbody>

						</table>

					</div>
					<div class="col-md-12 clearfix">
					<?php echo $note;?>
					</div>
								<div class="row clearfix">
								
						<div class="col-md-6 clearfix">
							<h4>Terms & Conditions</h4>
							
							<div style="height:200px;overflow-x:scroll;text-align:left;">
							<h4>You Agree and Confirm:</h4>

<p>
<ul>
<li>
You may halt the service whenever you wish too.
</li>
<li>
Any modification in the order/subscription should be notified a day before.
 </li><li>
Prices are subjected to change according to the market rate.
  </li></ul>
  <br>
</p>
<p>  
<b>The Company at its sole discretion may cancel any order(s):</b>
 (a) if it suspects a customer  
has undertaken a fraudulent transaction, or <br> (b) if it suspects a customer has undertaken a transaction which is not in accordance with the Terms of Use, or <br>(c) in case of unavail 
ability of a product, or <br>(d) for any reason outside the control of the Company including  
causes for delivery related logistical difficulties.
</p>

<p>
We maintain a negative list of all fraudulent transactions and non-complying users, and  
reserve the right to deny access to such users at any time or cancel any orders placed  
by them in future.
 </p><p>
It is clarified that no returns or refunds are permitted after the product purchased has  
been accepted for delivery.
 </p><p>
The aggregate liability of the Company, if any, that can be established and proved pur 
suant to a claim, shall in no event extend beyond refund of the money charged from a  
user for purchases made pursuant to an order under which such liability has arisen and  
been established.
    </p><p>
This User Agreement is effective unless and until terminated by either you or the Com 
pany.
 </p><p>
All users have to register and login for placing orders on the Site. You must keep your account and registration details current and correct for communications related to your purchases from the Site. By agreeing to the Terms of Use, the user agrees to receive promotional communication and newsletters from the Company and its partners. The user can opt out from such communication and/or newsletters either by unsubscribing on the Site itself, or by contacting the customer services team and placing a request for unsubscribing.
 </p><p>
<h5>Pricing</h5>
The price mentioned at the time of ordering a product shall be the price charged at the time of delivery, provided that a product listed on the Site will not be sold at a price higher than its MRP (Maximum Retail Price). Although prices of most of the products do not fluctuate on a daily basis, some of the commodities and fresh food prices do change on a daily basis. In case the prices are higher or lower on the date of delivery, no additional charges will be collected or refunded as the case may be at the time of the delivery.
</p>
<p>
That in the event any product delivery is delayed or is returned from its destination on account of a mistake by you (e.g. providing the wrong name or address or other incorrect/misleading information), any additional costs incurred by the Company for re-delivery of the product(s) shall be borne by you.
</p><p>
That you will use the services provided by the Site for lawful purposes only, and comply with all applicable laws and regulations while using and transacting on the Site.
</p><p>
You will provide authentic and true information in all instances where any information is requested of you. The Company reserves the right to confirm and validate the information and other details provided by you at any point of time.
If at any time, the information provided by you is found to be false or inaccurate (wholly or partly), the Company shall have the right in its sole discretion to reject registration, cancel all orders, and debar you from using its services and other affiliated services in the future without any prior intimation whatsoever, and without any liability to you.
</p><p>
That you are accessing the services available on the Site and transacting at your sole risk and are using your best and prudent judgment before entering into any transaction through the Site.
</p><p>
That before placing an order, you shall check and review the product description carefully and in sufficient detail. By placing an order on the Site, you agree to be bound by the conditions of sale included in the item’s description without exception.
</p><p>
That product(s) ordered by you may be replaced by the Company in case of unavailability at the relevant store or for other reasons outside the control of the Company. You may however refuse to accept such replacement product, in which case an amount equal to the price paid for the original product will be refunded to you.That product(s) ordered by you may be replaced by the Company in case of unavailability at the relevant store or for other reasons outside the control of the Company. You may however refuse to accept such replacement product, in which case an amount equal to the price paid for the original product will be refunded to you.
</p><p>
<h5>Disclaimers Regarding Products</h5>
We have made every effort to display available products, including in respect of their colour, size, shape and appearance, as accurately as possible. However, the actual colour, size, shape and appearance may have variations from the depiction on your mobile/computer screen. 
</p><p>
The Company does not make any representation or warranties in respect of the products available on the Site nor does the Company implicitly or explicitly support or endorse the sale or purchase of any products on the Site. The Company accepts no liability for any errors or omissions, whether on behalf of itself or third parties. 
</p><p>
You acknowledge and agree that the Company shall act as your agent for retrieval and delivery of product(s) purchased on the Site, and that the Company has no relationship with you other than to provide such retrieval and delivery service. At no time shall the Company have any right, title or interest to any product(s). The Company does not have any control over the quality, failure to provide or any other aspect whatsoever of the product(s) and is not responsible for damages or delays as a result of products which are out of stock, unavailable or back ordered.
</p><p>
<h5>Limitation of Liability</h5>
The aggregate liability of the Company, if any, that can be established and proved pursuant to a claim, shall in no event extend beyond refund of the money charged from a user for purchases made pursuant to an order under which such liability has arisen and been established. 
</p><p>
It is acknowledged and agreed that notwithstanding anything to the contrary, the Company shall not be liable, under any circumstances, whether in contract or in tort, for any indirect, special, consequential or incidental losses or damages, including on grounds of loss of profit, loss of reputation or loss of business opportunities.
</p>
<p>
FISHWALA SERVICES<br>
Sector-8, Airoli<br>
400708<br>
contact@fiswala.me</p>
							</div>
							<input type="checkbox" name="iaccept" id="iaccept"/> I Accept Terms & Agreements
							</div>

						<div class="col-md-6 clearfix">
							<div class="table-responsive">
								<h4>Totals</h4>

								<table class="table cart" style="width:100%">
									<tbody>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Sub Total</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount">Rs. <?php echo $item_total;?></span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Delivery Charges</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount">Rs. <?php echo $deliverycharge;?></span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Grand Total</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount"><i class="fa fa-inr"></i><strong>Rs. <?php echo $grandtotal;?> </strong></span>
											</td>
										</tr>
										<tr class="cart_item">
									<td colspan="2" style="text-align:right">
										<a href="javascript::void(0)" style="display:block; float:right !important" onclick="iaccept()" class="button button-3d nomargin pull-right fright">Proceed to Checkout</a>
												
											
									</td>
								</tr>
									</tbody>

								</table>

							</div>
						</div>
					</div>
<?php
}else{
	echo '<h2>Your Shopping Cart Is Empty</h2>';
}
?>
                            </div>
						
						
 
                        </div>

      </div>
      
    

  </div>
</div>
<!--end proced modal -->
<!--Modals -->
<div id="citycheckform" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog">
 
  </div>
</div>



<div class="modal fade cityselect" role="dialog">
  <div class="modal-dialog modal-sm" style=" background:#fff; ">
 <?php
					
					
$data = array(
              'name'        => 'category_id',
              'id'          => 'category_id',
			  'type'=>'hidden'
            );
echo form_input($data);
					  ?>
    <!-- Modal content-->
     <div class="modal-body">
        <!--Add To Cart -->
<div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

<?php   if(!empty($get_service_location)){?>
						<div class="acctitle acctitlec " style="background:#1be8b5; color:#fff;">Select City</div>
						<div class="acc_content clearfix text-center" style="display: block; ">
						<?php

				
					  $cnt=0;
					   foreach($get_service_location as $key=>$rows){ 
					   $cnt++;
					   $category_id=$rows['id'];
					   $location.='<a href="javascript::void()" onclick="openproduct()">'.$rows['location'].'</a>, ';
					   $pincode=$rows['pincode'];
					  
					   }
					$location=rtrim($location,', ');
?>
						<?php echo $location;?>
		  
		<br>
		
						</div>
						 <?php } ?>
						<div class="acctitle acctitlec " style="background:#1be8b5; color:#fff;">Check Pincode</div>
						<div class="acc_content clearfix text-center" style="display: block;">
						<p>Enter your pincode to check our service</p>
						 <?php
              $attributes = array('id' => 'pincodeform','class'=>"nobottommargin");

echo form_open('baang/pincodecheck', $attributes);?>
                                  <div class="col_full" >
                                        <input type="text"  name="pincode" id="pincode" min="1" maxlength="6" required value="" class=" form-control not-dark" style="width:75%; float:left;">
                                
                                         <button class="button  button-black nomargin " id="login-form-submit" name="login-form-submit" style="width:25%; float:left; line-height:34px; height:34px; value="login">Sign In</button>
                                    </div>
									<div id="pincodemsg"></div>
                                <?php echo form_close();?>
						</div>
<?php if($name==''){?>
						<div class="acctitle" style="background:#1be8b5; color:#fff;"><i class="acc-closed  icon-user4"></i><i class="acc-open icon-ok-sign"></i>Sign In</div>
						<div class="acc_content clearfix" style="display: none;">
								<?php
              $attributes = array('id' => 'categoryloginform','class'=>"nobottommargin");

echo form_open('baang/login', $attributes);?>
 <div id="categoryloginmsg"></div>
  <?php /*
                                    <div class="col_full" style="padding:5px 10px;">
                                           <a href="<?php echo $login_url;?>" style="margin:5px 0px; width:100% !important" class=" " ><!--<i class="icon-facebook" style="font-size:18px; padding-top:7px"></i>    &nbsp; &nbsp;Sign in with Facebook-->
									  <center>	<img src="<?php echo base_url();?>images/fb.png" ></center>
									  </a>
									  <a href="<?php echo site_url();?>baang/googlelogin" style="margin:5px 0px; width:100% !important" class="col-md-12"><!--<i class="icon-gplus" style="font-size:18px; padding-top:7px"></i> &nbsp; &nbsp; Sign in with Google-->
<center>									  <center>	<img src="<?php echo base_url();?>images/google.png"></center>
									  </a>
									  
                                    </div>*/?>
									<div class="col_full" style="padding:5px 10px; text-align:center">
									OR
									</div>
<div class="col_full" style="padding:5px 10px;">
                                       <input type="email" placeholder="Username" name="loginemailid" id="loginemailid" required value="" class="form-control not-dark">
                                    </div>

                                    <div class="col_full" style="padding:5px 10px;">
                                       <input type="password" placeholder="Password" name="loginpassword" id="loginpassword" required value="" class="form-control not-dark">
                                    </div>

                                    <div class="col-md-12 clearfix" style="padding: 10px;">
                                        <button type="submit" class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Sign In</button>
                                        <a href="<?php echo site_url();?>/baang/forget_password" class="fright small">Forgot Password?</a>
                                   

<div class="col-md-12 clearfix" >
<hr>
								
								
									 
									 </div>
								   </div>
									
                                	<?php echo form_close();?>
							</div>
							<?php } ?>

					</div>
<!--Add To Cart -->
      </div>
      
    

  </div>
</div>



<!--Modals -->
    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
        <header id="header" class="transparent-header full-header" data-sticky-class="not-dark">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="<?php echo site_url();?>" class="standard-logo" data-dark-logo="<?php echo base_url();?>images/logo-dark.png"><img src="<?php echo base_url();?>images/logo.png" alt="Baang Logo"></a>
                        <a href="<?php echo site_url();?>" class="retina-logo" data-dark-logo="<?php echo base_url();?>images/logo-dark@2x.png"><img src="<?php echo base_url();?>images/logo@2x.png" alt="Baang Logo"></a>
                    </div><!-- #logo end -->

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu">

                        <ul>
                            <li class="current"><a href="<?php echo site_url();?>"><div>Home</div></a>
                            </li>
                          <li><a href="<?php echo site_url();?>about-us"><div>About US</div></a>
                            </li>
                          <li ><a href="<?php echo site_url();?>contact-us"><div>Contact Us</div></a>
                             </li>
							  <?php if($name==''){?>
                            <li ><a href="<?php echo site_url();?>testimonial"><div>Testimonials</div></a>
                          
							
                            <li ><a href="#" data-toggle="modal"  data-target=".addprodlogit"><div> <i class="backgroundmain" style="padding:3px 10px 0px 10px;  border-radius:15px; position:relative;">Sign In</i></div></a>
                             </li>
							 <?php }else{ ?>
							 <li ><a href="<?php echo site_url();?>profile-<?php echo $get_user_details['id'];?>" title="Click Here View Profile"><div> <i class="backgroundmain" style="padding:3px 10px 0px 10px;  border-radius:15px; position:relative;">My Profile</i></div></a>
							 <li ><a href="<?php echo site_url();?>logout" title="Click Here To Sign Out"><div> <i class="backgroundmain" style="padding:3px 10px 0px 10px;  border-radius:15px; position:relative;">Sign Out(<?php echo $name;?>)</i></div></a>
							 
                            <?php }?>
                        </ul>
						  <?php if($name!=''){?>
<div id="top-search">

                            

                          <a href="<?php echo site_url();?>cart" style="z-index:100;"><span style="border-radius:15px !important; background:#1be8b5; top:-10px !important; font-size:10px !important; z-index:10; padding:2px 5px; line-height:5px !important;  "><?php echo $cartitemcount;?></span> <i class="icon-shopping-cart" style="position:relative; top:-10px; left:-10px; z-index:0;"></i></a>

                        </div>
                     <?php }?>
                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->


  <?php 
		
include $view_file;
?>

        <!-- Content
      
        <!-- Footer
        ============================================= -->
        <footer id="footer" class="dark">

            <div class="container">

                <!-- Footer Widgets
                ============================================= -->
                <div class="footer-widgets-wrap clearfix">

				<!--
                    <div class="col_two_third">

                        <div class="col_one_third">

                            <div class="widget clearfix">

                                <img src="<?php echo base_url();?>images/footer-widget-logo.png" alt="" class="footer-logo">

                               

                            </div>

                        </div>

                        <div class="col_one_third">

                            <div class="widget widget_links clearfix">

                                <h4>Our Address</h4>
<div style="background: url('<?php echo base_url();?>images/world-map.png') no-repeat center center; background-size: 100%;">
                                    <address>
                                        Address Line1,<br>
                                       Address Line1,<br>
                                       Address Line1,<br>
                                       Address Line1,<br>
									   
                                    </address>
                                  
                                </div>
                               
  
                            </div>

                        </div>

                        <div class="col_one_third col_last">

                            <div class="widget clearfix">
                                <h4>Our Contact </h4>

                                <abbr title="Phone Number"><strong>Phone:</strong></abbr> (91) 123 125 3657<br>
                                    <abbr title="Fax"><strong>Fax:</strong></abbr> (91) 142 639 14258<br>
                                    <abbr title="Email Address"><strong>Email:</strong></abbr> info@baang.com
                            </div>

                        </div>

                    </div>

                    <div class="col_one_third col_last">

                        <div class="widget widget_links clearfix">

                                <h4>Payment By</h4>
  
                                </div>
                               
  
                            </div>
                        <div class="widget widget_links clearfix">

                                <h4>Follow Us On</h4>
<a href="#" class="social-icon black-color si-rounded si-facebook" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
    <i class="icon-facebook"></i>
    <i class="icon-facebook"></i>
</a>
<a href="#" class="social-icon si-rounded black-color si-gplus" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>


                            </div>

-->                        
<div class="col_one_fifth">
						
						<div class="widget clearfix"><img src="<?php echo base_url();?>images/footer-widget-logo.png" style="margin-bottom:-5px" alt="" class="footer-logo"> <br><a href=""><img src="<?php echo base_url();?>images/store-android.png" style="margin-bottom:-5px" alt="" class="footer-logo"> </a><br><a href=""><img src="<?php echo base_url();?>images/store-apple.png" alt="" class="footer-logo"> </a></div>
								
					</div>
					
					<div class="col_one_fifth">
						
						<div class="widget widget_links clearfix">

                                <h4> 
Find out more</h4>
									
									<ul style="font-size:18px; color:#bcb8b3">
									<li><a href="<?php echo site_url();?>about-us">Who we are</a></li>
									<li><a href="<?php echo site_url();?>#ourwork">
How does it work</a></li>
								</ul>
								
								</div>
						
					</div>
					
					
					<div class="col_one_fifth">
						
						<div class="widget widget_links clearfix">

                                <h4> 
Go shopping</h4>
									
									<ul style="font-size:18px; color:#bcb8b3">
									<li><a href="javascript::void(0)" onclick="addprodlogin('')">Sign up
</a></li>
									<li><a href="<?php echo site_url();?>#chooseproduct">Enter in your market</a></li>
								</ul>
								
								</div>
						
					</div>
					<div class="col_one_fifth">
						
						<div class="widget widget_links clearfix">

                                <h4>Need help</h4>
									
									<ul style="font-size:18px; color:#bcb8b3">
									<li><a href="<?php echo site_url();?>faq">FAQ</a></li>
									<li><a href="<?php echo site_url();?>contact-us">Contact</a></li>
								</ul>
								
								</div>
						
					</div>
					<div class="col_one_fifth col_last">
						
						<div class="widget widget_links clearfix">

                              <div class="widget widget_links clearfix">

                                <h4>Payment By</h4>
  
  <img src="<?php echo base_url();?>images/payment.png" style="margin-bottom:-25px" alt="" class="footer-logo">
                                </div>
                               
  
                            </div>
                        <div class="widget widget_links clearfix">

                                <h4>Follow Us On</h4>
<a href="https://www.facebook.com/Fishwala.me/?ref=hl " target="blank" class="social-icon black-color si-rounded si-facebook" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
    <i class="icon-facebook"></i>
    <i class="icon-facebook"></i>
</a>
<a href="https://plus.google.com/u/0/109618259839411817188/posts" target="blank" class="social-icon si-rounded black-color si-gplus" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>
						

						<a href="https://www.instagram.com/fishwala.me/" target="blank" class="social-icon si-rounded si-instagram" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram">
                            <i class="icon-instagram"></i>
                            <i class="icon-instagram"></i>
                        </a>

                            </div>
                                  
                                </div>
								</div>
						
					</div>

                    </div>

                      </div><!-- .footer-widgets-wrap end -->

            </div>

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights">

                <div id="copyrights">

                <div class="container clearfix">

                    <div class="col-md-6 no-padding">
                        Copyrights &copy; 2016 All Rights Reserved by Fishwala.me
                        
                    </div>
					<div class="col-md-6 no-padding text-right" style="float:right">
                        Developed By <a href="http://www.prolifiquetech.com" target="_blank">Prolifiquetech</a>
                        
                    </div>

            
                </div>

            </div><!-- #copyrights end -->

            </div><!-- #copyrights end -->

        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- Footer Scripts
    ============================================= -->
	
    <script type="text/javascript" src="<?php echo base_url();?>js/functions.js"></script>
 <?php include('myscript.php');?>
<?php
if (isset($this->session->userdata['order'])) {
  $success = ($this->session->userdata['order']);
  echo '<script type="text/javascript">
    $(window).load(function(){
		alert("'.$success.'");
    });
</script>';
  $this->session->unset_userdata('order');
  
}?>
<script>
		$(function() {
									new JsDatePick({
			useMode:2,
			target:"dob",
			dateFormat:"%d/%m/%Y"
			
		});
		
  });
		</script>
</body>
</html>