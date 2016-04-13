<?php

$data = q("select * from la_affiliates");
foreach ($data as $value) {
    echo $name = _escape($value['affiliates_comp']);
    $affiliates = qs("select * from affiliates where farmout_name='{$name}'");
    if (!isset($affiliates)) {
        d($affiliates);

        $fields['farmout_name'] = $name;
        qi("affiliates", $fields);
    } else {
        $fields['contact_name'] = _escape($value['affiliates_name']);
        $fields['farmout_name'] = $name;
        qu("affiliates", $fields,'farmout_name="'.$name.'"');
    }
}

$data = q("select * from reservation_summary where type='FOT' AND is_deleted=0 AND pu_date>='2016-03-01' or( date(created_at)>='2016-03-01' AND date(created_at)<='2016-03-31')");
//d($data);
$fields = array();
foreach ($data as $value) {
    $tripInfo = qs("select * from xero_purchase_order_main where limo_id={$value['conf']}");
    if (isset($tripInfo)) {
        //  echo $value['conf'] . "<br>";
        $fields[$tripInfo['from_name']]['name'] = $tripInfo['from_name'];
        $fields[$tripInfo['from_name']]['aff_pay'] = $fields[$tripInfo['from_name']]['aff_pay'] + $tripInfo['total_pay'];
        $fields[$tripInfo['from_name']]['pay'] = $fields[$tripInfo['from_name']]['pay'] + $value['limo_grand_total'];
    }
}
//d($fields);
foreach ($fields as $key => $value) {
    echo $name = _escape($key);
    $condition = "farmout_name = '{$name}'";
    $fields_info = array();
    $fields_info['per'] = ( ($value['pay'] - $value['aff_pay']) / $value['pay'] ) * 100;
    $fields_info['aff_pay'] = $value['aff_pay'];
    $fields_info['pay'] = $value['pay'];
    d($fields_info);
    qu("affiliates", $fields_info, $condition);
}
die;
