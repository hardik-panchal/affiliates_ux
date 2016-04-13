<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script>

    $(document).ready(function () {
        $("#more").click(function () {
            $("#scrollView").show();
            window.parent.scrollTo(1500, 1500);
        });
//        $("#more").click(function () {
        window.parent.scrollTo(700, 700);
        var f = 1;
        //
<?php if ($_REQUEST['fields']['Transportation'] == 'Shuttle') { ?>

            setTimeout(function () {
                $(".block").animate({"left": "+=100px"}, "slow");
                setTimeout(function () {
                    $(".stagging").show();
                    $(".stagging").css("opacity", "1");
                    $(".block").animate({"left": "+=180px"}, "slow");
                    setTimeout(function () {
                        $(".loading").show();
                        $(".loading").css("opacity", "1");
                        $(".block").animate({"left": "+=310px"}, "slow");
                        setTimeout(function () {
                            $(".travel").show();
                            $(".travel").css("opacity", "1");
                            $(".block").animate({"left": "+=310px"}, "slow");
                            setTimeout(function () {
                                $(".unloading").show();
                                $(".unloading").css("opacity", "1");
                                $(".block").animate({"left": "+=140px"}, "slow");
                                setTimeout(function () {
                                    $(".dropoff").show();
                                    $(".dropoff").css("opacity", "1");
                                    $(".summary").show('slow');
                                    setTimeout(function () {
                                        $(".rTrip").show('fast');
                                        setTimeout(function () {
                                            $(".blockReturn").show('fast');
                                            $(".rPickup").css("opacity", "1");
                                            $(".rTravel").css("opacity", "1");
                                            $(".rDropoff").css("opacity", "1");
                                            $(".returnSummary").show('slow');
                                            $(".blockReturn").animate({"left": "-=1030px"}, "slow");
                                            setTimeout(function () {
                                                $(".col-lg-2").show('slow');
                                                $(".final").show('slow');
                                            }, 3000);
                                        }, 2000);
                                    }, 2000);
                                }, 2000);
                            }, 2000);
                        }, 2000);
                    }, 2000);
                }, 2000);
            }, 2000);
<?php } else { ?>
            setTimeout(function () {
                $(".block").animate({"left": "+=100px"}, "slow");
                setTimeout(function () {
                    $(".stagging").show();
                    $(".block").animate({"left": "+=100px"}, "slow");
                    setTimeout(function () {
                        $(".loading").show();
                        $(".block").animate({"left": "+=310px"}, "slow");
                        setTimeout(function () {
                            $(".travel").show();
                            $(".block").animate({"left": "+=310px"}, "slow");
                            setTimeout(function () {
                                $(".unloading").show();
                                $(".block").animate({"left": "+=200px"}, "slow");
                                setTimeout(function () {
                                    $(".dropoff").show();
                                    setTimeout(function () {
                                        $(".summary").show('slow');
                                        $(".final").show('slow');
                                    }, 3000);
                                }, 2000);
                            }, 2000);
                        }, 2000);
                    }, 2000);
                }, 2000);
            }, 2000);
<?php } ?>
//        });
    });</script>

