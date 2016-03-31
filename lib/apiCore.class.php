<?php

/**
 *  Class file to provide core
 *  functions for API Calls
 * 
 *  i.e. 
 *  Curl requests
 *  Handling SOAP Calls
 *  Handling XML Responses
 *  Handling JSON Responses
 *  
 * 
 * 
 */
class apiCore {

    public function doCall($url) {
        $ch = curl_init();
        $timeout = 5;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:18.0) Gecko/20100101 Firefox/18.0');
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function prepareApiUrl() {
        if (count($this->params) == 0) {
            return $url = $this->apiURL . $this->apiEndpoint;
        }
        $params = array();
        foreach ($this->params as $option => $value) {
            $params[] = "{$option}=" . urlencode($value);
        }
        return $this->apiURL . $this->apiEndpoint . "?" . (implode("&", $params));
    }

    public function doPostCall($url, $body) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        $output = curl_exec($ch);
        $errno = curl_errno($ch);
        $error = curl_error($ch);
        $this->setLastStatusFromCurl($ch);
        curl_close($ch);
    }

    public function doJSONCall($url, $body) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);

        $output = curl_exec($ch);
        $errno = curl_errno($ch);
        $error = curl_error($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($output, 0, $header_size);
        $body = substr($output, $header_size);

        curl_close($ch);
        return array($output, $body, $header);
    }

    /**
     * make curl call with oauth token
     * copied from deputy api

     * 
     */
    public function doOAuthCall($url) {
        //$access_token = "adc5cdd9354843ccc1d4a83bebf9004e";

        $curl_handler = curl_init();
        curl_setopt($curl_handler, CURLOPT_URL, $url);
        curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handler, CURLOPT_POST, true);
        curl_setopt($curl_handler, CURLOPT_HTTPHEADER, array(
            'Authorization: OAuth ' . $this->oAuthToken,
            'Content-Type: application/json',
            'Content-Length: ' . strlen($this->postData)
        ));
        curl_setopt($curl_handler, CURLOPT_SSL_VERIFYPEER, false);
        if ($this->postData) {
            curl_setopt($curl_handler, CURLOPT_POSTFIELDS, $this->postData);
        }
        $output = curl_exec($curl_handler);
        curl_close($curl_handler);
        $json = json_decode($output, true);
        return $json;
    }

}

?>
