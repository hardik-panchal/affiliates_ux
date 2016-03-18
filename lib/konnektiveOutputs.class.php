<?php

class konnektiveOutputs extends konnektivePurchases {

    //Outputs
    function outputURLStr($url, $q) {
        echo $url . $q;
    }

    function outputResponse() {
        echo $this->response;
    }

    function outputOrderResult() {
        $o = json_decode($this->response, true);
        echo $o['result'];
    }

    function outputOrderId() {
        $o = json_decode($this->response, true);
        echo $o['message']['orderId'];
    }

    function outputOrderErrorMess() {
        $o = json_decode($this->response, true);
        if (is_array($o)) {
            $this->outputJSONDataArrays($o);
        } else {
            $this->outputJSONData($o);
        }
    }

    function outputJSONDataArrays($dataArray) {
        echo '<div style="width:98%;padding:0 0 0 2%; margin:0;">';
        foreach ($dataArray as $k => $v) {
            echo $k . ' => ' . $v;
            echo '<br />';
            if (is_array($v)) {
                echo '<hr />';
                $this->outputJSONDataArrays($dataArray[$k]);
                echo '<hr />';
            }
        }
        echo '</div>';
    }

    function outputJSONData($dataArray) {
        echo '<div style="width:98%;padding:0 0 0 2%; margin:0;">';
        echo '<hr />';
        echo 'Error: ' . $dataArray;
        echo '<hr />';
        echo '</div>';
    }

    //end outputs
}

?>