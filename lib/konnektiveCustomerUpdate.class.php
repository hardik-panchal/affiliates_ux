<?php

class konnektiveCustomerUpdate extends konnektiveCampaign {

    //Get and/or update Customer Data
    protected function queryCustomerData($email) {
        $url = $this->getBaseURL().'customer/query/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&emailAddress=' . $email;
        $this->curlAction($url, $q);
    }

    protected function queryCustomerHistory($customerId, $page = 1, $resultsPerPage = 200) {
        $url = $this->getBaseURL().'customer/history/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&customerId=' . $customerId;
        $q .= '&page=' . $page;
        $q .= '&resultsPerPage=' . $resultsPerPage;
        $this->curlAction($url, $q);
    }

    protected function insertCustomerData($customerId, $customerDataArray) {
        $url = $this->getBaseURL().'customer/update/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&customerId=' . $customerId;
        foreach ($customerDataArray as $k => $v) {
            $q .= '&' . $k . '=' . $v;
        }
        $this->curlAction($url, $q);
    }

    protected function insertCustomerNote($customerId, $message) {
        $url = $this->getBaseURL().'customer/addnote/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&customerId=' . $customerId;
        $q .= '&message=' . $message;
        $this->curlAction($url, $q);
    }

    function getCustomerData($email) {
        $this->queryCustomerData($email);
        $r = $this->getResponseArray();
        return $r;
    }

    function getCustomerHistory($customerId, $page = 1, $resultsPerPage = 200) {
        $this->queryCustomerHistory($customerId, $page, $resultsPerPage);
        $r = $this->getResponseArray();
        return $r;
    }

    function getCustomerID($email) {
        $this->queryCustomerData($email);
        $o = $this->getResponseArray();
        $d = $o['message']['data'];
        if (count($d) > 1) {
            $i = false;
        } else {
            $i = $d[0]['customerId'];
        }
        return $i;
    }

    function updateCustomerData($customerId, $customerDataArray) {
        $this->insertCustomerData($customerId, $customerDataArray);
        $o = $this->getResponseArray();
        return $o['result'];
    }

    function addCustomerNote($customerId, $message) {
        $this->insertCustomerNote($customerId, $message);
        $r = $this->getResponseArray();
        return $r['result'];
    }

}

?>