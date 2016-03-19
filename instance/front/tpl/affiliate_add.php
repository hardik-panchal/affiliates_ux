
<?php
$affiliates_id = '';
$farmout_name = '';
$city_id = $urlArgs[0];
$vehicle = '';
$vehicle_no = '';
$rate_per_hour = '';
$minimum = '';
$service_area = '';
$address = '';
$notes = '';
$preferred_level = '';
$contact_name = '';
$contact_number = '';
$contact_email = '';
$renewal_date = '';
$file_comma_list = '';
$insurance_files = array();
$vehicle_photos_files = array();
if (isset($affiliates_edit) && !empty($affiliates_edit)) {
    $affiliates_id = $affiliates_edit['id'];
    $farmout_name = $affiliates_edit['farmout_name'];
    $city_id = $affiliates_edit['city'];
//  
    $address = $affiliates_edit['address'];
    $service_area = $affiliates_edit['service_area'];
    $notes = $affiliates_edit['notes'];
    $preferred_level = $affiliates_edit['preferred_level'];
    $coachbuilder = $affiliates_edit['coachbuilder'];
    $contact_name = $affiliates_edit['contact_name'];
    $contact_number = $affiliates_edit['contact_number'];
    $contact_email = $affiliates_edit['contact_email'];
    $renewal_date = date('m/d/Y', strtotime($affiliates_edit['renewal_date']));
    $expiration_date = date('m/d/Y', strtotime($affiliates_edit['expiration_date']));

    $attachment_lists = q("select * from affiliates_attachment where affiliates_id = '{$affiliates_id}'");
    if (!empty($attachment_lists)) {
        $file_comma_list = implode(",", $attachment_lists) . ",";
    }

    $insurance_files = qs("select * from affiliates_attachment where affiliates_id = '{$affiliates_id}' AND file_type = 'insurance'");
    $vehicle_photos_files = q("select * from affiliates_attachment where affiliates_id = '{$affiliates_id}' AND file_type = 'vehicle'");
    $other_files = q("select * from affiliates_attachment where affiliates_id = '{$affiliates_id}' AND file_type = 'Other'");
    $W9_photos_files = q("select * from affiliates_attachment where affiliates_id = '{$affiliates_id}' AND file_type = 'W9'");
    $brilliant_photos_files = q("select * from affiliates_attachment where affiliates_id = '{$affiliates_id}' AND file_type = 'brilliant'");
}
?>
<div class="modal-content" style="width:140%;" >
    <div class="modal-header" style="background-color: #EAEAEA;">
        <?php if ($affiliates_id > 0): ?>
            <b>Edit New Affiliates</b>
        <?php else: ?>
            <b>Add New Affiliates</b>
        <?php endif; ?>
    </div>
    <div class="modal-body " style="overflow-y: auto;">
        <div class="addAffiliates actionItem">
            <div class="panel-body" style="padding-top:0px;">
                <div id="accordion">
                    <h3>Affiliates Info</h3>
                    <div style="height:240px;">
                        <form method="post" action="" class="form-horizontal" role="form">
                            <div class="col-lg-6">
                                <div class="form-group col-lg-12" >
                                    <label for="inputquestion" style="text-align: left;margin-top: -6px;" class="col-lg-12 col-md-12 control-label">FarmOut Name</label>
                                    <div class="col-lg-12 col-md-12">
                                        <input type="text" onclick="managemsg()" class="form-control reset" name="fields[farmout_name]" id="farmout" value="<?php print $farmout_name; ?>" placeholder="Add FarmOut Name">
                                        <span id="fot_error" style="color:red;font-size: 11px;float:left;display:none;">Please Input FarmOut Name</span>
                                        <span id="fot_helpmsg" style="color:grey;font-size: 10px;float:right;">Input FarmOut Name Here </span>
                                    </div>
                                </div>

<!--                                <div class="form-group col-lg-12" style="display:none;">
                                    <label for="inputoptions" style="text-align: left;margin-top: -6px;" class="col-lg-12 col-md-12 control-label">City</label>
                                    <div class="col-lg-12 col-md-12">
                                        <input type="text" class="form-control " name="fields[city]" id="city" value="<?php print $city_id; ?>" placeholder="Add your City">
                                    </div>
                                </div>-->

                                <div class="form-group col-lg-12">
                                    <label for="inputoptions" style="text-align: left;margin-top: -6px;" class="col-lg-12 col-md-12 control-label">Contact Name</label>
                                    <div class="col-lg-12 col-md-12">
                                        <input type="text" class="form-control reset" name="fields[contact_name]" id="contact_name" value="<?php print $contact_name; ?>" placeholder="Add Contact Name">
                                        <span style="color:grey;font-size: 10px;float:right;">Input Contact Name Here </span>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="inputoptions" style="text-align: left;margin-top: -6px;" class="col-lg-12 col-md-12 control-label">Contact Number</label>
                                    <div class="col-lg-12 col-md-12">
                                        <input type="text" class="form-control reset" name="fields[contact_number]" id="contact_number" value="<?php print $contact_number; ?>" placeholder="Add Contact Number">
                                        <span style="color:grey;font-size: 10px;float:right;">Input Contact Number Here </span>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="inputoptions" style="text-align: left;margin-top: -6px;" class="col-lg-12 col-md-12 control-label">Contact Email</label>
                                    <div class="col-lg-12 col-md-12">
                                        <input type="text" class="form-control reset" name="fields[contact_email]" id="contact_email" value="<?php print $contact_email; ?>" placeholder="Add Contact Email">
                                        <span style="color:grey;font-size: 10px;float:right;">Input Contact Email Here </span>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="inputPassword1" class="col-lg-3 col-md-2 control-label">City</label>
                                    <div class="col-lg-12 col-md-12">
                                        <select class="form-control" name="fields[cityAffiliates]" id="cityAffiliates" required>
                                            <option value="">Select</option>
                                            <?php
                                            $cities = q("select * from affiliates_city");
                                            foreach ($cities as $each_city):
                                                ?>
                                                <option value="<?php print $each_city['id'] ?>" <?php
//                                        if ($cityId == $each_city['id']) {
//                                            echo "selected";
//                                        }
                                                ?>><?php print $each_city['city']; ?></option>
                                                    <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="inputoptions" style="text-align: left;margin-top: -6px;" class="col-lg-12 col-md-12 control-label">Address</label>
                                    <div class="col-lg-12 col-md-12">
                                        <input type="text" class="form-control reset" name="fields[address]" id="address" value="<?php print $address; ?>" placeholder="Add address">
                                        <span style="color:grey;font-size: 10px;float:right;">Input Address Here </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group col-lg-12">
                                    <label for="inputoptions" style="text-align: left;margin-top: -6px;" class="col-lg-12 col-md-12 control-label">Expiration Date</label>
                                    <div class="col-lg-12 col-md-12">
                                        <input type="text"  class="form-control reset" id="datepicker"  name="fields[renewal_date]" value="<?php if ($renewal_date != '12/31/1969'): ?><?php print $renewal_date; ?><?php endif; ?>" placeholder="Affiliates Renewal Date" />
                                        <span style="color:grey;font-size: 10px;float:right;">Input Expiration Date Here </span>
                                    </div>
                                </div>


                                <div class="form-group col-lg-12">
                                    <label for="inputoptions" style="text-align: left;margin-top: -6px;" class="col-lg-12 col-md-12 control-label">Coach Builder</label>
                                    <div class="col-lg-12 col-md-12">
                                        <input type="text" class="form-control reset" name="fields[coachbuilder]" id="coachbuilder" value="<?php print $coachbuilder; ?>" placeholder="Add CoachBuilder">
                                        <span style="color:grey;font-size: 10px;float:right;">Input Coach Builder Here </span>
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label for="inputoptions" style="text-align: left;margin-top: -6px;" class="col-lg-12 col-md-12 control-label">Notes</label>
                                    <div class="col-lg-12 col-md-12">

                                        <textarea type="text" class="form-control reset" name="fields[notes]" id="notes" placeholder="Add Notes"><?php print $notes; ?></textarea>
                                        <span style="color:grey;font-size: 10px;float:right;">Input Notes Here </span>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="inputoptions" style="text-align: left;margin-top: -6px;" class="col-lg-12 col-md-12 control-label">Rating</label>
                                    <div class="col-lg-12 col-md-12">
                                        <label style="color:grey;font-size: 12px;">
                                            <input style="margin-top:7px;" value="1" type="radio" name="preferred_level" <?php
                                            if ($preferred_level == 1): echo checked;
                                            endif;
                                            ?>/>&nbsp;&nbsp;
                                            <i class="fa fa-star-o" title="Preferred"></i>
                                        </label>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <label style="color:grey;font-size: 12px;">
                                            <input style="margin-top:7px;" value="2" type="radio" name="preferred_level" <?php
                                            if ($preferred_level == 2): echo checked;
                                            endif;
                                            ?>/>&nbsp;&nbsp;
                                            <i class="fa fa-star-o" title="Preferred"></i>
                                            <i class="fa fa-star-o" title="Preferred"></i>
                                        </label>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <label style="color:grey;font-size: 12px;">
                                            <input style="margin-top:7px;" value="3" type="radio" name="preferred_level" <?php
                                            if ($preferred_level == 3): echo checked;
                                            endif;
                                            ?>/>&nbsp;&nbsp;
                                            <i class="fa fa-star-o" title="Preferred"></i>
                                            <i class="fa fa-star-o" title="Preferred"></i>
                                            <i class="fa fa-star-o" title="Preferred"></i>
                                        </label>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <label style="color:grey;font-size: 12px;">
                                            <input style="margin-top:7px;" value="4" type="radio" name="preferred_level" <?php
                                            if ($preferred_level == 4): echo checked;
                                            endif;
                                            ?>/>&nbsp;&nbsp;
                                            <i class="fa fa-star-o" title="Preferred"></i>
                                            <i class="fa fa-star-o" title="Preferred"></i>
                                            <i class="fa fa-star-o" title="Preferred"></i>
                                            <i class="fa fa-star-o" title="Preferred"></i>
                                        </label>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <label style="color:grey;font-size: 12px;">
                                            <input style="margin-top:7px;" value="5" type="radio" name="preferred_level" <?php
                                            if ($preferred_level == 5): echo checked;
                                            endif;
                                            ?>/>&nbsp;&nbsp;
                                            <i class="fa fa-star-o" title="Preferred"></i>
                                            <i class="fa fa-star-o" title="Preferred"></i>
                                            <i class="fa fa-star-o" title="Preferred"></i>
                                            <i class="fa fa-star-o" title="Preferred"></i>
                                            <i class="fa fa-star-o" title="Preferred"></i>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <h3>Service Area</h3>
                    <div style="height:240px;">
                        <span id="servicearea_error" style="color:red;font-size: 12px;float:left;display:none;">Please select service area</span><br/>

                        <?php $servicearea = q("select * from affiliates_service_type where affiliates_id = '{$affiliates_id}' AND type = 'ServiceArea'"); ?>
                        <?php
                        $optionSelectedarea = array();
                        foreach ($servicearea as $index => $each_service):
                            ?>
                            <?php $optionSelectedarea[] = $each_service['service_area']; ?>
                        <?php endforeach; ?>

                        <?php $getcity = q("select * from affiliates_city GROUP BY city"); ?>
                        <?php foreach ($getcity as $each_city): ?>
                            <div class="checkbox col-lg-3" style="margin-top: 0px !important;">
                                <label>
                                    <input <?php
                                    if (in_array($each_city['city'], $optionSelectedarea)): echo 'checked';
                                    endif;
                                    ?> value="<?php print $each_city['city']; ?>" onclick="managemsg()" type="checkbox" id="chk_service_area" name="service[]" /> <?php print $each_city['city']; ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!--                    <h3>Documents Info</h3>
                                        <div>
                                            <div class="col-lg-6">
                                                <form id="insurance_attachment" method="post" action="<?php print _U ?>affiliates_attachment_upload">
                                                    <div class="form-group col-lg-6 col-md-12" style="padding: 0px;">
                                                        <label for="inputoptions" class="col-lg-12 col-md-12 control-label" style="text-align:left;">Insurance Copy</label>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div>
                    <?php
                    if (!empty($insurance_files)) {
                        $select_insurance_css = 'display:none;';
                        $uploaded_insurance_copy_file_css = 'display:block;';
                    } else {
                        $select_insurance_css = 'display:block;';
                        $uploaded_insurance_copy_file_css = 'display:none;';
                    }
                    ?>
                                                                <div id="select_insurance_copy_area" style="<?php print $select_insurance_css; ?>">
                                                                    <div style="float:left;padding: 4px 8px;" class="fileUpload btn btn-success">
                                                                        <span>Select Copy &nbsp;&nbsp;<i class="glyphicon glyphicon-upload" title="Upload"></i></span>
                                                                        <input  type="file" class="upload" name="insurance_attachment_1" id="insurance_attachment_1"/>
                                                                    </div>
                                                                    <input style="float:left;margin-left:0px;display:none;" class="btn btn-success" type="button" value="Upload" nmae="insurance_attachment_upload" id="insurance_attachment_upload"/>     
                                                                </div>
                    
                                                                <div style="clear:both;"></div>
                    
                                                                <div id="insurance_attachment_progressbar"  class="please_wait_progress_bar" style="width: 70%;margin-left:15%;margin-top:10px;padding:5px;display:none;">Please Wait....</div>
                                                                <div id="uploaded_insurance_copy_file" style="display:none;<?php print $uploaded_insurance_copy_file_css; ?>">
                    <?php
                    if (!empty($insurance_files)):
                        $insurance_files_nm_arr = explode("___", $insurance_files['file_name']);
                        $getextention = explode('.', $insurance_files['file_name']);
                        ?>
                        
                                                                            <table class="table" id="" style="width:140px;">
                                                                                <tr id="attachment_file_<?php print $insurance_files['id'] ?>">
                                                                                    <td style="width:100%;border:none;">
                                                                                        <div style="float:left;">
                                                                                            <span style="color:grey;"> <?php
                        $displayname = wordwrap($insurance_files['file_name'], 30, '<br />', true);
                        print $displayname;
                        ?></span>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td style="width:100%;border:none;">
                                                                                        <div style="float:right;cursor:pointer;" onclick="DeleteAttachment('<?php print $insurance_files['id']; ?>', '<?php print $insurance_files['file_name']; ?>', 'insurance')"><i class="glyphicon glyphicon-trash" title="Delete"></i></div><div style="clear:both;"></div>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                        
                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                    
                    
                                                <div style="clear:both;"></div>
                                                <form id="W9_attachment_upload" method="post" action="<?php print _U ?>affiliates_attachment_upload">
                                                    <div class="form-group col-lg-6 col-md-12" style="padding: 0px;">
                                                        <label for="inputoptions" class="col-lg-12 col-md-12 control-label" style="text-align:left;">W-9 Form</label>
                    
                                                        <div class="col-lg-12 col-md-12" style="padding: 0px;">
                                                            <div id="select_vehicle_photos_area" class="col-lg-6 col-md-6">
                                                                <div style="float:left;" class="fileUpload btn btn-success">
                                                                    <span>W-9 Form &nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-upload" title="Upload"></i></span>
                                                                    <input type="file" class="upload" name="W9_attachment_1" id="W9_attachment_1"/>
                                                                </div>
                                                                <input style="float:left;margin-left:0px;display:none;" class="btn btn-success" type="button" value="Upload" nmae="W9_attachment_upload" id="W9_attachment_upload"/>     
                                                            </div>
                    
                                                            <div style="clear:both;"></div>
                    
                                                            <div id="W9_attachment_progressbar"  class="please_wait_progress_bar" style="width: 70%;margin-left:15%;margin-top:10px;padding:5px;display:none;">Please Wait....</div>
                                                            <div id="uploaded_W9_photo_file" class="col-lg-6 col-md-6" style="display:none;"></div>
                    
                    <?php
                    $display_W9_list = 'display:none;';
                    if (!empty($vehicle_photos_files)) {
                        $display_vehicle_list = 'display:block;border:none;';
                    }
                    ?>
                                                            <div class="col-lg-12">
                                                                <table class="table" id="uploaded_W9_attachment_table" style="width:140px;margin-top: 10px;<?php print $display_vehicle_list; ?>">
                    
                    <?php if (!empty($W9_photos_files)) { ?>
                        <?php
                        foreach ($W9_photos_files as $each_W9_photo):
                            $W9s_files_nm_arr = '';
                            $W9s_files_nm_arr = explode("___", $each_W9_photo['file_name']);
                            ?>
                                                                                    <tr style="width:100%;" class="W9_photos_nm" id="attachment_file_<?php print $each_W9_photo['id']; ?>">
                                                                                        <td style="width:100%;border:none;">
                                                                                            <div style="float:left;"><center><span style="color:grey;"> 
                            <?php
                            $displayw9name = wordwrap($each_W9_photo['file_name'], 30, '<br />', true);
                            print $displayw9name;
                            ?>
                                                                                                    </span></center></div>
                                                                                        </td><td style="width:100%;border:none;">
                                                                                            <div style="float:right;cursor:pointer;margin-left:10px;" onclick="DeleteAttachment('<?php print $each_W9_photo['id']; ?>', '<?php print $each_W9_photo['file_name']; ?>', 'W9')"><i class="glyphicon glyphicon-trash" title="Delete"></i></div>
                                                                                            <div style="clear:both;"></div>
                                                                                        </td>
                                                                                    </tr>
                            <?php
                        endforeach;
                    }
                    ?>
                                                                </table>
                                                            </div>
                                                        </div>
                    
                                                    </div>
                                                </form>
                                                <div style="clear:both;height:1px">&nbsp;</div>
                                                <form id="brilliant_photos_attachment" method="post" action="<?php print _U ?>affiliates_attachment_upload">
                                                    <div class="form-group col-lg-6 col-md-12" style="padding: 0px;">
                                                        <label for="inputoptions" class="col-lg-12 col-md-12 control-label" style="text-align:left;">Brilliant Packages</label>
                    
                                                        <div class="col-lg-12 col-md-12" style="padding: 0px;">
                                                            <div id="select_brilliant_photos_area" class="col-lg-6 col-md-6">
                                                                <div style="float:left;" class="fileUpload btn btn-success">
                                                                    <span>Select Package &nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-upload" title="Upload"></i></span>
                                                                    <input  type="file" class="upload" name="brilliant_attachment_1" id="brilliant_attachment_1"/>
                                                                </div>
                                                                <input style="float:left;margin-left:0px;display:none;" class="btn btn-success" type="button" value="Upload" name="brilliant_attachment_upload" id="brilliant_attachment_upload"/>     
                                                            </div>
                    
                                                            <div style="clear:both;"></div>
                    
                                                            <div id="brilliant_attachment_progressbar"  class="please_wait_progress_bar" style="width: 70%;margin-left:15%;margin-top:10px;padding:5px;display:none;">Please Wait....</div>
                                                            <div id="uploaded_brilliant_photo_file" class="col-lg-6 col-md-6" style="display:none;"></div>
                    
                    <?php
                    $display_brilliant_list = 'display:none;';
                    if (!empty($brilliant_photos_files)) {
                        $display_brilliant_list = 'display:block;border:none;';
                    }
                    ?>
                                                            <div class="col-lg-12">
                    
                                                                <table class="table" id="uploaded_brilliant_attachment_table" style="width:140px;margin-top: 10px;<?php print $display_brilliant_list; ?>">
                    
                    <?php
                    if (!empty($brilliant_photos_files)) {
                        foreach ($brilliant_photos_files as $each_brilliant_photo):
                            $brilliants_files_nm_arr = '';
                            $brilliants_files_nm_arr = explode("___", $each_brilliant_photo['file_name']);
                            ?>
                                                                                    <tr style="width:100%;" class="brilliant_photos_nm" id="attachment_file_<?php print $each_brilliant_photo['id']; ?>">
                                                                                        <td style="width:100%;border:none;">
                                                                                            <div style="float:left;"><center><span style="color:grey;">
                            <?php
                            $displaybrilliantname = wordwrap($each_brilliant_photo['file_name'], 30, '<br />', true);
                            print $displaybrilliantname;
                            ?>
                                                                                                    </span></center></div>
                                                                                        </td><td style="width:100%;border:none;">
                                                                                            <div style="float:right;cursor:pointer;margin-left:10px;" onclick="DeleteAttachment('<?php print $each_brilliant_photo['id']; ?>', '<?php print $each_brilliant_photo['file_name']; ?>', 'brilliant')"><i class="glyphicon glyphicon-trash" title="Delete"></i></div>
                                                                                            <div style="clear:both;"></div>
                                                                                        </td>
                                                                                    </tr>
                            <?php
                        endforeach;
                    }
                    ?>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div style="clear:both;"></div>					
                    
                                                <form id="other_attachment_upload" method="post" action="<?php print _U ?>affiliates_attachment_upload">
                                                    <div class="form-group col-lg-6 col-md-12" style="padding: 0px;">
                                                        <label for="inputoptions" class="col-lg-12 col-md-12 control-label" style="text-align:left;">Other Document</label>
                                                        <div class="col-lg-12 col-md-12" style="padding: 0px;">
                                                            <div id="select_other_document_area" class="col-lg-6 col-md-6">
                                                                <div style="float:left;" class="fileUpload btn btn-success">
                                                                    <span>Select Document &nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-upload" title="Upload"></i></span>
                                                                    <input  type="file" class="upload" name="other_attachment_1" id="other_attachment_1"/>
                                                                </div>
                                                                <input style="float:left;margin-left:0px;display:none;" class="btn btn-success" type="button" value="Upload" name="other_attachment_upload" id="other_attachment_upload"/>     
                                                                <input type="hidden" id="affiliates_id" value="" name="affiliates_id">
                                                                <input type="hidden" id="city_id" value="" name="city_id">
                                                            </div>
                                                            <div style="clear:both;"></div>
                                                            <div id="other_attachment_progressbar"  class="please_wait_progress_bar" style="width: 70%;margin-left:15%;margin-top:10px;padding:5px;display:none;color: white;">Please Wait....</div>
                                                            <div id="uploaded_other_file" class="col-lg-6 col-md-6" style="display:none;"></div>
                    <?php
                    $display_other_list = 'display:none;';
                    if (!empty($other_files)) {
                        $display_other_list = 'display:block;border:none;';
                    }
                    ?>
                                                            <table  id="uploaded_attachment_table" style="width:140px;margin-top: 10px;">
                    <?php
                    if (!empty($other_files)) {
                        $count = 1;
                        foreach ($other_files as $each_other_file):
                            $other_files_nm_arr = '';
                            $other_files_nm_arr = explode("___", $each_other_file['file_name']);
                            ?>
                                                                                <tr style="width:100%;" class="W9_photos_nm" id="attachment_file_<?php print $each_other_file['id']; ?>">
                                                                                    <td style="width:100%;border:none;">
                                                                                        <div style="float:left;"><center><span style="color:grey;"> <?php print $each_other_file['file_name']; ?></span></center></div>
                                                                                    </td><td style="width:100%;border:none;">
                                                                                        <div style="float:right;cursor:pointer;margin-left:10px;" onclick="DeleteAttachment('<?php print $each_other_file['id']; ?>', '<?php print $each_other_file['file_name']; ?>', 'Other')"><i class="glyphicon glyphicon-trash" title="Delete"></i></div>
                                                                                        <div style="clear:both;"></div>
                                                                                    </td>
                                                                                </tr>
                                                                                            <div class="other_file_nm " style="float: left;margin: 5px;border: 1px dotted #DADADA;padding: 5px;"  id="attachment_file_<?php print $each_other_file['id']; ?>">
                                                                                    <a style="float: left;" href="<?php print _U . "affiliates_attachment/" . $each_other_file['file_name']; ?>" target="_blank">
                                                                                        <div >
                                                                                            <label class="label label-success">Open Image</label>
                                                                                            <br>
                                                                                            <img src='<?php print _U . "affiliates_attachment/" . $each_other_file['file_name'] ?>' style="width:180px;height:130px;padding-top: 20px;"/>
                                                                                        </div> 
                                                                                    </a>
                                                                                    <div style="float:left;cursor:pointer;margin-left:10px;" onclick="DeleteAttachment('<?php print $each_other_file['id']; ?>', '<?php print $each_other_file['file_name']; ?>', 'Other')">
                                                                                        <i class="glyphicon glyphicon-trash" title="Delete"></i>
                                                                                    </div>
                                                                                    <div style="clear: both;"></div>
                                                                                </div>
                            
                            <?php
                            $count++;
                        endforeach;
                    }
                    ?>
                    
                                                            </table>
                                                        </div>
                                                    </div>
                                                </form>					
                    
                                            </div>
                    
                                            <div class="col-lg-6">
                                                <div class="col-lg-2">&nbsp;</div>
                                                <div class="form-group col-lg-10 col-md-10" style="padding: 0px;text-align:right;">
                                                    <div id="div_insurance_expiration_date" style="">
                                                        <label for="expiration_date" class="col-lg-12 col-md-12 control-label" style="text-align:left;">Insurance Expiration Date</label>
                    <?php
                    $expiration_date;
                    $exp_date = date('m/d/Y', strtotime(trim($expiration_date))) == '12/31/1969' ? '' : date('m/d/Y', strtotime(trim($expiration_date)));
                    ?>
                                                        <input type="text" class="form-control input-sm" id="txt_expiration_date" name="txt_expiration_date" style="margin-left: 15px;width:80%;" value="<?php echo $exp_date; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="clear: both;">
                                                <div id="uploaded_attachment_list" style="display:none;"><?php print $file_comma_list; ?></div>
                                                <div style="margin-bottom:20px;"></div>
                                            </div>
                                            <div style="clear:both;"></div>
                                        </div>-->
                    <h3>Service Type</h3>
                    <div>
                        <?php $service = q("select * from affiliates_service_type where affiliates_id = '{$affiliates_id}' AND type = 'Service'"); ?>
                        <?php
                        $optionSelected = array();
                        foreach ($service as $index => $each_service):
                            ?>
                            <?php $optionSelected[] = $each_service['service_type']; ?>
                        <?php endforeach; ?>

                        <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                            <label>
                                <input <?php
                                if (in_array("Greeter", $optionSelected)): echo 'checked';
                                endif;
                                ?> value="Greeter" type="checkbox" id="chk_service_type" name="service[]" /> Greeter
                            </label>
                        </div>
                        <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                            <label>
                                <input <?php
                                if (in_array("On-Site Coordinator", $optionSelected)): echo 'checked';
                                endif;
                                ?> value="On-Site Coordinator" type="checkbox" id="chk_service_type" name="service[]" /> On-Site Coordinator
                            </label>
                        </div>
                        <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                            <label>
                                <input <?php
                                if (in_array("Party Bus", $optionSelected)): echo 'checked';
                                endif;
                                ?> value="Party Bus" type="checkbox" id="chk_service_type" name="service[]" /> Party Bus
                            </label>
                        </div>
                        <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                            <label>
                                <input <?php
                                if (in_array("Luxury Sprinter", $optionSelected)): echo 'checked';
                                endif;
                                ?> value="Luxury Sprinter" type="checkbox" id="chk_service_type" name="service[]" /> Luxury Sprinter
                            </label>
                        </div>
                        <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                            <label>
                                <input <?php
                                if (in_array("Sedan", $optionSelected)): echo 'checked';
                                endif;
                                ?> value="Sedan" type="checkbox" id="chk_service_type" name="service[]" /> Sedan
                            </label>
                        </div>
                        <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                            <label>
                                <input <?php
                                if (in_array("Luxury Sedan", $optionSelected)): echo 'checked';
                                endif;
                                ?> value="Luxury Sedan" type="checkbox" id="chk_service_type" name="service[]" /> Luxury Sedan
                            </label>
                        </div>
                        <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                            <label>
                                <input <?php
                                if (in_array("SUV", $optionSelected)): echo 'checked';
                                endif;
                                ?> value="SUV" type="checkbox" id="chk_service_type" name="service[]" /> SUV
                            </label>
                        </div>
                        <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                            <label>
                                <input <?php
                                if (in_array("Sprinter", $optionSelected)): echo 'checked';
                                endif;
                                ?> value="Sprinter" type="checkbox" id="chk_service_type" name="service[]" /> Sprinter
                            </label>
                        </div>
                        <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                            <label>
                                <input <?php
                                if (in_array("MiniBus", $optionSelected)): echo 'checked';
                                endif;
                                ?> value="MiniBus" type="checkbox" id="chk_service_type" name="service[]" /> MiniBus
                            </label>
                        </div>
                        <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                            <label>
                                <input <?php
                                if (in_array("Setra Coach", $optionSelected)): echo 'checked';
                                endif;
                                ?> value="Setra Coach" type="checkbox" id="chk_service_type" name="service[]" /> Setra Coach
                            </label>
                        </div>
                        <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                            <label>
                                <input <?php
                                if (in_array("Coach", $optionSelected)): echo 'checked';
                                endif;
                                ?> value="Coach" type="checkbox" id="chk_service_type" name="service[]" /> Coach
                            </label>
                        </div>
                        <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                            <label>
                                <input <?php
                                if (in_array("Caterer", $optionSelected)): echo 'checked';
                                endif;
                                ?> value="Caterer" type="checkbox" id="chk_service_type" name="service[]" /> Caterer
                            </label>
                        </div>                        
                        <?php $getotherservice = q("select * from affiliates_service_type where affiliates_id = '{$affiliates_id}' AND type = 'Service' AND service_type NOT IN ('Setra Coach','MiniBus','Sprinter','SUV','Luxury Sedan','Sedan','Luxury Sprinter','Party Bus','On-Site Coordinator','Greeter','Coach')"); ?>
                        <?php foreach ($getotherservice as $index => $each_otherservice): ?>
                            <?php $optionSelected_ = empty($each_otherservice['service_type']) ? '' : 'checked'; ?>
                            <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                                <label>
                                    <input <?php print $optionSelected_ ?> value="<?php print $each_otherservice['service_type']; ?>" type="checkbox" id="chk_service_type" name="service[]" /> <?php print $each_otherservice['service_type']; ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                        <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                            <label>
                                <input value="" class="chk_other_type" onclick="$('#otherservice').toggle();" type="checkbox" id="chk_service_type" name="service[]"/><font style="color:blue;">Other</font>
                            </label>
                        </div>
                        <input class="form-control" type="text" id="otherservice" name="otherservice" style="display:none;" placeholder="Add New Service"/>
                    </div>
                    <!-- For Amenities -->
                    <h3>Amenities</h3>
                    <div>
                        <?php $amenities = q("select * from affiliates_service_type where affiliates_id = '{$affiliates_id}' AND type = 'Amenity'"); ?>
                        <?php
                        $optionSelectedA = array();
                        foreach ($amenities as $index => $each_amenity):
                            ?>
                            <?php $optionSelectedA[] = $each_amenity['amenity_type']; ?>
                        <?php endforeach; ?>
                        <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                            <label>
                                <input <?php
                                if (in_array("Leather Sheets", $optionSelectedA)): echo 'checked';
                                endif;
                                ?> value="Leather Sheets" type="checkbox" id="chk_amenity_type" name="chk_amenity_type[]" /> Leather Sheets
                            </label>
                        </div>
                        <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                            <label>
                                <input <?php
                                if (in_array("Wi-fi", $optionSelectedA)): echo 'checked';
                                endif;
                                ?> value="Wi-fi" type="checkbox" id="chk_amenity_type" name="chk_amenity_type[]" /> Wi-fi
                            </label>
                        </div>
                        <?php $amenitiesother = q("select * from affiliates_service_type where affiliates_id = '{$affiliates_id}' AND type = 'Amenity' AND amenity_type NOT IN ('Leather Sheets','wi-fi')"); ?>
                        <?php foreach ($amenitiesother as $index => $each_otheramenity): ?>
                            <?php $optionSelected_ = empty($each_otheramenity['amenity_type']) ? '' : 'checked'; ?>
                            <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                                <label>
                                    <input <?php print $optionSelected_ ?> value="<?php print $each_otheramenity['amenity_type']; ?>" type="checkbox" id="chk_amenity_type" name="chk_amenity_type[]" /> <?php print $each_otheramenity['amenity_type']; ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                        <div class="checkbox col-lg-4" style="margin-top: 0px !important;">
                            <label>
                                <input value="" class="chk_other_amenity_type" onclick="$('#otheramenityservice').toggle();" type="checkbox" id="chk_amenity_type" name="chk_other_amenity_type[]"/><font style="color:blue;">Other</font>
                            </label>
                        </div>
                        <input class="form-control " type="text" id="otheramenityservice" name="otheramenityservice" style="display:none;" placeholder="Add New Amenity"/>
                    </div>
                </div>
            </div>
        </div> 

    </div><!-- /.modal-content -->
    <div class="modal-footer" style="background-color: #EAEAEA;height:55px;">
        <div style="margin-top:-3px;">
            <input type="hidden" name="fields[affiliates_id]" id="affiliates_id" value="<?php print $affiliates_id; ?>">
            <?php if ($affiliates_id > 0) { ?>
                <button type="button" class="btn btn-success" onclick="AddAffiliates('<?php print $affiliates_id; ?>');">Update</button>
            <?php } else { ?>
                <button type="button" class="btn btn-success" onclick="AddAffiliates('0');">Add</button>
            <?php } ?>

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
    <style type="text/css">
        .fileUpload {
            position: relative;
            overflow: hidden;
            margin-right: 10px;
        }
        .fileUpload input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#txt_expiration_date").datepicker({changeYear: true, changeMonth: true, dateFormat: 'mm/dd/yy'});
        });
    </script>