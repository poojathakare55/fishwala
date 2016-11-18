
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Change Password
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
		  <!-- Main content -->
        <section class="content">
   <div class="row">
   
            <div class="col-md-12">
        <div class="box box-danger">
		
                <div class="box-header">
        
                  
                </div><!-- /.box-header -->
				
             <!-- form start -->
			<?php

             $attributes = array('id' => 'changepasswordform','class'=>"");



echo form_open('baang/changepasswordformsubmit/'.$get_user_details['id'], $attributes);?>
                  <div class="box-body">
				  <div class="row">
				 
					  <div class="col-md-4">
				    <div class="form-group">
                      <label for="exampleInputEmail1">Enter New Password</label>
					  <?php
					
					
$data = array(
              'name'        => 'changepassword',
              'id'          => 'changepassword',
             'placeholder'=>'Enter New Password',
              'required'   => 'true',
              'type'   => 'password',
              'class'        => 'form-control',
			  
            );
echo form_input($data);
					  ?>
                    
                    </div>
                    </div>
					
					 <div class="col-md-4">
				    <div class="form-group">
                      <label for="exampleInputEmail1">Confirm New password</label>
					  <?php
					
					
$data = array(
              'name'        => 'repeatpassword',
              'id'          => 'repeatpassword',
             'placeholder'=>'Confirm New Password',
              'required'   => 'true',
             'type'   => 'password',
              'class'        => 'form-control',
            );
echo form_input($data);
					  ?>
                    
                    </div>
                    </div>
					
					
                    </div>
				  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
				
				<button type="submit" class="btn btn-danger">Submit</button>
			
                  </div>
              <?php echo form_close();?>
              </div><!-- /.box -->
			   </div>
			    </div>
				
				  </section><!-- /.content -->
			 