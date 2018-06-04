<?php if(isset($this->error_message)){
			echo form_label($this->error_message,'',array('class'=>'help-block', 'style'=>'text-align:center;color:red;'));
		}?>
<div class="form-group">
    <label class="col-sm-2 control-label no-padding-right" for="role"> First tName </label>
    <div class="col-xs-12 col-sm-5">
        <input class="width-100" type="text" id="first_name" placeholder="First Name" class="col-xs-10 col-sm-5" name="first_name" value="<?php if(isset($_POST["first_name"])) { echo $_POST["first_name"];} else if(isset($customer)) {echo $customer["FirstName"];} ?>"/>
    </div>
    <?php  echo form_error('first_name', '<div class="form-group has-error"><label class="help-block col-xs-offset-2 col-xs-12">', '</div></label>'); ?>
</div>
<div class="form-group">
   <label for="full_name" class="col-sm-2 control-label no-padding-right">Last Name</label>
     <div class="col-xs-12 col-sm-5">
        <input class="width-100" type="text" id="last_name" placeholder="Last Name" class="col-xs-10 col-sm-5" name="last_name" value="<?php if(isset($_POST["last_name"])) { echo $_POST["last_name"];} elseif(isset($customer)) {echo $customer["LastName"];} ?>"/>
     </div>
     <?php  echo form_error('last_name', '<div class="form-group has-error"><label class="help-block col-xs-offset-2 col-xs-12">', '</div></label>'); ?>
			
</div>
<div class="form-group">
   <label for="email_address" class="col-sm-2 control-label no-padding-right">Email Address</label>
     <div class="col-xs-12 col-sm-5">
        <input class="width-100" type="email" id="email_address" placeholder="john@abc.com" class="col-xs-10 col-sm-5" name="email_id" value="<?php if(isset($_POST["email_id"])) { echo $_POST["email_id"];} elseif(isset($customer)) {echo $customer["EmailAddress"];} ?>" <?php echo isset($customer) ? 'readonly' : '';?>/>
     </div>
     <?php  echo form_error('email_id', '<div class="form-group has-error"><label class="help-block col-xs-offset-2 col-xs-12">', '</div></label>'); ?>
			
</div>
<div class="form-group">
   <label for="address" class="col-sm-2 control-label no-padding-right">Address</label>
     <div class="col-xs-12 col-sm-5">
        <textarea class="width-100" class="col-xs-10 col-sm-5" id="address" name="address" placeholder="Address"><?php if(isset($_POST["address"])) { echo $_POST["address"];} elseif(isset($customer)) {echo $customer["Address"];} ?></textarea>
     </div>
     <?php  echo form_error('address', '<div class="form-group has-error"><label class="help-block col-xs-offset-2 col-xs-12">', '</div></label>'); ?>
</div>
<div class="form-group">
   <label for="contact" class="col-sm-2 control-label no-padding-right">Contact Number</label>
     <div class="col-xs-12 col-sm-5">
        <input class="width-100" type="text" id="contact" placeholder="Contact Number" class="col-xs-10 col-sm-5" name="contact" value="<?php if(isset($_POST["contact"])) { echo $_POST["contact"];} elseif(isset($customer)) {echo $customer["Contact"];} ?>"/>
     </div>
     <?php  echo form_error('contact', '<div class="form-group has-error"><label class="help-block col-xs-offset-2 col-xs-12">', '</div></label>'); ?>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label no-padding-right" for="status"> Status </label>
    <div class="col-xs-12 col-sm-5">
        <label class="col-sm-3">
            <input type="checkbox" value="1" class="ace ace-switch ace-switch-6" name="status" <?php if(isset($customer['Status']) && $customer['Status']==1){ echo "checked";}?>>
            <span class="lbl"></span>
        </label>
    </div>
</div>
