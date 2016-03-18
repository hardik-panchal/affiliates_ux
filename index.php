<?php
/**
 * 
 * Init file to manage all page flow for foxycart webhook
 * 
 * Assigns constant vars
 * @version 1.0
 * @package Brilliant 
 * 
 */
session_start();
error_reporting(0);

# DB informaitons
define('DB_HOST', 'localhost');
define('DB_PASSWORD', '');
define('DB_UNAME', 'root');
define('DB_NAME', 'brilliant_affiliates');

#Ship Offers Data
define('SHIPOFFERS_LOGINID', 'systems+mas001-api@shipoffers.com');
define('SHIPOFFERS_PASSWORD', 'cTMkw4x3cD7f6SWM');
define('SHIPOFFERS_BASE_URL', 'http://api.etrackerplus.com:80/api/');
define('SHIPOFFERS_STORE_ID', '8a9a057e-4195-40df-b39c-795669af1a8a');

#Konnective Data
define('KONNECTIVE_LOGINID', 'djarsoftware@gmail.com');
define('KONNECTIVE_PASSWORD', '5hAHUHrqcf');
define('KONNECTIVE_BASE_URL', 'https://api.konnektive.com/');


# Flag to help partison development and live environment
define('IS_DEV_ENV', false);

# bootstrap the application
include "loader.php";
?>
