<div style="font-size: 15px;color:#1294d5;padding-top:50px;">
    <table>
        <tr>
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
            <td>   <strong> <?php print $each_vehicle['vehicle']; ?> 
                    <?php if ($count > 1) { ?>&nbsp;|&nbsp; <?php } ?></strong> <br>

                <span style="font-family:verdana;color:#aaa; text-decoration:none;font-size:11px;line-height:18px;" title="Min Rate">
                    <span title="Rate Per Hours">
                        <?php print $each_vehicle['rate_per_hour']; ?>
                    </span> 
                    <?php
                    if ($each_vehicle['minimum']) {
                        print '&nbsp;|&nbsp;';
                        ?>
                        <span title="Minimum Hours">
                            <?php
                            print $each_vehicle['minimum'];
                        }
                        ?>
                    </span>
                </span>

            </td>
            <?php
            $count--;
        endforeach;
        ?> 
        </tr>
    </table>
</div>