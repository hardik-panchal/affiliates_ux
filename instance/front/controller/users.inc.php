<?php

/**
 * Default Placeholder file
 * @version 1.0
 * @package BiOptimizers - FoxyCart
 * 
 */
if (!isset($_SESSION['user']['is_admin']) || $_SESSION['user']['is_admin'] != '1'){
    _R(lr('home'));
}
if (isset($_REQUEST['fillUser'])) {
    $userid = $_REQUEST['UserId'];
    $data = q("select * from users where id='{$userid}'");
    json_die(1, $data);
    die;
}
if (isset($_REQUEST['saveUser']) && $_REQUEST['saveUser'] == 1) {
    $fields = array();
    $fields['first_name'] = $_REQUEST['txtFirst'];
    $fields['last_name'] = $_REQUEST['txtLast'];
    $fields['email'] = $_REQUEST['txtEmail'];
    $fields['phone'] = $_REQUEST['txtPhone'];
    $fields['designation'] = $_REQUEST['txtDesignation'];
    $fields['billing_address'] = $_REQUEST['txtBillingAddress'];
    $fields['shipping_address'] = $_REQUEST['txtShippingAddress'];
    if ($_REQUEST['user_id'] == '') {
        $fields['password'] = md5($_REQUEST['txtPassword']);
        qi("users", _escapeArray($fields));
    } else {
        $fields['id'] = $_REQUEST['user_id'];
        qu("users", _escapeArray($fields), " id = '" . $_REQUEST['user_id'] . "'");
    }
    echo "success";
    die;
}
if (isset($_REQUEST['fillAllUser']) && $_REQUEST['fillAllUser'] == 1) {
    $users = q("select * from users where is_admin='0'");
    include _PATH . 'instance/front/tpl/users_data.php';
    die;
}
if (isset($_REQUEST['deleteRecord']) && $_REQUEST['deleteRecord'] == 1) {
    qd("users", " id = '" . $_REQUEST['user_id'] . "'");
    $users = q("select * from users where is_admin='0'");
    include _PATH . 'instance/front/tpl/users_data.php';
    die;
}
_cg("page_title", "Users Management");
$users = q("select * from users where is_admin='0'");
$jsInclude = "users.js.php";
//print "FoxyCart Webhook";
?>