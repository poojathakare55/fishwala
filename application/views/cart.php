	<!-- Page Title
		============================================= -->
		<?php 

	$buttonname='Checkout';
	$categoryimage='pagetitle2.png';
	$fcolor='blcolor';

?>
		<section id="page-title" style="background:url('<?php echo base_url();?>images/<?php echo $categoryimage;?>')no-repeat; ">

			<div class="container clearfix" >
				<h1>Cart</h1>
				
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">
<?php
$flag=false;

//code for removind item from multidimensional array
/*foreach($this->session->userdata['cart_item'] as $key => $value) {
	foreach($value as $key1 => $value1) {
		
    if ($value1 == '8') {
        foreach($value as $deleteKey => $deleteValue) {
			//print_r($this->session->userdata['cart_item'][$key]);
         unset($this->session->userdata['cart_item'][$key]);
		 $this->session->set_userdata('cart_item',$this->session->userdata['cart_item']);
        }
        break;
    }
	}
}*/


if (isset($this->session->userdata['cart_item']) && !empty($this->session->userdata['cart_item'])) {

	
    $item_total = $deliverycharge=$deliverychargetotal=0;
	$enabledeliverycharge='disable';
?>
					<div class="table-responsive bottommargin">

						<table class="table cart  "style="width:80%; margin-left:10%;" >
							<thead>
								<tr>
									<th class="cart-product-thumbnail">Image</th>
									<th class="cart-product-name">Product Name</th>
									<th class="cart-product-price">Qty.</th>
									<th class="cart-product-quantity">Price</th>
									<th class="cart-product-quantity">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php		
    foreach ($this->session->userdata['cart_item'] as $item){
	$get_product_details=$this->baang_model->get_product_details($item['product_id']);
	$item_total=$item_total+$item['price'];
	

	$buttonname='Checkout';

		?>
								<tr class="cart_item">
									

									<td class="cart-product-thumbnail">
										<a href="#"><img width="64" height="64" src="<?php echo $get_product_details['photo'];?>" alt="Pink Printed Dress"></a>
									</td>

									<td class="cart-product-name">
										<a href="#"><?php echo $item['product_name']; ?></a>
									
									</td>
<td class="cart-product-quantity">
										<div class="quantity clearfix">
										<span class="amount"><?php echo $item["qty"]; ?></span>
											<input type="hidden" name="quantity" value="<?php echo $item["qty"]; ?>" class="qty" readonly />
											
										</div>
									</td>
									<td class="cart-product-price">
										<span class="amount"><i class="fa fa-inr"></i>Rs. <?php echo $item["price"]; ?></span>
									</td>
									<td class="cart-product-price">
										<a href="<?php echo site_url();?>baang/removeitem/<?php echo $item['product_id'];?>" title="Click Here To Remove This Item">
										Remove
										</a>
									</td>

									

									
								</tr>
							<?php
}

if($item_total<=250){
	$deliverycharge=50;
}
$grandtotal=$item_total+$deliverycharge;
?>
								
							</tbody>

						</table>

					</div>

					<div class="row clearfix">
						<div class="col-md-6 clearfix">
							<!--<h4>Tearms & Conditions</h4>-->
							
							</div>

						<div class="col-md-6 clearfix">
							<div class="table-responsive">
								<h4>Totals</h4>

								<table class="table cart">
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
									<td colspan="6">
										<div class="row clearfix">
											
											<div class="col-md-12 col-xs-12 nopadding">
							<?php	 
					if($cartitemcount > 0){?>
					<a data-toggle="modal" data-target=".proceedmodal" class="button button-3d nomargin fright"><?php echo $buttonname;?></a>
					<?php } ?>
											</div>
										</div>
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

		</section><!-- #content end -->
