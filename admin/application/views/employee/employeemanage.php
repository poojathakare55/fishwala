
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Employee
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
		  <!-- Main content -->
        <section class="content">
   <div class="row">
    <?php if (isset($this->session->userdata['success'])) {
  $success = ($this->session->userdata['success']);
  echo '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i>'. $success.'</h4>
                   </div>';
  $this->session->unset_userdata('success');
  
}?>
            <div class="col-md-12">
        <div class="box box-danger">
		
                <div class="box-header">
               
                       <!-- <a href="<?//= site_url("jobevents/manage/") ?>" class="btn btn-danger pull-right" title="Add New">Add Job events</a>-->
                      
                  
                </div><!-- /.box-header -->
				
             <!-- form start -->
			 <?php
              $attributes = array('id' => 'myform','onsubmit'=>'return validdate()');

echo form_open_multipart('baang/employeesubmit', $attributes);
$data = array(
                                                'name' => 'id',
                                                'id' => "id",
                                                'value' => $id,
                                                 'class' => 'input-block-level',
                                                'type' => 'hidden'
                                            );
                                            echo form_input($data);
?>
                  <div class="box-body">
				  <div class="row">
				 
					  <div class="col-md-4">
				    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
					  <?php
					
					
$data = array(
              'name'        => 'name',
              'id'          => 'name',
             'placeholder'=>'Enter Name',
              'required'   => 'true',
              'class'        => 'form-control',
			   'value' => $name,
            );
if (isset($readOnly)) {
                                        $data['readOnly'] = $readOnly;
                                    }
echo form_input($data);
					  ?>
                    
                    </div>
                    </div>
					
					 <div class="col-md-4">
				    <div class="form-group">
                      <label for="exampleInputEmail1">Email ID</label>
					  <?php
					
					
$data = array(
              'name'        => 'emailid',
              'id'          => 'emailid',
             'placeholder'=>'Enter Email ID',
              'required'   => 'true',
              'type'   => 'email',
              'class'        => 'form-control',
			   'value' => $emailid,
            );
if (isset($readOnly)) {
                                        $data['readOnly'] = $readOnly;
                                    }
echo form_input($data);
					  ?>
                    
                    </div>
                    </div>
					 <div class="col-md-4">
				    <div class="form-group">
                      <label for="exampleInputEmail1">Contact No.</label>
					  <?php
					
					
$data = array(
              'name'        => 'contactno',
              'id'          => 'contactno',
             'placeholder'=>'Enter Contact No.',
              'required'   => 'true',
              'type'   => 'number',
              'class'        => 'form-control',
			   'value' => $contactno,
            );
if (isset($readOnly)) {
                                        $data['readOnly'] = $readOnly;
                                    }
echo form_input($data);
					  ?>
                    
                    </div>
                    </div>
				
					 <div class="col-md-4">
				    <div class="form-group">
                      <label for="exampleInputEmail1">Address</label>
					  <?php
					
					
$data = array(
              'name'        => 'address',
              'id'          => 'address',
             'placeholder'=>'Enter Address',
              'required'   => 'true',
              'class'        => 'form-control',
			  'rows'        => '5',
      'cols'        => '10',
			   'value' => $address,
            );
if (isset($readOnly)) {
                                        $data['readOnly'] = $readOnly;
                                    }
echo form_textarea($data);
					  ?>
                    
                    </div>
                    </div>
					
					 <div class="col-md-4">
				    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
					  <?php
					
					
$data = array(
              'name'        => 'username',
              'id'          => 'username',
             'placeholder'=>'Enter Username',
              'required'   => 'true',
              'class'        => 'form-control',
			   'value' => $username,
            );
if (isset($readOnly)) {
                                        $data['readOnly'] = $readOnly;
                                    }
echo form_input($data);
					  ?>
                    
                    </div>
                    </div>
					<?php
					if(empty($id)){
						
						?>
					 <div class="col-md-4">
				    <div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
					  <?php
					
					
$data = array(
              'name'        => 'password',
              'id'          => 'password',
             'placeholder'=>'Enter Password',
              
              'type'   => 'password',
              'class'        => 'form-control',
			   'value' => $password,
            );
if (isset($readOnly)) {
                                        $data['readOnly'] = $readOnly;
                                    }
echo form_input($data);
					  ?>
                    
                    </div>
                    </div>
					<?php } ?>
					 <div class="col-md-4">
				    <div class="form-group">
                      <label for="exampleInputEmail1">User Type</label>
					  <?php
						$js = 'id="usertype" class= "form-control"';

if (isset($readOnly)) {
                                        $js.= 'disabled';
                                    }
echo form_dropdown('usertype', array('Seafood'=>'Seafood'),$usertype,$js);
					  ?>
                    
                    </div>
                    </div>

                    </div>
				  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
				 <?php if (!isset($readOnly)) { ?>
				<button type="submit" class="btn btn-danger">Submit</button>
				 <?php } ?>
                   
                  </div>
              <?php echo form_close();?>
              </div><!-- /.box -->
			   </div>
			    </div>
				
				<?php include('employeegrid.php');?>
				  </section><!-- /.content -->
			 