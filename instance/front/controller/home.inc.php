<?php

$urlArgs = _cg("url_vars");
//d($urlArgs);

include _PATH . "instance/front/tpl/affiliate_edit.php";
if ($_REQUEST['getfilter'] == 1) {
    $search = $_REQUEST['search'];

    $serch_keyword = explode(" ", $search);
    $result = array();
    foreach ($serch_keyword as $value) {
        $query = "select * from affiliates where search like '%{$value}%' ";
        $data = q($query);
        $result[] = $data;
    }

    $data = array();
    foreach ($result as $value) {
        $data[] = $value[0];
    }

//d($query);
    include _PATH . "instance/front/tpl/home_data.php";
    die;
}
if ($_REQUEST['addCity'] == 1) {
    $city = $_REQUEST['city'];
    $fields['city'] = $city;
    qi("affiliates_city", $fields);
}

//if ($_REQUEST['addAffiliate'] == 1) {
//    $fields['affiliate'] = $_REQUEST['affiliate'];
//        $fields['address'] = $_REQUEST['address'];
//    $fields['contact'] = $_REQUEST['contact'];
//
//    $fields['city_id'] = $_REQUEST['city'];
//    qi("affiliates", $fields);
//}
//old code for vehicle
if ($_REQUEST['addvehicle'] == 1) {
    $fields['aff_id'] = $_REQUEST['affiliateVehicle'];
    $fields['vehicle'] = $_REQUEST['vehicle'];
    $fields['vehicle_no'] = $_REQUEST['vehicle_no'];
    $fields['rate_per_hour'] = $_REQUEST['hour_rate'];
    $fields['minimum'] = $_REQUEST['min_rate'];
    qi("affiliate_vehicles", $fields);
}


_cg("page_title", "Home");
$jsInclude = "home.js.php";

//print "FoxyCart Webhook";
?>