
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Testimonial
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
		  <!-- Main content -->
        <section class="content">
   <div class="row">
            <div class="col-md-6">
        <div class="box box-danger">
		
                <div class="box-header">
               
                       <!-- <a href="<?//= site_url("jobcategory/manage/") ?>" class="btn btn-danger pull-right" title="Add New">Add Job Category</a>-->
                      
                  
                </div><!-- /.box-header -->
				
             <!-- form start -->
			 <?php
              $attributes = array('id' => 'myform');

echo form_open('baang/testimonialsubmit', $attributes);
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
                    <div class="form-group">
                      <label for="exampleInputEmail1">Client Name</label>
					  <?php
					
$data = array(
              'name'        => 'name',
              'id'          => 'name',
             'placeholder'=>'Enter Client Name',
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
					<div class="form-group">
                      <label for="exampleInputEmail1">Location</label>
					  <?php
					
$data = array(
              'name'        => 'location',
              'id'          => 'location',
             'placeholder'=>'Enter location',
              'required'   => 'true',
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
                      <label for="exampleInputEmail1">Description</label>
					  <?php
					
$data = array(
              'name'        => 'description',
              'id'          => 'description',
             'placeholder'=>'Enter description',
              'required'   => 'true',
              'class'        => 'form-control',
			   'value' => $description,
            );
if (isset($readOnly)) {
                                        $data['readOnly'] = $readOnly;
                                    }
echo form_input($data);
					  ?>
                    
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
				<?php include('testimonialgrid.php');?>
				  </section><!-- /.content -->
			 