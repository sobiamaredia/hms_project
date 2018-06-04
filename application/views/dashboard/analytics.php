<div class="page-header">
    <h1>
        Dashboard
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            overview &amp; stats
        </small>
    </h1>
</div>

<div class="col-xs-13">
<div class="col-xs-6 alert alert-block alert-success">
    <h4>
        <strong>
        <i class="ace-icon fa fa-bar-chart-o"></i>
            Unique Guest
        </strong>
    </h4>
    <h1><?php echo $totalGuest->guests;?></h1>
</div>
<div class="col-xs-6 alert alert-block alert-info">
    <h4>
        <strong>
        <i class="ace-icon fa fa-signal"></i>
            Total Bookings
        </strong>
    </h4>
    <h1><?php echo $totalReservation->reservations;?></h1>
</div>
</div>