<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$affiliates =q("select * from  affiliates");
foreach ($affiliates as $each_data) {
    $search =$each_data['farmout_name'];

    $city=qs("select * from affiliates_city where id='{$each_data['city']}'");
    $search=$search . '_' . $city['city'];
    
    
    $vehicle = qs("select * from affiliate_vehicles where aff_id='{$each_data['id']}'");
    $search= $search . '_' .$vehicle['vehicle'];
//    d($search);
    
    $fields['search'] = $search;
    qu("affiliates", $fields,"id= '{$each_data['id']}'");
    $search='';
}
//d($affiliates);
?> 