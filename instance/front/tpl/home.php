<!--//search-->
<div  class="col-lg-12 " style="margin-top: 50px;">
    <div class="col-lg-10" style="padding:0px">
        <input style=";height:50px;border-radius: 0px; " type="text" name="search" id="search"
               class="form-control ui-autocomplete-input " placeholder="Search" autocomplete="off" >
    </div>
    <div style="padding:0px" class="col-lg-2">
        <span class="btn font-weight-bold form-control searchBtn" onclick="search('')" >
            <i class="fa fa-search"></i>
            Search
        </span>
        <!--<a href="<?php print _U ?>home" class=" btn btn-warning btn-sm">Reset</a>-->
    </div>
    <div style="clear: both;"></div>
</div>
<div  class="col-lg-12 " style="margin-top: 2px">
    <div class="col-lg-10" style="padding:0px"> 
        <div class="totalResult" style="font-size: 12px;color: gray;">

        </div> 
    </div>
    <div style="clear: both;"></div>
</div>
<div id="searchList" class="col-lg-12">
    <?php include 'home_data.php'; ?>

</div>

<!--START : WAIT MODAL-->
<div style="width:100%" class="modal fade modal-3d-flip-horizontal modal-sm" id="waitModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:251px;">
        <div class="modal-content" >
            <div class="modal-body" style="color: #666;">
                <strong style="text-transform: uppercase;font-size: 12px;">Please Wait &nbsp;</strong><i class="fa fa-refresh fa-spin"></i> 
            </div>
        </div>
    </div>
</div>
<!-- END : WAIT MODAL -->

<!--START : AFFILIATES MODAL-->
<div class="modal fade" id="AddAffiliates" >
    <div class="modal-dialog" id="affiliates_modal_content">
    </div>
</div>
<!--END : AFFILIATES MODAL-->

<!--START : Vehicle Modal-->
<div class="modal fade" id="Addvehicle" >
    <div class="modal-dialog" id="vehicle_modal_content">
    </div>
</div>
<!--STOP : Vehicle Modal-->

<!--START : VEHICLE IMAGE MODAL-->
<div class="modal fade" id="vehicalImage" >
    <div class="modal-dialog" id="image_content">
        <div class="modal-content">
            <div class="modal-header" >
                <b>Image</b>
            </div>
            <div class="modal-body ">
                <iframe src="<?php echo _U . "blank.txt"; ?>" style=" border: medium none;width: 100%;"></iframe> 
            </div>
            <div class="modal-footer" style="height:55px;">
                <div style="margin-top:-3px;">                  
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--STOP : VEHICLE IMAGE MODAL-->

<!--START : INSURANCE MODAL-->
<div class="modal fade" id="insurance" >
    <div class="modal-dialog" id="insurance_content">
    </div>
</div>
<!--STOP : INSURANCE MODAL-->