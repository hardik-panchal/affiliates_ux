<?php

class konnektiveUpsell extends konnektiveOrders {

    //order data
    var $upsellOrderId = array();

    function importUpsell($orderID, $productID, $qty = 1, $price = Null, $shippingPrice = Null) {
        $url = $this->getBaseURL().'upsale/import/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&orderId=' . $orderID;
        $q .= '&productId=' . $productID;
        if ($qty > 1) {
            $q .= '&productQty=' . $qty;
        }
        if ($price != Null) {
            $q .= '&productPrice=' . $price;
        }
        if ($shippingPrice != Null) {
            $q .= '&productShipPrice=' . $shippingPrice;
        }
        $this->curlAction($url, $q);
    }

    function sendConfirmationEmail($orderID) {
        $url = $this->getBaseURL().'order/confirm/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&orderId=' . $orderID;
        $this->curlAction($url, $q);
    }

}

?>