<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script>

    $(document).ready(function () {
        $("#more").click(function () {
            window.parent.scrollTo(1500, 1500);
            var f = 1;
            $("#scrollView").show();
<?php if ($_REQUEST['fields']['Transportation'] == 'Shuttle') { ?>
                setInterval(function () {
                    var moov = parseInt($(".block").css("left"), 10);

                    if (moov <= 950 && f == 1) {
                        $(".block").animate({"left": "+=50px"}, "fast");
                    } else if (moov == 950 && f == 1) {
                        f = 0;
                        $(".block").animate({"top": $(".returnTrack").position().top}, "fast");
                    } else
                    {
                        var moov = parseInt($(".block").css("left"), 10);
                        f = 0;
                        if (moov > 50 && f == 0) {
                            $(".block").animate({"left": "-=50px"}, "fast");
                        }
                    }
                }, 1000);
<?php } else { ?>
                setInterval(function () {
                    var moov = parseInt($(".block").css("left"), 10);
                    if (moov <= 950) {
                        $(".block").animate({"left": "+=50px"}, "fast");
                    }
                }, 1000);
<?php } ?>

        });


    });</script>

