<?php

if (isset($_REQUEST['delete_attachment_file']) && $_REQUEST['delete_attachment_file'] == 1) {
    $attach_deleted_id = '0';
    if (trim($_REQUEST['file_id']) > 0) {
        $res_delete = qd("affiliates_attachment", " id = '{$_REQUEST['file_id']}'");
        $attach_deleted_id = $_REQUEST['file_id'];
        if ($res_delete) {
            unlink(_PATH . "affiliates_attachment/" . trim($_REQUEST['file_name']));
        }
    }
    echo $attach_deleted_id;
    die;
}



if ($_REQUEST['AddNewaffiliates'] == 1) {

    $set_date = explode("/", $_REQUEST['date']);
    $date = date("Y-m-d", strtotime($set_date[2] . "-" . $set_date[0] . "-" . $set_date[1]));
    $exp_date = date('Y-m-d', strtotime(trim($_REQUEST['expiration_date'])));
    $city = $_REQUEST['city1'];
    
    $input_data_array = array(
        'farmout_name' => _escape($_REQUEST['farmout_name']),
        'city' => _escape($city),
        'address' => _escape($_REQUEST['address']),
        'notes' => _escape($_REQUEST['notes']),
        'preferred_level' => _escape($_REQUEST['preferred_level']),
        'contact_name' => _escape($_REQUEST['contact_name']),
        'coachbuilder' => _escape($_REQUEST['coachbuilder']),
        'contact_number' => _escape($_REQUEST['contact_number']),
        'contact_email' => _escape($_REQUEST['contact_email']),
        'expiration_date' => _escape($exp_date),
        'renewal_date' => _escape($date)
    );

    if (isset($_REQUEST['edit_id']) && trim($_REQUEST['edit_id']) > 0) {
        $update_aff = qu('affiliates', $input_data_array, " id = '" . trim($_REQUEST['edit_id']) . "'");
        $affiliates_insert_id = trim($_REQUEST['edit_id']);
    } else {
        $affiliates_insert_id = qi('affiliates', $input_data_array, 'REPLACE');
    }


    if (isset($_REQUEST['attach_file_list']) && trim($_REQUEST['attach_file_list']) != '') {
        $attachment_lists = explode(",", trim($_REQUEST['attach_file_list']));
        if (!empty($attachment_lists)) {
            foreach ($attachment_lists as $each_attachment):
                if ($each_attachment != '') {
                    unset($attachment_fields);
                    $attachment_fields['affiliates_id'] = $affiliates_insert_id;
                    qu("affiliates_attachment", $attachment_fields, " affiliates_id = 0 AND file_name = '" . $each_attachment . "' ");
                }
            endforeach;
        }
    }
//    if ($_REQUEST['expiration_date'] != '') {
//        d($_REQUEST['expiration_date']);
//        $exp_date = date('Y-m-d', strtotime(trim($_REQUEST['expiration_date'])));
//        qu("affiliates_attachment", array('expiration_date' => $exp_date), "affiliates_id='{$affiliates_insert_id}' and file_type='insurance' ");
//    } else {
//        qu("affiliates_attachment", array('expiration_date' => '0000-00-00'), "affiliates_id='{$affiliates_insert_id}' and file_type='insurance' ");
//    }
    // For Service Area
    $resetarea = q("delete from affiliates_service_type where affiliates_id = '{$affiliates_insert_id}' AND type = 'ServiceArea'");
    $getAServicearea = $_REQUEST['service_area'];

    foreach ($getAServicearea as $key => $each_area) {
        $city = qs("select * from affiliates_city where city LIKE '{$each_area}'");

        $input_service_array = array(
            'affiliates_id' => _escape($affiliates_insert_id),
            'type' => _escape('ServiceArea'),
            'city_id' => _escape($city['id']),
            'service_area' => _escape($each_area));

        $service_insert_id = qi('affiliates_service_type', $input_service_array, 'REPLACE');
    }
    // For Service type
    $resetservice = q("delete from affiliates_service_type where affiliates_id = '{$affiliates_insert_id}' AND type = 'Service'");
    $getservicetype = $_REQUEST['select_type'];

    foreach ($getservicetype as $key => $each_service) {
        $input_service_array = array(
            'affiliates_id' => _escape($affiliates_insert_id),
            'type' => _escape('Service'),
            'service_type' => _escape($each_service));

        $service_insert_id = qi('affiliates_service_type', $input_service_array, 'REPLACE');
    }

    // For Amenity type
    $resetAmenity = q("delete from affiliates_service_type where affiliates_id = '{$affiliates_insert_id}' AND type = 'Amenity'");
    $getAmenityetype = $_REQUEST['Amenity_type'];

    foreach ($getAmenityetype as $key => $each_amenity) {
        $input_service_array = array(
            'affiliates_id' => _escape($affiliates_insert_id),
            'type' => _escape('Amenity'),
            'amenity_type' => _escape($each_amenity));

        $service_insert_id = qi('affiliates_service_type', $input_service_array, 'REPLACE');
    }

    die;
}

if ($_REQUEST['AddAffiliatesServiceType'] == 1) {

    $set_date = explode("/", $_REQUEST['date']);
    $date = date("Y-m-d", strtotime($set_date[2] . "-" . $set_date[0] . "-" . $set_date[1]));

    $input_data_array = array(
        'farmout_name' => _escape($_REQUEST['farmout_name']),
        'city' => _escape($_REQUEST['city']),
        'address' => _escape($_REQUEST['address']),
        'notes' => _escape($_REQUEST['notes']),
        'preferred_level' => _escape($_REQUEST['preferred_level']),
        'contact_name' => _escape($_REQUEST['contact_name']),
        'coachbuilder' => _escape($_REQUEST['coachbuilder']),
        'contact_number' => _escape($_REQUEST['contact_number']),
        'contact_email' => _escape($_REQUEST['contact_email']),
        'renewal_date' => _escape($date)
    );

    if (isset($_REQUEST['edit_id']) && trim($_REQUEST['edit_id']) > 0) {
        $update_aff = qu('affiliates', $input_data_array, " id = '" . trim($_REQUEST['edit_id']) . "'");
        $affiliates_insert_id = trim($_REQUEST['edit_id']);
    } else {
        $affiliates_insert_id = qi('affiliates', $input_data_array, 'REPLACE');
    }


    // For Service type
    $service_area = $_REQUEST['service_area'];
    $city = qs("select * from affiliates_city where city LIKE '{$service_area}'");

    $resetservice = q("delete from affiliates_service_type where affiliates_id = '{$affiliates_insert_id}' AND service_area ='{$service_area}' AND type = 'Service'");
    $getservicetype = $_REQUEST['select_type'];

    foreach ($getservicetype as $key => $each_service) {
        $input_service_array = array(
            'affiliates_id' => _escape($affiliates_insert_id),
            'city_id' => _escape($city['id']),
            'type' => _escape('Service'),
            'service_type' => _escape($each_service),
            'service_area' => _escape($service_area));

        $service_insert_id = qi('affiliates_service_type', $input_service_array, 'REPLACE');
    }



    die;
}

if ($_REQUEST['AddAffiliatesAmenities'] == 1) {

    $set_date = explode("/", $_REQUEST['date']);
    $date = date("Y-m-d", strtotime($set_date[2] . "-" . $set_date[0] . "-" . $set_date[1]));

    $input_data_array = array(
        'farmout_name' => _escape($_REQUEST['farmout_name']),
        'city' => _escape($_REQUEST['city']),
        'address' => _escape($_REQUEST['address']),
        'notes' => _escape($_REQUEST['notes']),
        'preferred_level' => _escape($_REQUEST['preferred_level']),
        'contact_name' => _escape($_REQUEST['contact_name']),
        'coachbuilder' => _escape($_REQUEST['coachbuilder']),
        'contact_number' => _escape($_REQUEST['contact_number']),
        'contact_email' => _escape($_REQUEST['contact_email']),
        'renewal_date' => _escape($date)
    );

    if (isset($_REQUEST['edit_id']) && trim($_REQUEST['edit_id']) > 0) {
        $update_aff = qu('affiliates', $input_data_array, " id = '" . trim($_REQUEST['edit_id']) . "'");
        $affiliates_insert_id = trim($_REQUEST['edit_id']);
    } else {
        $affiliates_insert_id = qi('affiliates', $input_data_array, 'REPLACE');
    }

    // For Amenity type
    $service_area = $_REQUEST['service_area'];
    $city = qs("select * from affiliates_city where city LIKE '{$service_area}'");

    $resetAmenity = q("delete from affiliates_service_type where affiliates_id = '{$affiliates_insert_id}' AND service_area ='{$service_area}'  AND type = 'Amenity'");
    $getAmenityetype = $_REQUEST['Amenity_type'];

    foreach ($getAmenityetype as $key => $each_amenity) {
        $input_service_array = array(
            'affiliates_id' => _escape($affiliates_insert_id),
            'city_id' => _escape($city['id']),
            'type' => _escape('Amenity'),
            'amenity_type' => _escape($each_amenity),
            'service_area' => _escape($service_area));

        $service_insert_id = qi('affiliates_service_type', $input_service_array, 'REPLACE');
    }

    die;
}
if (isset($_REQUEST['serviceArea'])) {
    $affiliates_id = $_REQUEST['affiliates_id'];
    $serviceArea = $_REQUEST['serviceArea'];
//    
    $service = q("select * from affiliates_service_type where affiliates_id = '{$affiliates_id}' AND service_area ='{$serviceArea}'  AND  type = 'Service'");
    $amenities = q("select * from affiliates_service_type where affiliates_id = '{$affiliates_id}' AND service_area ='{$serviceArea}' AND type = 'Amenity'");

    include _PATH . "instance/front/tpl/affiliates_serviceAreaActive.php";
    die;
}
if ($_REQUEST['AddNewgreeter'] == 1) {

    $input_data_array = array(
        'name' => _escape($_REQUEST['Name']),
        'city_id' => _escape($_REQUEST['city']),
        'company_telephone' => _escape($_REQUEST['companyTelephone']),
        'rate' => _escape($_REQUEST['rate']),
        'notes' => _escape($_REQUEST['notes'])
    );

    if (isset($_REQUEST['edit_id']) && trim($_REQUEST['edit_id']) > 0) {
        $update_aff = qu('greeter', $input_data_array, " id = '" . trim($_REQUEST['edit_id']) . "'");
        $greeter_insert_id = trim($_REQUEST['edit_id']);
    } else {
        $greeter_insert_id = qi('greeter', $input_data_array, 'REPLACE');
    }

    die;
}


if ($_REQUEST['Editaffiliates'] == 1) {
    $urlArgs = _cg("url_vars");
    ob_start();
    $id = $_REQUEST['affId'];

    $affiliates_edit = qs("select * from affiliates where id = '{$id}'");

    include _PATH . "instance/front/tpl/affiliate_add.php";
    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
    die;
}

if ($_REQUEST['Editgreeter'] == 1) {
    $urlArgs = _cg("url_vars");
    ob_start();
    $id = $_REQUEST['greetId'];

    $greeter_edit = qs("select * from greeter where id = '{$id}'");

    include _PATH . "instance/front/tpl/affiliates_greeter_add.php";
    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
    die;
}

if (isset($_REQUEST['AddaffiliatesPopup']) && $_REQUEST['AddaffiliatesPopup'] == '1') {
    $urlArgs = _cg("url_vars");
    ob_start();
    include _PATH . "instance/front/tpl/affiliate_add.php";
    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
    die;
}
if (isset($_REQUEST['AddgreeterPopup']) && $_REQUEST['AddgreeterPopup'] == '1') {
    $urlArgs = _cg("url_vars");
    ob_start();
    include _PATH . "instance/front/tpl/affiliates_greeter_add.php";
    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
    die;
}


if ($_REQUEST['Getafflist'] == 1) {
    $city = $_REQUEST['city'];
    $affiliates = q("SELECT af.aff_status,af.farmout_name, af.city, af.id, ast.service_area FROM affiliates_service_type as ast JOIN affiliates as af on ast.affiliates_id = af.id where ast.city_id = '{$city}' ORDER BY af.id DESC");
    // echo"SELECT af.aff_status,af.farmout_name, af.city, af.id, ast.service_area FROM affiliates_service_type as ast JOIN affiliates as af on ast.affiliates_id = af.id where ast.city_id = '{$city}' ORDER BY af.id DESC";
    include _PATH . "instance/front/tpl/affiliates_list_data.php";

    die;
}

if ($_REQUEST['Getgreeterlist'] == 1) {
    $city = $_REQUEST['city'];

    $greeter = q("select * from greeter where city_id = '{$city}' ORDER BY id DESC");

    include _PATH . "instance/front/tpl/affiliates_greeter_data.php";

    die;
}


if (isset($_REQUEST['VehicledetailPopup']) && $_REQUEST['VehicledetailPopup'] == '1') {
    $urlArgs = _cg("url_vars");
    ob_start();
    include _PATH . "instance/front/tpl/affiliates_vehicle_detail.php";
    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
    die;
}
?>
