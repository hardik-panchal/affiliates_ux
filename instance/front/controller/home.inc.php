<?php

$urlArgs = _cg("url_vars");
if ($_REQUEST['getfilter'] == 1) {
    $search = $_REQUEST['search'];
    $sort = $_REQUEST['sortOn'];


    $fields = array();
    $fields['search'] = $_REQUEST['search'];
    $fields['ip'] = $_SERVER['REMOTE_ADDR'];
    $fields['sort'] = $_REQUEST['sortOn'];
    qi('search', $fields);


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
    include _PATH . "instance/front/tpl/home_data.php";
    die;
}
/* if ($_REQUEST['term']) {
  $search = $_REQUEST['term'];
  $result = array();
  $where = '';
  $where = $where . " search like '%{$value}%";
  $query = "select * from affiliates where {$where}";
  $data = q($query);
  foreach ($data as $each_data) {
  $lable = '';
  $searchLable = '';
  foreach ($searchString as $searchValue) {
  $lable = $lable . $searchValue . " , ";
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
 */
if (isset($_REQUEST['term']) && $_REQUEST['term'] != '') {
    $search = _escape($_REQUEST['term']);
    $serch_keyword = explode(" ", $search);

    $return = array();
    foreach ($serch_keyword as $term) {

        $where = " farmout_name like '%" . $term . "%'";
        $where .= " OR city like '%" . $term . "%'";

        $data = q("select * from `affiliates` where{$where}");

        foreach ($data as $each_data) {
            $category = '';
            $label = '';
            $cat_code = '';
            if (stripos($each_data['farmout_name'], $term) !== false) {
                $category = "Affiliates";
                $label = $each_data['farmout_name'];
                $cat_code = '1';
            } elseif (stripos($each_data['city'], $term) !== false) {
                $category = "City";
                $label = $each_data['city'];
                $cat_code = '2';
            }
            $return[] = array("value" => $label, "label" => $label, "category" => $category, "category_code" => $cat_code);
        }


        $data = q("select * from `affiliate_vehicles` where vehicle like '%" . $term . "%'");

        foreach ($data as $each_data) {
            $return[] = array("value" => $each_data['id'], "label" => $each_data['vehicle'], "category" => "Vehicles", "category_code" => '3');
        }
    }

    $sort_by_category = array();
    foreach ($return as $key => $row) {
        $sort_by_category[$key] = $row['category_code'];
    }
    array_multisort($sort_by_category, SORT_ASC, $return);

    $temp = array();
    $return_new = array_filter($return, function ($v) use (&$temp) {
        if (in_array($v['label'], $temp)) {
            return false;
        } else {
            array_push($temp, $v['label']);
            return true;
        }
    });

    print json_encode($return_new);
    die;
}




































if ($_REQUEST['Editaffiliates'] == 1) {
    $id = $_REQUEST['affId'];
    $affiliates_edit = qs("select * from affiliates where id = '{$id}'");
    include _PATH . "instance/front/tpl/affiliate_add.php";
    die;
}
if ($_REQUEST['affiliate'] == 1) {
    $params = array();
    echo $id = $_REQUEST['id'];
    parse_str($_REQUEST['data'], $params);
    d($params);
    $fields = $params['fields'];
    if (isset($id) && trim($id) > 0) {
        $update_aff = qu('affiliates', $fields, " id = '" . trim($id) . "'");
    } else {
        qi('affiliates', $fields, 'REPLACE');
    }
    if (isset($id)) {
        echo 'update';
    } else {
        echo 'add';
    }
    die;
}
if ($_REQUEST['Editvehicle'] == 1) {
    $affId = $_REQUEST['vehicleId'];
    $vehicle_edit = q("select * from affiliate_vehicles where aff_id = '{$affId}'");
    include _PATH . "instance/front/tpl/affiliate_vehicle_add.php";
    die;
}
if ($_REQUEST['addVehicle'] == 1) {
    $params = array();
    parse_str($_REQUEST['data'], $params);
    $vehicles = q("select * from affiliate_vehicles where aff_id = '{$params['affiliateVehicle']}'");
    echo count($vehicles) + 2;
    for ($i = 0; $i < count($vehicles) + 2; $i++) {
        $fields['aff_id'] = $params['affiliateVehicle'];
        echo $params['vr']['type'][$i];
        if ($params['vr']['type'][$i] != '') {
            $fields['vehicle'] = $params['vr']['type'][$i];
            $fields['vehicle_no'] = $params['vr']['pax'][$i];
            $fields['rate_per_hour'] = $params['vr']['rate'][$i];
            $fields['minimum'] = $params['vr']['min_hour'][$i];
            $fields['flat_rate'] = $params['vr']['flat_rate'][$i];
            $fields['cxl_policy'] = $params['vr']['cxl'][$i];
            if ($params['vr']['edit_id'][$i] != '') {
                $id = $params['vr']['edit_id'][$i];
            } else {
                $id = 0;
            }
            $fields = _escapeArray($fields);
            d($fields);
            if (trim($id) > 0) {
                $update_aff = qu('affiliate_vehicles', $fields, " id = '" . trim($id) . "'");
            } else {
                qi('affiliate_vehicles', $fields, 'REPLACE');
            }
        }
    }
    if (isset($id)) {
        echo 'update';
    } else {
        echo 'add';
    }
    die;
}



if ($_REQUEST['insurance'] == 1) {
    $id = $_REQUEST['id'];
    $affiliates_edit = qs("select * from affiliates where id = '{$id}'");
    include _PATH . "instance/front/tpl/insurance.php";
    die;
}
if ($_REQUEST['addInsurance'] == 1) {
    $params = array();
    echo $id = $_REQUEST['id'];
    parse_str($_REQUEST['data'], $params);
    d($params);
    $fields = $params['field'];
    echo '---------------------';
    d($fields);
    $update_aff = qu('affiliates', $fields, " id = '" . trim($fields['id']) . "'");


    echo 'update';

    die;
}
$query = "select * from affiliates limit 0,10  ";
$data = q($query);
_cg("page_title", "Home");
$jsInclude = "home.js.php";

//print "FoxyCart Webhook";
?>