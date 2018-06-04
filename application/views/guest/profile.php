<div class="col-sm-offset-1 col-xs-12 col-sm-2 center">
    <span class="profile-picture">
        <img class="img-responsive" alt="Avatar" id="avatar2" src="<?php echo base_url().'public/image/user.png'; ?>" />
    </span>
</div>
<div class="col-xs-12 col-sm-9" style="margin-bottom:30px;">
    <div class="profile-user-info profile-user-info-striped">
        <div class="profile-info-row">
            <div class="profile-info-name"> Username </div>
            <div class="profile-info-value">
                <i class="fa fa-user grey bigger-110"></i>
                <span  id="username"><?php echo $guest->firstName." ".$guest->lastName; ?></span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Email </div>
            <div class="profile-info-value">
            <i class="fa fa-envelope blue bigger-110"></i>
                <span id="username"><?php echo $guest->emailAddress; ?></span>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name"> Address </div>
            <div class="profile-info-value">
                <i class="fa fa-map-marker light-orange bigger-110"></i>
                <span id="address"><?php echo $guest->address; ?></span>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name"> Phone Number </div>

            <div class="profile-info-value">
                <i class="fa fa-phone green bigger-110"></i>
                <span id="age"><?php echo $guest->phoneNo; ?></span>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name"> Total Visits </div>

            <div class="profile-info-value">
                <i class="fa fa-calendar-check-o purple bigger-110"></i>
                <span id="age"><?php echo $guest_visits->visits; ?></span>
            </div>
        </div>
    </div>
</div>