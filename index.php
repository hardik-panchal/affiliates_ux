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


# Flag to help partison development and live environment
define('IS_DEV_ENV', false);

# bootstrap the application
include "loader.php";
?>
