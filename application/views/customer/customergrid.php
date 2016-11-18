<script>
function validatecheckboxappoint(){
	var checkedNum = $('input[name="deletechk[]"]:checked').length;
	
if (!checkedNum) {
   alert("Please Select Record For Delete");
   return false;
}else{
	var r = confirm("Do You Want To Delete?");
	if (r == true) {
    return true;
} else {
     return false;
}
}

	//return true;
	}
</script>
 <!-- Content Header (Page header) -->
      
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
                <div style="cursor: move;" class="box-header ui-sortable-handle">
                  <i class="fa fa-user"></i>
                  <h3 class="box-title">Customer</h3>
                 
                </div>
                <div class="box-body table-responsive">
				 <?php
              $attributes = array('id' => 'myform');

echo form_open('baang/deletecustomer', $attributes);?>
<button type="submit" class="btn btn-primary" onclick="return validatecheckboxappoint();">Delete</button>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					    <th>Select</th>
					    <th>Name</th>
					   <th>Email ID</th>
					    <th>Address</th>
					    <th>Pin Code</th>
					   <th>Contact No.</th>
                        <th>Date Of Birth</th>
                       
                      </tr>
                    </thead>
					<tbody>
					<?php 
				  $getdata = $this->db->query("select * from customer order by id desc");
 if ($getdata->num_rows() > 0) {
                                foreach ($getdata->result_array() as $rows) {
								$id=$rows['id'];
								$name=$rows['name'];
								$emailid=$rows['emailid'];
								$address=$rows['address'];
								$pincode=$rows['pincode'];
								 $contactno=$rows['contactno'];
								  $dob=$rows['dob'];
							?>	
                    
                      <tr>
					   <td>
					   <label>
                        <input type="checkbox" name="deletechk[]" id="deletechk" class="case" value='<?php echo $id;?>'>
                      </label>
					   </td>
					    <td><?php echo $name;?></td>
					   <td><?php echo $emailid;?></td>
                        <td><?php echo $address;?></td>
                        <td><?php echo $pincode;?></td>
                        <td><?php echo $contactno;?></td>
                        <td><?php echo $dob;?></td>
                      
                       
                      </tr>
					  <?php     }		}
 ?>
              
                    </tbody>
                  
                  </table>
				   <?php echo form_close();?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			   </div>
			    </div>
				  </section><!-- /.content -->
			  <script type="text/javascript">
      $(function () {
       
        $('#example1').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": false,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>