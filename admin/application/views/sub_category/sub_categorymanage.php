
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Sub Category
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
               
                       <!-- <a href="<?//= site_url("jobcategory/manage/") ?>" class="btn btn-danger pull-right" title="Add New">Add Job Category</a>-->
                      
                  
                </div><!-- /.box-header -->
				
             <!-- form start -->
			 <?php
              $attributes = array('id' => 'myform');

echo form_open('baang/sub_categorysubmit', $attributes);?>
                  <div class="box-body">
				
				   <div class="form-group">
                      <label for="exampleInputEmail1">Select Category</label>
					  <div id="pam">
					 <?php
					$js = 'id="category_id" class= "form-control" required';

if (isset($readOnly)) {
                                        $js.= 'disabled';
                                    }
echo form_dropdown('category_id', $get_category_dropdown,$category_id,$js);
					  ?>
                    </div>
                    </div>
				
                    <div class="form-group">
                      <label for="exampleInputEmail1">Sub Category Name</label>
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
              'name'        => 'sub_category_name',
              'id'          => 'sub_category_name',
             'placeholder'=>'Enter Sub Category',
              'required'   => 'true',
              'class'        => 'form-control',
			   'value' => $sub_category_name,
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
				<?php include('sub_categorygrid.php');?>
				  </section><!-- /.content -->
			 