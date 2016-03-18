<?php


$so = new ShipOffers();

$so->order_number = '1-151112091327';
$so->ship_name = 'Chad Dolan';
$so->address1 = '900 Test Dr';
$so->address2 = '';
$so->city = 'Test City';
$so->state = 'OH';
$so->country = 'US';
$so->postal_code = '55555';
$so->phone = '555-555-5555';
$so->email = 'test@test.com';
//$d = date('Y-m-d H:i:s');
$so->order_date = '2015-11-12';

//add items
$so->addItem('p3om', 1);
$so->addItem('MZNew250', 2);


echo $so->ship_name . '<br /><br />';
$so->send();
echo $so->sentJSON;
echo '<br /><br />';
echo $so->getResponseJSON();
echo '<br /><br />';
if ($so->wasSent()) {
    echo 'Sent';
} else {
    echo 'Failed:<br />';
    echo $so->getErrorMessage();
}