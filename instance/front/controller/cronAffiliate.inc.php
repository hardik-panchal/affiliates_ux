<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$affiliates = q("select * from  affiliates");
foreach ($affiliates as $each_data) {
    $search = $each_data['farmout_name'];

    $search = $search . '_' . $each_data['city'];
    
    $vehicle = q("select * from affiliate_vehicles where aff_id='{$each_data['id']}'");
    foreach ($vehicle as $vehicleData) {
        $search = $search . '_' . $vehicleData['vehicle'];
    }

// d($search);

    $search = str_replace("'", "", $search);
    $fields['search'] = strtolower($search);
    qu("affiliates", $fields, "id= '{$each_data['id']}'");
    $search = '';
}
die;
//d($affiliates);
?> 