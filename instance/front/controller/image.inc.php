<?php

$no_visible_elements = 1;
$urlArgs = _cg("url_vars");
$id = $urlArgs[0];
$image = qs("select image from affiliates where id={$urlArgs[0]}");
if ($_REQUEST['id'] == $urlArgs[0]) {



    if (isset($_FILES['image'])) {
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

        $expensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }
        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }
        if (empty($errors) == true) {


            $name = $_FILES["image"]["name"];
            $ext = end((explode(".", $name))); # extra () to prevent notice

                         $file_name = $id . "_" . date("Y_m_d_H_i_s") . "." . $ext;

            $location = _PATH . "instance/front/media/uploads/" . $file_name;
            move_uploaded_file($file_tmp, $location);
        } else {
            print_r($errors);
        }
    }
}
_cg("page_title", "Image");
$jsInclude = "home.js.php";
