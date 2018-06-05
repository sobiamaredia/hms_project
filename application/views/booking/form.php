<?php if(isset($this->error_message)){
    echo form_label($this->error_message,'',array('class'=>'help-block', 'style'=>'text-align:center;color:red;'));
}?>
<div class="form-group">
    <label class="col-sm-2 control-label no-padding-right" for="role"> Select Guest </label>
    <div class="col-xs-12 col-sm-5">
    <input type="hidden" name="guest_id" value="<?php echo isset($booking) ? $booking->guestID : ''; ?>" />
        <select name="guest" class="form-control"  <?php echo isset($booking) ? 'disabled' : ''; ?> required>
                <option value="">Select Guest</option>
            <?php 
            foreach($guests as $guest){?>
                <option value="<?php echo $guest->guestID ?>" <?php echo (isset($booking) && $booking->guestID == $guest->guestID) || (isset($_POST['guest']) && $_POST['guest'] == $guest->guestID) ? 'selected' : ''; ?>><?php echo $guest->firstName.' '.$guest->lastName;?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <?php  echo form_error('guest', '<div class="form-group has-error"><label class="help-block col-xs-offset-2 col-xs-12">', '</div></label>'); ?>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label no-padding-right" for="role"> Select Date </label>
    <div class="col-xs-12 col-sm-5">
        <div class="input-daterange input-group">
            <input type="text" class="form-control" name="fromDate" id="fromDate" placeholder = "From Date" required value="<?php if(isset($_POST["fromDate"])) { echo $_POST["fromDate"];} elseif(isset($booking)) {echo $booking->checkinDate;} ?>"/>
            <span class="input-group-addon">
                <i class="fa fa-exchange"></i>
            </span>
            
            <input type="text" class="form-control" name="toDate" id="toDate" placeholder = "To Date" required value="<?php if(isset($_POST["toDate"])) { echo $_POST["toDate"];} elseif(isset($booking)) {echo $booking->checkoutDate;} ?>"/>
            <span class="input-group-btn">
            <button type="button" class="btn btn-purple btn-sm" id="searchRoom">
                <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
            </button>
        </div>

    </div>
    
    <?php  echo form_error('fromDate', '<div class="form-group has-error"><label class="help-block col-xs-offset-2 col-xs-12">', '</div></label>'); ?>
    <?php  echo form_error('toDate', '<div class="form-group has-error"><label class="help-block col-xs-offset-2 col-xs-12">', '</div></label>'); ?>
</div>

<div class="form-group">
      <label class="col-sm-2 control-label no-padding-right">Select Room(s):</label>
      <div class="col-xs-12 col-sm-5">
          <select class="selectpicker form-control" id="rooms" name="rooms[]" multiple  required >
              <?php $booking_rooms = isset($_POST['rooms']) ? $_POST['rooms'] : isset($booking) ? explode(', ',$booking->roomID) : array();
              $rooms = array_merge($booked_rooms, $rooms);
              foreach($rooms as $room){?>
              <option value="<?php echo $room->roomID;?>" <?php if(in_array($room->roomID,$booking_rooms)){echo "selected";}?> ><?php echo $room->roomNumber.' ('.$room->roomType.')'; ?></option><?php
            }?>
          </select>
        </div>
        <?php  echo form_error('rooms', '<div class="form-group has-error"><label class="help-block col-xs-offset-2 col-xs-12">', '</div></label>'); ?>
  </div>

  <div class="form-group">
   <label for="full_name" class="col-sm-2 control-label no-padding-right">No. of Guests</label>
     <div class="col-xs-12 col-sm-5">
        <input class="width-100" type="number" min="1"  class="col-xs-10 col-sm-5" name="no_guest" value="<?php if(isset($_POST["no_guest"])) { echo $_POST["no_guest"];} elseif(isset($booking)) {echo $booking->noOfGuests;} ?>"/>
     </div>
     <?php  echo form_error('no_guest', '<div class="form-group has-error"><label class="help-block col-xs-offset-2 col-xs-12">', '</div></label>'); ?>	
</div>

<div class="form-group">
   <label for="full_name" class="col-sm-2 control-label no-padding-right">Special Request</label>
     <div class="col-xs-12 col-sm-5">
        <textarea  class="width-100" class="col-xs-10 col-sm-5" name="special_req"><?php if(isset($_POST["special_req"])) { echo $_POST["special_req"];} elseif(isset($booking)) {echo $booking->specialRequest;} ?></textarea>
     </div>	
</div>

<script src="<?php echo base_url(); ?>public/js/date-time/bootstrap-datepicker.js"></script>
<script>
	$('.input-daterange').datepicker({format: 'yyyy-mm-dd',autoclose: true});
    $('.selectpicker').selectpicker({
        style: 'btn-info',
        size: 4
        });

    $('#searchRoom').click(function(){
        var toDate = $('#toDate').val();
        var fromDate = $('#fromDate').val();
        var booking_fromDate = '<?php echo isset($booking) ? $booking->checkinDate : ''; ?>';
        var booking_toDate = '<?php echo isset($booking) ? $booking->checkoutDate : ''; ?>';
        var booked_rooms = <?php echo isset($booked_rooms) ? json_encode($booked_rooms): json_encode([]);?>;
        if(toDate !='' && fromDate !='' ){
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('rooms/ajaxGetRooms');?>",
                data: "fromDate="+fromDate+"&toDate="+toDate,
                success: function (response) {
                    var obj_json = JSON.parse(response);
                    $('#rooms').empty();
                    if(fromDate >= booking_fromDate && toDate <= booking_toDate ){
                        if(booked_rooms.length > 0){
                            $.each(booked_rooms, function(i, data){
                                $('#rooms').append($('<option>').text(data.roomNumber+' ('+data.roomType+')').attr('value', data.roomID).attr('selected','selected'));
                            });
                        }
                    }
                    
                    $.each(obj_json, function(i, data){
                        $('#rooms').append($('<option>').text(data.roomNumber+' ('+data.roomType+')').attr('value', data.roomID));
                    });
                    
                   
                    $('#rooms').selectpicker('refresh');

                }
            });
        }
        return false;
    })
</script>