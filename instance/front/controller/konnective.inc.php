<?php
/* connective class */
require('classes/konnektive-class.php');
$k = new konnektive();

$data = $_REQUEST;
if ($data['q']) {
    $q = $data['q'];
} else {
    $q = 1;
}
if ($data['sku']) {
    $sku = '&sku=' . $data['sku'];
} else {
    $sku = '';
}
$nextURL = $data['nextURL'];

if (strtolower($data['cc_type']) === 'mastercard') {
    switch ($data['productId']) {
        case 113 : $p_id = 591;
            break;
        case 111 : $p_id = 590;
            break;
        default : $p_id = 589;
            break;
    }
    $nextURL = 'u/p3om.php';
} else {
    $nextURL = $data['nextURL'];
    $p_id = $data['productId'];
}

switch ($data['country_ship']) {
    case 'US': if ($data['productId'] == 113) {
            $s = Null;
        } else {
            $s = 7.75;
        }
        break;
    case 'CA': $s = 25;
        break;
    default: $s = 39;
        break;
}

$k->firstName = $data['firstname'];
$k->lastName = $data['lastname'];
$k->address1 = $data['address'];
$k->city = $data['city'];
$k->state = $data['state'];
$k->postalCode = $data['zip'];
$k->country = $data['country'];
$k->emailAddress = $data['email'];
$k->phoneNumber = $data['phone'];
$k->setCardNumber($data['ccnumber']);
$k->setCardMonth($data['ccexp1']);
$k->setCardYear($data['ccexp2']);
$k->setCardSecurityCode($data['cvv']);
$k->campaignId = $data['campaignId'];

if ($data['shipping_billing_address_same'] !== 'yes') {
    $k->billShipSame = 0;
    $k->shipFirstName = $data['firstname'];
    $k->shipLastName = $data['lastname'];
    $k->shipAddress1 = $data['address_ship'];
    $k->shipCity = $data['city_ship'];
    $k->shipState = $data['state_ship'];
    $k->shipPostalCode = $data['zip_ship'];
    $k->shipCountry = $data['country_ship'];
}
if ($data['a_aid'] !== '') {
    require('classes/Pap-class.php');
    $pap = new postaffiliatepro();
    if ($pap->startSession()) {
        $affId = $pap->getAffiliateCode($data['a_aid']);
        $k->affId = $affId;
    }
}

//Add items: ProductID is required, quatanty default is 1, product price defualt is set to Null (so will use the default price setup in Konnektive), product shipping price is set to Null (so will use the default shipping price setup in Konnektive)
//$k->addItem(85);
//if($data['email'] === 'djarsoftware@gmail.com'){
//$p = 0.01;
//$s = Null;
//}
//else{
$p = Null;
//}
$k->addItem($p_id, $q, $p, $s);
$k->importOrder();
if ($data['ds'] == 1) {
    $ds = '&ds=' . $data['ds'];
} else {
    $ds = '';
}
if ($k->getOrderResult() === 'SUCCESS') {
    if ($nextURL === '') {
        $k->outputOrderId();
    } else {
        header('location: ' . $nextURL . '?oid=' . $k->getOrderId() . $sku . $ds);
        exit;
    }
} else {
    if ($nextURL === '') {
        $k->outputOrderErrorMess();
    } else {
        $m = $k->getOrderErrorMess();
        if (is_array($m)) {
            $q = '&message=array';
            foreach ($m as $k => $v) {
                $q .= '&' . $k . '=' . $v;
            }
        } else {
            $q = '&message=' . $m;
        }
        header('location: orderpage.php?Error=1' . $q . '&campaignId=' . $data['campaignId'] . $ds);
        exit;
    }
}
