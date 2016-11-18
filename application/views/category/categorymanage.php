<script>
function validatephotoExtension(v)
{
      var allowedExtensions = new Array("jpg","JPG","jpeg","JPEG","png","PNG");
      for(var ct=0;ct<allowedExtensions.length;ct++)
      {
          sample = v.lastIndexOf(allowedExtensions[ct]);
          if(sample != -1){return true;}
      }
      return false;
}
function passfilename() {
	var filename= $("#photo").val();
	var photoname=$("#photoname").val();
	if(photoname=='')
	photoname='';
	
	if(validatephotoExtension(filename) == false)
   {
      alert("Upload only JPEG or JPG format ");
	  $("#photo").val('');
    $("#photo").val(photoname);
      return;
   }else
   {
	   $("#photoname").val(filename);
   }


}

</script>
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Category
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

echo form_open_multipart('baang/categorysubmit', $attributes);?>
                  <div class="box-body">
				
				  
				 <div class="form-group">
                      <label for="exampleInputEmail1">Photo</label>
					  <?php
					$required='';
						if($photo!='')
							$required='';

					  ?>
                     <input type="file" name="photo" value="<?php echo $photo;?>" <?php echo $disable;?> onchange="passfilename()" id="photo" <?php echo $required;?>/>
						 <input type="hidden" name="photoname" id="photoname" value="<?php echo $photo;?>"/>
						 
         <img src="<?php echo base_url()?>images/category/<?php echo $photo;?>" alt="" width="60" id="selectedphoto">
						
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
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
              'name'        => 'category_name',
              'id'          => 'category_name',
             'placeholder'=>'Enter category',
              'required'   => 'true',
              'class'        => 'form-control',
			   'value' => $category_name,
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
				<?php include('categorygrid.php');?>
				  </section><!-- /.content -->
			 