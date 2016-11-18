<section class="content">

		  <div class="box box-danger">
                <div class="box-header ui-sortable-handle">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title"><?php echo $category_name;?></h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="todo-list ui-sortable">
                   <?php if(!empty($get_subcategory_for_dashboard)){
	foreach($get_subcategory_for_dashboard as $row){
	?>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $row['sub_category_id'];?></h3>
                  <p><?php echo $row['sub_category_name'];?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo site_url();?>/baang/subcategory/<?php echo $row['id'];?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              
              </div>
            </div><!-- ./col -->
<?php }} ?>
                   
                   
                  </ul>
                </div><!-- /.box-body -->
               
              </div>
		  </section>