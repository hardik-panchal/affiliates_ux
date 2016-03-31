<?php include "jquery_ui.php"; ?>
<?php include "message.php" ?>

<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>

<script type="text/javascript">
    $(document).ready(function () {

        // a - Represents an alpha character (A-Z,a-z)
        // 9 - Represents a numeric character (0-9)
        // * - Represents an alphanumeric character (A-Z,a-z,0-9)

        //$("#pickStagging").mask("99:99");
        $("#dropStagging").mask("99:99");
//        $("#drop").mask("99:99");

        $("#paxLoad").mask("99:99:99");
        $("#paxUnload").mask("99:99:99");
        $("#luggageLoad").mask("99:99:99");
        $("#luggageUnload").mask("99:99:99");
        var pickup = document.getElementById('pickStagging');
        var searchBox = new google.maps.places.SearchBox(pickup);
        var dropoff = document.getElementById('drop');
        var searchBox = new google.maps.places.SearchBox(dropoff);


        $("#hideSummary").click(function () {
            $("#summaryData").hide();
            $(this).hide();
            $("#showSummary").show();
        });
        $("#showSummary").click(function () {
            $("#summaryData").show();
            $(this).hide();
            $("#hideSummary").show();
        });
    });
    function paxBlur() {
        var pax = $("#Passenger").val();
        var load = $("#paxLoad").val();
        var unload = $("#paxUnload").val();
        var load = load.split(":");
        var loadSec = load[2] * pax;
        var loadTime = load[1] * pax;
        var loadHour = load[0] * pax;
        if (loadSec >= 60) {
            temp = loadSec % 60;
            loadTime += Math.floor(loadSec / 60);
            loadSec = temp;
        }
        if (loadTime >= 60) {
            temp = loadTime % 60;
            loadHour += Math.floor(loadTime / 60);
            loadTime = temp;
        }
        var loadMsg = '';
        if (loadHour > 0) {
            loadMsg = loadMsg + loadHour + " Hours ";
        }
        loadMsg = loadMsg + loadTime + " min";

        var unload = unload.split(":");
        var unloadSec = unload[2] * pax;
        var unloadTime = unload[1] * pax;
        var unloadHour = unload[0] * pax;

        if (unloadSec >= 60) {
            temp = unloadSec % 60;
            unloadTime += Math.floor(unloadSec / 60);
            unloadSec = temp;
        }
        if (unloadTime >= 60) {
            temp = unloadTime % 60;
            unloadHour += Math.floor(unloadTime / 60);
            unloadTime = temp;
        }

        var unloadMsg = '';
        if (unloadHour > 0) {
            unloadMsg = unloadMsg + unloadHour + " Hours ";
        }
        unloadMsg = unloadMsg + unloadTime + " min";
        $("#loading").html("Passanger Loading Time : <b>" + loadMsg + "</b>");
        $("#unloading").html("Passanger Unloading Time : <b>" + unloadMsg + "</b>");
    }
    function laggageBlur() {
        var pax = $("#luggage").val();
        var load = $("#luggageLoad").val();
        var unload = $("#luggageUnload").val();

        var load = load.split(":");
        var loadSec = load[2] * pax;
        var loadTime = load[1] * pax;
        var loadHour = load[0] * pax;
        if (loadSec >= 60) {
            temp = loadSec % 60;
            loadTime += Math.floor(loadSec / 60);
            loadSec = temp;
        }
        if (loadTime >= 60) {
            temp = loadTime % 60;
            loadHour += Math.floor(loadTime / 60);
            loadTime = temp;
        }
        var loadMsg = '';
        if (loadHour > 0) {
            loadMsg = loadMsg + loadHour + " Hours ";
        }
        loadMsg = loadMsg + loadTime + " min";

        var unload = unload.split(":");
        var unloadSec = unload[2] * pax;
        var unloadTime = unload[1] * pax;
        var unloadHour = unload[0] * pax;

        if (unloadSec >= 60) {
            temp = unloadSec % 60;
            unloadTime += Math.floor(unloadSec / 60);
            unloadSec = temp;
        }

        if (unloadTime >= 60) {
            temp = unloadTime % 60;
            unloadHour += Math.floor(unloadTime / 60);
            unloadTime = temp;
        }

        var unloadMsg = '';
        if (unloadHour > 0) {
            unloadMsg = unloadMsg + unloadHour + " Hours ";
        }
        unloadMsg = unloadMsg + unloadTime + " min";


        $("#luggageLoading").html("Luggage Loading Time : <b>" + loadMsg + " </b>");
        $("#luggageUnloading").html("Luggage Unloading Time : <b>" + unloadMsg + " </b>");
    }

//    $("#drop").blur(function () {
//        var latLngA = '';
//        var latLngB = '';
//        var geocoder = new google.maps.Geocoder();
//        var address = $("#pickStagging").val();
//        geocoder.geocode({'address': address}, function (results, status) {
//            if (status == google.maps.GeocoderStatus.OK) {
//                latLngA = results;
//            }
//        });
//
//        var geocoder = new google.maps.Geocoder();
//        var address = $("#drop").val();
//        geocoder.geocode({'address': address}, function (results, status) {
//            if (status == google.maps.GeocoderStatus.OK) {
//                latLngB = results;
//            }
//        });
//        var distance = google.maps.geometry.spherical.computeDistanceBetween(latLngA, latLngB);
//        console.log(distance);
//    });

</script>


