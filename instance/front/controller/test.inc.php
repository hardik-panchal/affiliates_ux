<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$affiliates = q("select * from  affiliates");
foreach ($affiliates as $each_data) {
    $city = qs("select * from affiliates_city where id='{$each_data['city']}'");
    $fields = array();
    $fields['city'] = $city['city'];
    qu("affiliates", $fields, "id= '{$each_data['id']}'");
    $fields = array();
}
die;
//d($affiliates);
?> 