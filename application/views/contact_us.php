
        <section id="page-title">

            <div class="container clearfix">
                <h1 class="textwhite">Contact</h1>
                
            </div>

        </section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
        <section id="content" >

            <div class="content-wrap" style="padding:40px 0px;">

                <div class="container clearfix">
					
					<div class="row clearfix">
						<div class="col-md-9">
							<h3>Send Message</h3>

							<p>Please complete the form below. We'll do everything we can to respond to you as quickly as possible. Our goal is to reply to every email within 12 Hrs. </br>
<b>Please be assured, we will never sell or distribute the personal information you provide to us</b></p>

							
<?php

             $attributes = array('id' => 'contactform','class'=>"nobottommargin");



echo form_open('baang/contactformsubmit/', $attributes);?>
<div id="contactformmsg"></div>
								<div class="col_half">
									<label for="billing-form-name">Name:</label>
									<input type="text" id="name" name="name" required value="" class="sm-form-control">
								</div>
<div class="col_half col_last">
									<label for="billing-form-email">Email Address:</label>
									<input type="email" id="emailid" name="emailid" required value="" class="sm-form-control">
								</div>

								<div class="clear"></div>


								<div class="col_half">
									<label for="billing-form-address">Message:</label>
									<textarea class="sm-form-control" style=" resize: none;" id="message" required name="message" rows="5" cols="30"></textarea>
								</div>

								
								
								<div class="col_half col_last">
									<div class="col_full">
									<label for="billing-form-phone">Phone:</label>
									<input type="text" id="phone" name="phone" onkeypress="return isNumberKey(event);" required value="" class="sm-form-control">
									</div>
									<div class="col_full">
								<button type="submit"  class="button button-3d fright">Send Message</a>
									</div>
								</div>

							</form>
						</div>
						<div class="col-md-3">
							<h3 class="">Contact US On:</h3>
								
								<div >
									
									<abbr title="Phone Number"><strong>Phone:</strong></abbr> (+91) 8422001144 / <span>55<br>
									<abbr title="Email Address"><strong>Email:</strong></abbr> mefishwala@gmail.com
								</div>
							
							</div>
						<div class="clear bottommargin"></div>
						
					</div>
						
						

					
				</div>

            </div>

        </section><!-- #content end -->
