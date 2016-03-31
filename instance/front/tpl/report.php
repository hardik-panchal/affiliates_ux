    
<div id="reportSummary" style="position: fixed;bottom: 0;right: 0;border: 1px solid blue;background-color: white; padding: 10px;width: 300px;z-index: 1;">
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

    <form id="output" role="form" class="form-horizontal" action="output" method="post">
        <h3>Passenger Info</h3>
        <div class="col-lg-6">
            <div class="form-group col-lg-12">
                <label class="col-lg-12 col-md-12 control-label" style="text-align: left;margin-top: -6px;font-size: 15px;" >Total Passenger <i class="fa fa-group " style="font-size: 20px;"></i></label>
                <div class="col-lg-12 col-md-12">
                    <input type="text" placeholder="Add Total Passenger" value="" id="Passenger" name="fields[Passenger]" onblur="paxBlur()" class="form-control reset">                                    
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group col-lg-12">
                <label class="col-lg-12 col-md-12 control-label" style="text-align: left;margin-top: -6px;font-size: 15px;" >Total Luggage <i class="fa fa-suitcase " style="font-size: 20px;"></i></label>
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
                <label class="col-lg-12 col-md-12 control-label" style="text-align: left;margin-top: -6px;font-size: 15px;" >Select Vehicle <i class="fa fa-bus" style="font-size: 20px;"></i></label>
                <div class="col-lg-12 col-md-12">
                    <select  value="" id="contact_number" name="fields[Vehicle]" class="form-control reset">
                        <option value="0">Select Vehicle</option>
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
                <label class="col-lg-12 col-md-12 control-label" style="text-align: left;margin-top: -6px;font-size: 15px;" ># Vehicle <i class="fa fa-bus " style="font-size: 20px;"></i></label>
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
                    <label style="text-align: left;margin-top: -6px;font-size: 15px;" class="col-lg-4 col-md-6 control-label" >Pickup Location</label>
                    <div class="col-lg-7 col-md-6">
                        <input type="text" placeholder="Enter Pickup Location" value="" id="pickStagging" name="fields[pickStagging]" class="form-control reset">
                    </div>
                    <div class='clearfix'></div>
                </div>
                <div style="padding: 15px;">
                    <label style="text-align: left;margin-top: -6px;font-size: 15px;" class="col-lg-4 col-md-6 control-label" > Stagging</label>
                    <div class="col-lg-7 col-md-6">
                        <input type="text" placeholder="hh:mm" value="" id="dropStagging" name="fields[dropStagging]" class="form-control reset">
                    </div>
                    <div class='clearfix'>  </div>     
                </div>
                <div style="padding: 15px;">
                    <label style="text-align: left;margin-top: -6px;font-size: 15px;" class="col-lg-4 col-md-6 control-label" >Dropoff Location </label>
                    <div class="col-lg-7 col-md-6">
                        <input type="text" placeholder="Enter Dropoff Location" value="" id="drop" name="fields[drop]" class="form-control reset">
                    </div>
                    <div class='clearfix'> </div>     
                </div>                                  
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group col-lg-6">
                <div style="padding: 15px;">
                    <label style="text-align: left;margin-top: -6px;font-size: 15px;" class="col-lg-11 col-md-11 control-label" >Passenger Loading </label>
                    <div class="col-lg-7 col-md-7">
                        <input type="text" placeholder="hh:mm:ss" value="00:00:20" id="paxLoad" name="fields[paxLoad]" onblur="paxBlur()"  class="form-control reset">
                    </div>
                    <i class="fa fa-clock-o fa-2x"></i>
                    <div class='clearfix'></div>
                </div>
                <div style="padding: 15px;">
                    <label style="text-align: left;margin-top: -6px;font-size: 15px;" class="col-lg-11 col-md-11 control-label" >Passenger Unloading </label>
                    <div class="col-lg-7 col-md-7">
                        <input type="text" placeholder="hh:mm:ss" value="00:00:20" id="paxUnload" name="fields[paxUnload]" onblur="paxBlur()"  class="form-control reset">
                    </div>
                    <i class="fa fa-clock-o fa-2x"></i>
                    <div class='clearfix'>  </div>     
                </div>
            </div>
            <div class="form-group col-lg-6">
                <div style="padding: 15px;">
                    <label style="text-align: left;margin-top: -6px;font-size: 15px;" class="col-lg-11 col-md-11 control-label" >Luggage Loading </label>
                    <div class="col-lg-7 col-md-7">
                        <input type="text" placeholder="hh:mm:ss" value="00:00:10" id="luggageLoad" name="fields[luggageLoad]" onblur="laggageBlur()" class="form-control input-small  reset">
                    </div>
                    <i class="fa fa-clock-o fa-2x"></i>
                    <div class='clearfix'> </div>     
                </div>  
                <div style="padding: 15px;">
                    <label style="text-align: left;margin-top: -6px;font-size: 15px;" class="col-lg-11 col-md-11 control-label" >Luggage Unloading </label>
                    <div class="col-lg-7 col-md-7">
                        <input type="text" placeholder="hh:mm:ss" value="00:00:10" id="luggageUnload" name="fields[luggageUnload]" onblur="laggageBlur()"  class="form-control reset">
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
