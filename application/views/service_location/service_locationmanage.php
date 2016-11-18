
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Service Location
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
            <div class="col-md-6">
        <div class="box box-danger">
		
                <div class="box-header">
               
                       <!-- <a href="<?//= site_url("jobservice_location/manage/") ?>" class="btn btn-danger pull-right" title="Add New">Add Job service_location</a>-->
                      
                  
                </div><!-- /.box-header -->
				
             <!-- form start -->
			 <?php
              $attributes = array('id' => 'myform');

echo form_open('baang/service_locationsubmit', $attributes);?>
                  <div class="box-body">
				
				  
				
                    <div class="form-group">
                      <label for="exampleInputEmail1">Location Name</label>
					  <?php
					 /* if (!empty($id)) {
                                            $data = array(
                                                'name' => 'id',
                                                'id' => "id",
                                                'value' => $id,
                                                 'class' => 'input-block-level',
                                                'type' => 'hidden'
                                            );
                                            echo form_input($data);
                                        }*/
					$data = array(
                                                'name' => 'id',
                                                'id' => "id",
                                                'value' => $id,
                                                 'class' => 'input-block-level',
                                                'type' => 'hidden'
                                            );
                                            echo form_input($data);
$data = array(
              'name'        => 'location',
              'id'          => 'location',
             'placeholder'=>'Enter Location',
              'class'        => 'form-control',
			   'value' => $location,
            );
if (isset($readOnly)) {
                                        $data['readOnly'] = $readOnly;
                                    }
echo form_input($data);
					  ?>
                    
                    </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Pincode</label>
					  <div id="pam">
					 <?php
				$data = array(
              'name'        => 'pincode',
              'id'          => 'pincode',
             'placeholder'=>'Enter Pincode',
              'type'   => 'number',
              'class'        => 'form-control',
			   'value' => $pincode,
            );
if (isset($readOnly)) {
                                        $data['readOnly'] = $readOnly;
                                    }
echo form_input($data);
					  ?>
                    </div>
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Status</label>
					  <div id="pam">
					 <?php
					$js = 'id="status" class= "form-control" required';

if (isset($readOnly)) {
                                        $js.= 'disabled';
                                    }
echo form_dropdown('status', array('Enable'=>'Enable','Disable'=>'Disable'),$status,$js);
					  ?>
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
				<?php include('service_locationgrid.php');?>
				  </section><!-- /.content -->
			 