  <section id="content">

            <div class="content-wrap">
		
                <div class="container clearfix">
 <h3>Forget Password</h3>

							<div class="col-md-12">

							     

<?php

             $attributes = array('id' => 'forgetpassword','class'=>"");



echo form_open('baang/forgetpasswordsubmit/'.$get_user_details['id'], $attributes);?>

                        <div id="forgetpasswordmsg"></div>

                                <div class="col_half">

                                    <label for="billing-form-name">Enter Your Email</label>

                                    <input id="emailid" name="emailid" class="sm-form-control" required  type="email" placeholder="Enter Your Email">

                                </div>


								 <div class="col_half pull-left text-right">

                                    <input type="submit" value="Send" class="button button-3d button-small col-md-4 button-rounded button-green pull-right" >

                                </div>

								<?php echo form_close();?>

							</div>
							</div>
							</section>