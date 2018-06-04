<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
<div class="page-header"><h1>Bookings</h1></div>
<div><a class="btn btn-info" href="<?php echo site_url();?>bookings/create"><i class="fa fa-plus white"></i>Create Booking</a></div>
<br>
<table id="simple-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>Guest Name</th>
            <th>Room Type(s)</th>
            <th>Room Number(s)</th>
			<th>Checkin Date</th>
            <th>Checkout Date</th>
            <th>No. Of Guests</th>
            <th>Special Request</th>
			<th>Status</th>
			<th>Actions</th>
		</tr>
	</thead>

	<tbody>
	<?php foreach ($bookings as $booking){?>
    	<tr>
    	   <td><?php echo $booking->firstName." ".$booking->lastName;?></td>
           <td><?php echo $booking->roomType;?></td>
           <td><?php echo $booking->roomNumber;?></td>
    	   <td><?php echo $booking->checkinDate;?></td>
           <td><?php echo $booking->checkoutDate;?></td>
           <td><?php echo $booking->noOfGuests;?></td>
           <td><?php echo $booking->specialRequest;?></td>
		   <?php if(!$booking->reservationIsCancelled){
			   echo '<td><span class="label label-success arrowed-in">Booked</span></td>';
		   }else{
			echo '<td><span class="label label-danger arrowed-in">Cancelled</span></td>';
		   } ?>
		   
    	   <td align="center">
    	       <div class="hidden-sm hidden-xs btn-group">
    	           <a class="btn btn-xs btn-info" href="<?php echo site_url('bookings/edit/'.$booking->reservationID);?>">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</a>

					<a class="btn btn-xs btn-danger" href="<?php echo site_url('bookings/cancel/'.$booking->reservationID);?>">
						<i class="ace-icon fa fa-trash-o bigger-120"></i>
					</a>
				<div class="hidden-sm hidden-xs btn-group">
    	   </td>
    	</tr>
    	<?php
        }?>
	</tbody>
</table>
