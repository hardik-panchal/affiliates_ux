<?php

class konnektiveOrderStatus extends konnektiveUpsell {

    protected function queryOrdersDataByEmail($email, $page = 1, $resultsPerPage = 200) {
        $url = $this->getBaseURL().'order/query/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&emailAddress=' . $email;
        $q .= '&page=' . $page;
        $q .= '&resultsPerPage=' . $resultsPerPage;
        $this->curlAction($url, $q);
    }

    //Cancel functions
    protected function sendCancelOrder($orderId, $cancelReason) {
        $url = $this->getBaseURL().'order/cancel/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&orderId=' . $orderId;
        $q .= '&cancelReason=' . $cancelReason;
        $this->curlAction($url, $q);
    }

    public function cancelOrder($orderId, $cancelReason) {
        $this->sendCancelOrder($orderId, $cancelReason);
        $r = $this->getResponseArray();
        return $r['result'];
    }

    //get shipping Information function(s)        
    function getOrdersDataByEmail($email, $page = 1, $resultsPerPage = 200) {
        $this->queryOrdersDataByEmail($email, $page, $resultsPerPage);
        $r = $this->getResponseArray();
        return $r;
    }

    function getOrderStatusArray($orderId) {
        $this->queryOrderByOrderID($orderId);
        $o = $this->getResponseArray();
        $d = $o['message']['data'];
        $i = $d[0]['fulfillments'];
        return $i;
    }

    function getOrderStatus($orderId) {
        $this->queryOrderByOrderID($orderId);
        $o = $this->getResponseArray();
        $d = $o['message']['data'];
        $os = $d[0]['fulfillments'];
        foreach ($os as $key => $value) {
            $i = $os[$key]['status'];
        }
        return $i;
    }

    function getOrderTrackingNumber($orderId) {
        $this->queryOrderByOrderID($orderId);
        $o = $this->getResponseArray();
        $d = $o['message']['data'];
        $os = $d[0]['fulfillments'];
        foreach ($os as $key => $value) {
            $i = $os[$key]['trackingNumber'];
        }
        return $i;
    }

    function getOrderDateShipped($orderId) {
        $this->queryOrderByOrderID($orderId);
        $o = $this->getResponseArray();
        $d = $o['message']['data'];
        $os = $d[0]['fulfillments'];
        foreach ($os as $key => $value) {
            $i = $os[$key]['dateShipped'];
        }
        return $i;
    }

    function getOrderDateDelivered($orderId) {
        $this->queryOrderByOrderID($orderId);
        $o = $this->getResponseArray();
        $d = $o['message']['data'];
        $os = $d[0]['fulfillments'];
        foreach ($os as $key => $value) {
            $i = $os[$key]['dateDelivered'];
        }
        return $i;
    }

}

?>