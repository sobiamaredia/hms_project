<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
<div class="page-header"><h1>Guest Details</h1></div>

<?php $this->load->view('guest/profile'); ?>

<table id="simple-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
            <th>Room Type(s)</th>
            <th>Room Number(s)</th>
			<th>Checkin Date</th>
            <th>Checkout Date</th>
            <th>No. Of Guests</th>
            <th>Special Request</th>
			<th>Status</th>
		</tr>
	</thead>

	<tbody>
	<?php foreach ($guest_details as $guest){?>
    	<tr>
           <td><?php echo $guest->roomType;?></td>
           <td><?php echo $guest->roomNumber;?></td>
    	   <td><?php echo $guest->checkinDate;?></td>
           <td><?php echo $guest->checkoutDate;?></td>
           <td><?php echo $guest->noOfGuests;?></td>
           <td><?php echo $guest->specialRequest;?></td>
		   <?php if(!$guest->reservationIsCancelled){
			   echo '<td><span class="label label-success arrowed-in">Booked</span></td>';
		   }else{
			echo '<td><span class="label label-danger arrowed-in">Cancelled</span></td>';
		   } ?>
    	</tr>
    	<?php
        }?>
	</tbody>
</table>
