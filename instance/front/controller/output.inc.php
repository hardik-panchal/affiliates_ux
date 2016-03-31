<?php

$no_visible_elements = 1;
$urlArgs = _cg("url_vars");
//d($_REQUEST);
 $paxCapacity = $_REQUEST['fields']['Vehicle'] * $_REQUEST['fields']['vehicle_no'];
$roundTrip = $_REQUEST['fields']['Passenger'] / $paxCapacity;
 $roundTrip = round($roundTrip);

$loadingH = '00';
$loadingM = '00';
$loadingS = '00';
$totalLSec = '00';
$totalLMin = '00';
$totalLHour = '00';

$unloadingH = '00';
$unloadingM = '00';
$unloadingS = '00';
$totalULSec = '00';
$totalULMin = '00';
$totalULHour = '00';

$staggingH = '00';
$staggingM = '00';
$totalSS = '00';
$totalSM = '00';


$travelH = '00';
$travelM = '00';
$totalTS = '00';
$totalTM = '00';



$paxL = explode(":", $_REQUEST['fields']['paxLoad']);
$loadingH+=$paxL[0];
$loadingM+=$paxL[1];
$loadingS+=$paxL[2];

$luggL = explode(":", $_REQUEST['fields']['luggageLoad']);
$loadingH+=$luggL[0];
$loadingM+=$luggL[1];
$loadingS+=$luggL[2];



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

//echo "<br> Per Trip time for loading passange and luggage :" . "" . $loadingH . ":" . $loadingM . ":" . $loadingS;
$totalLHour = $loadingH * $roundTrip;
$totalLMin = $loadingM * $roundTrip;
$totalLSec = $loadingS * $roundTrip;
if ($totalLSec >= 60) {
    $temp = $totalLSec % 60;
    $totalLMin+= floor($totalLSec / 60);
    $totalLSec = $temp;
}
if ($totalLMin >= 60) {
    $temp = $totalLMin % 60;
    $totalLHour+= floor($totalLMin / 60);
    $totalLMin = $temp;
}

//echo "<br> total time for loading passange and luggage :" . "" . $totalLHour . ":" . $totalLMin . ":" . $totalLSec;



$luggU = explode(":", $_REQUEST['fields']['luggageUnload']);
$unloadingH+=$luggU[0];
$unloadingM+=$luggU[1];
$unloadingS+=$luggU[2];
$paxU = explode(":", $_REQUEST['fields']['paxUnload']);
$unloadingH+=$paxU[0];
$unloadingM+=$paxU[1];
$unloadingS+=$paxU[2];



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

//echo "<br> Per Trip time for loading passange and luggage :" . "" . $unloadingH . ":" . $unloadingM . ":" . $unloadingS;
$totalULHour = $unloadingH * $roundTrip;
$totalULMin = $unloadingM * $roundTrip;
$totalULSec = $unloadingS * $roundTrip;
if ($totalULSec >= 60) {
    $temp = $totalULSec % 60;
    $totalULMin+= floor($totalULSec / 60);
    $totalULSec = $temp;
}
if ($totalULMin >= 60) {
    $temp = $totalULMin % 60;
    $totalLHour+= floor($totalULMin / 60);
    $totalULMin = $temp;
}

//echo "<br> total time for loading passange and luggage :" . "" . $totalULHour . ":" . $totalULMin . ":" . $totalULSec;




$dropS = explode(":", $_REQUEST['fields']['dropStagging']);
$staggingH = $dropS[0];
$staggingM = $dropS[1];

if ($loadingM >= 60) {
    $temp = $staggingM % 60;
    $staggingH+= floor($staggingM / 60);
    $staggingM = $temp;
}

//echo "<br> Per Trip time for stagging :" . "" . $staggingH . ":" . $staggingM;
$totalSH = $staggingH * $roundTrip;
$totalSM = $staggingM * $roundTrip;

if ($totalSM >= 60) {
    $temp = $totalSM % 60;
    $totalSH+= floor($totalSM / 60);
    $totalSM = $temp;
}

//echo "<br> total time for stagging :" . "" . $totalSH . ":" . $totalSM;


$googleDirectionsAPI = new apiGoogleDirections();
$result = $googleDirectionsAPI->doRequest($_REQUEST['fields']['pickStagging'], $_REQUEST['fields']['drop']);
$result = json_decode($result, true);
//d($result);
$distance = $result['routes'][0]['legs'][0]['distance']['text'];
$time = ceil(intval($result['routes'][0]['legs'][0]['duration']['value']) / 60) * 2;

$travelM = $time;



if ($travelM >= 60) {
    $temp = $travelM % 60;
    $travelH+= floor($travelM / 60);
    $travelM = $temp;
}

//echo "<br> Per Trip time for Traveling :" . "" . $travelH . ":" . $travelM;
$totalTH = $travelH * $roundTrip;
$totalTM = $travelM * $roundTrip;


if ($totalTM >= 60) {
    $temp = $totalTM % 60;
    $totalTH+= floor($totalTM / 60);
    $totalTM = $temp;
}

_cg("page_title", "Report");
$jsInclude = "report.js.php";
