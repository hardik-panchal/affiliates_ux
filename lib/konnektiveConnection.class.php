<?php

class konnektiveConnection {

    private $loginId;
    private $password;
    private $baseURL;
    var $response;

    function __construct() {
        $this->loginId = KONNECTIVE_LOGINID;
        $this->password = KONNECTIVE_PASSWORD;
        $this->baseURL = KONNECTIVE_BASE_URL;
    }

    //Protected functions  
    protected function curlAction($url, $q) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $q);
        $this->response = curl_exec($ch);
        curl_close($ch);
    }

    protected function getBaseURL() {
        return $this->baseURL;
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

}

?>