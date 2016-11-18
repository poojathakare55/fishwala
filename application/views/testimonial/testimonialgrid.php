  <script type="text/javascript">
    function delete_record(id)
    {
	msg = "You want to delete Record?";
        if (confirm(msg))
        {
            var url = "<?php echo site_url(); ?>/baang/testimonialdelete/" + id;
            if (window.XMLHttpRequest)
            {
                xmlhttp = new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
            }
            else
            {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
            }
            xmlhttp.open("GET", url, false);
            xmlhttp.send(null);
            return_data = xmlhttp.responseText;

            if (return_data == 1)
            {
                alert('Record Deleted Successfully');
                location.reload();
            }
			else if(return_data=='in-use')
			{
			 alert('This Record is Already In Use.So you cannot delete it.');
                return false;
			}
            else {
                alert('Record not Deleted. Please Try Again.');
                return false;
            }
        }
    }
	function edit_field(id,name){
	
	
$('#id').val(id);
$('#name').val(name);
} // end of function

</script>
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Testimonial
          </h1>
		  
        </section>
		  <!-- Main content -->
        <section class="content">
   <div class="row">
            <div class="col-xs-12">
        <div class="box box-danger">
                
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Client Name</th>
                        <th>Location</th>
                        <th>Description</th>
                       <th class="hidden-350">Actions</th>
                      </tr>
                    </thead>
					<tbody>
					<?php 
					 $select_array = array(
            'table_name' => 'testimonial',
            'table_fields' => '*',
			
        );
       $getdata = $this->baang_model->select_data($select_array);
 if (count($getdata) > 0) {
                                foreach ($getdata as $rows) {
								$id=$rows['id'];
								$name=$rows['name'];
								$location=$rows['location'];
								$description=$rows['description'];
							?>	
                    
                      <tr>
                        <td><?php echo $name;?></td>
                        <td><?php echo $location;?></td>
                        <td><?php echo $description;?></td>
                      <td class="hidden-480 ">
                                            <a href="<?= site_url("baang/testimonialmanage/" . $rows['id']) ?>" class="btn btn-danger" rel="tooltip" title="Edit" data-original-title="View">Edit</a>
                                          <a href="<?= site_url("baang/testimonialview/" . $rows['id']) ?>" class="btn btn-danger" rel="tooltip" title="View" data-original-title="Delete">View</a>
										  
										 <a href="javascript:void(0);" onclick="return delete_record(<?php echo $id; ?>)" class="btn btn-danger" rel="tooltip" title="Delete" data-original-title="Delete">Delete</a>
										
                                        </td>
                      </tr>
					  <?php     }		}
 ?>
              
                    </tbody>
                  
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			   </div>
			    </div>
				  </section><!-- /.content -->
			  <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>