<!--//search-->
<div  class="col-lg-12 " style="margin-top: 50px;">
    <div class="col-lg-10">
        <input style="box-shadow: 0px 10px 70px #DDD;height:40px" type="text" name="search" id="search"
               class="form-control ui-autocomplete-input " placeholder="Search" autocomplete="off" >
    </div>
    <div style="margin-top: 2px;" class="col-lg-2">
        <span class="btn btn-success font-weight-bold form-control" onclick="search('')">
            <i class="fa fa-search"></i>
            Search
        </span>
        <!--<a href="<?php print _U ?>home" class=" btn btn-warning btn-sm">Reset</a>-->
    </div>
    <div style="clear: both;"></div>
</div>
<div  class="col-lg-12 " style="margin-top: 2px">
    <div class="col-lg-10"> 
        <div class="pull-right " style="font-size: 14px;">
            <span style="font-weight: bold;font-size: 16px;">Sort By :</span> <span style="color:#1294D5;cursor: pointer;" onclick="sort('affiliates')">Affiliates Name</span> | <span style="color:#1294D5;cursor: pointer;" onclick="sort('ratting')">Affiliates Rating</span> 
        </div> 
    </div>
    <div style="clear: both;"></div>
</div>
<div id="searchList" class="col-lg-12">
    <?php include 'home_data.php'; ?>

</div>

<!--START :WAIT MODAL-->
<div class="modal fade modal-3d-flip-horizontal modal-sm" id="waitModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:251px;">
        <div class="modal-content" >
            <div class="modal-body" style="color: #666;">
                <strong style="text-transform: uppercase;font-size: 20px;">Please Wait </strong><i class="fa fa-refresh fa-spin fa-2x"></i> 
            </div>
        </div>
    </div>
</div>
<!-- END :WAIT MODAL -->

<!--Add city-->
<div class="modal fade" id="AddCity"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog" style="width:800px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #EAEAEA;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add City</h4>
            </div>
            <div class="modal-body">
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

<div class="modal fade" id="AddAffiliates" >
    <div class="modal-dialog" id="affiliates_modal_content">
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade" id="Addvehicle" >
    <div class="modal-dialog" id="vehicle_modal_content">

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

