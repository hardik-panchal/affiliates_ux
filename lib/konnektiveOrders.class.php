<?php

class konnektiveOrders extends konnektiveConnection {

    //customer data
    var $firstName;
    var $lastName;
    var $address1;
    var $postalCode;
    var $city;
    var $state;
    var $country;
    var $emailAddress;
    var $phoneNumber;
    var $ipAddress;
    var $billShipSame = 1;  // default - change to 0 if shipping is not the same as the billing
    var $shipFirstName;
    var $shipLastName;
    var $shipAddress1;
    var $shipPostalCode;
    var $shipCity;
    var $shipState;
    var $shipCountry;
    var $affId = '';
    var $paySource = 'CREDITCARD';
    private $cardNumber;
    private $cardMonth;
    private $cardYear;
    private $cardSecurityCode;
    //product data
    var $campaignId;
    var $productID = array();
    var $productPrice = array();
    var $productQty = array();
    var $productShipPrice = array();

    protected function getCardNumber() {
        return $this->cardNumber;
    }

    protected function getCardMonth() {
        return $this->cardMonth;
    }

    protected function getCardYear() {
        return $this->cardYear;
    }

    protected function getCardSecurityCode() {
        return $this->cardSecurityCode;
    }

    protected function addCustomerData2QueryStr() {
        $q .= '&firstName=' . $this->firstName;
        $q .= '&lastName=' . $this->lastName;
        $q .= '&address1=' . $this->address1;
        $q .= '&postalCode=' . $this->postalCode;
        $q .= '&city=' . $this->city;
        $q .= '&state=' . $this->state;
        $q .= '&country=' . $this->country;
        $q .= '&emailAddress=' . $this->emailAddress;
        $q .= '&phoneNumber=' . $this->phoneNumber;
        $q .= '&ipAddress=' . $this->getRealIpAddr();
        return $q;
    }

    protected function addOrderItems2QueryStr() {
        for ($pid = 0; $pid < count($this->productID); $pid++) {
            $count = $pid + 1;
            $q .= '&product' . $count . '_id=' . $this->productID[$pid];
            if ($this->productQty[$pid] > 1) {
                $q .= '&product' . $count . '_qty=' . $this->productQty[$pid];
            }
            if ($this->productPrice[$pid] != Null) {
                $q .= '&product' . $count . '_price=' . $this->productPrice[$pid];
            }
            if ($this->productShipPrice[$pid] != Null) {
                $q .= '&product' . $count . '_shipPrice=' . $this->productShipPrice[$pid];
            }
        }
        return $q;
    }

    protected function addCC2QueryStr() {
        //CC data
        $q .= '&paySource=' . $this->paySource;
        $q .= '&cardNumber=' . $this->getCardNumber();
        $q .= '&cardMonth=' . $this->getCardMonth();
        $q .= '&cardYear=' . $this->getCardYear();
        $q .= '&cardSecurityCode=' . $this->getCardSecurityCode();
        return $q;
    }

    protected function addShippingAddress2QueryStr() {
        //for if the billing is not the same as the shipping address
        if ($this->billShipSame === 0) {
            $q .= '&billShipSame=' . $this->billShipSame;
            $q .= '&shipFirstName=' . $this->shipFirstName;
            $q .= '&shipLastName=' . $this->shipLastName;
            $q .= '&shipAddress1=' . $this->shipAddress1;
            $q .= '&shipPostalCode=' . $this->shipPostalCode;
            $q .= '&shipCity=' . $this->shipCity;
            $q .= '&shipState=' . $this->shipState;
            $q .= '&shipCountry=' . $this->shipCountry;
        } else {
            $q .= '&billShipSame=' . $this->billShipSame;
        }
        return $q;
    }

    protected function addAffId() {
        if ($this->affId !== '') {
            $q .= '&affId=' . $this->affId;
        } else {
            $q = '';
        }
        return $q;
    }

    //End protected functions        
    //Imports Order into Konnektive CRM
    function importOrder() {
        $url = $this->getBaseURL().'order/import/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= $this->addCustomerData2QueryStr();
        $q .= $this->addShippingAddress2QueryStr();
        $q .= $this->addCC2QueryStr();
        $q .= $this->addAffId();
        //$q .= '&sendConfirmEmail=1';       
        //item data
        $q .= '&campaignId=' . $this->campaignId;
        $q .= $this->addOrderItems2QueryStr();
        $this->curlAction($url, $q);
    }

    //Queries Konnektive CRM for an order with OrderId
    function queryOrderByOrderID($orderID) {
        $url = $this->getBaseURL().'order/query/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&orderId=' . $orderID;
        $this->curlAction($url, $q);
    }

    //Public Functions
    function getOrderResult() {
        $o = json_decode($this->response, true);
        return $o['result'];
    }

    function getOrderId() {
        $o = json_decode($this->response, true);
        return $o['message']['orderId'];
    }

    function getOrderErrorMess() {
        $o = json_decode($this->response, true);
        return $o['message'];
    }

    function getOrderCustomerDataArray($orderId) {
        $this->queryOrderByOrderID($orderId);
        $o = $this->getResponseArray();
        $d = $o['message']['data'];
        $i = $d[0];
        return $i;
    }

    function getOrderItemsArray($orderId) {
        $this->queryOrderByOrderID($orderId);
        $o = $this->getResponseArray();
        $d = $o['message']['data'];
        $i = $d[0]['items'];
        return $i;
    }

    function getProductSku($campaignID, $productID) {
        $url = $this->getBaseURL().'campaign/query/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&campaignId=' . $campaignID;
        $this->curlAction($url, $q);
        $r = $this->getResponseArray();
        $d = $r['message']['data'][0];
        $p = false;
        foreach ($d['products'] as $key => $value) {
            foreach ($d['products'][$key] as $k => $v) {
                if ($v == $productID) {
                    $p = $d['products'][$key]['productSku'];
                }
            }
        }
        return $p;
    }

    function addItem($id, $qty = 1, $price = Null, $shippingPrice = Null) {
        array_push($this->productID, $id);
        array_push($this->productQty, $qty);
        array_push($this->productPrice, $price);
        array_push($this->productShipPrice, $shippingPrice);
    }

    function setCardNumber($ccn) {
        $this->cardNumber = $ccn;
    }

    function setCardMonth($ccm) {
        $this->cardMonth = $ccm;
    }

    function setCardYear($ccy) {
        $this->cardYear = $ccy;
    }

    function setCardSecurityCode($ccsc) {
        $this->cardSecurityCode = $ccsc;
    }

    function getRealIpAddr() {
        $s = $_SERVER;
        if (!empty($s['HTTP_CLIENT_IP'])) {   //check ip from share internet
            $ip = $s['HTTP_CLIENT_IP'];
        } else if (!empty($s['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
            $ip = $s['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $s['REMOTE_ADDR'];
        }
        return $ip;
    }

    //End Public Functions
}

?>