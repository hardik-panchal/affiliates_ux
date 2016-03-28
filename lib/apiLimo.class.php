<?php

/**
 *  Class file to integrate MyLimo API
 * 
 *  Get Trips
 *  Get Reservation
 *  Get Route
 *  
 *  https://book.mylimobiz.com/api/ApiService.asmx?op=GetReservation
 *  https://book.mylimobiz.com/api/ApiService.asmx
 *  
 * 
 * Sample Envelop:
 *    
 * <?xml version="1.0" encoding="utf-8"?>
 *   <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
 *     <soap:Body>
 *       <GetStates xmlns="https://book.mylimobiz.com/api">
 *         <apiId>string</apiId>
 *         <apiKey>string</apiKey>
 *       </GetStates>
 *     </soap:Body>
 *   </soap:Envelope>
 * 
 * @author hardikpanchal469@gmail.com
 * @since October 30, 2013
 * @version 1.0
 * 
 * URL: qa.manage.mylimobiz.com/admin
 * Company ID: limotest1
 * User: admin
 * Pass: Limo@ny2014
 * 
 * Company Name: limotest1
  username: admin
  Password: Limo@ny2014!
 * 
 * SFDC - David1@#4
 * 
 * FOR LIVE - manage.mylimobiz.com/admin
 * brillianttransportation / hardik / Tatto1@#4
 * 
 */
ini_set("soap.wsdl_cache_enabled", "0");

//require_once(_PATH . 'lib/soap/nusoap/nusoap.php');

class apiLimo extends apiCore {

    public $apiID = 'w2BPbKsEk9me4yG';
    public $apiKey = "xH09GN!#W8oqHLcMK27o";
    public $accountNumber = "31049";
    public $wsdlProd = "https://book.mylimobiz.com/api/ApiService.asmx?WSDL";
    public $wsdl = "";
    public $client;
    public $params = array();
    public $apiIDDev = 'x8ATUG4wPie5Mzf';
    public $apiKeyDev = 'YmHD$g9kZAPaPJcBNBIW';
    public $wsdlDev = "https://qa.book.mylimobiz.com/api/ApiService.asmx?WSDL";

    public function __construct() {

        $this->params['apiId'] = $this->apiID;
        $this->params['apiKey'] = $this->apiKey;
        $this->wsdl = $this->wsdlProd;

        $this->client = new SoapClient($this->wsdl, array("trace" => 1, "exception" => 0));
    }

    public function getStates() {
        return $this->client->GetStates($this->params);
    }

    public function getReservation($tripCode, $tripId) {
        $tripCode = compatibleTripCode($tripCode);
        $this->params['tripCode'] = $tripCode;
        $this->params['idTrip'] = $tripId;
        return $this->client->GetReservation($this->params);
    }

    /**
     * https://book.mylimobiz.com/api/ApiService.asmx?op=SearchReservations
     */
    public function getReservations($fromDate, $toDate) {
        $this->params['searchOptions']['DateStart'] = $fromDate; //"2013-10-30T00:00:00";
        $this->params['searchOptions']['DateEnd'] = $toDate; //"2013-10-31T23:59:59";

        $this->params['searchOptions']['PageIndex'] = "1";
        $this->params['searchOptions']['PageSize'] = "100";
        $this->params['searchOptions']['ReservationStatus'] = "NEW";
        //$this->params['searchOptions']['AcctNumber'] = $this->accountNumber;

        return $this->client->SearchReservations($this->params);
    }

    public function getAllReservations($fromDate, $toDate, $pageIndex = '1') {
        $this->params['searchOptions']['DateStart'] = $fromDate; //"2013-10-30T00:00:00";
        $this->params['searchOptions']['DateEnd'] = $toDate; //"2013-10-31T23:59:59";

        $this->params['searchOptions']['PageIndex'] = $pageIndex;
        $this->params['searchOptions']['PageSize'] = "50";
        $this->params['searchOptions']['ReservationStatus'] = "NEW,STL";
        //$this->params['searchOptions']['AcctNumber'] = $this->accountNumber;

        return $this->client->SearchReservations($this->params);
    }

    /**
     * search reservations by account number
     * 30069 : Jeff Blau
     * 
     * @author Hardik Panchal<hardikpanchal469@gmail.com>
     * @since February 04, 2014
     */
    public function searchReservationByAccount($account_number, $fromDate, $toDate, $page_index = '1') {
        $this->params['searchOptions']['DateStart'] = $fromDate; //"2013-10-30T00:00:00";
        $this->params['searchOptions']['DateEnd'] = $toDate; //"2013-10-31T23:59:59";

        $this->params['searchOptions']['PageIndex'] = $page_index;
        $this->params['searchOptions']['PageSize'] = "50";
        $this->params['searchOptions']['ReservationStatus'] = "STL";
        $this->params['searchOptions']['AcctNumber'] = $account_number;

        return $this->client->SearchReservations($this->params);
    }

    /**
     * https://book.mylimobiz.com/api/ApiService.asmx?op=GetDrivers
     */
    public function getDrivers() {
        return $this->client->GetDrivers($this->params);
    }

    public function getDriver($driverId) {
        $this->params['idDriver'] = $driverId;
        return $this->client->GetDriver($this->params);
    }

    public function getCars() {
        $data = (array) $this->client->GetCars($this->params);
        return $data;
    }

    public function getTripTimes($tripCode, $tripId) {
        $tripCode = compatibleTripCode($tripCode);
        $this->params['tripCode'] = $tripCode;
        $this->params['idTrip'] = $tripId;
        $data = (array) $this->client->GetTimeDetails($this->params);
        return $data;
    }

    public function GetTripRoutings($tripCode, $tripId) {
        $tripCode = compatibleTripCode($tripCode);
        $this->params['tripCode'] = $tripCode;
        $this->params['idTrip'] = $tripId;
        $data = (array) $this->client->GetTripRoutings($this->params);
        return $data;
    }

    public function getCarsTypes() {
        $data = (array) $this->client->GetVehicleTypes($this->params);
        return $data;
    }

    public function getTripCar($tripCode, $tripId) {
        $tripCode = compatibleTripCode($tripCode);
        $this->params['tripCode'] = $tripCode;
        $this->params['idTrip'] = $tripId;
        $data = (array) $this->client->GetTripCar($this->params);
        return $data;
    }

    public function UpdateTripStatus($tripId, $tripCode, $status) {
        $tripCode = compatibleTripCode($tripCode);
        $this->params['tripCode'] = $tripCode;
        $this->params['idTrip'] = $tripId;
        $this->params['statusCode'] = $status;
        $data = (array) $this->client->UpdateTripStatus($this->params);
        return $data;
    }

    public function GetTripAffInfo($tripId) {
        $this->params['idTrip'] = $tripId;
        $data = (array) $this->client->GetTripAffInfo($this->params);
        return $data;
    }

    public function GetTripReservationStatus($tripCode, $tripId) {
        $tripCode = compatibleTripCode($tripCode);
        $this->params['tripCode'] = $tripCode;
        $this->params['idTrip'] = $tripId;
        $data = (array) $this->client->GetTripReservationStatus($this->params);
        return $data['GetTripReservationStatusResult']->ReservationStatus->StatusCode;
    }

    public function getLAStatus() {
        return $this->client->GetTripStatuses($this->params);
    }

    public function createReservation() {
        
    }

    public function createAccount($myparam) {
        $myparam['ContFName'] = (trim($myparam['ContFName']) == '' ? 'N/A' : $myparam['ContFName']);
        $myparam['ContLName'] = (trim($myparam['ContLName']) == '' ? 'N/A' : $myparam['ContLName']);
        $myparam['ZipPost'] = (trim($myparam['ZipPost']) == '' ? '12345' : $myparam['ZipPost']);
        $myparam['PrimaryAddress'] = (trim($myparam['PrimaryAddress']) == '' ? 'Test' : $myparam['PrimaryAddress']);
        $this->params['accountInfo']['IdCont'] = 0;
        $this->params['accountInfo']['IdComp'] = 1;
        $this->params['accountInfo']['IdParent'] = 1;
        $this->params['accountInfo']['ContGrat'] = 1;
        $this->params['accountInfo']['ContDiscount'] = 0;
        $this->params['accountInfo']['ContVoucherFee'] = 0;
        $this->params['accountInfo']['ContOtherSurchPerc'] = 0;
        $this->params['accountInfo']['DateCreated'] = date('Y-m-d');
        $this->params['accountInfo']['DateUpdated'] = date('Y-m-d');
        $this->params['accountInfo']['ContExtraFldFL1'] = 0;
        $this->params['accountInfo']['ContExtraFldFL2'] = 0;
        $this->params['accountInfo']['ContExtraFldFL3'] = 0;
        $this->params['accountInfo']['IdAgent'] = 1;
        $this->params['accountInfo']['ContAgentRate'] = 0;
        $this->params['accountInfo']['IdAgent2'] = 1;
        $this->params['accountInfo']['ContAgent2Rate'] = 0;
        $this->params['accountInfo']['IdAgrTmpl'] = 1;
        $this->params['accountInfo']['IdWebLogin'] = 1;
        $this->params['accountInfo']['IsCustomContAcctNumber'] = false;
        $this->params['accountInfo']['UserName'] = $myparam['Email'];  //here Username is email
        $this->params['accountInfo']['Password'] = '123456';
        $this->params['accountInfo']['VerifyPassword'] = '123456';
        $this->params['accountInfo']['Country'] = 'US';
        $this->params['accountInfo']['ZipPost'] = $myparam['ZipPost'];
        $this->params['accountInfo']['CityTown'] = 'New York';
        $this->params['accountInfo']['PrimaryAddress'] = $myparam['PrimaryAddress'];

        $this->params['accountInfo']['EmailList']['AccountEmail']['IdCont'] = 0;
        $this->params['accountInfo']['EmailList']['AccountEmail']['IdAccountEmail'] = 0;
        $this->params['accountInfo']['EmailList']['AccountEmail']['Type'] = 'Other';
        $this->params['accountInfo']['EmailList']['AccountEmail']['Notification'] = 'FALSE';
        $this->params['accountInfo']['EmailList']['AccountEmail']['Email'] = $myparam['Email'];



        $this->params['accountInfo']['ContPrefix'] = '';
        $this->params['accountInfo']['ContFName'] = $myparam['ContFName'];
        $this->params['accountInfo']['ContLName'] = $myparam['ContLName'];
        $this->params['accountInfo']['ContCompany'] = '';
        $this->params['accountInfo']['ContPhone1'] = $myparam['ContPhone1'];
        $this->params['accountInfo']['ContEmail'] = $myparam['Email'];
        $this->params['accountInfo']['Email'] = $myparam['Email'];
        $this->params['accountInfo']['CompanyName'] = '';
        $this->params['accountInfo']['FirstName'] = $myparam['ContFName'];
        $this->params['accountInfo']['LastName'] = $myparam['ContLName'];
        $this->params['accountInfo']['Department'] = '';
        $this->params['accountInfo']['MobilePhone'] = $myparam['ContPhone1'];
        $this->params['accountInfo']['Email'] = $myparam['Email'];
        $data_accounts = (array) $this->client->CreateAccount($this->params);
        return $data_accounts;
    }

    public function importDrivers() {
        $driversObj = $this->getDrivers();

        $driversListObj = $driversObj->GetDriversResult->Drivers->Driver;

        if (count($driversListObj)) {
            $values = array();
            foreach ($driversListObj as $each_driver) {
                $each_driver = (array) $each_driver;
                $insert_data = array('DriverId', 'DriverFName', 'DriverLName', 'DriverName', 'DriverAddr', 'DriverAptSte', 'DriverCity', 'DriverState', 'DriverCountry', 'LicenseNumber', 'LicenseState', 'LicenseExpirationDate', 'BadgeNumber', 'BadgeExpirationDate', 'SocialSecurityNumber', 'DateOfBirth', 'HomePhone', 'Fax', 'CellPhone', 'CellPhoneProvider', 'OtherPhone', 'OtherPhoneProvider', 'EmailAddress', 'DriverNotes', 'DriverStatus');

                $currentDriverInfo = getDriverInfo($each_driver['DriverId']);
                if (!empty($currentDriverInfo)) {
                    $each_driver['WakeupInterval'] = $currentDriverInfo['WakeupInterval'];
                    $each_driver['go_time_buffer'] = $currentDriverInfo['go_time_buffer'];
                    $each_driver['weekly_everage_hour'] = $currentDriverInfo['weekly_everage_hour'];
                    if ($each_driver['EmailAddress'] == '') {
                        $each_driver['EmailAddress'] = $currentDriverInfo['EmailAddress'];
                    }
                    $insert_data[] = 'WakeupInterval';
                    $insert_data[] = 'go_time_buffer';
                }

                # map the values and escape the string
                $insert_data = $this->mapValues($insert_data, $each_driver);
                $data = qs("select * from drivers where driverId = '{$each_driver['DriverId']}' ");
                if (empty($data)) {
                    qi("drivers", $insert_data);
                } else {
                    qu("drivers", $insert_data, " driverId = '{$each_driver['DriverId']}'  ");
                }
            }
        }
    }

    public function mapValues($keys, $values) {
        $return = array();
        foreach ($keys as $each_key) {
            $return[$each_key] = _escape($values[$each_key]);
        }
        return $return;
    }

    public function GetAccountsByEmail($email) {
        //$tripCode = compatibleTripCode($tripCode);
        //$this->params['tripCode'] = $tripCode;
        //$this->params['idTrip'] = $tripId;
        $this->params['email'] = $email;
        return $this->client->GetAccountsByEmail($this->params);
    }

    public function GetAccountsByAcctNumber($accountNumber) {
        $this->params['acctNumber'] = $accountNumber;
        return $this->client->GetAccountsByAcctNumber($this->params);
    }

    public function GetTripDriverByTripCode($tripId, $tripCode) {
        $tripCode = compatibleTripCode($tripCode);
        $this->params['idTrip'] = $tripId;
        $this->params['tripCode'] = $tripCode;
        $data = $this->client->GetTripDriver($this->params);
        return $data;
    }

    public function UpdateTripType($tripId, $tripCode, $trip_type) {
        $tripCode = compatibleTripCode($tripCode);
        $this->params['tripCode'] = $tripCode;
        $this->params['idTrip'] = $tripId;
        $this->params['TripType'] = $trip_type;
        $data = (array) $this->client->UpdateTripStatus($this->params);
        return $data;
    }

    public function GetAffiliates() {
        $data = $this->client->GetAffiliates($this->params);
        return $data;
    }

    public function GetAffiliateInfo($idAffiliate) {
        $this->params['idAffiliate'] = $idAffiliate;
        $data = $this->client->GetAffiliate($this->params);
        return $data;
    }

}

?>
