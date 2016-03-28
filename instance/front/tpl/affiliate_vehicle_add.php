<div class="modal-dialog" style="width:800px;">
    <div class="modal-content" >
        <div class="modal-header" style="">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">
                <?php if ($affId > 0): ?>
                    <b>Edit Vehicle</b>
                <?php else: ?>
                    <b>Add Vehicle</b>
                <?php endif; ?>
            </h4>
        </div>
        <div class="modal-body" >
            <form  class="form-horizontal" role="form" id="vehicle">
                <div class="form-group"  <?php
                if (isset($affId) && $affId > 0) {
                    echo "style='display:none;'";
                }
                ?>>
                    <input type="text" class="form-control" name="affiliateVehicle" id="affiliateVehicle" required value="<?php echo $affId; ?>"/>
                </div>
                <div class="col-lg-12">
                    <table style="background: #f0f0f0;" id="table" class="table table-condensed sortable table-bordered">
                        <thead style="">
                            <tr style="background: -moz-linear-gradient(center top , #f2f2f2, #dadada) repeat scroll 0 0 #CFD1CF;">
                                <th style="padding:5px;width:230px;color:#1294D5;text-align:center">Vehicle</th>
                                <th style="padding:5px;width:65px;text-align: left;color:#1294D5;text-align:center">#</th>
                                <th style="padding:5px;width:50px;text-align: left;color:#1294D5;text-align:center">Rate/Hour</th>
                                <th style="padding:5px;width:85px;text-align: left;color:#1294D5;text-align:center">Minimum Hours</th>
                                <th style="padding:5px;width:90px;text-align: left;color:#1294D5;text-align:center">Flat Rate</th>
                                <th style="padding:5px;text-align: left;color:#1294D5;text-align:center;font-size:12px">Cancellation Policy</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($vehicle_edit); $i++) {
                                ?>
                                <tr>
                                    <td style="padding:10px">
                                        <input type="text" value="<?php echo $vehicle_edit[$i]['vehicle']; ?>" class="form-control input-small" name="vr[type][<?php echo $i; ?>]">
                                    </td>
                                    <td style="padding:10px">
                                        <input type="text" value="<?php echo $vehicle_edit[$i]['vehicle_no']; ?>" class="form-control input-small" name="vr[pax][<?php echo $i; ?>]">
                                    </td>
                                    <td style="padding:10px">
                                        <input type="text" value="<?php echo $vehicle_edit[$i]['rate_per_hour']; ?>" class="form-control input-small" name="vr[rate][<?php echo $i; ?>]">
                                    </td>
                                    <td style="padding:10px">
                                        <input type="text" value="<?php echo $vehicle_edit[$i]['minimum']; ?>" class="form-control input-small" name="vr[min_hour][<?php echo $i; ?>]">
                                    </td>																											
                                    <td style="padding:10px">
                                        <input type="text" value="<?php echo $vehicle_edit[$i]['flat_rate']; ?>" class="form-control input-small" name="vr[flat_rate][<?php echo $i; ?>]">
                                    </td>
                                    <td style="padding:10px">
                                        <input type="text" value="<?php echo $vehicle_edit[$i]['cxl_policy']; ?>" class="form-control input-small" name="vr[cxl][<?php echo $i; ?>]">
                                    </td>
                                </tr>
                            <input type="hidden" name="vr[edit_id][<?php echo $i; ?>]" value="<?php echo $vehicle_edit[$i]['id']; ?>">

                            <?php
                        }
                        for ($i = count($vehicle_edit); $i < count($vehicle_edit) + 2; $i++) {
                            ?>
                            <tr>
                                <td style="padding:10px">
                                    <input type="text" value="" class="form-control input-small" name="vr[type][<?php echo $i; ?>]">
                                </td>
                                <td style="padding:10px">
                                    <input type="text" value="" class="form-control input-small" name="vr[pax][<?php echo $i; ?>]">
                                </td>
                                <td style="padding:10px">
                                    <input type="text" value="" class="form-control input-small" name="vr[rate][<?php echo $i; ?>]">
                                </td>
                                <td style="padding:10px">
                                    <input type="text" value="" class="form-control input-small" name="vr[min_hour][<?php echo $i; ?>]">
                                </td>																											
                                <td style="padding:10px">
                                    <input type="text" value="" class="form-control input-small" name="vr[flat_rate][<?php echo $i; ?>]">
                                </td>
                                <td style="padding:10px">
                                    <input type="text" value="" class="form-control input-small" name="vr[cxl][<?php echo $i; ?>]">
                                </td>
                            </tr>
                            <input type="hidden" name="vr[edit_id][<?php echo $i; ?>]" value="0">

                            <?php
                        }
                        ?>                               
                        </tbody>
                    </table>
                </div>
            </form>

        </div>

        <div class="modal-footer" style="">
            <input type="hidden" name="fields[affiliates_vehicle_id]" id="affiliates_vehicle_id" value="<?php print $affiliates_vehicle_id; ?>">
            <?php if (isset($vehicle_edit) && count($vehicle_edit) > 0) { ?>
                <button type="button" class="btn btn-primary" onclick="addVehicle('');">Update</button>
            <?php } else { ?>
                <button type="button" class="btn btn-primary" onclick="addVehicle('0');">Add</button>
            <?php } ?>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>