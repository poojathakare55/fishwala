<section class="content">

		  <div class="box box-danger">
                <div class="box-header ui-sortable-handle">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title"><?php echo $get_subcategory_byid;?> for <?php echo date('d/m/Y', strtotime(' +1 day'));?></h3>
                  
                </div><!-- /.box-header -->
                 <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					    <th>Product Name</th>
					   <th>Count</th>
                       
                      </tr>
                    </thead>
					<tbody>
					<?php 
				  $getdata = $this->db->query("select pro.product_name as product_name,sum(p.qty) AS id from product_order_details p left join product pro on pro.id=p.product_id where p.sub_category_id='$sub_category_id' and status='pending' GROUP BY p.product_id ");
 if ($getdata->num_rows() > 0) {
                                foreach ($getdata->result_array() as $rows) {
								$id=$rows['id'];
								$name=$rows['product_name'];
							?>	
                    
                      <tr>
					    <td><?php echo $name;?></td>
					   <td><?php echo $id;?></td>
                      
                       
                      </tr>
					  <?php     }		}
 ?>
              
                    </tbody>
                  
                  </table>
                </div><!-- /.box-body -->
               
              </div>
		  </section>