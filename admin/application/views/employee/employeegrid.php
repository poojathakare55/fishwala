  <script type="text/javascript">
    function delete_record(id)
    {
	msg = "You want to delete Record?";
        if (confirm(msg))
        {
            var url = "<?php echo site_url(); ?>/baang/employeedelete/" + id;
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
            Manage Employees
          </h1>
		  
        </section>
		  <!-- Main content -->
        <section class="content">
   <div class="row">
            <div class="col-xs-12">
        <div class="box box-danger">
                
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					   <th>Name</th>
					   <th>Email ID</th>
					    <th>Contact No.</th>
					    <th>Address</th>
					   <th>Username</th>
					   <th>User Type</th>
                       
                       <th class="hidden-350">Actions</th>
                      </tr>
                    </thead>
					<tbody>
					<?php 
				  $getdata = $this->db->query("select * from employee order by id asc");
 if ($getdata->num_rows() > 0) {
                                foreach ($getdata->result_array() as $rows) {
								$id=$rows['id'];
								
								$name=$rows['name'];
								$emailid=$rows['emailid'];
								$contactno=$rows['contactno'];
								$address=$rows['address'];
								  $username=$rows['username'];
								  $usertype=$rows['usertype'];
							?>	
                    
                      <tr>
					  <td><?php echo $name;?></td>
                        <td><?php echo $emailid;?></td>
                        <td><?php echo $contactno;?></td>
                        <td><?php echo $address;?></td>
                        <td><?php echo $username;?></td>
                        <td><?php echo $usertype;?></td>
                       
                      <td class="hidden-480 ">
                                            <a href="<?= site_url("baang/employeemanage/" . $rows['id']) ?>"  class="btn btn-danger" rel="tooltip" title="Edit" data-original-title="View">Edit</a>
                                          <a href="<?= site_url("baang/employeeview/" . $rows['id']) ?>" class="btn btn-danger" rel="tooltip" title="View" data-original-title="Delete">View</a>
										  
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