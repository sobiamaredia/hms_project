
<div id="sidebar" class="sidebar responsive sidebar-fixed sidebar-scroll">
			<!--  <script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script> -->

<?php /*
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<!-- #section:basics/sidebar.layout.shortcuts -->
						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>

						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div> 

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div>
				<!-- /.sidebar-shortcuts --> */ ?>



				<ul class="nav nav-list">
					<li class="">
						<a href="<?php echo site_url().'dashboard';?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo site_url().'bookings';?>">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text"> Bookings </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo site_url().'rooms';?>">
							<i class="menu-icon fa fa-bed"></i>
							<span class="menu-text"> Rooms </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="<?php echo site_url().'guests';?>">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Guests </span>
						</a>

						<b class="arrow"></b>
					</li>
				</ul>



				<script type='text/javascript'>
				$(document).ready(function(){
					var url = window.location.toString();
					$('#sidebar ul.nav li a').each(function(){
						var myHref= $(this).attr('href');
						if( url.match( myHref)) {
							$(this).parent().parent().parent().addClass('active open');
							$(this).parent().addClass('active');
							}

						})
				});
				
                </script>
				

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>