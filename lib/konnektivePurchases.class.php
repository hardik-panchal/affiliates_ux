<?php

class konnektivePurchases extends konnektiveCustomerUpdate {

    protected function queryPurchaseData($orderId, $page = 1, $resultsPerPage = 10) {
        $url = $this->getBaseURL().'purchase/query/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&orderId=' . $orderId;
        $q .= '&page=' . $page;
        $q .= '&resultsPerPage=' . $resultsPerPage;
        $this->curlAction($url, $q);
    }

    protected function queryPurchaseDataByEmail($email, $page = 1, $resultsPerPage = 200) {
        $url = $this->getBaseURL().'purchase/query/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&emailAddress=' . $email;
        $q .= '&page=' . $page;
        $q .= '&resultsPerPage=' . $resultsPerPage;
        $this->curlAction($url, $q);
    }

    protected function queryPurchaseDataByPurchaseId($purchaseId, $page = 1, $resultsPerPage = 200) {
        $url = $this->getBaseURL().'purchase/query/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&purchaseId=' . $purchaseId;
        $q .= '&page=' . $page;
        $q .= '&resultsPerPage=' . $resultsPerPage;
        $this->curlAction($url, $q);
    }

    protected function updateBillingCycle($purchaseId, $billingIntervalDays) {
        $url = $this->getBaseURL().'purchase/update/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&purchaseId=' . $purchaseId;
        $q .= '&billingIntervalDays=' . $billingIntervalDays;
        $this->curlAction($url, $q);
    }

    protected function updateNextBillDate($purchaseId, $nextBillDate) {
        $url = $this->getBaseURL().'purchase/update/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&purchaseId=' . $purchaseId;
        $q .= '&nextBillDate=' . $nextBillDate;
        $this->curlAction($url, $q);
    }

    protected function queryTransactionDataByEmail($email, $page = 1, $resultsPerPage = 200) {
        $url = $this->getBaseURL().'transactions/query/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&emailAddress=' . $email;
        $q .= '&page=' . $page;
        $q .= '&resultsPerPage=' . $resultsPerPage;
        $this->curlAction($url, $q);
    }

    protected function searchPurchaceData4PurchaseId($orderId, $purchaceData) {
        $r = false;
        foreach ($purchaceData as $k => $v) {
            foreach ($purchaceData[$k] as $k1 => $v1) {
                if ($v1 === $orderId) {
                    $r = $purchaceData[$k]['purchaseId'];
                }
            }
        }
        return $r;
    }

    protected function searchPurchaceData4PurchaseIdByEmail($email, $purchaceData) {
        $r = false;
        foreach ($purchaceData as $k => $v) {
            foreach ($purchaceData[$k] as $k1 => $v1) {
                if ($v1 === $email) {
                    $r = $purchaceData[$k]['purchaseId'];
                }
            }
        }
        return $r;
    }

    function getPurchaseData($orderId) {
        $this->queryPurchaseData($orderId);
        $r = $this->getResponseArray();
        return $r;
    }

    function getPurchaseDataByEmail($email, $page = 1, $resultsPerPage = 200) {
        $this->queryPurchaseDataByEmail($email, $page, $resultsPerPage);
        $r = $this->getResponseArray();
        return $r;
    }

    function getTransactionDataByEmail($email, $page = 1, $resultsPerPage = 200) {
        $this->queryTransactionDataByEmail($email, $page, $resultsPerPage);
        $r = $this->getResponseArray();
        return $r;
    }

    function getPurchaseId($orderId, $page = 1, $resultsPerPage = 10) {
        $this->queryPurchaseData($orderId, $page, $resultsPerPage);
        $o = $this->getResponseArray();
        $d = $o['message']['data'];
        if (count($d) > 1) {
            $i = $this->searchPurchaceData4PurchaseId($orderId, $d);
        } else {
            $i = $d[0]['purchaseId'];
        }
        return $i;
    }

    function getPurchaseIdByEmail($email) {
        $this->queryPurchaseDataByEmail($email);
        $o = $this->getResponseArray();
        $d = $o['message']['data'];
        if (count($d) > 1) {
            $i = $this->searchPurchaceData4PurchaseIdByEmail($email, $d);
        } else {
            $i = $d[0]['purchaseId'];
        }
        return $i;
    }

    function getBillingIntervalDays($purchaseId) {
        $this->queryPurchaseDataByPurchaseId($purchaseId, 1, 1);
        $o = $this->getResponseArray();
        $d = $o['message']['data'][0]['billingIntervalDays'];
        return $d;
    }

    function setBillingCycle($purchaseId, $billingIntervalDays) {
        $this->updateBillingCycle($purchaseId, $billingIntervalDays);
        $o = $this->getResponseArray();
        $d = false;
        if ($o['result'] === 'SUCCESS') {
            $d = true;
        }
        return $d;
    }

    function setNextBillDate($purchaseId, $nextBillDate) {
        $this->updateNextBillDate($purchaseId, $nextBillDate);
        $o = $this->getResponseArray();
        $d = false;
        if ($o['result'] === 'SUCCESS') {
            $d = true;
        }
        return $d;
    }

}

?>