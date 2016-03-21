
<style>
    .text-capitalize{
        text-transform:uppercase;
    }
    .font-weight-bold{
        font-weight: bold;  
    }
</style><?php
if (!empty($data)):
    ?> 

    <?php foreach ($data as $each_data): ?>

        <div class="panel panel-default" style="padding-top: 10px;margin-top:20px;background-color:white;box-shadow:0 1px 0 rgba(0, 0, 0, 0.4);padding-bottom: 10px;">
            <div class="col-md-4 col-lg-4" style="padding-left:20px">
                <span  style="font-size: 17px;color:black;padding-top:1px;">
                    <strong> <?php print $each_data['farmout_name']; ?></strong>
                    </br>
                    <span style="font-family:verdana;color:grey; text-decoration:none;font-size:14px;line-height:18px;">
                        <?php
                        if ($each_data['address']) {
                            print $each_data['address'] . ',';
                        }
                        $city = qs("select * from affiliates_city where id='{$each_data['city']}'");

                        if ($city) {
                            print $city['city'];
                        }
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
                <table class="table table-condensed table-hover ">
                    <tr>
                        <th style="font-size:18px;border-top: none;border-bottom: 2px solid #ddd;width: 40%;">Vehicle Name</th>    
                        <th style="font-size:18px;border-top: none;border-bottom: 2px solid #ddd;width: 20%;">$/Hour</th>    
                        <th style="font-size:18px;border-top: none;border-bottom: 2px solid #ddd;width: 20%;">Minimum Hours</th>    
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
                                <span class="hours" style="cursor: pointer;"><i class="fa fa-pencil"></i></span>&nbsp;
                                <span onblur="editOnMouseHover('<?php print $each_vehicle['id']; ?>', 'vehicle')" id="vehicle<?php print $each_vehicle['id']; ?>"> 
                                    <?php print $each_vehicle['vehicle']; ?> 
                                </span>
                            </td>
                            <td >
                                <span class="hours" style="cursor: pointer;"><i class="fa fa-pencil"></i></span>&nbsp;

                                <?php if ($each_vehicle['rate_per_hour']) { ?>$<?php } ?>
                                <span onblur="editOnMouseHover('<?php print $each_vehicle['id']; ?>', 'rate_per_hour')" id="rate_per_hour<?php print $each_vehicle['id'];?>">
                                <?php
                                if ($each_vehicle['rate_per_hour']) {
                                    print $each_vehicle['rate_per_hour'];
                                } else {
                                    print 'N/A ';
                                }
                                ?>
                                </span>
                                / Hours
                            </td>
                            <td >
                                <span class="hours" style="cursor: pointer;"><i class="fa fa-pencil"></i></span>&nbsp;
                                <span onblur="editOnMouseHover('<?php print $each_vehicle['id']; ?>', 'minimum')" id="minimum<?php print $each_vehicle['id']; ?>">
                                    <?php
                                    if ($each_vehicle['minimum']) {
                                        print $each_vehicle['minimum'];
                                    } else {
                                        print 'N/A  ';
                                    }
                                    ?>
                                </span> hours min
                            </td>
                        </tr>



                    <?php endforeach; ?>
                </table>

            </div>
            <div class="clearfix"></div>
        </div>

    <?php endforeach; ?>
<?php else: ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="color:red;margin-top: 10px;text-align:center;color:red;font-weight:bold;padding:5px;font-size:13px;">Data Not available</div></td>
<?php endif; ?>
    
