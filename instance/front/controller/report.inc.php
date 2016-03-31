<?php

$no_visible_elements = 1;
$urlArgs = _cg("url_vars");
//d($_REQUEST);
$paxCapacity = $_REQUEST['fields']['Vehicle'] * $_REQUEST['fields']['vehicle_no'];
$roundTrip = $_REQUEST['fields']['Passenger'] / $paxCapacity;
$roundTrip = round($roundTrip);

$hour = '';
$min = '';
$pickS = explode(":", $_REQUEST['fields']['pickStagging']);
$hour+=$pickS[0];
$min+=$pickS[1];
$dropS = explode(":", $_REQUEST['fields']['dropStagging']);
$hour+=$dropS[0];
$min+=$dropS[1];
$drop = explode(":", $_REQUEST['fields']['drop']);
$hour+=$drop[0];
$min+=$drop[1];
$paxL = explode(":", $_REQUEST['fields']['paxLoad']);
$hour+=$paxL[0];
$min+=$paxL[1];
$paxU = explode(":", $_REQUEST['fields']['paxUnload']);
$hour+=$paxU[0];
$min+=$paxU[1];
$luggL = explode(":", $_REQUEST['fields']['luggageLoad']);
$hour+=$luggL[0];
$min+=$luggL[1];
$luggU = explode(":", $_REQUEST['fields']['luggageUnload']);
$hour+=$luggU[0];
$min+=$luggU[1];

if ($min >= 60) {
    $temp = $min % 60;
    $hour+= floor($min / 60);
    $min = $temp;
}

//echo "<br> Per Trip.". "" . $hour . ":" . $min;
$totalHour = $hour * $roundTrip;
$totalMin = $min * $roundTrip;

if ($totalMin >= 60) {
    $temp = $totalMin % 60;
    $totalHour+= floor($totalMin / 60);
    $totalMin = $temp;
}
//echo "<br> total Trip." . "" . $totalHour . ":" . $totalMin;
_cg("page_title", "Report");
$jsInclude = "report.js.php";
