
 <!-- Content Header (Page header) -->
      
		  <!-- Main content -->
        <section class="content">
   <div class="row">
            <div class="col-md-12">
		
        <div class="box box-danger">
                <div style="cursor: move;" class="box-header ui-sortable-handle">
                  <i class="fa fa-shopping-cart"></i>
                  <h3 class="box-title">Order No. <?php echo $get_order_details_by_id['order_no'];?> / <?php echo $get_order_details_by_id['customer'];?></h3>
                 
                </div>
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					    <th>Category</th>
					    <th>Sub Category</th>
					    <th>Product</th>
					  <th>Qty</th>
                        <th>Days</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Price</th>
                        <th>Status</th>
                       
                      </tr>
                    </thead>
					<tbody>
					<?php 
					$day='7'; 
echo date("l", mktime(0,0,0,8,$day,2011));
					
				  $getdata = $this->db->query("select * from product_order_details where order_id='$orderid' order by id desc");
 if ($getdata->num_rows() > 0) {
	 $fromdate=$todate=$month='';
                                foreach ($getdata->result_array() as $rows) {
								$id=$rows['id'];
								$category_id=$rows['category_id'];
								 $categoryname = $this->baang_model->get_category_byid($category_id);
								$sub_category_id=$rows['sub_category_id'];
								 $subcategoryname = $this->baang_model->get_subcategory_byid($sub_category_id);
								 $product_name=$this->baang_model->get_product_byid($rows['product_id']);
								  $qty=$rows['qty'];
								  $days=$rows['days'];
								  $daysname=$this->baang_model->get_multipledays_bynumber($days);
							
								  if($rows['fromdate']!='0000-00-00')
								  $fromdate=date('d/m/Y',strtotime($rows['fromdate']));
							 
								  
							  
							   if($rows['todate']!='0000-00-00')
								  $todate=date('d/m/Y',strtotime($rows['todate']));
							  
						
							  
								  $price=$rows['price'];
									
								  $status=$rows['status'];
								  if($status=='delivered')
									  $statustext='<span class="label label-success">Delivered</span>';
								  else if($status=='cancelled')
									  $statustext='<span class="label label-danger">Cancelled</span>';
								  else
									   $statustext='<span class="label label-warning">Pending</span>';
							?>	
                    
                      <tr>
					   <td><?php echo $categoryname;?></td>
                        <td><?php echo $subcategoryname;?></td>
                        <td><?php echo $product_name;?></td>
                        <td><?php echo $qty;?></td>
                        <td><?php echo $daysname;?></td>
                        <td><?php echo $fromdate;?></td>
                        <td><?php echo $todate;?></td>
                        <td>Rs. <?php echo $price;?></td>
                        <td><?php echo $statustext;?></td>
                       
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
          "bLengthChange": true,
          "bFilter": true,
          "bSort": false,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>