<?php include "jquery_ui.php"; ?>
<?php include "message.php" ?>

<script type="text/javascript">
    $(document).ready(function () {
        DatePickerBlock();
        $('#search').keypress(function (e) {
            if (e.keyCode == 13)
                search('');
        });
        updateSearchCount("<?php print count($data); ?>");
    });
    function updateSearchCount(count) {
        switch (count) {
            case 0:
                $(".totalResult").hide();
                break;
            case 1:
                $(".totalResult").html(count + " Affiliate Found!").show();
                break;
            default:
                $(".totalResult").html(count + " Affiliates Found!").show();
        }
    }
    function sort(sortBy) {
        search(sortBy);
    }
    function search(sortOn) {
        $("#waitModal").modal('show');
        $.ajax({
            url: _U + 'home',
            type: 'POST',
            data: {getfilter: 1, search: $("#search").val(), sortOn: sortOn},
            success: function (r) {
                setTimeout(function () {
                    $("#waitModal").modal('hide');
                }, 1000);
                $("#searchList").html(r);
            }
        });
    }

    function cityModal() {
        $("#AddCity").modal('show');
    }
    function addCity() {
        var city = $("#city").val();
        if (city == '') {
            alert("Plz fill up the field");
            return false;
        } else {
            showWait();
            $.ajax({
                url: _U + 'home',
                data: {addCity: 1, city: city},
                success: function (r) {
                    hideWait();
                    $("#AddCity").modal('hide');
                }
            });
        }
    }
    function editAffiliatesmodal(id) {
        $.ajax({
            url: _U + 'home',
            data: {Editaffiliates: 1, affId: id},
            success: function (r) {
                $("#affiliates_modal_content").html(r);
                $("#AddAffiliates").modal('show');
                DatePickerBlock();
            }
        });
    }

    function AddAffiliates(edit_id) {
        $.ajax({
            url: _U + 'home',
            data: {affiliate: 1, data: $("#affiliate").serialize(), id: edit_id},
            success: function (r) {
                if (r == 'add') {
                    _success("Affiliate Has Been Added Successfully");
                } else {
                    _success("Affiliate Has Been Updated Successfully..");
                }
                search('');
                $("#AddAffiliates").modal('hide');
            }
        });
    }
    function DatePickerBlock() {
        $("#datepicker").datepicker({
            dateFormat: "mm/dd/yy"
        });
        $("#datepicker_").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "mm/dd/yy"
        });
    }

    function Editvehiclemodal(vehicleId) {
        $.ajax({
            url: _U + 'home',
            data: {Editvehicle: 1, vehicleId: vehicleId},
            success: function (r) {
                $("#vehicle_modal_content").html(r);
                $("#Addvehicle").modal('show');
            }
        });
    }



    function addVehicle(edit_id) {
        $.ajax({
            url: _U + 'home',
            data: {addVehicle: 1, data: $("#vehicle").serialize()},
            success: function (r) {
                if (r == 'add') {
                    _success("Vehicle Has Been Added Successfully");
                } else {
                    _success("Vehicle Has Been Updated Successfully..");
                }
                search('');
                $("#Addvehicle").modal('hide');
            }
        });
    }

    function viewImage(affiliateId) {
        $("#vehicalImage").modal('show');
        /* $.ajax({
         url: _U + 'home',
         data: {image: 1, id: affiliateId},
         success: function (r) {
         $("#image_content").html(r);
         $("#vehicalImage").modal('show');
         }
         });*/
    }
    function viewInsurance(affiliateId) {
        $.ajax({
            url: _U + 'home',
            data: {insurance: 1, id: affiliateId},
            success: function (r) {
                $("#insurance_content").html(r);
                $("#insurance").modal('show');
            }
        });
    }

    function insuranceDetail(edit_id) {
        $.ajax({
            url: _U + 'home',
            data: {addInsurance: 1, data: $("#insuranceForm").serialize()},
            success: function (r) {
                if (r == 'add') {
                    _success("Insurance Detail Has Been Added Successfully");
                } else {
                    _success("Insurance Detail Has Been Updated Successfully..");
                }
                search('');
                $("#insurance").modal('hide');
            }
        });
    }


    ////auto complate 
    $.widget("custom.catcomplete", $.ui.autocomplete, {
        _create: function () {
            this._super();
            this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
        },
        _renderMenu: function (ul, items) {
            var that = this,
                    currentCategory = "";
            $.each(items, function (index, item) {
                var li;
                if (item.category != currentCategory) {
                    ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
                    currentCategory = item.category;
                }
                li = that._renderItemData(ul, item);
                if (item.category) {
                    li.attr("aria-label", item.category + " : " + item.label);
                }
            });
        }
    });
    $("#search").catcomplete({
        delay: 0,
        minLength: 3,
        //source: data
        source: _U + 'home', //source: data
        select: function (a, b) {
            $("#search").val(b.item.label);
            search('');
            return false;
        }
    });
</script>


