<script>

  jQuery(document).ready(function() {
	  $("#unit1").keypress(function(event){
        var inputValue = event.which;
        // allow letters and whitespaces only.
        if((inputValue > 47 && inputValue < 58) && (inputValue != 32)){
            event.preventDefault();
        }
    });
	



	});	
		/*end code*/
		
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
function fillcategory(val) {
     
        $.ajax({
          type: "POST",
          url: "<?php echo site_url();?>/baang/fillsubcategory?category_id="+val,

          success: function(data){
$('#pam').html(data);
           }
         });
		}
</script>
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Product Details
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

echo form_open_multipart('baang/productsubmit', $attributes);
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
                      <label for="exampleInputEmail1">Photo</label>
					  <?php
					$required='';
						if($photo!='')
							$required='';

					  ?>
                     <input type="file" name="photo" value="<?php echo $photo;?>" <?php echo $disable;?> onchange="passfilename()" id="photo" <?php echo $required;?>/>
						 <input type="hidden" name="photoname" id="photoname" value="<?php echo $photo;?>"/>
						 
         <img src="<?php echo base_url()?>images/product/<?php echo $photo;?>" alt="" width="60" id="selectedphoto">
						
                    </div>
                    </div>
					
					
					 <div class="col-md-4">
					<div class="form-group">
                      <label for="exampleInputEmail1">Select Category</label>
					 
					 <?php
					$js = 'id="category_id" class= "form-control" required onchange="fillcategory(this.value)"';

if (isset($readOnly)) {
                                        $js.= 'disabled';
                                    }
echo form_dropdown('category_id', $get_category_dropdown_for_products,$category_id,$js);
					  ?>
                   
                    </div>
                    </div>
					<div class="col-md-4">
					<div class="form-group">
                      <label for="exampleInputEmail1">Select Sub Category</label>
					  <div id="pam">
					    <?php
						
						if (isset($readOnly) || !empty($id)) {
							
					$js = 'id="sub_category_id" class= "form-control"';

if (isset($readOnly)) {
                                        $js.= 'disabled';
                                    }
echo form_dropdown('sub_category_id', $get_subcategory_dropdown,$sub_category_id,$js);
						}else{
							
							$js = 'id="sub_category_id" class= "form-control" required';

if (isset($readOnly)) {
                                        $js.= 'disabled';
                                    }
echo form_dropdown('sub_category_id', array(),$sub_category_id,$js);
						}
					  ?>
                    </div>
                    </div>
                    </div>
					 <div class="col-md-4">
				    <div class="form-group">
                      <label for="exampleInputEmail1">Product Name</label>
					  <?php
					
					
$data = array(
              'name'        => 'product_name',
              'id'          => 'product_name',
             'placeholder'=>'Enter Product Name',
              'required'   => 'true',
              'class'        => 'form-control',
			   'value' => $product_name,
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
                      <label for="exampleInputEmail1">Price</label>
					  <?php
					
					
$data = array(
              'name'        => 'price',
              'id'          => 'price',
             'placeholder'=>'Enter Price',
              'required'   => 'true',
              'type'   => 'number',
              'class'        => 'form-control',
			   'value' => $price,
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
                      <label for="exampleInputEmail1">Unit</label>
					  <?php
					
					
$data = array(
              'name'        => 'unit',
              'id'          => 'unit',
             'placeholder'=>'Enter Unit',
              'required'   => 'true',
              'class'        => 'form-control',
			   'value' => $unit,
            );
if (isset($readOnly)) {
                                        $data['readOnly'] = $readOnly;
                                    }
echo form_input($data);
					  ?>
                    
                    </div>
                    </div>
					
					
					 <div class="col-md-4 ">
				    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
					  <?php
					
					
$data = array(
              'name'        => 'description',
              'id'          => 'description',
             'placeholder'=>'Enter Description',
              'required'   => 'true',
              'class'        => 'form-control',
			  'rows'        => '5',
      'cols'        => '10',
			   'value' => $description,
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
                      <label for="exampleInputEmail1">Availability</label>
					 
					 <?php
					$js = 'id="availability" class= "form-control" required';

if (isset($readOnly)) {
                                        $js.= 'disabled';
                                    }
echo form_dropdown('availability', array('Available'=>'Available','Out Of Stock'=>'Out Of Stock'),$availability,$js);
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
				
				<?php include('productgrid.php');?>
				  </section><!-- /.content -->
			 