<style>
    .gradient{
        background: rgba(255,255,255,1);
        background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(47%, rgba(246,246,246,1)), color-stop(100%, rgba(237,237,237,1)));
        background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
        background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
        background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
        background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed', GradientType=0 );
    }
    .block1 {
        position: absolute;
        //  background-color: #abc;
        left: 30px;
        width: 90px;
        margin: -30px;
    }
    .blockReturn{
        position: absolute;
        //  background-color: #abc;
        left: 1070px;
        width: 90px;
        margin: -30px;
    }
    .hideStage{
        border-top: 5px solid #8ABD0D;
        margin: 2px 10px;
        padding: 10px;
        float: left;
        font-weight: bold;
        text-align: center;
        //display: none;
        // opacity: 0.1;
    }
</style>
<div style="width: 1126px;">
    <h3 style="border-bottom: 5px solid #93c616;
        color: gray;
        padding-bottom: 5px;">
        Transportation Summary
    </h3>
    <div class="row" style="width: 100%;">
        <div style="width: 31%;float: left;margin: 2px;margin-left: 3%;">
            <div style="position: relative;float: left;padding: 11.5%;text-align: center;border: 1px dotted #DADADA;width: 100%;" class="gradient">
                <?php
                $j = 1;
                $top = 1;
                $divid = 23;
                for ($i = 1; $i <= $userIcon; $i++) {
                    ?>
                    <i class="fa fa-user loadPax" style="color:maroon;position: absolute;left: <?php echo $j . "px";
                    ?>;top:<?php echo $top . "px"; ?>"></i>
                       <?php
                       $j = $j + 15;
                       if ($i % $divid == 0) {
                           $top = $top + 15;
                           $j = 1;
                       }
                   }
                   ?>

            </div>
        </div>
        <div style="width: 31%;float: left;margin: 2px 15px;">
            <div style="float: left;font-weight: bold;text-align: center;border: 1px dotted #DADADA;width: 100%;padding: 5px;background-color: gray;color: gray;" class="gradient">
                <div id="message">  Passenger Remaining </div> <div id="paxCounter" class="paxCounter" style="font-size: 36px;"><?php echo $pax; ?></div>
            </div>
        </div>
        <div style="width: 31%;float: left;margin: 2px;">
            <div style="position: relative;float: left;padding: 11.5%;text-align: center;border: 1px dotted #DADADA;width: 100%;" class="gradient">
                <?php
                $j = 1;
                $top = 1;
                for ($i = 1; $i <= $userIcon; $i++) {
                    ?>

                    <i class="fa fa-user unloadPax" style="display:none;color:#8ABD0D;position: absolute;left: <?php echo $j . "px";
                    ?>;top:<?php echo $top . "px"; ?>"></i>
                       <?php
                       $j = $j + 15;
                       if ($i % $divid == 0) {
                           $top = $top + 15;
                           $j = 1;
                       }
                   }
                   ?>
                <i class="fa fa-user moov" style="display: none;color:#8ABD0D;position: absolute;left: 190px;top:160px;"></i>
            </div>
        </div>
        <div style="clear: both;"></div> 
    </div> 
    <div style="clear: both;"></div> 
    <hr style="margin-bottom: 0px;">
    <div style="color: #8abd0d;  font-size: 40px;font-size: 18px;font-weight: bold;margin-bottom: 10px;padding: 20px;">
        Trip 
    </div>
    <div style="width: 10%;position: relative;float: left;">
        <?php
        $left = 0;
        for ($index = 1; $index <= $_REQUEST['field']['bus']['vehicle']; $index++) {
            ?>
            <div class="bus block a<?php echo $index; ?>" style="left:5px;
                 top: <?php echo $left + (30 * $index) ?>px;
                 position: absolute;
                 width: 90px;
                 margin: -10px;"
                 data-capacity="<?php echo $busCapacity; ?>">
                <img id="img<?php echo $index; ?>" src="<?php echo _MEDIA_URL ?>img/bus1.png" style="background-color: white;color: maroon;padding: 5px;" width="70"/></div>
            <?php
        }
        $limit = $_REQUEST['field']['van']['vehicle'] + $_REQUEST['field']['bus']['vehicle'];

        for ($index = $index; $index <= $limit; $index++) {
            ?>
            <div class="van block a<?php echo $index; ?>" style="left:5px;
                 top: <?php echo $left + (30 * $index) ?>px;
                 position: absolute;
                 width: 90px;
                 margin: -10px;" 
                 data-capacity="<?php echo $vanCapacity; ?>"><img id="img<?php echo $index; ?>" src="<?php echo _MEDIA_URL ?>img/van1.png" style="background-color: white;color: maroon;padding: 5px;" width="70"/></div>
                 <?php
             }
             $limit = $limit + $_REQUEST['field']['SUV']['vehicle'];
             for ($index = $index; $index <= $limit; $index++) {
                 ?>
            <div class="SUV block a<?php echo $index; ?>" style="left:5px;
                 top: <?php echo $left + (30 * $index) ?>px;
                 position: absolute;
                 width: 90px;
                 margin: -10px;"
                 data-capacity="<?php echo $SUVCapacity; ?>">
                <img id="img<?php echo $index; ?>" src="<?php echo _MEDIA_URL ?>img/car1.png" style="background-color: white;color: maroon;padding: 5px;" width="70"/></div>
        <?php }
        ?>
<!--<div class="block"><img src="<?php echo _MEDIA_URL ?>img/motor4.png" style="background-color: white;color: maroon;padding: 5px;" width="70"/></div>-->
    </div>
    <div style="width: 90%;position: relative;float: left;margin-left: 5%;">
        <div style="display: block !important;opacity: 1;width: 11%;" class="col-lg-2 hideStage pickup" >
            <i class="fa fa-home fa-4x" style="color: #8abd0d;  font-size: 50px;"></i><br/>
            Pickup
        </div>
        <div style="" class="col-lg-2 hideStage loading" >
            <i class="fa fa-arrow-right fa-4x" style="color: maroon;  font-size: 30px; " ></i><br/>
            Loading 
        </div>
        <div style="width: 50%;" class="col-lg-2 hideStage travel">
            <i class="fa fa-bus fa-4x" style="color: #8abd0d;  font-size: 30px; " ></i><br/>
            Traveling 
        </div>
        <div style="" class="col-lg-2 hideStage unloading" >
            <i class="fa fa-arrow-right fa-4x" style="color: maroon;  font-size: 30px; " ></i><br/>
            Unloading 
            </span>
        </div>
        <div style="width: 11%;" class="col-lg-2 hideStage dropoff" >
            <i class="fa fa-building fa-4x" style="color: #8abd0d;  font-size: 50px; " ></i><br/>
            Dropoff
        </div>
        <div style="clear: both;"></div>
        <div  class="col-lg-12 summary" style="text-align: center;font-size: 15px;font-weight: bold;color:#8a8a8a;margin-top: 15px;display: none;" id="">
            <span class="pull-left">
                Passengers Transferred : 
            </span>  
            <span class="pull-left">
                Passengers Transferred : 
            </span>  
            <span class="pull-left">
                &nbsp;|&nbsp;Time Required  <?php echo $hourTrip . "hr " . $minTrip . "min "; ?>
            </span> 
            <span class="pull-right">
                <?php echo " Passengers Waiting : " . $paxRmaining; ?>
            </span>
        </div>
        <div style="clear: both;"></div>
        <div  class="col-lg-12 final" style="display: none;color: gray;font-size: 18px;font-weight: bold;margin-top: 15px;text-align: center;width: 100%;">
            Total Time Needed For Flawless Transportation   <?php echo number_format($hour) . "hr " . $min . "min "; ?>
        </div>
    </div>
</div>


<div id="busPax" class="hidden"><?php echo $busTotalPax;?></div>
<div id="vanPax" class="hidden"><?php echo $vanTotalPax;?></div>
<div id="SUVPax" class="hidden"><?php echo $SUVTotalPax;?></div>