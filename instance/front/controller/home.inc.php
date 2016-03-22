<?php

$urlArgs = _cg("url_vars");
//d($urlArgs);



include _PATH . "instance/front/tpl/affiliate_edit.php";



if ($_REQUEST['getfilter'] == 1) {
    $search = $_REQUEST['search'];
    $sort = $_REQUEST['sortOn'];
    $serch_keyword = explode(" ", $search);
    $result = array();
    $where = '';
    foreach ($serch_keyword as $value) {
        $where = $where . " search like '%{$value}%' And";
    }
    $where = rtrim($where, 'And');
    $groupBy = '';
    if ($sort == 'affiliates') {
        $groupBy = 'order by farmout_name';
    }
    if ($sort == 'ratting') {
        $groupBy = 'order by rate';
    }
    $query = "select * from affiliates where {$where} {$groupBy}";
    $data = q($query);
    // $data=  array_unique($data);
//d($query);
    include _PATH . "instance/front/tpl/home_data.php";
    die;
}
if ($_REQUEST['term']) {
    $search = $_REQUEST['term'];

    $serch_keyword = explode(" ", $search);
    $result = array();
    $where = '';
    foreach ($serch_keyword as $value) {
        $where = $where . " search like '%{$value}%' And";
    }
    $where = rtrim($where, 'And');
    $query = "select * from affiliates where {$where}";
    $data = q($query);
    foreach ($data as $each_data) {
        $searchString = explode("_", $each_data['search']);

        $lable = '';
        $searchLable = '';
        $c = 0;
        foreach ($searchString as $searchValue) {
            if ($c == 0 || $c == 1) {
                $lable = $lable . "<b>" . $searchValue . "</b> , ";
            } elseif ($c == 2) {
                $lable = $lable . "( " . $searchValue . " , ";
            } else {
                $lable = $lable . $searchValue . " , ";
            }
            $c++;
            $lable = strip_tags($lable);
            $searchLable = $searchLable . $searchValue . " ";
        }
        $lable = rtrim($lable, " , ");
        $lable = $lable . " )";
        $searchLable = rtrim($searchLable, " ");


        $return[] = array("id" => $each_data['id'], "value" => $searchLable, "label" => $lable, "data" => $each_data);
    }
    print json_encode($return);
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

if ($_REQUEST['editOnMouseHover'] == 1) {
    $id = $_REQUEST['id'];
    $field = $_REQUEST['field'];
    $tbl_nm = $_REQUEST['tbl_nm'];
    $fields[$field] = $_REQUEST['value'];
    $condition = "id='{$id}'";
    $edit = qu($tbl_nm, $fields, $condition);
    die;
}

$query = "select * from affiliates";
$data = q($query);
_cg("page_title", "Home");
$jsInclude = "home.js.php";

//print "FoxyCart Webhook";
?>