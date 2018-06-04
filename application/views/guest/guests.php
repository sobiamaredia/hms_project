<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
<div class="page-header"><h1>Guests</h1></div>
<table id="simple-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email Address</th>
			<th>Address</th>
			<th>Contact</th>
			<th>Actions</th>
		</tr>
	</thead>

	<tbody>
	<?php foreach ($guests as $guest){?>
    	<tr>
    	   <td><?php echo $guest->firstName;?></td>
    	   <td><?php echo $guest->lastName;?></td>
    	   <td><?php echo $guest->emailAddress;?></td>
    	   <td><?php echo $guest->address;?></td>
    	   <td><?php echo $guest->phoneNo;?></td>
    	   <td align="center">
    	       <div class="hidden-sm hidden-xs btn-group">
    	           <a class="btn btn-xs btn-info" href="<?php echo site_url('guests/view/'.$guest->guestID);?>">
						<i class="ace-icon fa fa-eye bigger-120"></i>
					</a>
                </div>
    	   </td>
    	</tr>
    	<?php
        }?>
	</tbody>
</table>
