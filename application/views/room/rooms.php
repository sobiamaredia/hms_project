<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/daterangepicker.css" />

<div class="page-header"><h1>Rooms</h1></div>
<form method="post" name="searchForm" action="">
	
<label>Select From and To Date to find available rooms</label>
<div class="row">
	<div class="col-xs-5">
		<div class="input-daterange input-group">
			<input type="text" class="form-control" name="fromDate" placeholder = "From Date"/>
			<span class="input-group-addon">
				<i class="fa fa-exchange"></i>
			</span>
			<input type="text" class="form-control" name="toDate" placeholder = "To Date"/>
			<span class="input-group-btn">
				<button type="submit" class="btn btn-purple btn-sm">
					<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
					Search
				</button>
			</span>
		</div>
		
	</div>
	
</div>
</form><br><br>


<table id="simple-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>Room Number</th>
			<th>Room Type</th>
			<th>Booking Status</th>
			<!-- <th>Actions</th> -->
		</tr>
	</thead>

	<tbody>
	<?php foreach ($rooms as $room){?>
    	<tr>
    	   <td><?php echo $room->roomNumber;?></td>
    	   <td><?php echo $room->roomType;?></td>
    	   <td><?php echo $room->bookingStatus;?></td>
    	   <!-- <td align="center">
    	       <div class="hidden-sm hidden-xs btn-group">
    	           <a class="btn btn-xs btn-info" href="<?php // echo site_url('rooms/edit/'.$room->roomID);?>">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</a>

					<a class="btn btn-xs btn-danger" href="<?php // echo site_url('rooms/delete/'.$room->roomID);?>">
						<i class="ace-icon fa fa-trash-o bigger-120"></i>
					</a>
				<div class="hidden-sm hidden-xs btn-group">
    	   </td> -->
    	</tr>
    	<?php
        }?>
	</tbody>
</table>
<script src="<?php echo base_url(); ?>public/js/date-time/bootstrap-datepicker.js"></script>
<script>
	$('.input-daterange').datepicker({format: 'yyyy-mm-dd',autoclose: true});
</script>



