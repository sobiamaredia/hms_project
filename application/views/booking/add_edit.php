<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if($this->uri->segment(2) == "edit"){
	$url = current_url()."?".$_SERVER['QUERY_STRING'];
}else{
	$url = "bookings/create";
}
$post = $this->input->post();
$booking_id = isset($post["booking_id"]) 	? $post["booking_id"] 	:(isset($booking->bookingID)	? $booking->bookingID 	: NULL);?>
<div class="page-header"><h1><?php echo ucfirst($this->uri->segment(2))." Booking";?></h1></div><?php
echo form_open($url, array('id'=>'bookingForm','name'=>'bookingForm' ,'class'=>'form-horizontal col-xs-offset-1 col-xs-12', 'role'=>'form'), array('booking_id'=>$booking_id));

$this->load->view('booking/form');
?>
    <div class="clearfix">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn btn-info">
			     <i class="ace-icon fa fa-check bigger-110"></i>Save
			</button>
			<button type="reset" class="btn">
			    <i class="ace-icon fa fa-undo bigger-110"></i>Reset
			</button>
			<button type="button" class="btn btn-danger" onclick="goBack()">
			    <i class="ace-icon fa fa-remove bigger-110"></i>Cancel
			</button>
        </div>
    </div>
<?php
echo form_close();
?>
<script>
function goBack() {
    window.history.back();
}
</script>