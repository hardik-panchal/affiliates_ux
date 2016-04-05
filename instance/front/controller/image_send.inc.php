<?php
$no_visible_elements = 1;
$urlArgs = _cg("url_vars");
$id = $urlArgs[0];

if ($_REQUEST['imageContent'] != '') {
    if ($_REQUEST['id'] != '') {
        $image = q("select * from affiliates_attachment where vehicle_id={$_REQUEST['id']} AND file_type='Image'");
    } else {
        $image = q("select * from affiliates_attachment where affiliates_id={$urlArgs[0]} AND file_type='Image'");
    }
    ?>
    <div class="row ">
        <h3>Vehicle Images</h3>
        <p>
            <?php
            foreach ($image as $value) {
                ?>
                <a  href="<?php echo _MEDIA_URL . "uploads/" . $value['file_name'] ?>" target="_blank">
                    <img src="<?php echo _MEDIA_URL . "uploads/" . $value['file_name'] ?>" alt="" style="width: 45%;margin: 10px;float: left;"/>
                </a>
            <?php } ?>
        </p>
    </div> <!-- row / end -->
    <?php
    die();
}



if (isset($_REQUEST['sendMail']) && $_REQUEST['sendMail'] == 1) {
  //  d($_REQUEST);
//    $vehicleId = $_REQUEST['vehicle'];
//    if ($vehicleId != '') {
//        $vehicle = qs("select * from affiliate_vehicles where id={$vehicleId}");
//    } else {
//        $vehicle['vehicle'] = "All ";
//    }
//    ob_start();
//    $template_width = "600";
//    echo $_REQUEST['content'];
//    $mail = ob_get_contents();
//    ob_end_clean();
//    $subject = $vehicle['vehicle'] . " Images";
//    $getemail = $_REQUEST['email'];
    //   _mailAffiliates($getemail, $subject, $mail);


    $vehicleId = $_REQUEST['vehicle'];
    $vehicleId = rtrim($vehicleId, ',');
    if ($vehicleId != '') {
        $vehicle = q("select file_name from affiliates_attachment where vehicle_id in ({$vehicleId})");
    }

    $attechment = array();
    foreach ($vehicle as $value) {
        $attechment[] = $value['file_name'];
    }

    ob_start();
    $template_width = "600";
    echo $_REQUEST['content'];
    echo '<pre>';
    $mail = ob_get_contents();
    echo '</pre>';
    ob_end_clean();

    $getemail = $_REQUEST['email'];
    $subject = $_REQUEST['sub'];
    $mail;
    _mailAffiliates($getemail, $subject, $mail, $attechment);


    echo "success";
    die;
}

$image = q("select * from affiliates_attachment where affiliates_id={$urlArgs[0]} AND file_type='Image'");

$vehicle = q("select * from affiliate_vehicles where aff_id={$urlArgs[0]}");


_cg("page_title", "Image");
$jsInclude = "image.js.php";
