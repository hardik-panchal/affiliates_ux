<?php
if (!empty($data)):
    ?> 

    <?php foreach ($data as $each_data): ?>

        <div class="panel panel-default" style="padding-top: 10px;margin-top:20px;background-color:white;box-shadow:0 1px 0 rgba(0, 0, 0, 0.4);width:87%;margin-left:30px">
            <div class="col-md-4 col-lg-4" style="padding-left:20px">
                <div  style="font-size: 17px;color:black;padding-top:1px;">
                    <strong> <?php print $each_data['farmout_name']; ?></strong>
                    <div style="font-family:verdana;color:grey; text-decoration:none;font-size:14px;line-height:18px;">
                        <?php
                        if ($each_data['address']) {
                            print $each_data['address'] . ',';
                        }
                        $city = qs("select * from affiliates_city where id='{$each_data['city']}'");

                        if ($city) {
                            print $city['city'];
                        }
                        ?> 
                    </div>
                </div>
                <div  style="font-size: 15px;color:#1294d5;padding-top:20px;height:50px;">
                    <strong style="color: grey;font-size: 14px;"> Contact Detail</strong>
                    <div style="font-family:verdana;color:grey; text-decoration:none;font-size:11px;line-height:18px;">
                        <?php
                        if ($each_data['contact_number']) {
                            print $each_data['contact_number'];
                        }
                        ?><br>
                        <?php
                        if ($each_data['contact_email']) {
                            print $each_data['contact_email'];
                        }
                        ?>
                    </div>
                </div>

            </div>
            <div class="col-md-8 col-lg-8">
                <?php
                $vehicle = q("select * from affiliate_vehicles where aff_id='{$each_data['id']}'");
                $count = count($vehicle);
                if (!$vehicle) {
                    ?>
                    <strong> Vehicle not Avilable!</strong>
                    <?php
                }


                foreach ($vehicle as $each_vehicle):
                    ?>
                    <div class="col-md-4 col-lg-4">
                        <div class="panel panel-default ">
                            <div class="panel-heading " style="padding-left: 20px;font-size: 14px;">
                                <b> <?php print $each_vehicle['vehicle']; ?> </b>
                            </div>
                            <div id="filterdate" class="panel-body" style="font-size: 12px;color: grey;padding-left: 30px;">
                                <b><?php
                                    if ($each_vehicle['rate_per_hour']) {
                                        print '$' . $each_vehicle['rate_per_hour'] . ' / Hours';
                                    } else {
                                        print 'N/A / Hours';
                                    }
                                    ?>
                                    <br>  
                                    <?php
                                    if ($each_vehicle['minimum']) {
                                        print $each_vehicle['minimum'] . ' hours min';
                                    } else {
                                        print 'N/A  hours min';
                                    }
                                    ?>
                                </b>
                            </div>
                        </div>
                    </div>


        <?php endforeach; ?>
            </div>
            <div class="clearfix"></div>
            <div style="font-size: 14px;color: maroon;background-color: #faedba;line-height: 30px;padding-left:20px;margin-top: 50px"><b>Note : Good Drivers | Doble Check Billing </b> </div>


        </div>

    <?php endforeach; ?>
<?php else: ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px;text-align:center;color:red;font-weight:bold;padding:5px;font-size:13px;">Data Not available</div></td>
<?php endif; ?>
    
