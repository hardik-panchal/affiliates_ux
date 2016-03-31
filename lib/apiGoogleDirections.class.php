<?php

/**
 * 
 * API client class to integrate with google directions api to calculate garage out time
 * http://maps.googleapis.com/maps/api/directions/json?origin=Toronto&destination=Montreal&sensor=false
 * 
 * @author hardikpanchal469@gmail.com
 * 
 */
class apiGoogleDirections extends apiCore {

    public $apiURL = "http://maps.googleapis.com/maps/api/directions/";
    public $apiEndpoint = "json";

    public function doRequest($from,$to) {

        $this->params['origin'] = $from;
        $this->params['destination'] = $to;
        $this->params['sensor'] = 'false';

        return $result = $this->doCall($this->prepareApiUrl());
    }

}

?>
