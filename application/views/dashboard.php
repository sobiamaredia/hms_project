<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Admin Panel - Hotel Booking</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap-select.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap-datepicker3.css" />
		
		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />


		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->
		
		<script src="<?php echo base_url();?>public/js/jquery1x.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>


		<!-- ace settings handler -->
		<script src="<?php echo base_url(); ?>public/js/ace-extra.js"></script>
		<script src="<?php echo base_url(); ?>public/js/bootstrap-select.min.js"></script>
		

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo base_url(); ?>public/js/html5shiv.js"></script>
		<script src="<?php echo base_url(); ?>public/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<?php $this->load->view('includes/header');?>
		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<?php $this->load->view('includes/sidebar');?>
			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
				        <?php $this->load->view('includes/content_header');?>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php  if(isset($content)){
						                  $this->load->view($content);
					                   } ?>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php $this->load->view('includes/footer');?>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url(); ?>public/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo base_url(); ?>public/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>public/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url(); ?>public/js/bootstrap.js"></script>

		

		<script>
			$(document).ready(function(){
				$('#simple-table').dataTable({
					"paging":   true,
					"ordering": false,
					"info":     true
				});
			});
		</script>
	</body>
</html>
