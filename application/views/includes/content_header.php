<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
    <!--   <script type="text/javascript">
    	try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
    </script> -->
    
    <ul class="breadcrumb">
    	<li>
    		<i class="ace-icon fa fa-home home-icon"></i>
    		<a href="<?php echo site_url(); ?>dashboard">Home</a>
    	</li>
    	<li>
    		<?php echo ($this->uri->segment(2) !="")? ucfirst($this->uri->segment(2)):ucfirst($this->uri->segment(2)); ?>
    	</li>
    	<?php if($this->uri->segment(3)!=null){?>
    	<li class="active"><?php echo ucfirst($this->uri->segment(3));  ?></li> <?php }?>
    	
    </ul><!-- /.breadcrumb -->
    
    <!-- #section:basics/content.searchbox -->
    <div class="nav-search" id="nav-search">
    	<form class="form-search">
    		<span class="input-icon">
    			<!-- <input onkeyup="searchTable()" type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
    			<i class="ace-icon fa fa-search nav-search-icon"></i> -->
    		</span>
    	</form>
    </div><!-- /.nav-search -->
    
    <!-- /section:basics/content.searchbox -->
</div>
