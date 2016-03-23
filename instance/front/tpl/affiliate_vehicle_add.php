<?php
$affiliates_vehicle_id = '';

$vehicle = '';
$vehicle_no = '';
$rate_per_hour = '';
$minimum = '';

if (isset($vehicle_edit) && !empty($vehicle_edit)) {
    $affiliates_vehicle_id = $vehicle_edit['id'];
    $vehicle = $vehicle_edit['vehicle'];
    $vehicle_no = $vehicle_edit['vehicle_no'];
    $rate_per_hour = $vehicle_edit['rate_per_hour'];
    $minimum = $vehicle_edit['minimum'];
    $affId = $vehicle_edit['aff_id'];
}
?>
<div class="modal-dialog" style="width:800px;">
    <div class="modal-content" >
        <div class="modal-header" style="background-color: #EAEAEA;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">
                <?php if ($affiliates_vehicle_id > 0): ?>
                    <b>Edit Vehicle</b>
                <?php else: ?>
                    <b>Add Vehicle</b>
                <?php endif; ?>
            </h4>
        </div>
        <div class="modal-body" >

            <form  class="form-horizontal" role="form">
                <div class="form-group ">
                    <label  class="col-lg-3 col-md-2 control-label">Vehicle</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="vehicle" id="vehicle" placeholder="Add Vehicle" value="<?php print $vehicle; ?>"
                               data-toggle="popover" data-placement="bottom" data-content="Plz fill up the field" required/>
                    </div>
                </div>
                <div class="form-group ">
                    <label  class="col-lg-3 col-md-2 control-label"># Vehicle</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="vehicle_no" id="vehicle_no" placeholder="Add Vehicle #" value="<?php print $vehicle_no; ?>"
                               data-toggle="popover" data-placement="bottom" data-content="Plz fill up the field" required/>
                    </div>
                </div>
                <div class="form-group ">
                    <label  class="col-lg-3 col-md-2 control-label">Minimum</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="min_rate" id="min_rate" placeholder="Add Minimum Rate" value="<?php print $minimum; ?>"
                               data-toggle="popover" data-placement="bottom" data-content="Plz fill up the field" required/>
                    </div>
                </div>
                <div class="form-group ">
                    <label  class="col-lg-3 col-md-2 control-label">Rate Per Hour</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="hour_rate" id="hour_rate" placeholder="Add Rate Per Hours" value="<?php print $rate_per_hour; ?>"
                               data-toggle="popover" data-placement="bottom" data-content="Plz fill up the field" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword1" class="col-lg-3 col-md-2 control-label">Affiliates</label>
                    <div class="col-lg-6">
                        <select class="form-control" name="affiliateVehicle" id="affiliateVehicle" required>
                            <option value="">Select</option>
                            <?php
                            $affi = q("select * from affiliates");
                            foreach ($affi as $each_data):
                                ?>
                                <option value="<?php print $each_data['id'] ?>" <?php
                                if ($affId == $each_data['id']) {
                                    echo "selected";
                                }
                                ?>><?php print $each_data['farmout_name']; ?></option>
                                    <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal-footer" style="background-color: #EAEAEA;">
            <input type="hidden" name="fields[affiliates_vehicle_id]" id="affiliates_vehicle_id" value="<?php print $affiliates_vehicle_id; ?>">
            <?php if ($affiliates_vehicle_id > 0) { ?>
                <button type="button" class="btn btn-primary" onclick="addVehicle('<?php print $affiliates_vehicle_id; ?>');">Update</button>
            <?php } else { ?>
                <button type="button" class="btn btn-primary" onclick="addVehicle('0');">Add</button>
            <?php } ?>

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->