<?php if (!empty($data)): ?> 
    <div class="pull-right " style="font-size: 14px;color: gray;margin-bottom: -15px;">
        <span style="font-weight: bold;">Sort By : </span><span style="cursor: pointer;" onclick="sort('affiliates')">Affiliates Name</span> | <span style="cursor: pointer;" onclick="sort('ratting')">Affiliates Rating</span> 
    </div> 
    <div style="clear:both"></div>
    <?php foreach ($data as $each_data): ?>

        <div class="panel panel-default" style="padding-top: 10px;margin-top:20px;background-color:white;box-shadow:0 1px 0 rgba(0, 0, 0, 0.4);">
            <div >
                <div class="col-md-4 col-lg-4" style="padding-left:20px">
                    <span  style="font-size: 17px;color:black;padding-top:1px;">


                        <strong id="farmout_name<?php print $each_data['id']; ?>"><?php print $each_data['farmout_name']; ?></strong>

                        </br>
                        <span style="font-family:verdana;color:grey; text-decoration:none;font-size:14px;line-height:18px;">
                            <?php
                            if ($each_data['address']) {
                                print $each_data['address'] . "<br/>";
                            }
                            print $each_data['city'];
                            ?> 
                        </span>
                    </span>
                    <br/>
                    <br/>
                    <span  style="font-size: 15px;color:#1294d5;padding-top:20px;height:50px;">
                        <strong style="color: grey;font-size: 14px;"> Contact Detail</strong>
                        <br/>
                        <span style="font-family:verdana;color:grey; text-decoration:none;font-size:11px;line-height:18px;">
                            <?php
                            if ($each_data['contact_number']) {
                                print $each_data['contact_number'];
                            }
                            ?>
                            <br/>
                            <?php
                            if ($each_data['contact_email']) {
                                print $each_data['contact_email'];
                            }
                            ?>
                        </span>
                    </span>


                </div>
                <div class="col-md-8 col-lg-8 table-responsive">
                    <table class="table table-condensed table-hover fleetTable ">
                        <tr>
                            <th class="thStyle" style="width: 40%;">Vehicle Name</th>    
                            <th class="thStyle" style="width: 20%;">$/Hour</th>    
                            <th class="thStyle" style="width: 25%;">Minimum Hours</th>    
                            <th class="thStyle" style="width: 30%;">Flat Rate</th>    
                        </tr>

                        <?php
                        $vehicle = q("select * from affiliate_vehicles where aff_id='{$each_data['id']}' ORDER BY rate_per_hour asc, minimum asc");
                        $count = count($vehicle);
                        if (!$vehicle) {
                            ?>
                            <tr>
                                <th colspan="3" style="color:red"><strong> Vehicle not Avilable!</strong></th>
                            </tr>

                            <?php
                        }

                        foreach ($vehicle as $each_vehicle):
                            ?>
                            <tr>
                                <td class="text-capitalize text-success font-weight-bold" >
                                    <?php print $each_vehicle['vehicle']; ?> 
                                </td>
                                <td >

                                    <?php
                                    if ($each_vehicle['rate_per_hour']) {
                                        print "$" . $each_vehicle['rate_per_hour'];
                                    } else {
                                        print 'N/A ';
                                    }
                                    ?>                                    

                                    / Hour
                                </td>
                                <td>
                                    <?php
                                    if ($each_vehicle['minimum']) {
                                        print $each_vehicle['minimum'];
                                    } else {
                                        print 'N/A  ';
                                    }
                                    ?>

                                    hours min

                                </td>
                                <td>
                                    $<?php
                                    if ($each_vehicle['flat_rate']) {
                                        print $each_vehicle['flat_rate'];
                                    } else {
                                        print 'N/A  ';
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>

            <div style="margin-top:3px;" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 affBoxLinks" style="font-size: 11px;;" >
                    <ul  title="Photos" style="list-style: none;cursor: pointer;padding-left: 0px;width: 5%;float: left;">
                        <li class="dropdown hidden-xs">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#65A9E7;" >
                               Photos<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" style="min-width:auto;font-size: 11px;">
                                <li style="cursor: pointer;"><a  onclick="sendImage('<?php print $each_data['id']; ?>');" > <i class="fa fa-pencil-square-o"></i>Send Photos</a></li>
                                <li style="cursor: pointer;"><a  onclick="viewImage('<?php print $each_data['id']; ?>');" > <i class="fa fa-pencil-square-o"></i>View Photos</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!--<a onclick="viewImage('<?php print $each_data['id']; ?>');" style="cursor: pointer;">Vehicle Photos </a>&nbsp;|&nbsp;-->
                    <a onclick="viewInsurance('<?php print $each_data['id']; ?>');" style="cursor: pointer;">Insurance Copy </a>
                    <ul class="pull-right" title="Edit" style="list-style: none;cursor: pointer;">
                        <li class="dropdown hidden-xs">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:black;" >
                                <i class="fa fa-cog" >&nbsp;</i><b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" style="min-width:auto;font-size: 11px;margin: 2px -75px; ">
                                <li style="cursor: pointer;"><a  onclick="editAffiliatesmodal('<?php print $each_data['id']; ?>');" > <i class="fa fa-pencil-square-o"></i>Edit Affiliates</a></li>
                                <li style="cursor: pointer;"><a  onclick="Editvehiclemodal('<?php print $each_data['id']; ?>');" > <i class="fa fa-pencil-square-o"></i>Edit Vehicles</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

    <?php endforeach; ?>
<?php else: ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="color:red;margin-top: 10px;text-align:center;color:red;font-weight:bold;padding:5px;font-size:13px;">Sorry, No affiliates found!</div></td>
<?php endif; ?>

<script type="text/javascript">
    try {
        updateSearchCount("<?php print count($data); ?>");
    } catch (e) {
    }
</script>    
