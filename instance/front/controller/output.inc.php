<?php

$no_visible_elements = 1;
$urlArgs = _cg("url_vars");
//d($_REQUEST);

$vehicle = $_REQUEST['fields']['vehicle_no'];
$noOfPaxInOneVehicle = $_REQUEST['fields']['Vehicle'];
$paxCapacity = $_REQUEST['fields']['Vehicle'] * $vehicle;

$roundTrip = $_REQUEST['fields']['Passenger'] / $paxCapacity;

$roundTrip = ceil($roundTrip);
$TotalTrip = $roundTrip + ($roundTrip - 1);
$totalPax = $_REQUEST['fields']['Passenger'];
$paxRmaining = $totalPax;
$paxRmaining1 = $totalPax;
$hour = '00';
$min = '00';
$sec = '00';

$totalULSec = '00';
$totalULMin = '00';
$totalULHour = '00';
$totalSS = '00';
$totalSM = '00';
$totalLSec = '00';
$totalLMin = '00';
$totalLHour = '00';

$travelH = '00';
$travelM = '00';
$totalTS = '00';
$totalTM = '00';


$googleDirectionsAPI = new apiGoogleDirections();
$result = $googleDirectionsAPI->doRequest($_REQUEST['fields']['pickStagging'], $_REQUEST['fields']['drop']);
$result = json_decode($result, true);
//d($result);
$distance = $result['routes'][0]['legs'][0]['distance']['text'];
$time = ceil(intval($result['routes'][0]['legs'][0]['duration']['value']) / 60);

$travelM = $time;



if ($travelM >= 60) {
    $temp = $travelM % 60;
    $travelH+= floor($travelM / 60);
    $travelM = $temp;
}

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

        if ($paxRmaining1 > $paxCapacity) {
            $paxTransfer = $paxCapacity;
        } else {
            $paxTransfer = $paxRmaining1;
        }
        // Loading
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


        //Stagging   
        $dropS = explode(":", $_REQUEST['fields']['dropStagging']);
        $staggingH = $dropS[0];
        $staggingM = $dropS[1];

        if ($loadingM >= 60) {
            $temp = $staggingM % 60;
            $staggingH+= floor($staggingM / 60);
            $staggingM = $temp;
        }

        //unloading
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

        $hour += $unloadingH + $staggingH + $travelH + $loadingH;
        $min += $unloadingM + $staggingM + $travelM + $loadingM;
        $sec += $unloadingS + $loadingS;
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


        if ($paxRmaining1 > $paxCapacity) {
            $paxRmaining1 = $paxRmaining1 - $paxCapacity;
        } else {
            
        }
    } else {

        $hour += $travelH;
        $min += $travelM;
        if ($min >= 60) {
            $temp = $min % 60;
            $hour+= floor($min / 60);
            $min = $temp;
        }
    }
}

_cg("page_title", "Report");
$jsInclude = "output.js.php";
