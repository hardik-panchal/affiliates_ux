<?php

$no_visible_elements = 1;
$urlArgs = _cg("url_vars");
//d($_REQUEST);
$pax = $_REQUEST['field']['bus']['pax'] + $_REQUEST['field']['van']['pax'] + $_REQUEST['field']['SUV']['pax'];
$busTotalPax = $_REQUEST['field']['bus']['pax'];
$vanTotalPax = $_REQUEST['field']['van']['pax'];
$SUVTotalPax = $_REQUEST['field']['SUV']['pax'];
$vehicle = $_REQUEST['paxLoad'];
$busCapacity = 50;
$vanCapacity = 10;
$SUVCapacity = 5;
//echo $pax;
$userIcon=($_REQUEST['field']['bus']['vehicle']*3)+($_REQUEST['field']['van']['vehicle']*2)+($_REQUEST['field']['SUV']['vehicle']*1);
_cg("page_title", "Report");
$jsInclude = "output1.js.php";
