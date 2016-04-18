<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<!--<script src="//cdn.jsdelivr.net/jquery.color-animation/1/mainfile"></script>-->
<script>

    $(document).ready(function () {
        window.parent.scrollTo(300, 300);
        $("#more").click(function () {
            $("#scrollView").show();
            window.parent.scrollTo(1500, 1500);
        });
        $('body').css("background-color", "white");
        // window.parent.scrollTo(700, 700);
        var f = 1;
        var f1 = 1;
        var j = 1;
        var topP = 50;
        var topF = 100;
        var topD = 150;
        var load = 0;
        var left = 1;
        mycode(j);
        function mycode(j) {
            $(".a" + j).animate({"top": "-=" + topP + "px"}, 2500, function () {
                doPickup(j);
                topP = topP + 30;
                mycode(j + 1);
            });
        }

        function doPickup(j) { // to be called when you want to stop the timer

            var str = $(".a" + j).attr('class');
            var res = str.split(" ");
            if (res[0] == 'bus') {
                $(".a" + j).animate({"left": "+=210px"}, 3000, function () {

                    $(".loadPax:visible:last").animate({"top": "+=+120px", "left": "210px"}, 200, function () {
                        $(this).hide();
                        $(".loadPax:visible:last").animate({"top": "+=120px", "left": "210px"}, 200, function () {
                            $(this).hide();
                            $(".loadPax:visible:last").animate({"top": "+=120px", "left": "210px"}, 200, function () {
                                $(this).hide();
                                doTravel(j);
                                $("#paxCounter").css({
                                    color: "maroon"
                                });
                            });
                        });
                    });
                });
            } else if (res[0] == 'van') {
                $(".a" + j).animate({"left": "+=210px"}, 3000, function () {
                    $(".loadPax:visible:last").animate({"top": "+=+120px", "left": "210px"}, 400, function () {
                        $(this).hide();
                        $(".loadPax:visible:last").animate({"top": "+=120px", "left": "210px"}, 400, function () {
                            $(this).hide();
                            doTravel(j);
                            $("#paxCounter").css({
                                color: "maroon"
                            });
                        });
                    });
                });
            } else {
                $(".a" + j).animate({"left": "+=210px"}, 3000, function () {
                    $(".loadPax:visible:last").animate({"top": "+=+120px", "left": "210px"}, 400, function () {
                        $(this).hide();
                        doTravel(j);
                        $("#paxCounter").css({
                            color: "maroon"
                        });
                    });

                });
            }
        }
        function doTravel(j) { // to be called when you want to stop the timer
            $(".a" + j).animate({"left": "+=720px"}, 1000, function () {
                var str = $(".a" + j).attr('class');

                var res = str.split(" ");
                if (res[0] == 'bus') {
                    var i = 0;
                    _doUnload(i, 3, j, res[0]);

                } else if (res[0] == 'van') {
                    var i = 0;
                    _doUnload(i, 2, j, res[0]);
                } else {
                    var i = 0;
                    _doUnload(i, 1, j, res[0]);
                }
            });
        }
        function _doUnload(i, limit, j, vehicle) {
            left = left + 10;
            $(".moov").show().animate({top: "-=120px", left: left + "px"}, 500, function () {
                i = i + 1;
                $(this).hide().css({top: "160px", left: 190 + "px"});
                if (i < limit) {
                    $(".unloadPax:hidden:first").show(100);
                    _doUnload(i, limit, j, vehicle);
                } else {
                    $(".unloadPax:hidden:first").show(100);
                    doDropff(j);
                    $(".moov").hide();
                    load = parseInt($("#paxCounter").html());
                    var vehicleCap = parseInt($(".a" + j).attr('data-capacity'));
                    if (vehicle == 'bus') {
                        var busPax = $("#busPax").html();
                        if (busPax < vehicleCap) {
                            vehicleCap = busPax;
                            busPax = busPax - busPax;
                            $("#busPax").html(busPax);
                        } else {
                            busPax = busPax - vehicleCap;
                            $("#busPax").html(busPax);
                        }
                    } else if (vehicle == 'van') {
                        var busPax = $("#vanPax").html();
                        if (busPax < vehicleCap) {
                            vehicleCap = busPax;
                            busPax = busPax - busPax;
                            $("#vanPax").html(busPax);
                        } else {
                            busPax = busPax - vehicleCap;
                            $("#vanPax").html(busPax);
                        }
                        console.log(vehicleCap, busPax);
                    } else {
                        var busPax = $("#SUVPax").html();
                        if (busPax < vehicleCap) {
                            vehicleCap = busPax;
                            busPax = busPax - busPax;
                            $("#SUVPax").html(busPax);
                        } else {
                            busPax = busPax - vehicleCap;
                            $("#SUVPax").html(busPax);
                        }
                    }
                    console.log(vehicleCap);
                    load = load - vehicleCap;
                    var msg = 0;
                    if (load > 0) {
                        msg = load;
                        $("#paxCounter").css({
                            color: "green"
                        });
                    } else {
                        $("#message").css({"visibility": "hidden"});
                        $("#paxCounter").css({"font-size": "18px", "padding-bottom": "8%", color: "gray"});
                        msg = "All Passengers Transfered!!";
                    }
                    $("#paxCounter").html(msg);
                }
            });
        }
        function doDropff(j) { // to be called when you want to stop the timer
            $(".a" + j).animate({"left": "+=125px"}, 800, function () {
                doDown(j);

                var str = $(".a" + j).attr('class');
                var res = str.split(" ");
                if (res[0] == 'bus') {
                    $("#img" + j).attr("src", "<?php echo _MEDIA_URL . "img/bus2.png" ?>");
                } else if (res[0] == 'van') {
                    $("#img" + j).attr("src", "<?php echo _MEDIA_URL . "img/van2.png" ?>");
                } else {
                    $("#img" + j).attr("src", "<?php echo _MEDIA_URL . "img/car2.png" ?>");
                }

            });
        }
        function doDown(j) { // to be called when you want to stop the timer
            $(".a" + j).animate({"top": "+=" + topD + "px"}, 1000, function () {
                doRevers(j);
            });
        }
        function doRevers(j) { // to be called when you want to stop the timer
            $(".a" + j).animate({"left": "-=1045px"}, 2000, function () {
                doUp(j);
            });
        }
        function doUp(j) { // to be called when you want to stop the timer

            var str = $(".a" + j).attr('class');
            var res = str.split(" ");
            if (res[0] == 'bus') {
                $("#img" + j).attr("src", "<?php echo _MEDIA_URL . "img/bus1.png" ?>");
            } else if (res[0] == 'van') {
                $("#img" + j).attr("src", "<?php echo _MEDIA_URL . "img/van1.png" ?>");
            } else {
                $("#img" + j).attr("src", "<?php echo _MEDIA_URL . "img/car1.png" ?>");
            }
            $(".a" + j).animate({"top": "-=" + topF + "px"}, 1000);
            topF = topF - 30;
        }

    });</script>

