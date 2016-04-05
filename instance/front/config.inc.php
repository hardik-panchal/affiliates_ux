<?php
# Commit Test
//error_reporting(E_ALL);
$auth_pages = array();
$auth_pages[] = "home";
$auth_pages[] = "record";
//$auth_pages[] = "api_settings";



if ($_REQUEST['logout']) {
    User::killSession();
    _R(lr('login'));
}
_auth_url($auth_pages, "login");
?>