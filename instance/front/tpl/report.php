    
<div id="reportSummary" style="display: none;position: fixed;bottom: 0;right: 0;border: 1px solid blue;background-color: white; padding: 10px;width: 300px;z-index: 1;">
    <div style="background-color: gray;color: white;padding: 5px 10px;;" id="hideSummary">Hide Summary <span class="caret"></span></div>
    <div style="background-color: gray;color: white;padding: 5px 10px;display: none;" id="showSummary">Show Summary <span class="caret"></span></div>
    <div id="summaryData">
        <div id='luggageLoading'></div>
        <div id='luggageUnloading'></div>
        <div id='loading'>    </div>
        <div id='unloading'></div>
    </div>
</div>
<div style="padding-top:0px;" class="panel-body row">

    <form id="output" role="form" class="form-horizontal" action="output" method="post" target="result">
        <h3>Type Of Transportation</h3>
        <div class="col-lg-12">
            <label class="col-lg-6 col-md-6 control-label" style="text-align: left;font-size: 15px;" >
                <input type="radio" value="PUDO" id="PUDO"  name="fields[Transportation]"   class=" reset" >  Pickup / Dropoff 
            </label>    
        </div>
        <div class="col-lg-12">
            <label class="col-lg-6 col-md-6 control-label" style="text-align: left;font-size: 15px;" >
                <input type="radio"  value="Shuttle"  name="fields[Transportation]"   class=" reset" checked=""> Shuttle
            </label>
        </div>
        <div class="clearfix"></div>
        <hr style="margin: 5px;"/>
        <h3>Passenger Info</h3>
        <div class="col-lg-6">
            <div class="form-group col-lg-12">
                <label class="col-lg-12 col-md-12 control-label" style="text-align: left;font-size: 15px;" >Estimated Passengers  <i class="fa fa-group " style="font-size: 20px;"></i></label>
                <div class="col-lg-12 col-md-12">
                    <!--<input type="text" placeholder="Add Total Passenger" value="" id="Passenger" name="fields[Passenger]" onblur="paxBlur()"  class="form-control reset">-->                                    
                    <input type="text" placeholder="Add Total Passenger" value="" id="Passenger" name="fields[Passenger]"  onblur="countVehicle()" class="form-control reset">                                    
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group col-lg-12">
                <label class="col-lg-12 col-md-12 control-label" style="text-align: left;font-size: 15px;" >Any luggage?  <i class="fa fa-suitcase " style="font-size: 20px;"></i></label>
                <div class="col-lg-12 col-md-12">
                    <input type="text" placeholder="Add Total Luggage" value="" id="luggage" name="fields[luggage]"  onblur="laggageBlur()"  class="form-control reset">
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr style="margin: 5px;"/>

        <h3>Vehicle Info</h3>
        <div class="col-lg-6">
            <div class="form-group col-lg-12">
                <label class="col-lg-12 col-md-12 control-label" style="text-align: left;font-size: 15px;" >Preferred Vehicle(s)  <i class="fa fa-bus" style="font-size: 20px;"></i></label>
                <div class="col-lg-12 col-md-12">
                    <select  value="" id="vehicle" name="fields[Vehicle]" class="form-control reset" onchange="countVehicle()" >
                        <option value="1">Select Vehicle</option>
                        <option value="7">7 PAX Sedan</option>  
                        <option value="14">14 PAX Sprinter</option>  
                        <option value="28">28 PAX Mini BUS</option>
                        <option value="36">36 PAX Mini Bus</option>
                        <option value="55">55 PAX Coach</option>

                    </select>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group col-lg-12">
                <label class="col-lg-12 col-md-12 control-label" style="text-align: left;font-size: 15px;" ># Vehicle  <i class="fa fa-bus " style="font-size: 20px;"></i></label>
                <div class="col-lg-12 col-md-12">
                    <input type="text" placeholder="Add Total Vehicle Hired" value="" id="vehicle_no" name="fields[vehicle_no]" class="form-control reset">

                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <hr style="margin: 5px;"/>

        <h3>Routing Info</h3>


        <div class="col-lg-6">
            <div class="form-group col-lg-12">
                <div style="padding: 15px;">
                    <label style="text-align: left;font-size: 15px;" class="col-lg-4 col-md-6 control-label" >Pickup Location</label>
                    <div class="col-lg-12 col-md-6">
                        <input type="text" placeholder="Enter Pickup Location" value="Empire State Building, 5th Avenue, New York, NY, United States" id="pickStagging" name="fields[pickStagging]" class="form-control reset">
                    </div>
                    <div class='clearfix'></div>
                </div>
                <div style="padding: 15px;" class="hidden">
                    <label style="text-align: left;font-size: 15px;" class="col-lg-4 col-md-6 control-label" > Stagging</label>
                    <div class="col-lg-7 col-md-6">
                        <input type="text" placeholder="hh:mm" value="00:03" id="dropStagging" name="fields[dropStagging]" class="form-control reset">
                    </div>
                    <div class='clearfix'>  </div>     
                </div>
                <div style="padding: 15px;">
                    <label style="text-align: left;font-size: 15px;" class="col-lg-4 col-md-6 control-label" >Dropoff Location </label>
                    <div class="col-lg-12 col-md-6">
                        <input type="text" placeholder="Enter Dropoff Location" value="10th Avenue, New York, NY, United States" id="drop" name="fields[drop]" class="form-control reset">
                    </div>
                    <div class='clearfix'> </div>     
                </div>                                  
            </div>
        </div>
        <div class="col-lg-6 hidden">
            <div class="form-group col-lg-6">
                <div style="padding: 15px;">
                    <label style="text-align: left;font-size: 15px;" class="col-lg-11 col-md-11 control-label" >Passenger Loading </label>
                    <div class="col-lg-7 col-md-7">
                        <input type="text" placeholder="hh:mm:ss" value="00:00:10" id="paxLoad" name="fields[paxLoad]" onblur="paxBlur()"  class="form-control reset">
                    </div>
                    <i class="fa fa-clock-o fa-2x"></i>
                    <div class='clearfix'></div>
                </div>
                <div style="padding: 15px;">
                    <label style="text-align: left;font-size: 15px;" class="col-lg-11 col-md-11 control-label" >Passenger Unloading </label>
                    <div class="col-lg-7 col-md-7">
                        <input type="text" placeholder="hh:mm:ss" value="00:00:10" id="paxUnload" name="fields[paxUnload]" onblur="paxBlur()"  class="form-control reset">
                    </div>
                    <i class="fa fa-clock-o fa-2x"></i>
                    <div class='clearfix'>  </div>     
                </div>
            </div>
            <div class="form-group col-lg-6">
                <div style="padding: 15px;">
                    <label style="text-align: left;font-size: 15px;" class="col-lg-11 col-md-11 control-label" >Luggage Loading </label>
                    <div class="col-lg-7 col-md-7">
                        <input type="text" placeholder="hh:mm:ss" value="00:00:05" id="luggageLoad" name="fields[luggageLoad]" onblur="laggageBlur()" class="form-control input-small  reset">
                    </div>
                    <i class="fa fa-clock-o fa-2x"></i>
                    <div class='clearfix'> </div>     
                </div>  
                <div style="padding: 15px;">
                    <label style="text-align: left;font-size: 15px;" class="col-lg-11 col-md-11 control-label" >Luggage Unloading </label>
                    <div class="col-lg-7 col-md-7">
                        <input type="text" placeholder="hh:mm:ss" value="00:00:05" id="luggageUnload" name="fields[luggageUnload]" onblur="laggageBlur()"  class="form-control reset">
                    </div>
                    <i class="fa fa-clock-o fa-2x"></i>
                    <div class='clearfix'> </div>     
                </div>  
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
