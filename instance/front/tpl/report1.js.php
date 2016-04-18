
<?php include "message.php" ?>



<script type="text/javascript">
    function paxBlur(value) {
        if (value == 'busVehicle') {
            var cap = $("#bus").val() / 50;
            cap = Math.ceil(cap);
            $("#" + value).val(cap);
             var msg = (cap > 1) ? " Buses Required." : " Bus Required.";
            $("#busMsg").html(cap + msg).removeClass('hidden');
        } else if (value == 'vanVehicle') {
            var cap = $("#van").val() / 10;
            cap = Math.ceil(cap);
            $("#" + value).val(cap);
            var msg = (cap > 1) ? " Vans Required." : " Van Required.";
            $("#vanMsg").html(cap + msg).removeClass('hidden');
        } else if (value == 'SUVVehicle') {
            var cap = $("#SUV").val() / 5;
            cap = Math.ceil(cap);
            $("#" + value).val(cap);
            var msg = (cap > 1) ? " SUVs Required." : " SUV Required.";
            $("#SUVMsg").html(cap + msg).removeClass('hidden');
        }
    }
</script>


