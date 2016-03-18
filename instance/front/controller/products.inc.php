<?php

/**
 * Default Placeholder file
 * @version 1.0
 * @package BiOptimizers - FoxyCart
 * 
 */
if (!isset($_SESSION['user']['is_admin']) || $_SESSION['user']['is_admin'] != '1') {
    _R(lr('home'));
}
if (isset($_REQUEST['fillProduct'])) {
    $productid = $_REQUEST['ProductId'];
    $data = q("select * from products where id='{$productid}'");
    json_die(1, $data);
    die;
}
if (isset($_REQUEST['saveProduct']) && $_REQUEST['saveProduct'] == 1) {
    $fields = array();
    $fields['product_name'] = $_REQUEST['txtProductName'];
    $fields['price'] = $_REQUEST['txtPrice'];
    $fields['color'] = $_REQUEST['txtColor'];
    $fields['description'] = $_REQUEST['txtDecription'];
    $uploadOk = 0;
    if ($_FILES['txtFile']['name']) {
        $uploadOk = "-1";
        $target_dir = _PATH . "instance/front/media/img/product/";
        $target_file = $target_dir . basename($_FILES["txtFile"]["name"]);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["txtFile"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["txtFile"]["tmp_name"], $target_file)) {
                $uploadOk = 1;
                $fields['image'] = $_FILES['txtFile']['name'];
            } else {
                $_SESSION['error_msg'] = "There was an error uploading your file.";
            }
        } else {
            $_SESSION['error_msg'] = "Please upload image file only!";
        }
    }
    if ($uploadOk != "-1") {
        if ($_REQUEST['product_id'] == '') {
            $fields['product_code'] = $_REQUEST['txtProductCode'];
            $products = q("select * from products where product_code='" . $_REQUEST['txtProductCode'] . "'");
            if (!empty($products)) {
                $_SESSION['error_msg'] = "Product Code is duplicate!";
            }
            qi("products", _escapeArray($fields));
            $_SESSION['greetings_msg'] = "Product Added successfully!";
        } else {
            $fields['id'] = $_REQUEST['product_id'];
            qu("products", _escapeArray($fields), " id = '" . $_REQUEST['product_id'] . "'");
            $_SESSION['greetings_msg'] = "Product Updated successfully!";
        }
    }
}
if (isset($_REQUEST['fillAllProduct']) && $_REQUEST['fillAllProduct'] == 1) {
    $products = q("select * from products where is_active='1'");
    include _PATH . 'instance/front/tpl/products_data.php';
    die;
}
if (isset($_REQUEST['deleteRecord']) && $_REQUEST['deleteRecord'] == 1) {
    qd("products", " id = '" . $_REQUEST['product_id'] . "'");
    $products = q("select * from products where is_active='1'");
    include _PATH . 'instance/front/tpl/products_data.php';
    die;
}
_cg("page_title", "Products Management");
$products = q("select * from products where is_active='1'");
$jsInclude = "products.js.php";
$color_code = "#000";
//print "FoxyCart Webhook";
?>