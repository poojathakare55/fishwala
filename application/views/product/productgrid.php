  <script type="text/javascript">
    function delete_record(id)
    {
	msg = "You want to delete Record?";
        if (confirm(msg))
        {
            var url = "<?php echo site_url(); ?>/baang/productdelete/" + id;
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
            Manage Products
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
					   <th>Photo</th>
					   <th>Name</th>
					    <th>Category</th>
					    <th>Sub Category</th>
					   
                        <th>Price</th>
                       
                        <th>Unit</th>
                        <th>Description</th>
                        <th>Availability</th>
                       
                       <th class="hidden-350">Actions</th>
                      </tr>
                    </thead>
					<tbody>
					<?php 
				  $getdata = $this->db->query("select * from product order by id asc");
 if ($getdata->num_rows() > 0) {
                                foreach ($getdata->result_array() as $rows) {
								$id=$rows['id'];
								
								$photo=$rows['photo'];
								$product_name=$rows['product_name'];
								$category_id=$rows['category_id'];
								 $categoryname = $this->baang_model->get_category_byid($category_id);
								$sub_category_id=$rows['sub_category_id'];
								 $subcategoryname = $this->baang_model->get_subcategory_byid($sub_category_id);
								  $price=$rows['price'];
								  $unit=$rows['unit'];
								  $description=$rows['description'];
								  $availability=$rows['availability'];
							?>	
                    
                      <tr>
					   <td><img src="<?php echo base_url()?>images/product/<?php echo $photo;?>" alt="" width="60" id="selectedphoto"></td>
					  <td><?php echo $product_name;?></td>
                        <td><?php echo $categoryname;?></td>
                        <td><?php echo $subcategoryname;?></td>
                       
						  <td><?php echo $price;?></td>
                        <td><?php echo $unit;?></td>
                        <td><?php echo $description;?></td>
                        <td><?php echo $availability;?></td>
                       
                      <td class="hidden-480 ">
                                            <a href="<?= site_url("baang/productmanage/" . $rows['id']) ?>"  class="btn btn-danger" rel="tooltip" title="Edit" data-original-title="View">Edit</a>
                                          <a href="<?= site_url("baang/productview/" . $rows['id']) ?>" class="btn btn-danger" rel="tooltip" title="View" data-original-title="Delete">View</a>
										  
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