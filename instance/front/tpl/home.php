<!--//search-->
<div  class="col-lg-12 " style="margin-top: 50px;">
    <div class="col-lg-12">
        <input style="box-shadow: 0px 10px 70px #DDD;height:40px" type="text" name="search" id="search"
               class="form-control ui-autocomplete-input " placeholder="Search" autocomplete="off" >
    </div>
    <div style="margin-top: 20px;" class="col-lg-12">
        <span class="btn btn-success font-weight-bold col-lg-2 col-lg-offset-5" onclick="search()">
            <i class="fa fa-search"></i>
            Search
        </span>
        <!--<a href="<?php print _U ?>home" class=" btn btn-warning btn-sm">Reset</a>-->
    </div>
    <div style="clear: both;"></div>
</div>

<div id="searchList" class="col-lg-12">
    <?php include 'home_data.php'; ?>

</div>

<!--START :WAIT MODAL-->
<div class="modal fade modal-3d-flip-horizontal modal-sm" id="waitModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:451px;">
        <div class="modal-content" >
            <div class="modal-body" style="color: #666;">
                <strong style="text-transform: uppercase;font-size: 20px;">Wait Affiliates are loaded  </strong><i class="fa fa-refresh fa-spin fa-2x"></i> 
            </div>
        </div>
    </div>
</div>
<!-- END :WAIT MODAL -->

<!--Add city-->
<div class="modal fade" id="AddCity"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog" style="width:800px;">
        <div class="modal-content" >
            <div class="modal-header" style="background-color: #EAEAEA;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add City</h4>
            </div>
            <div class="modal-body" >

                <form  class="form-horizontal" role="form">
                    <div class="form-group ">
                        <label  class="col-lg-3 col-md-2 control-label">Add City</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="city" id="city" placeholder="Add City"
                                   data-toggle="popover" data-placement="bottom" data-content="Plz fill up the field" />
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer" style="background-color: #EAEAEA;">
                <input type="hidden" name="dot_id" id="dot_id" >
                <button type="button" onclick="addCity();"  class="btn btn-success ">Add</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 <!--Add vehicles-->
<div class="modal fade" id="AddVehicles">

    <div class="modal-dialog" style="width:800px;">
        <div class="modal-content" >
            <div class="modal-header" style="background-color: #EAEAEA;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Vehicles</h4>
            </div>
            <div class="modal-body" >

                <form  class="form-horizontal" role="form">
                    <div class="form-group ">
                        <label  class="col-lg-3 col-md-2 control-label">Vehicle</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="vehicle" id="vehicle" placeholder="Add Vehicle"
                                   data-toggle="popover" data-placement="bottom" data-content="Plz fill up the field" required/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label  class="col-lg-3 col-md-2 control-label"># Vehicle</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="vehicle_no" id="vehicle_no" placeholder="Add Vehicle #"
                                   data-toggle="popover" data-placement="bottom" data-content="Plz fill up the field" required/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label  class="col-lg-3 col-md-2 control-label">Minimum</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="min_rate" id="min_rate" placeholder="Add Minimum Rate"
                                   data-toggle="popover" data-placement="bottom" data-content="Plz fill up the field" required/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label  class="col-lg-3 col-md-2 control-label">Rate Per Hour</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="hour_rate" id="hour_rate" placeholder="Add Rate Per Hours"
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
//                                        if ($cityId == $each_city['id']) {
//                                            echo "selected";
//                                        }
                                    ?>><?php print $each_data['farmout_name']; ?></option>
                                        <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer" style="background-color: #EAEAEA;">

                <button type="button" onclick="addVehicle();"  class="btn btn-success ">Add</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="AddAffiliates" >
    <div class="modal-dialog" id="affiliates_modal_content">
        <?php // include 'affiliate_add.php'; ?>

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Add affiliates-->

<!--<div class="modal fade" id="AddAffiliates__"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog" style="width:800px;">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Affiliates</h4>
            </div>
            <div class="modal-body" >

                <form  class="form-horizontal" role="form">
                    <div class="form-group ">
                        <label  class="col-lg-3 col-md-2 control-label">Affiliate</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="affiliate" id="affiliate" placeholder="Add Affiliate"
                                   data-toggle="popover" data-placement="bottom" data-content="Plz fill up the field" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword1" class="col-lg-3 col-md-2 control-label">City</label>
                        <div class="col-lg-6">
                            <select class="form-control" name="cityAffiliates" id="cityAffiliates" required>
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

                    <div class="form-group ">
                        <label  class="col-lg-3 col-md-2 control-label">Contact Number</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="contact" id="contact" placeholder="Add Contact Number"
                                   data-toggle="popover" data-placement="bottom" data-content="Plz fill up the field" required/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label  class="col-lg-3 col-md-2 control-label">Address</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Add Address"
                                   data-toggle="popover" data-placement="bottom" data-content="Plz fill up the field" required/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label  class="col-lg-3 col-md-2 control-label"></label>
                        &nbsp;&nbsp;  
                        <button type="button" onclick="addAffiliates();"  class="btn btn-success ">Save</button>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <input type="hidden" name="dot_id" id="dot_id">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div> /.modal-content 
    </div> /.modal-dialog 
</div>-->
<!-- /.modal -->


<div class="modal fade" id="Addvehicles_new" >
    <div class="modal-dialog" id="vehicle_modal_content">

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

