  <script type="text/javascript">
    function delete_record(id)
    {
	msg = "You want to delete Record?";
        if (confirm(msg))
        {
            var url = "<?php echo site_url(); ?>/baang/service_locationdelete/" + id;
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


</script>
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Service Location
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
					  <th>Location</th>
                        <th>Pincode</th>
                        <th>Status</th>
                        
                       <th class="hidden-350">Actions</th>
                      </tr>
                    </thead>
					<tbody>
					<?php 
				 $getdata = $this->db->query("select * from service_location order by id desc");
 if ($getdata->num_rows() > 0) {
                                foreach ($getdata->result_array() as $rows) {
								$id=$rows['id'];
								$pincode=$rows['pincode'];
								$location=$rows['location'];
								$status=$rows['status'];
							?>	
                    
                      <tr>
					   <td><?php echo $location;?></td>
                        <td><?php echo $pincode;?></td>
                        <td><?php echo $status;?></td>
                       
                      <td class="hidden-480 ">
                                            <a href="<?= site_url("baang/service_locationmanage/" . $rows['id']) ?>"  class="btn btn-danger" rel="tooltip" title="Edit" data-original-title="View">Edit</a>
                                          <a href="<?= site_url("baang/service_locationview/" . $rows['id']) ?>" class="btn btn-danger" rel="tooltip" title="View" data-original-title="Delete">View</a>
										  
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
      
        $('#example1').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bSort": false,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>