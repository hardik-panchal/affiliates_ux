<?php

class ShipOffers {

    private $loginId;
    private $password;
    protected $base_url;
    protected $store_id;
    //curl response
    var $response;
    var $sentJSON;
    //order information
    var $order_number;
    var $requested_shipping_service = 'UPS First Class';
    var $ship_name;
    var $address1;
    var $address2;
    var $postal_code;
    var $city;
    var $state;
    var $country;
    var $phone;
    var $email;
    var $order_date;
    var $orderData = array(
        'order_number' => null,
        'requested_shipping_service' => null,
        'ship_name' => null,
        'address1' => null,
        'address2' => null,
        'city' => null,
        'country' => null,
        'phone' => null,
        'email' => null,
        'order_date' => null,
        'items' => null
    );
    var $items = array();

    public function __construct() {
        $this->loginId = SHIPOFFERS_LOGINID;
        $this->password = SHIPOFFERS_PASSWORD;
        $this->base_url = SHIPOFFERS_BASE_URL;
        $this->store_id = SHIPOFFERS_STORE_ID;
    }

    //Protected functions  
    protected function curlAction($url, $q) {
        $order = array('order' => $q);
        $dataStr = json_encode($order);
        $this->sentJSON = $dataStr;
        $i = $this->getLoginID();
        $p = $this->getPassword();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->base_url . $url);
        curl_setopt($ch, CURLOPT_USERPWD, $i . ':' . $p);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataStr);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($dataStr)
        ));
        $this->response = curl_exec($ch);
        curl_close($ch);
    }

    protected function getLoginID() {
        return $this->loginId;
    }

    protected function getPassword() {
        return $this->password;
    }

    //Return functions
    function getResponseArray() {
        $o = json_decode($this->response, true);
        return $o;
    }

    function getResponseJSON() {
        $o = $this->response;
        return $o;
    }

    //output JSON
    function outputJSON() {
        $this->orderData['order_number'] = $this->order_number;
        $this->orderData['requested_shipping_service'] = $this->requested_shipping_service;
        $this->orderData['ship_name'] = $this->ship_name;
        $this->orderData['address1'] = $this->address1;
        $this->orderData['address2'] = $this->address2;
        $this->orderData['city'] = $this->city;
        $this->orderData['state'] = $this->state;
        $this->orderData['country'] = $this->country;
        $this->orderData['postal_code'] = $this->postal_code;
        $this->orderData['phone'] = $this->phone;
        $this->orderData['email'] = $this->email;
        $this->orderData['order_date'] = $this->order_date;
        $this->orderData['items'] = $this->items;

        $order = array('order' => $this->orderData);

        $dataStr = json_encode($order);
        echo $dataStr;
    }

    public function addItem($sku, $quantity) {
        $itemData = array('sku' => $sku, 'quantity' => $quantity);
        array_push($this->items, $itemData);
    }

    public function send() {
        $url = 'stores/' . $this->store_id . '/orders/new.json';
        $this->orderData['order_number'] = $this->order_number;
        $this->orderData['requested_shipping_service'] = $this->requested_shipping_service;
        $this->orderData['ship_name'] = $this->ship_name;
        $this->orderData['address1'] = $this->address1;
        $this->orderData['address2'] = $this->address2;
        $this->orderData['city'] = $this->city;
        $this->orderData['state'] = $this->state;
        $this->orderData['country'] = $this->country;
        $this->orderData['postal_code'] = $this->postal_code;
        $this->orderData['phone'] = $this->phone;
        $this->orderData['email'] = $this->email;
        $this->orderData['order_date'] = $this->order_date;
        $this->orderData['items'] = $this->items;

        $this->curlAction($url, $this->orderData);
    }

    public function wasSent() {
        $a = $this->getResponseArray();
        foreach ($a as $k => $v) {
            if ($k === 'errors') {
                return false;
            }
        }
        return true;
    }

    public function getErrorMessage() {
        $a = $this->getResponseArray();
        foreach ($a as $k => $v) {
            if ($k === 'errors') {
                $i = $v;
            }
        }
        return $i[0];
    }

    public static function _doPush($foxycart_data) {

        $customer_data = $foxycart_data['customer'];
        $prodcut_data = $foxycart_data['product'];
        $shipto_multiple = $foxycart_data['shipto_multiple'];
        $shipto_single = $foxycart_data['shipto_single'];

        $this->order_number = $customer_data['transaction_id'];
        $this->ship_name = $customer_data['customer_first_name'] . " " . $customer_data['customer_last_name'];
        $this->address1 = $customer_data['customer_address1'];
        $this->address2 = $customer_data['customer_address2'];
        $this->city = $customer_data['customer_city'];
        $this->state = $customer_data['customer_state'];
        $this->country = $customer_data['customer_country'];
        $this->postal_code = $customer_data['customer_postal_code'];
        $this->phone = $customer_data['customer_address1'];
        $this->email = $customer_data['customer_email'];
        $this->order_date = date("Y-m-d");

        foreach ($products_data as $each_product) {
            $this->addItem($each_product['product_code'], $each_product['product_quantity']);
        }

        $this->send();
    }

}
