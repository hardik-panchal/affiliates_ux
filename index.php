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

# For Mail variables 
define('SMTP_EMAIL_USER_NAME', 'temp@go-brilliant.com'); # smtp service username
define('SMTP_EMAIL_USER_PASSWORD', 'hardikpanchal'); # smtp service password
define('MAIL_FROM_EMAIL', 'rf@go-brilliant.com'); # email to be used a from email
define('MAIL_FROM_NAME', 'Brilliant Transportation'); # name to be used as from email

define('SMTP_EMAIL_USER_NAME_QUOTE', 'quotes@go-brilliant.com'); # smtp service username for quotes 
define('SMTP_EMAIL_USER_PASSWORD_QUOTE', '$quotes$'); # smtp service password for quotes - old vanquotes
#

# DB informaitons
define('DB_HOST', 'localhost');
define('DB_PASSWORD', '');
define('DB_UNAME', 'root');
define('DB_NAME', 'brilliant_affiliates');


# Flag to help partison development and live environment
define('IS_DEV_ENV', TRUE);

# bootstrap the application
include "loader.php";
?>
