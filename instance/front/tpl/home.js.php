<script type="text/javascript">
    $(document).ready(function() {
        CallAllFunctionAtRefresh();
        $("#search").val('sky');
        search();
    });
    function search() {
//        showWait();
        $.ajax({
            url: _U + 'home',
            data: {getfilter: 1, search: $("#search").val()},
            success: function(r) {
//                hideWait();
//                alert(r);
                $("#searchList").html(r);
            }
        });
    }

    function cityModal() {
        $("#AddCity").modal('show');
    }
    function addCity() {

        var city = $("#city").val();
        if (city == '')
        {
            alert("Plz fill up the field");
            return false;
        } else {
            showWait();
            $.ajax({
                url: _U + 'home',
                data: {addCity: 1, city: city},
                success: function(r) {
                    hideWait();
                    $("#AddCity").modal('hide');

                }
            });
        }
    }
    function affiliateModal__() {
        $("#AddAffiliates").modal('show');
    }
    function addAffiliates__() {
        var affiliate = $("#affiliate").val();
        var address = $("#address").val();
        var contact = $("#contact").val();

        var city = $("#cityAffiliates option:selected").val();
//        alert(city);

        if (affiliate == '' || city == '')
        {
            alert("Plz fill up the field");
            return false;
        } else {
            showWait();

            $.ajax({
                url: _U + 'home',
                data: {addAffiliate: 1, affiliate: affiliate, address: address, contact: contact, city: city},
                success: function(r) {
                    hideWait();
                    $("#AddAffiliates").modal('hide');
                }
            });
        }
    }

    function Affiliatesmodal() {

        $("#uploaded_insurance_copy_file").html('');
        $("#uploaded_insurance_copy_file").hide();
        $("#select_insurance_copy_area").show();
        $(".vehicle_photos_nm").remove();
        $("#uploaded_attachment_table").hide();
        $("#uploaded_attachment_list").html('');
        $.ajax({
            url: _U + 'home/<?php print $urlArgs[0] ?>',
            /*dataType: 'json',*/
            data: {AddaffiliatesPopup: 1},
            success: function(r) {
                $("#affiliates_modal_content").html(r);
                $("#AddAffiliates").modal('show');
                $(function() {
                    $("#accordion").accordion({
                        heightStyle: "content"
                    });
                });
                CallAllFunctionAtRefresh();
            }
        });
    }

    function CallAllFunctionAtRefresh() {
        DatePickerBlock();
        AllFileAttachment();
    }
    function AddAffiliates(edit_id) {


        //Service Area
        var chkServiceArea = [];
        $('#chk_service_area:checked').each(function(i, e) {
            chkServiceArea.push(e.value);
        });
        //Amenity
        $(".chk_other_amenity_type").val($("#otheramenityservice").val());
        var chkAmenityType = [];
        $('#chk_amenity_type:checked').each(function(i, e) {
            chkAmenityType.push(e.value);
        });

        //Servicetype
        $(".chk_other_type").val($("#otherservice").val());
        var selectval = [];
        $('#chk_service_type:checked').each(function(i) {
            selectval[i] = $(this).val();
        });
        if ($("#farmout").val() == '') {
            $("#accordion").accordion({
                collapsible: true,
                active: 0
            });
            $('#fot_helpmsg').hide();
            $("#farmout").css("border", "1px solid red");
            $('#fot_error').show();
        } else if (chkServiceArea == '') {
            $("#accordion").accordion({
                collapsible: true,
                active: 1
            });
            $(".ui-accordion-header.ui-state-active ").css("background", "red");
            // $("#chk_service_area").css("border", "1px solid red");
            $('#servicearea_error').show();
        } else {
            showWait();

            $.ajax({
                url: _U + 'home',
                data: {AddNewaffiliates: 1, city: $("#city").val(),
                    farmout_name: $("#farmout").val(),
                    service_area: chkServiceArea,
                    address: $("#address").val(),
                    contact_name: $("#contact_name").val(),
                    contact_number: $("#contact_number").val(),
                    contact_email: $("#contact_email").val(),
                    notes: $("#notes").val(),
                    preferred_level: $("input[name='preferred_level']:checked").val(),
                    coachbuilder: $("#coachbuilder").val(),
                    date: $("#datepicker").val(),
                    select_type: selectval,
                    Amenity_type: chkAmenityType,
                    attach_file_list: $("#uploaded_attachment_list").html(),
                    expiration_date: $("#txt_expiration_date").val(),
                    edit_id: edit_id
                },
                success: function(r) {
                    if (edit_id > 0) {
                        _success("Affiliates Has Been Updated Successfully");
                    } else {
                        _success("Affiliates Has Been Added Successfully..");
                    }

                    $(".reset").val('');
                    $("#AddAffiliates").modal('hide');
                    $("#uploaded_insurance_copy_file").html('');
                    $("#uploaded_insurance_copy_file").hide();
                    $("#select_insurance_copy_area").show();
                    $("#uploaded_attachment_list").html('');
                    $(".vehicle_photos_nm").remove();
                    $("#uploaded_attachment_table").hide();
                    if (edit_id > 0) {

                        $.ajax({
                            url: _U + 'affiliates_detail',
                            data: {Getafflist: 1, affId: edit_id},
                            success: function(r) {
                                hideWait();
                                $("#affiliatesList").html(r);
                            }
                        });
                    } else {

                        $.ajax({
                            url: _U + 'affiliates',
                            data: {Getafflist: 1, city: $("#city").val()},
                            success: function(r) {
                                hideWait();
                                $("#affiliatesList").html(r);
                                $("#AffiliatesTab").click();
                                getaffCount('<?php print $urlArgs[0]; ?>');
                            }
                        });
                    }

                }
            });
        }
    }
    function DatePickerBlock() {
        $(document).ready(function() {
            /*
             $("#datepicker").datepicker({
             changeMonth: true,
             changeYear: true,
             dateFormat: "mm/dd/yy"
             });
             */
            $("#datepicker").datepicker({
                dateFormat: "mm/dd/yy"
            });
            $("#datepicker_").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "mm/dd/yy"
            });

        });
    }
    function managemsg() {
        $('#fot_helpmsg').show();
        $('#fot_error').hide();
        $('#servicearea_error').hide();
        $("#farmout").css("border", "1px solid #AAA");
        $(".ui-accordion-header.ui-state-active ").css("background", "white");
    }
    function vehicleModal() {
        $("#AddVehicles").modal('show');
    }
    function addVehicle() {
        var vehicle = $("#vehicle").val();
        var vehicle_no = $("#vehicle_no").val();
        var min_rate = $("#min_rate").val();
        var hour_rate = $("#hour_rate").val();
        var affiliateVehicle = $("#affiliateVehicle option:selected").val();

        if (vehicle == '' || affiliateVehicle == '' || vehicle_no == '' ||min_rate == '' || hour_rate == '')
        {
            alert("Plz fill up the field");
            return false;
        } else {
            showWait();

            $.ajax({
                url: _U + 'home',
                data: {addvehicle: 1, affiliateVehicle: affiliateVehicle, vehicle: vehicle, vehicle_no:vehicle_no,min_rate:min_rate,hour_rate:hour_rate},
                success: function(r) {
                    hideWait();
                    $("#AddVehicles").modal('hide');
                }
            });
        }
    }
    function DeleteAttachment(file_id, file_name, type) {
        if (file_name != '' && file_id != '') {
            $.ajax({
                url: _U + 'home',
                data: {delete_attachment_file: 1, file_name: file_name, file_id: file_id},
                type: 'post', success: function(r) {

                    if (r != '') {

                        var attach_list_files = $("#uploaded_attachment_list").html();
                        attach_list_files = attach_list_files.replace(file_name + ",", "");
                        $("#uploaded_attachment_list").html(attach_list_files);
                        if (r > 0) {
                            $(".photodelete" + r).remove();
                            $("#attachment_file_" + r).remove();
                            if (type == 'insurance') {
                                $("#uploaded_insurance_copy_file").html('');
                                $("#uploaded_insurance_copy_file").hide();
                                $("#select_insurance_copy_area").show();
                            }
                        }


                    }
                }
            });
        }
    }
    function AllFileAttachment() {
        /* Start Code Of File Uploading */
        $(document).ready(function() {

            $('#insurance_attachment_1').change(function() {
                if ($.trim($('#insurance_attachment_1').val()) != '') {
                    $("#insurance_attachment_upload").click();
                }
            });
            $('#other_attachment_1').change(function() {

                if ($.trim($('#other_attachment_1').val()) != '') {
                    $("#other_attachment_upload").click();
                }
            });
            $('#vehicle_attachment_1').change(function() {

                if ($.trim($('#vehicle_attachment_1').val()) != '') {
                    $("#vehicle_attachment_upload").click();
                }
            });
            $('#W9_attachment_1').change(function() {
                if ($.trim($('#W9_attachment_1').val()) != '') {
                    $("#W9_attachment_upload").click();
                }
            });
            $('#brilliant_attachment_1').change(function() {
                if ($.trim($('#brilliant_attachment_1').val()) != '') {
                    $("#brilliant_attachment_upload").click();
                }
            });
            /* Start Insurance Attachment Upload */
            $('#insurance_attachment_upload').click(function() {
                $("#insurance_attachment_upload").hide();
                $("#insurance_attachment_progressbar").show();
                var file_data = $('#insurance_attachment_1').prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file_data)
                $.ajax({
                    url: _U + 'affiliates_attachment_upload?type=insurance',
                    async: "false",
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post', success: function(r) {
                        $("#insurance_attachment_progressbar").hide();
                        var attachment_res = r.split("****");
                        if (attachment_res[0] == 'success') {
                            if (attachment_res[1] != '') {
                                var original_file_name = attachment_res[1];
                                var original_file_name_1 = "'" + original_file_name + "'";
                                var attachmaent_type = "'insurance'";
                                var file_name = attachment_res[1].split("___");
                                var insurance_nm_file = '';
                                $("#uploaded_attachment_list").append(original_file_name + ",");
                                var splitted_name = original_file_name.substring(0, 40) + '<br />';
                                insurance_nm_file = '<tr><td><div id="attachment_file_' + attachment_res[2] + '"><div style="float:left;"><span style="color:grey;word-wrap: break-word;">' + splitted_name + '</span></div></td><td style=""><div style="float:right;cursor:pointer;" onclick="DeleteAttachment(' + attachment_res[2] + ',' + original_file_name_1 + ',' + attachmaent_type + ')"><i class="glyphicon glyphicon-trash" title="Delete"></i></div><div style="clear:both;"></div></div>';
                                $("#uploaded_insurance_copy_file").html(insurance_nm_file);
                                $("#uploaded_insurance_copy_file").show();
                                $("#select_insurance_copy_area").hide();
                                $("#insurance_attachment_1").val('');
                                return false;
                            } else {
                                $("#insurance_attachment_upload").show();
                                //_error("Some Problem In Insurance Copy Uploading");
                                return false;
                            }
                        } else {
                            $("#insurance_attachment_upload").show();
                            //_error("Some Problem In Insurance Copy Uploading");
                            return false;
                        }

                    }
                });
            });
            /* End Insurance Attachment Upload */

            /* Start Vehicle Attachment Upload */
            $('#vehicle_attachment_upload').click(function() {

                $("#select_vehicle_photos_area").hide();
                $("#vehicle_attachment_progressbar").show();
                var file_data = $('#vehicle_attachment_1').prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file_data);
                // form_data.append('vehicledata', $('#vehicleupload').val());

                $.ajax({
                    url: _U + 'affiliates_attachment_upload?type=vehicle',
                    async: "false",
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post', success: function(r) {

                        $("#select_vehicle_photos_area").show();
                        $("#vehicle_attachment_progressbar").hide();
                        var attachment_res = r.split("****");
                        if (attachment_res[0] == 'success') {

                            if (attachment_res[1] != '') {
                                var original_file_name = attachment_res[1];
                                var original_file_name_1 = "'" + original_file_name + "'";
                                var attachmaent_type = "'vehicle'";
                                var file_name = attachment_res[1].split("___");
                                var insurance_nm_file = '';
                                $("#uploaded_attachment_list").append(original_file_name + ",");
                                var new_attach = '';
                                new_attach = '<tr><td style="float:right;"><div class="vehicle_photos_nm" id="attachment_file_' + attachment_res[2] + '" style="float: left;margin: 5px;border: 1px dotted #DADADA;padding: 5px;"><a class="label label-success" style="float: left;" href="' + _U + 'affiliates_attachment/' + original_file_name + '" target="_blank">Open Image</a>\n\
                                  <div style="float:right;cursor:pointer;margin-left:10px;" onclick="DeleteAttachment(' + attachment_res[2] + ',' + original_file_name_1 + ',' + attachmaent_type + ')"><i class="glyphicon glyphicon-trash" title="Delete"></i></div><img src="' + _U + 'affiliates_attachment/' + original_file_name + '" style="width:180px;height:130px;padding-top: 20px;"/><div style="clear: both;"></div></div></td></tr>';
                                // new_attach = '<tr class="vehicle_photos_nm" id="attachment_file_' + attachment_res[2] + '"><td ><div style="float:left;"><img src="' + _U + 'affiliates_attachment/' + original_file_name + '" style="width:90px;height:90px;"/></div><div style="float:right;cursor:pointer;" onclick="DeleteAttachment(' + attachment_res[2] + ',' + original_file_name_1 + ',' + attachmaent_type + ')"><i class="glyphicon glyphicon-trash" title="Delete"></i></div><div style="clear:both;"></div></td></tr>';
                                $("#uploaded_attachment_table").append(new_attach);
                                if ($(".vehicle_photos_nm").length > 0) {
                                    $("#uploaded_attachment_table").show();
                                } else {
                                    $("#uploaded_attachment_table").hide();
                                }
                                $("#vehicle_attachment_1").val('');
                                $("#vehicle_attachment_progressbar").hide();
                                return false;
                            } else {
                                //_error("Some Problem In Vehicle Uploading");
                                return false;
                            }
                        } else {
                            //_error("Some Problem In Vehicle Uploading");
                            return false;
                        }

                    }
                });
            });
            /* End Vehicle Attachment Upload */
            /* Start Other Attachment Upload */
            $('#other_attachment_upload').click(function() {

                $("#select_other_document_area").hide();
                $("#other_attachment_progressbar").show();
                var file_data = $('#other_attachment_1').prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file_data);
                $.ajax({
                    url: _U + 'affiliates_attachment_upload?type=Other',
                    async: "false",
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post', success: function(r) {

                        $("#select_other_document_area").show();
                        $("#other_attachment_progressbar").hide();
                        var attachment_res = r.split("****");
                        if (attachment_res[0] == 'success') {

                            if (attachment_res[1] != '') {
                                var original_file_name = attachment_res[1];
                                var original_file_name_1 = "'" + original_file_name + "'";
                                var attachmaent_type = "'vehicle'";
                                var file_name = attachment_res[1].split("___");
                                var insurance_nm_file = '';
                                $("#uploaded_attachment_list").append(original_file_name + ",");
                                var new_attach = '';
                                new_attach = '<tr><td style="float:right;"><div class="other_file_nm" id="attachment_file_' + attachment_res[2] + '" style="float: left;margin: 5px;border: 1px dotted #DADADA;padding: 5px;"><a class="label label-success" style="float: left;" href="' + _U + 'affiliates_attachment/' + original_file_name + '" target="_blank">Open Image</a>\n\
                                  <div style="float:right;cursor:pointer;margin-left:10px;" onclick="DeleteAttachment(' + attachment_res[2] + ',' + original_file_name_1 + ',' + attachmaent_type + ')"><i class="glyphicon glyphicon-trash" title="Delete"></i></div><img src="' + _U + 'affiliates_attachment/' + original_file_name + '" style="width:180px;height:130px;padding-top: 20px;"/><div style="clear: both;"></div></div></td></tr>';

                                $("#uploaded_attachment_table").append(new_attach);
                                if ($(".other_file_nm").length > 0) {
                                    $("#uploaded_attachment_table").show();
                                } else {
                                    $("#uploaded_attachment_table").hide();
                                }
                                $("#other_attachment_1").val('');
                                $("#other_attachment_progressbar").hide();
                                return false;
                            } else {
                                //_error("Some Problem In Vehicle Uploading");
                                return false;
                            }
                        } else {
                            //_error("Some Problem In Vehicle Uploading");
                            return false;
                        }

                    }
                });
            });
            /* End Other Attachment Upload */
            $('#W9_attachment_upload').click(function() {
                $("#select_W9_photos_area").hide();
                $("#W9_attachment_progressbar").show();
                var file_data = $('#W9_attachment_1').prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file_data)
                $.ajax({
                    url: _U + 'affiliates_attachment_upload?type=W9',
                    async: "false",
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post', success: function(r) {
                        $("#select_W9_photos_area").show();
                        $("#W9_attachment_progressbar").hide();
                        var attachment_res = r.split("****");
                        if (attachment_res[0] == 'success') {
                            if (attachment_res[1] != '') {
                                var original_file_name = attachment_res[1];
                                var original_file_name_1 = "'" + original_file_name + "'";
                                var attachmaent_type = "'W9'";
                                var file_name = attachment_res[1].split("___");
                                var insurance_nm_file = '';
                                $("#uploaded_attachment_list").append(original_file_name + ",");
                                var new_attach = '';
                                //new_attach = '<tr class="W9_photos_nm" id="attachment_file_' + attachment_res[2] + '"><td ><div style="float:left;"><img src="' + _U + 'affiliates_attachment/' + original_file_name + '" style="width:90px;height:90px;"/></div><div style="float:right;cursor:pointer;" onclick="DeleteAttachment(' + attachment_res[2] + ',' + original_file_name_1 + ',' + attachmaent_type + ')"><i class="glyphicon glyphicon-trash" title="Delete"></i></div><div style="clear:both;"></div></td></tr>';
                                new_attach = '<tr class="W9_photos_nm" id="attachment_file_' + attachment_res[2] + '"><td style=border:none;><div style="float:left;"><span style="color:grey;">' + original_file_name + '</span></div></td><td style=border:none;><div style="float:right;cursor:pointer;" onclick="DeleteAttachment(' + attachment_res[2] + ',' + original_file_name_1 + ',' + attachmaent_type + ')"><i class="glyphicon glyphicon-trash" title="Delete"></i></div><div style="clear:both;"></div></td></tr>';
                                $("#uploaded_W9_attachment_table").append(new_attach);
                                if ($(".W9_photos_nm").length > 0) {
                                    $("#uploaded_W9_attachment_table").show();
                                } else {
                                    $("#uploaded_W9_attachment_table").hide();
                                }
                                $("#W9_attachment_1").val('');
                                $("#W9_attachment_progressbar").hide();
                                return false;
                            } else {
                                _error("");
                                return false;
                            }
                        } else {
                            //_error("Some Problem In W-9 Form Uploading");
                            return false;
                        }

                    }
                });
            });
            /* End W - 9 Form Attachment Upload*/

            $('#brilliant_attachment_upload').click(function() {
                $("#select_brilliant_photos_area").hide();
                $("#brilliant_attachment_progressbar").show();
                var file_data = $('#brilliant_attachment_1').prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file_data)
                $.ajax({
                    url: _U + 'affiliates_attachment_upload?type=brilliant',
                    async: "false",
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post', success: function(r) {
                        $("#select_brilliant_photos_area").show();
                        $("#brilliant_attachment_progressbar").hide();
                        var attachment_res = r.split("****");
                        if (attachment_res[0] == 'success') {
                            if (attachment_res[1] != '') {
                                var original_file_name = attachment_res[1];
                                var original_file_name_1 = "'" + original_file_name + "'";
                                var attachmaent_type = "'brilliant'";
                                var file_name = attachment_res[1].split("___");
                                var insurance_nm_file = '';
                                $("#uploaded_attachment_list").append(original_file_name + ",");
                                var new_attach = '';
                                new_attach = '<tr class="brilliant_photos_nm" id="attachment_file_' + attachment_res[2] + '"><td style=border:none;><div style="float:left;"><span style="color:grey;">' + original_file_name + '</span></div><div style="clear:both;"></div></td><td style=border:none;><div style="float:right;cursor:pointer;" onclick="DeleteAttachment(' + attachment_res[2] + ',' + original_file_name_1 + ',' + attachmaent_type + ')"><i class="glyphicon glyphicon-trash" title="Delete"></i></div></td></tr>';
                                $("#uploaded_brilliant_attachment_table").append(new_attach);
                                if ($(".brilliant_photos_nm").length > 0) {
                                    $("#uploaded_brilliant_attachment_table").show();
                                } else {
                                    $("#uploaded_brilliant_attachment_table").hide();
                                }
                                $("#brilliant_attachment_1").val('');
                                $("#brilliant_attachment_progressbar").hide();
                                return false;
                            } else {
                                //_error("Some Problem In Brilliant Package Uploading");
                                return false;
                            }
                        } else {
                            //_error("Some Problem In Brilliant Package Uploading");
                            return false;
                        }

                    }
                });
            });
        });
    }
</script>


<?php include "jquery_ui.php"; ?>
<?php include "message.php" ?>