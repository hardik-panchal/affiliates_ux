<?php

class konnektiveCampaign extends konnektiveOrderStatus {

    //Campaign function(s)
    protected function queryCampaignData($campaignID) {
        $url = $this->getBaseURL().'campaign/query/';
        $q = 'loginId=' . $this->getLoginID();
        $q .= '&password=' . $this->getPassword();
        $q .= '&campaignId=' . $campaignID;
        $this->curlAction($url, $q);
    }

    function getCampaignData($campaignID) {
        $this->queryCampaignData($campaignID);
        $r = $this->getResponseArray();
        return $r;
    }

}

?>