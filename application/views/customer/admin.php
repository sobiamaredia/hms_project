<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
<div class="page-header"><h1>Claims</h1></div>
<table id="simple-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email Address</th>
			<th>Address</th>
			<th>Contact</th>
			<th>Status</th>
			<th>Actions</th>
		</tr>
	</thead>

	<tbody>
	<?php foreach ($customers as $customer){?>
    	<tr>
    	   <td><?php echo $customer['FirstName'];?></td>
    	   <td><?php echo $customer['LastName'];?></td>
    	   <td><?php echo $customer['EmailAddress'];?></td>
    	   <td><?php echo $customer['Address'];?></td>
    	   <td><?php echo $customer['Contact'];?></td>
    	   <td align="center"><?php echo $customer['Status'] == 1 ? '<i class="fa fa-check fa-lg green"></i>' : '<i class="fa fa-check fa-lg gray"></i>';?></td>
    	   <td align="center">
    	       <div class="hidden-sm hidden-xs btn-group">
    	           <a class="btn btn-xs btn-info" href="<?php echo site_url('admin/customer/edit/'.$customer['CustomerID']);?>">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</a>

					<a class="btn btn-xs btn-danger" href="<?php echo site_url('admin/customer/delete/'.$customer['CustomerID']);?>">
						<i class="ace-icon fa fa-trash-o bigger-120"></i>
					</a>
				<div class="hidden-sm hidden-xs btn-group">
    	   </td>
    	</tr>
    	<?php
        }?>
	</tbody>
</table>
