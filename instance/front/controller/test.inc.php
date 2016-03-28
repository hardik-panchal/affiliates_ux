<?php
_errors_on();

//$apiLimo = new apiLimo();
//$data = $apiLimo->GetAffiliates();
//d($data);
//$_SESSION['aff'] = $data;
d($_SESSION['aff']);


die;
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