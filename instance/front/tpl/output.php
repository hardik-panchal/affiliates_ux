
<h3>
    Transportation Summary
</h3>

<div  class="col-lg-12" style="width: 100%;padding: 15px;background-color: #93C616;color: white;text-align: center;font-weight: bold;font-size: 20px;color:8a8a8a;margin-top: 15px;">
    Total Time Needed For Flawless Transportation   <?php echo number_format($hour) . "hr " . $min . "min "; ?>
</div>

<div style="width: 100%;cursor: pointer;text-align: center;color:8a8a8a;padding: 10px;">
    <div id="more" class="btn btn-sm btn-default" style="background-color: #93C616;color: white;border-radius: 0px;font-weight: bold;">View More Detail</div>
</div>
<hr style="margin: 0px;">
<iframe src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyC035j8p08EU6Kc0XTeSdoQd6611D_Pz7Y&amp;origin=<?php echo $_REQUEST['fields']['pickStagging']; ?>&amp;destination=<?php echo $_REQUEST['fields']['drop']; ?>&zoom=10" id="map_11273" style="border:0px;position:relative;top:5px;bottom:5px;width:96%; height: 500px;margin-bottom:5px;margin:  0px 20px;">
</iframe>
<div style="clear: both;"></div> 
<div id="scrollView" style="display: none;">
    <hr>

    <div class="row" style="width: 100%;">
        <div style="width: 31%;float: left;margin: 2px;margin-left: 3%;">
            <div style="float: left;padding: 15px;font-weight: bold;text-align: center;border: 1px dotted #DADADA;width: 100%;padding: 5px;background-color:gray;color: white;" >
                <i class="fa fa-group fa-4x" style="color:white;"></i><br/>
                Total Passengers : <?php echo $_REQUEST['fields']['Passenger']; ?>
            </div>
        </div>
        <div style="width: 31%;float: left;margin: 2px 15px;">
            <div style="float: left;font-weight: bold;text-align: center;border: 1px dotted #DADADA;width: 100%;padding: 5px;background-color: gray;color: white;" >
                <i class="fa fa-arrows-h fa-4x" style="color:white;"></i><br/>
                Distance : <?php echo $distance; ?>
            </div>
        </div>
        <div style="width: 31%;float: left;margin: 2px;">
            <div style="float: left;font-weight: bold;text-align: center;border: 1px dotted #DADADA;width: 100%;padding: 5px;background-color: gray;color: white; " >
                <i class="fa fa-bus fa-4x" style="color:white; " ></i><br/>
                # Vehicles : <?php echo $vehicle ?>
            </div>
        </div>
        <div style="clear: both;"></div> 
    </div> 
    <div style="clear: both;"></div> 

    <?php
    for ($i = 1; $i <= $TotalTrip; $i++) {
        if ($i % 2 != 0) {
            $loadingH = '00';
            $loadingM = '00';
            $loadingS = '00';
            $unloadingH = '00';
            $unloadingM = '00';
            $unloadingS = '00';
            $staggingH = '00';
            $staggingM = '00';
            ?>

            <hr/>
            <div style="border-bottom: 5px solid #8ABD0D;
                 color: #8abd0d;
                 font-size: 18px;
                 font-weight: bold;
                 margin-bottom: 10px;
                 padding: 10px;">
                Trip <?php echo $i; ?>
            </div>
            <div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
                <i class="fa fa-user fa-4x" style="color:#8ABD0D;"></i><br/>
                <?php echo $_REQUEST['fields']['pickStagging']; ?>
            </div>

            <?php
            if ($paxRmaining > $paxCapacity) {
                $paxTransfer = $paxCapacity;
            } else {
                $paxTransfer = $paxRmaining;
            }

            $paxL = explode(":", $_REQUEST['fields']['paxLoad']);
            $loadingH+=$paxL[0] * $paxTransfer;
            $loadingM+=$paxL[1] * $paxTransfer;
            $loadingS+=$paxL[2] * $paxTransfer;

            $luggL = explode(":", $_REQUEST['fields']['luggageLoad']);
            $loadingH+=$luggL[0] * $paxTransfer;
            $loadingM+=$luggL[1] * $paxTransfer;
            $loadingS+=$luggL[2] * $paxTransfer;

            if ($loadingS >= 60) {
                $temp = $loadingS % 60;
                $loadingM+= floor($loadingS / 60);
                $loadingS = $temp;
            }
            if ($loadingM >= 60) {
                $temp = $loadingM % 60;
                $loadingH+= floor($loadingM / 60);
                $loadingM = $temp;
            }
            ?>
            <div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
                <i class="fa fa-arrow-right fa-4x" style="color:gray; " ></i><br/>
                Loading time : <?php echo $loadingH . ":" . $loadingM . ":" . $loadingS; ?>
            </div>

            <div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
                <i class="fa fa-bus fa-4x" style="color:#8ABD0D; " ></i><br/>
                Traveling time : <?php echo $travelH . ":" . $travelM; ?>
            </div>
            <?php
            $dropS = explode(":", $_REQUEST['fields']['dropStagging']);
            $staggingH = $dropS[0];
            $staggingM = $dropS[1];

            if ($loadingM >= 60) {
                $temp = $staggingM % 60;
                $staggingH+= floor($staggingM / 60);
                $staggingM = $temp;
            }
            ?>
            <div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
                <i class="fa fa-plus fa-4x" style="color:maroon; " ></i><br/>
                Stagging : <?php echo $staggingH . ":" . $staggingM; ?>
            </div>

            <?php
            $luggU = explode(":", $_REQUEST['fields']['luggageUnload']);
            $unloadingH+=$luggU[0] * $paxTransfer;
            $unloadingM+=$luggU[1] * $paxTransfer;
            $unloadingS+=$luggU[2] * $paxTransfer;
            $paxU = explode(":", $_REQUEST['fields']['paxUnload']);
            $unloadingH+=$paxU[0] * $paxTransfer;
            $unloadingM+=$paxU[1] * $paxTransfer;
            $unloadingS+=$paxU[2] * $paxTransfer;

            if ($unloadingS >= 60) {
                $temp = $unloadingS % 60;
                $unloadingM+= floor($unloadingS / 60);
                $unloadingS = $temp;
            }
            if ($unloadingM >= 60) {
                $temp = $unloadingM % 60;
                $unloadingM+= floor($unloadingM / 60);
                $unloadingM = $temp;
            }
            ?>

            <div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
                <i class="fa fa-arrow-right fa-4x" style="color:gray; " ></i><br/>
                Unloading time : <?php echo $unloadingH . ":" . $unloadingM . ":" . $unloadingS; ?>
            </div>


            <div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
                <i class="fa fa-user fa-4x" style="color:#8ABD0D; " ></i><br/>
                <?php echo $_REQUEST['fields']['drop']; ?>
            </div>


            <div style="clear: both;"></div>
            <div  class="col-lg-12" style="text-align: center;font-size: 15px;font-weight: bold;color:#8a8a8a;margin-top: 15px;">
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
                $f = 1;
                if ($paxRmaining > $paxCapacity) {
                    $paxRmaining = $paxRmaining - $paxCapacity;
                    ?>

                    <span class="pull-left">
                        <?php
                        echo " Passengers Transferred : " . $paxCapacity;
                        ?>
                    </span>  
                    <?php
                } else {
                    $f = 0;
                    ?>
                    <span class="pull-left">
                        <?php
                        echo " Passengers Transferred : " . $paxRmaining;
                        ?></span>  

                <?php }
                ?>
                <span class="pull-left">
                    &nbsp;|&nbsp;Time Required  <?php echo $hour . "hr " . $min . "min "; ?>
                </span> 
                <?php if ($f == 1) { ?>
                    <span class="pull-right">
                        <?php echo " Passengers Waiting : " . $paxRmaining; ?>
                    </span>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
            <hr class="returnTrack">
        <?php } else {
            ?> 
            <div style="border-bottom: 5px solid #8ABD0D;
                 color: #8abd0d;
                 font-size: 18px;
                 font-weight: bold;
                 margin-bottom: 10px;
                 padding: 10px;">
                Trip <?php echo $i; ?>
            </div>
            <div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
                <i class="fa fa-user fa-4x" style="color:#8ABD0D;"></i><br/>
                <?php echo $_REQUEST['fields']['pickStagging']; ?>
            </div>
            <div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
                <i class="fa fa-arrow-left fa-4x" style="color:maroon; " ></i><br/>
            </div>
            <div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
                <i class="fa fa-bus fa-4x" style="color:#8ABD0D; " ></i><br/>
                Traveling time : <?php echo $travelH . ":" . $travelM; ?>
            </div>

            <div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
                <i class="fa fa-arrow-left fa-4x" style="color:maroon; " ></i><br/>
            </div>
            <div style="float: left;font-weight: bold;text-align: center;" class="col-lg-2">
                <i class="fa fa-user fa-4x" style="color:#8ABD0D; " ></i><br/>
                <?php echo $_REQUEST['fields']['drop']; ?>
            </div>
            <div class="clearfix"></div>
            <div  class="col-lg-12" style="text-align: center;font-size: 15px;font-weight: bold;color:#8a8a8a;margin-top: 15px;">

                <span class="pull-left">
                    Return Trip 
                </span>  
                <?php
                $hour = $travelH;
                $min = $travelM;

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

                <span class="pull-left">
                    &nbsp;|&nbsp;Time Required  <?php echo $hour . "hr " . $min . "min "; ?>
                </span> 

            </div>
            <?php
        }
    }
    ?>
    <div style="clear: both;"></div>

    <hr style="padding: 5px; background-color: maroon;"/>
    <?php
    if ($_REQUEST['fields']['Transportation'] != "PUDO") {
        $loadingH = '00';
        $loadingM = '00';
        $loadingS = '00';
//Loading unloading and waiting time
        $paxL = explode(":", $_REQUEST['fields']['paxLoad']);
        $loadingH+=$paxL[0] * $noOfPaxInOneVehicle;
        $loadingM+=$paxL[1] * $noOfPaxInOneVehicle;
        $loadingS+=$paxL[2] * $noOfPaxInOneVehicle;



        $loadingUnloadingTimeH = 0;
        $loadingUnloadingTimeM = 0;
        $loadingUnloadingTimeS = 0;
        $loadingUnloadingTimeM = $loadingM;
        $loadingUnloadingTimeS = $loadingS;
        if ($loadingUnloadingTimeS >= 60) {
            $temp = $loadingUnloadingTimeS % 60;
            $loadingUnloadingTimeM+= floor($loadingUnloadingTimeS / 60);
            $loadingUnloadingTimeS = $temp;
        }

        if ($loadingUnloadingTimeM >= 60) {
            $temp = $loadingM % 60;
            $loadingUnloadingTimeH+= floor($loadingUnloadingTimeM / 60);
            $loadingUnloadingTimeM = $temp;
        }
     
        $luggL = explode(":", $_REQUEST['fields']['luggageLoad']);
//        $loadingH+=$luggL[0] * $noOfPaxInOneVehicle;
//        $loadingM+=$luggL[1] * $noOfPaxInOneVehicle;
//        $loadingS+=$luggL[2] * $noOfPaxInOneVehicle;

        $dropS = explode(":", $_REQUEST['fields']['dropStagging']);
        $loadingH += $dropS[0];
   
       $loadingM += $dropS[1];

        $luggU = explode(":", $_REQUEST['fields']['luggageUnload']);
//        $loadingH+=$luggU[0] * $noOfPaxInOneVehicle;
//        $loadingM+=$luggU[1] * $noOfPaxInOneVehicle;
//        $loadingS+=$luggU[2] * $noOfPaxInOneVehicle;
        $paxU = explode(":", $_REQUEST['fields']['paxUnload']);
        $loadingH+=$paxU[0] * $noOfPaxInOneVehicle;
        $loadingM+=$paxU[1] * $noOfPaxInOneVehicle;
        $loadingS+=$paxU[2] * $noOfPaxInOneVehicle;


      
         $loadingM += $time * 2;

        if ($loadingS >= 60) {
            $temp = $loadingS % 60;
            $loadingM+= floor($loadingS / 60);
            $loadingS = $temp;
        }

        if ($loadingM >= 60) {
            $temp = $loadingM % 60;
            $loadingH+= floor($loadingM / 60);
            $loadingM = $temp;
        }
//travel time
        $travelTime += $loadingH * 60;
        $travelTime += $loadingM;
        $VehicleQueue = ceil(($travelTime / $loadingUnloadingTimeM) );
        $paxCapacity = $_REQUEST['fields']['Vehicle'] * $VehicleQueue;
        $roundTrip = $_REQUEST['fields']['Passenger'] / $paxCapacity;
        $roundTrip = ceil($roundTrip);
        if ($VehicleQueue < $vehicle) {
            ?>
            <div class="" style=" border-bottom: 2px solid #dadada;
                 color: #8abd0d;
                 font-size: 20px;
                 font-weight: bold;
                 margin-bottom: 10px;">
                Suggested Optimal Trip:
            </div>
            <div class="row" style="width: 100%;">

                <div style="width: 100%;float: left;margin: 2px;">
                    <div style="float: left;font-weight: bold;text-align: center;border: 1px dotted #DADADA;width: 100%;padding: 5px;background-color: gray;color: white; " >
                        <!--<i class="fa fa-bus fa-4x" style="color:white; " ></i><br/>-->
                        The same transportation can be accomplished with <?php echo $VehicleQueue ?> vehicles instead of <?php echo $vehicle ?> efficiently.


                    </div>
                </div>
                <div style="clear: both;"></div> 
            </div> 
            <div style="clear: both;"></div> 

            <div style="padding:0 5%;">

                <table class="table table-condensed table-hover hidden">
                    <tr>
                        <th># vehicle</th>
                        <th>Travel Time</th>
                        <th style="text-align: center;">Loading Time  </th>
                        <th>Total time  </th>
                        <th style="text-align: center;">Pax Transfer</th>
                        <th style="text-align: center;">Pax Waiting</th>
                    </tr>
                    <?php
                    $pax = $_REQUEST['fields']['Passenger'];
                    $c = 0;
                    for ($i = 1; $i <= $roundTrip; $i++) {
                        ?>
                        <tr>
                            <td colspan="6" style="background-color: #dadada;text-align: center;font-weight: bold;">
                                <?php echo $i . " Leg"; ?>    
                            </td>
                        </tr>
                        <?php
                        for ($j = 1; $j <= $VehicleQueue; $j++) {
                            $c++;
                            ?>
                            <tr>
                                <td>
                                    <?php echo $j . "Vehicle"; ?>    
                                </td>
                                <td>
                                    <?php
                                    $travelTimePerTrip = $time * 2;
                                    if ($travelTimePerTrip >= 60) {
                                        $temp = $travelTimePerTrip % 60;
                                        echo floor($travelTimePerTrip / 60) . "hr " . $temp . "min";
                                    } else {
                                        echo $travelTimePerTrip . "min";
                                    }
                                    ?>    
                                </td>

                                <td style="text-align: center;">
                                    <?php echo ($loadingUnloadingTimeH) . "hr " . $loadingUnloadingTimeM . "min"; ?>    
                                </td>
                                <td>
                                    <?php echo $loadingH . "hr " . $loadingM . "min"; ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php echo $_REQUEST['fields']['Vehicle']; ?>    
                                </td>

                                <td style="text-align: center;font-weight: bold;">
                                    <?php
                                    if ($pax > $_REQUEST['fields']['Vehicle']) {
                                        echo $pax = $pax - $_REQUEST['fields']['Vehicle'];
                                    } else {
                                        echo "Move all Pax";
                                        break;
                                    }
                                    ?> 
                                </td>
                            </tr>
                            <?php
                        }
                    }


//$batches = total return time / each loading time
                    ?>
                </table>
            </div>
            <?php
            /* echo $c;
              echo '  ' . $returnTime = $c * $time;
              $loadingUnloadingTotalTime = $loadingUnloadingTimeM;
              $loadingUnloadingTotalTime += $loadingUnloadingTimeH * 60;
              echo '  ' . $loadingUnloadingTotalTime = $loadingUnloadingTotalTime * $c;

              echo '  ' . $batches = $returnTime / $loadingUnloadingTotalTime;
              echo '  ' . $TravelTimeCase2 = $batches * $c;
              echo '  ' . $TravelTimeCase2 = $TravelTimeCase2 + ($c * $time);
              echo '  ' . $TravelTimeCase2 = ceil($TravelTimeCase2);
              echo '  ';
              if ($TravelTimeCase2 >= 60) {
              $temp = $TravelTimeCase2 % 60;
              echo floor($TravelTimeCase2 / 60) . "hr " . $temp . "min";
              } else {
              echo $TravelTimeCase2 . "min";
              }; */
        }
    }
    ?>
</div>