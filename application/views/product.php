 

<?php 

	$buttonname='Checkout';
	$categoryimage='pagetitle2.png';
	$fcolor='blcolor';

?>


 <!-- Page Title
        ============================================= -->
        <section id="page-title" style="background:url('<?php echo base_url();?>images/<?php echo $categoryimage;?>')no-repeat; color:#fff !important">

            <div class="container clearfix text-center ">
                <h1 class="<?php echo $fcolor;?>"><?php echo $category_name;?></h1>
			<?php   if(!empty($get_subcategory_byid)){
				 $cnt=0;
					   foreach($get_subcategory_byid as $key=>$rows){ 
					   $cnt++;
					   $sub_category_id=$rows['id'];
					   $subcategoryname=$rows['sub_category_name'];
					   $url=site_url().'/baang/subcategory/'.$sub_category_id;
					   $sub_category_name.='<a href="#'.$subcategoryname.'" class="'.$fcolor.'" title="'.$subcategoryname.'">'.$subcategoryname.'</a>, ';
					  
					  
					   }
					$sub_category_name=rtrim($sub_category_name,', ');
			}
			
				?>
                <span><?php echo $sub_category_name;?></span>
              
            </div>

        </section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">
			<?php
if (isset($this->session->userdata['cartmsg'])) {
  $cartmsg = ($this->session->userdata['cartmsg']);
  echo '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i>'. $cartmsg.'</h4>
                   </div>';
  $this->session->unset_userdata('cartmsg');
  
}?>
                <div class="container clearfix">

                    <!-- Shop
                    ============================================= -->
                    <div id="shop" class="clearfix">
						<div class="col-md-12 col-xs-12 nopadding clearfix">
					<?php

					if($cartitemcount==0){
						
						?>
					<?php }else{ 
					if($cartitemcount > 0){?>
					<a data-toggle="modal" data-target=".proceedmodal" class="button button-3d nomargin fright"><?php echo $buttonname;?></a>
					<?php }} ?>
												<a data-toggle="modal" data-target=".prdlist"  class="button button-3d notopmargin fright">Continue Shopping</a>
											</div>
					<!-- Milk Section -->
					<?php   if(!empty($get_subcategory_byid)){
						$cnt=0;
					   foreach($get_subcategory_byid as $key=>$rows){ 
					   $cnt++;
					   $sub_category_id=$rows['id'];
					   $subcategoryname=$rows['sub_category_name'];
					   $product_details=$this->baang_model->get_productdetails_byid($sub_category_id);
					   ?>
					<div id="<?php echo $subcategoryname;?>">
					<h3 style="margin-bottom:5px" id="milk"><?php echo $subcategoryname;?></h3>
					<?php if(!empty($product_details)){ 
					 foreach($product_details as $key=>$proval){ 
					 $product_id=$proval['id'];
					 $product_photo=$proval['photo'];
					 $product_name=$proval['product_name'];
					 $price=$proval['price'];
					 $prounit=$proval['unit'];
					 $description=substr($proval['description'],0,100);
					  $availability=$proval['availability'];
						 $product_overlay='product-overlay';
						 $out_of_stock='';
						 if(strtolower($availability)=='out of stock'){
							 $product_overlay='';
							 $out_of_stock='<div class="product-title" ><h3 style="color:red;">'.$availability.'</h3></div>';
						 }
					?>
                        <div class="product prodheight clearfix">
                            <div class="product-image">
                                <a href="#" ><img src="<?php echo base_url();?>admin/images/product/<?php echo $product_photo;?>" alt="<?php echo $product_name;?>"></a>
                                								<?php if($get_user_details['id']==''){?>																	<a href="javascript::void(0)"  onclick="addprodlogin('<?php echo $product_id;?>')" ><img src="<?php echo base_url();?>admin/images/product/<?php echo $product_photo;?>" alt="<?php echo $product_name;?>"></a>								<?php }else{ ?>								<a href="javascript::void(0)"  onclick="addproductpopup('<?php echo $product_id;?>','<?php echo current_url();?>')" ><img src="<?php echo base_url();?>admin/images/product/<?php echo $product_photo;?>" alt="<?php echo $product_name;?>"></a>																<?php } ?>																
                                <div class="<?php echo $product_overlay;?>">
								<?php if($get_user_details['id']==''){?>
									<a href="javascript::void(0)"  onclick="addprodlogin('<?php echo $product_id;?>')" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
								<?php }else{ ?>
									<a href="javascript::void(0)" onclick="addproductpopup('<?php echo $product_id;?>','<?php echo current_url();?>')"  class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
								<?php } ?>
                                   
                                    
                                   
                                </div>
                            </div>
                            <div class="product-desc">
							 <?php echo $out_of_stock;?> 
                                <div class="product-title"><h3><a href="#"><?php echo $product_name;?></a></h3></div>
                                <div class="product-price"> <ins>Rs. <?php echo $price.'/'.$prounit;?></ins></div>
                              <?php echo $description;?> 
                            </div>
							
                        </div>
					<?php }} ?>
					
						
						<div class="clear"></div>
					</div>	
					<?php }}else{
	echo '<h2>No Product Found</h2>';
} ?>
					<!-- end milk section -->
	
					
					<!-- end paneer section -->
					
					
					
					<div class="col-md-12 col-xs-12 nopadding">
					<?php

					if($cartitemcount==0){
						
						?>
												
					<?php }else{ 
					if($cartitemcount > 0){?>
					<a data-toggle="modal" data-target=".proceedmodal" class="button button-3d nomargin fright"><?php echo $buttonname;?></a>
					<?php }} ?>
												<a data-toggle="modal" data-target=".prdlist"  class="button button-3d notopmargin fright">Continue Shopping</a>
											</div>
                       </div><!-- #shop end -->

                </div>

            </div>

        </section><!-- #content end -->
		<script>
		$(function() {
									new JsDatePick({
			useMode:2,
			target:"dob",
			dateFormat:"%d/%m/%Y"
			
		});
		
  });
		</script>