 
<div style="padding-top:20px;" class="panel-body row">
    <form id="output" role="form" class="form-horizontal" action="output1" method="post" target="result">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                    <img src="<?php echo _MEDIA_URL ?>img/bus1.png" style="background-color: white;color: maroon;padding: 5px;" width="70"/>
                    <br>
                    <span>50pax Capacity</span>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <input type="text" value="" id="bus" name="field[bus][pax]" onblur="paxBlur('busVehicle')"  class="form-control reset" placeholder="# Pax">
                    <span class="pull-right" style="font-size: 11px; color: gray;">Please Enter Total Passenger </span>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 hidden" id="busMsg" style="font-size: 14px;font-weight: bold;padding-top: 1%;color: gray;">
                </div>
                <input type="text" value="" id="busVehicle" name="field[bus][vehicle]" class="form-control reset hidden" placeholder="Required Vehicle" >
                <div class='clearfix'></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                    <img src="<?php echo _MEDIA_URL ?>img/van1.png" style="background-color: white;color: maroon;padding: 5px;" width="70"/>
                    <br>
                    <span>10pax Capacity</span>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <input type="text" value="" id="van" name="field[van][pax]" onblur="paxBlur('vanVehicle')"  class="form-control reset" placeholder="# Pax">
                    <span class="pull-right" style="font-size: 11px; color: gray;">Please Enter Total Passenger </span>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 hidden" id="vanMsg" style="font-size: 14px;font-weight: bold;padding-top: 1%;color: gray;">
                </div>
                <input type="text" value="" id="vanVehicle" name="field[van][vehicle]" class="form-control reset hidden" placeholder="Required Vehicle" >
                <div class='clearfix'></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                    <img src="<?php echo _MEDIA_URL ?>img/car1.png" style="background-color: white;color: maroon;padding: 5px;" width="70"/>
                    <br>
                    <span>5pax Capacity</span>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <input type="text" value="" id="SUV" name="field[SUV][pax]" onblur="paxBlur('SUVVehicle')"  class="form-control reset" placeholder="# Pax">
                    <span class="pull-right" style="font-size: 11px; color: gray;">Please Enter Total Passenger </span>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 hidden" id="SUVMsg" style="font-size: 14px;font-weight: bold;padding-top: 1%;color: gray;">
                </div>
                <input type="text" value="" id="SUVVehicle" name="field[SUV][vehicle]" class="form-control reset hidden" placeholder="Required Vehicle" >
                <div class='clearfix'></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr style="margin: 5px;"/>
        <center>
            <input type="submit" value="Generate Report" class="btn btn-success" style="margin-top: 10px;"/>
        </center>
    </form>
</div>
<div>
    <iframe name="result" width="100%" height="1500" src="" style="padding: 5px;border:1px dotted #dadada"></iframe>
</div>
