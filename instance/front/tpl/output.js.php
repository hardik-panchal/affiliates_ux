<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script>

    $(document).ready(function () {
        $("#more").click(function () {
            $("#scrollView").show();
            window.parent.scrollTo(1500, 1500);
        });
        $('body').css("background-color", "white");
//        $("#more").click(function () {
        window.parent.scrollTo(700, 700);
        var f = 1;
        //
<?php if ($_REQUEST['fields']['Transportation'] == 'Shuttle') { ?>

            setTimeout(function () {
                $(".block").animate({"left": "+=100px"}, 1000);
                setTimeout(function () {
                    
                    $(".stagging").css("opacity", "1");
                    $(".block").animate({"left": "+=110px"}, 1000);
                    setTimeout(function () {
                       
                        $(".loading").css("opacity", "1");
                        $(".block").animate({"left": "+=690px"}, 3000);
                        setTimeout(function () {
                           
                            $(".travel").css("opacity", "1");
                            // $(".block").animate({"left": "+=310px"}, 1000);
                            setTimeout(function () {
                               
                                $(".unloading").css("opacity", "1");
                                $(".block").animate({"left": "+=140px"}, 1000);
                                setTimeout(function () {
                                    
                                    $(".dropoff").css("opacity", "1");
                                    $(".summary").show('slow');
                                    setTimeout(function () {
                                        $(".rTrip").show('fast');
                                        setTimeout(function () {
                                            $(".blockReturn").show('slow');
                                            $(".rPickup").css("opacity", "1");
                                            $(".rTravel").css("opacity", "1");
                                            $(".rDropoff").css("opacity", "1");
                                           
                                            $(".blockReturn").animate({"left": "-=1030px"}, 3000);
                                            setTimeout(function () {
                                                 $(".returnSummary").show('slow');
                                                $(".final").show('slow');
                                            }, 3000);
                                        }, 800);
                                    }, 2000);
                                }, 800);
                            }, 3000);
                        }, 800);
                    },800 );
                }, 800);
            }, 800);
<?php } else { ?>
            setTimeout(function () {
                $(".block").animate({"left": "+=100px"}, 1000);
                setTimeout(function () {
                   
                    $(".stagging").css("opacity", "1");
                    $(".block").animate({"left": "+=110px"}, 1000);
                    setTimeout(function () {
                       
                        $(".loading").css("opacity", "1");
                        $(".block").animate({"left": "+=690px"}, 3000);
                        setTimeout(function () {
                            
                            $(".travel").css("opacity", "1");
                           
                            setTimeout(function () {
                               
                                $(".unloading").css("opacity", "1");
                                $(".block").animate({"left": "+=140px"}, 1000);
                                setTimeout(function () {
                                    
                                    $(".dropoff").css("opacity", "1");
                                   
                                    setTimeout(function () {
                                         $(".summary").show('slow');
                                        $(".final").show('slow');
                                    }, 3000);
                                }, 800);
                            }, 800);
                        }, 800);
                    }, 800);
                }, 800);
            }, 800);
<?php } ?>
//        });
    });</script>

