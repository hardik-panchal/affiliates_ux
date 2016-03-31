<h3>
    Transportation Summary
</h3>
<hr>
<iframe src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyC035j8p08EU6Kc0XTeSdoQd6611D_Pz7Y&amp;origin=<?php echo $_REQUEST['fields']['pickStagging']; ?>&amp;destination=<?php echo $_REQUEST['fields']['drop']; ?>&zoom=10" id="map_11273" style="border:0px;position:relative;top:5px;bottom:5px;width:100%; height: 500px;margin-bottom:5px;">
</iframe>
<hr/>
<div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
    <i class="fa fa-user fa-4x" style="color:#8ABD0D;"></i><br/>
    <?php echo $_REQUEST['fields']['pickStagging']; ?>
</div>


<div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
    <i class="fa fa-arrow-right fa-4x" style="color:gray; " ></i><br/>
    Loading time : <?php echo $loadingH . ":" . $loadingM . ":" . $loadingS; ?>
</div>

<div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
    <i class="fa fa-bus fa-4x" style="color:#8ABD0D; " ></i><br/>
    Travelling time : <?php echo $travelH . ":" . $travelM; ?>
</div>
<div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
    <i class="fa fa-plus fa-4x" style="color:maroon; " ></i><br/>
    Stagging : <?php echo $staggingH . ":" . $staggingM; ?>
</div>
<div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
    <i class="fa fa-arrow-right fa-4x" style="color:gray; " ></i><br/>
    Unloading time : <?php echo $unloadingH . ":" . $unloadingM . ":" . $unloadingS; ?>
</div>


<div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
    <i class="fa fa-user fa-4x" style="color:#8ABD0D; " ></i><br/>
    <?php echo $_REQUEST['fields']['drop']; ?>
</div>
<div style="clear: both;"></div>

<div  class="col-lg-12" style="text-align: center;font-weight: bold;font-size: 20px;color:8a8a8a;margin-top: 15px;">
    <?php
    $hour = $unloadingH + $staggingH + $travelH + $loadingH;
    $min = $unloadingM + $staggingM + $travelM + $loadingM;
    $sec = $unloadingS + $loadingS;

    if ($sec >= 60) {
        $temp = $sec % 60;
        $min+= floor($sec / 60);
        $sec = $temp;
    }
    if ($min >= 60) {
        $temp = $min % 60;
        $hour+= floor($min / 60);
        $min = $temp;
    }
    ?>
    Total time required for one trip :  <?php echo $hour . ":" . $min . ":" . $sec; ?>
</div>


<div style="clear: both;"></div> 
<hr>
<div class="col-lg-4">
    <div style="float: left;font-weight: bold;text-align: center;border: 1px dotted #DADADA;width: 100%;padding: 5px;background-color:gray;color: white;" >
        <i class="fa fa-group fa-4x" style="color:white;"></i><br/>
        Total Passenger : <?php echo $_REQUEST['fields']['Passenger']; ?>
    </div>
</div>
<div class="col-lg-4">
    <div style="float: left;font-weight: bold;text-align: center;border: 1px dotted #DADADA;width: 100%;padding: 5px;background-color: gray;color: white;" >

        <i class="fa fa-arrows-h fa-4x" style="color:white;"></i><br/>
        Distance : <?php echo $distance; ?>
    </div>
</div>
<div class="col-lg-4">
    <div style="float: left;font-weight: bold;text-align: center;border: 1px dotted #DADADA;width: 100%;padding: 5px;background-color: gray;color: white; " >
        <i class="fa fa-bus fa-4x" style="color:white; " ></i><br/>
        # Trips : <?php echo $roundTrip ?>
    </div>
</div>
<div style="clear: both;"></div> 
<hr>
<div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
    <i class="fa fa-user fa-4x" style="color:#8ABD0D;"></i><br/>
    <?php echo $_REQUEST['fields']['pickStagging']; ?>
</div>


<div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
    <i class="fa fa-arrow-right fa-4x" style="color:gray; " ></i><br/>
    Loading time : <?php echo $totalLHour . ":" . $totalLMin . ":" . $totalLSec ?>
</div>

<div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
    <i class="fa fa-bus fa-4x" style="color:#8ABD0D; " ></i><br/>
    Travelling time : <?php echo $totalTH . ":" . $totalTM; ?>
</div>
<div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
    <i class="fa fa-plus fa-4x" style="color:maroon; " ></i><br/>
    Stagging : <?php echo $totalSH . ":" . $totalSM; ?>
</div>
<div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
    <i class="fa fa-arrow-right fa-4x" style="color:gray; " ></i><br/>
    Unloading time : <?php echo $totalULHour . ":" . $totalULMin . ":" . $totalULSec; ?>
</div>


<div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
    <i class="fa fa-user fa-4x" style="color:#8ABD0D; " ></i><br/>
    <?php echo $_REQUEST['fields']['drop']; ?>
</div>
<div fa-3x style="clear: both;"></div>

<div  class="col-lg-12" style="text-align: center;font-weight: bold;font-size: 20px;color:8a8a8a;margin-top: 15px;">
    <?php
    $hour = $totalULHour + $totalSH + $totalTH + $totalLHour;
    $min = $totalULMin + $totalSM + $totalTM + $totalLMin;
    $sec = $totalULSec + $totalLSec;

    if ($sec >= 60) {
        $temp = $sec % 60;
        $min+= floor($sec / 60);
        $sec = $temp;
    }
    if ($min >= 60) {
        $temp = $min % 60;
        $hour+= floor($min / 60);
        $min = $temp;
    }
    ?>
    Total time required for transportation :  <?php echo $hour . ":" . $min . ":" . $sec; ?>
</div>
<div style="clear: both;"></div>
<hr>
