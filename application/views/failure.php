

        <section id="page-title">

            <div class="container clearfix">
                <h1 class="white-color">Transaction Information</h1>
                
            </div>

        </section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
        <section id="content" >

            <div class="content-wrap" style="padding:40px 0px;">

                <div class="container clearfix">
					
					<div class="col_three_sixth nobottommargin">

						

						<p>
						<ul class="iconlist">
						<?php 
						If (!empty($additionalCharges)) {
      
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
  
       if ($hash != $posted_hash) {
	       echo '<li style="margin-bottom:12px"><i class="icon-play" style="font-size:12px"></i>Invalid Transaction. Please try again</li>';
		   }
	   else {
           	   
          /*echo "<h3>Thank You. Your order status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";*/
         ?>
								
				<li style="margin-bottom:12px"><i class="icon-play" style="font-size:12px"></i>	Your order status is <?php echo $status;?> </li>

<li style="margin-bottom:12px"><i class="icon-play" style="font-size:12px"></i>Your transaction id for this transaction is  <b><?php echo $txnid;?>. You may try making the payment by clicking the link below.</b>
</li>
  <?php } ?>
</ul>
						</p>


					</div>

					

					
				</div>

            </div>

        </section><!-- #content end -->
