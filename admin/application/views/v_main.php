<!DOCTYPE html>
<?php
if (isset($this->session->userdata['logged_in_admin_panel'])) {
   $username = ($this->session->userdata['logged_in_admin_panel']['username']);
  $userid = ($this->session->userdata['logged_in_admin_panel']['userid']);
}
$usertype=strtolower($get_user_details['usertype']);
?>
<html>
  <head>
    <meta charset="UTF-8">
	
	
    <title>Fish Admin Panel</title>
	
		
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url();?>assets/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?php echo base_url();?>assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="<?php echo base_url();?>assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
  <!-- DATA TABLES -->
    <link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js">

</script>
<!-- code for autocompletion-->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
 

  </head>
  <body class="skin-red-light sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo site_url();?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">Admin</span>
          <!-- logo for regular state and mobile devices -->
         <b>Fish Admin</b>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
           
          
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="glyphicon glyphicon-user"></i>
                  <span class="hidden-xs"><?php echo $username;?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-footer">
                  
                    <div class="pull-right">
                      <a href="<?php echo site_url();?>/baang/changepasswordform" class="btn btn-default btn-flat">Change Password</a>
                    </div> 
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                  
                    <div class="pull-right">
                      <a href="<?php echo site_url();?>/baang/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div> 
                  </li>
				
                </ul>
              </li>
            
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="active treeview">
              <a href="<?php echo site_url();?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            
            </li>
          
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Master</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
			  <li><a href="<?php echo site_url();?>/baang/testimonialmanage"><i class="fa fa-circle-o"></i> Testimonial</a></li>
			  <li><a href="<?php echo site_url();?>/baang/categorymanage"><i class="fa fa-circle-o"></i> Category</a></li>
			  <li><a href="<?php echo site_url();?>/baang/sub_categorymanage"><i class="fa fa-circle-o"></i> Sub-Category</a></li>
			  <li><a href="<?php echo site_url();?>/baang/service_locationmanage"><i class="fa fa-circle-o"></i> Service Location</a></li>
			  <li><a href="<?php echo site_url();?>/baang/employeemanage"><i class="fa fa-circle-o"></i> Employee Details</a></li>
			 </ul>
            </li>
			
			 <li class="active treeview">
              <a href="<?php echo site_url();?>/baang/productmanage">
                <i class="fa fa-laptop"></i>
                <span>Product Details</span>
              </a>
               
            </li>
			
			 
			 <li class="active treeview">
              <a href="<?php echo site_url();?>/baang/customergrid">
                <i class="fa fa-user"></i>
                <span>Customer</span>
				
                <i class="fa fa-angle-left pull-right"></i>
				
				<small class="label pull-right bg-green"><?php echo $get_new_customer_count;?></small>
				
              </a>
            </li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Order</span>
				
                <i class="fa fa-angle-left pull-right"></i>
				<?php if($get_new_order_count>0){?>
				<small class="label pull-right bg-green"><?php echo $get_new_order_count;?></small>
				<?php } ?>
              </a>
               <ul class="treeview-menu">
			  <li><a href="<?php echo site_url();?>/baang/newordergrid"><i class="fa fa-circle-o"></i> New Order </a></li>
			  <li><a href="<?php echo site_url();?>/baang/cancelordergrid"><i class="fa fa-circle-o"></i> Cancelled Order</a></li>
			 </ul>
            </li>
			 <li class="active treeview">
              <a href="<?php echo site_url();?>/baang/walletgrid">
                <i class="fa fa-laptop"></i>
                <span>Wallet</span>
              </a>
               
            </li>
			
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
<div id="walletmodal" class="modal fade" role="dialog">
  
</div>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
	  
	    <?php 
		
include $view_file;
?>
    </div><!-- /.content-wrapper -->
    
      
      <!-- Control Sidebar -->      
      <aside class="control-sidebar control-sidebar-dark">                
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
       
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url();?>assets/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url();?>assets/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url();?>assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
	
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url();?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/dist/js/app.min.js" type="text/javascript"></script>    
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url();?>assets/dist/js/pages/dashboard.js" type="text/javascript"></script>    
    
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>assets/dist/js/demo.js" type="text/javascript"></script>
	  <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
	 <!-- page script -->
    <script>
	function shippingdetails(order_id){
	
	 $.ajax({
type: "GET",
url:"<?php echo site_url();?>/baang/shippingdetails",
data:{order_id:order_id},
dataType: 'json',
success: function(data){
	
	$("#walletmodal").html(data['popup']);
	  $('#walletmodal').modal('show');
},

});

 }
	 $("#changepasswordform").submit(function(e)
	{
		var changepassword=$("#changepassword").val();
		var repeatpassword=$("#repeatpassword").val();
		if(changepassword==repeatpassword){
			return true;
		}else{
			alert("Password Not Matched");
			return false;
		}
	});
	</script>
  </body>
</html>