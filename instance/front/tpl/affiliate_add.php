<?php
$affiliates_id = '';
$farmout_name = '';
$city = '';
$address = '';
$notes = '';
$preferred_level = '';
$contact_name = '';
$coachbuilder = '';
$contact_number = '';
$contact_email = '';
$renewal_date = '';

if (isset($affiliates_edit) && !empty($affiliates_edit)) {
    $affiliates_id = $affiliates_edit['id'];
    $farmout_name = $affiliates_edit['farmout_name'];
    $city = $affiliates_edit['city'];
    $address = $affiliates_edit['address'];
    $notes = $affiliates_edit['notes'];
    $preferred_level = $affiliates_edit['rate'];
    $contact_name = $affiliates_edit['contact_name'];
    $coachbuilder = $affiliates_edit['coachbuilder'];
    $contact_number = $affiliates_edit['contact_number'];
    $contact_email = $affiliates_edit['contact_email'];
    $renewal_date = date('m/d/Y', strtotime($affiliates_edit['renewal_date']));
}
?>
<div class="modal-content" style="width:140%;" >
    <div class="modal-header" style="background-color: #EAEAEA;">
        <?php if ($affiliates_id > 0): ?>
            <b>Edit Affiliate</b>
        <?php else: ?>
            <b>Add New Affiliate</b>
        <?php endif; ?>
    </div>
    <div class="modal-body " style="overflow-y: auto;">
        <div class="addAffiliates actionItem">
            <div class="panel-body" style="padding-top:0px;">
                <h3>Affiliates Info</h3>
                <form method="post" action="" class="form-horizontal" role="form" id="affiliate">
                    <div class="col-lg-6">
                        <div class="form-group col-lg-12" >
                            <label for="inputquestion" style="text-align: left;margin-top: -6px;" class="col-lg-12 col-md-12 control-label">FarmOut Name</label>
                            <div class="col-lg-12 col-md-12">
                                <input type="text"  class="form-control reset" name="fields[farmout_name]" id="farmout" value="<?php print $farmout_name; ?>" placeholder="Add FarmOut Name">                                    
                                <span id="fot_helpmsg" style="color:grey;font-size: 10px;float:right;">Input FarmOut Name Here </span>
                            </div>
                        </div>
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
                            <label for="inputPassword1" class="col-lg-3 col-md-2 control-label" style="text-align: left;">City</label>
                            <div class="col-lg-12 col-md-12">
                                <input type="text" class="form-control reset" name="fields[city]" id="city" value="<?php print $city; ?>" placeholder="Add city">
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
                                    <input style="margin-top:7px;" value="1" type="radio" name="fields[rate]" <?php
                                    if ($preferred_level == 1): echo checked;
                                    endif;
                                    ?>/>&nbsp;&nbsp;
                                    <i class="fa fa-star-o" title="Preferred"></i>
                                </label>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label style="color:grey;font-size: 12px;">
                                    <input style="margin-top:7px;" value="2" type="radio" name="fields[rate]" <?php
                                    if ($preferred_level == 2): echo checked;
                                    endif;
                                    ?>/>&nbsp;&nbsp;
                                    <i class="fa fa-star-o" title="Preferred"></i>
                                    <i class="fa fa-star-o" title="Preferred"></i>
                                </label>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label style="color:grey;font-size: 12px;">
                                    <input style="margin-top:7px;" value="3" type="radio" name="fields[rate]" <?php
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
                                    <input style="margin-top:7px;" value="4" type="radio" name="fields[rate]" <?php
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
                                    <input style="margin-top:7px;" value="5" type="radio" name="fields[rate]" <?php
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
</div>
