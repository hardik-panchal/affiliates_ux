
<script>
    $(document).ready(function () {
        
        $("#btnImageUpload").click(function e() {
            $("#txtFile").click();
        });
    });
    function fileSelect() {
        $("#fileImageName").html($("#txtFile").val());
    }
    function doOpenEditPopup(id) {
        $("#product_id").val(id);
        //showWait();
        $("#btnSubmit").html("Update");
        $("#txtProductCode").attr("disabled", true);
        $("#modal-title-text").html("Edit Product Detail");
        fillProductDetail(id)
        $("#selectProductPopup").modal("show");
    }
    function doOpenAddPopup() {
        clearFormData();
        //showWait();
        $("#btnSubmit").html("ADD PRODUCT");
        $("#txtProductCode").attr("disabled", false);
        $("#modal-title-text").html("Add Product Detail");
        $("#selectProductPopup").modal("show");
    }
    function clearFormData() {
        $("#product_id").val('');
        $("#txtProductName").val('');
        $("#txtProductCode").val('');
        $("#txtPrice").val('');
        $("#txtColor").val('');
        $("#txtDecription").val('');
    }
    function fillProductDetail(id) {
        $.ajax({
            url: _U + 'products',
            dataType: 'json',
            data: {fillProduct: 1, ProductId: id},
            success: function (r) {
                $.each(r.data, function (i, val) {
                    $("#txtProductName").val(val.product_name);
                    $("#txtProductCode").val(val.product_code);
                    $("#txtDecription").val(val.description);
                    $("#txtColor").val(val.color);
                    $("#txtPrice").val(val.price);
                    $("#fileImageName").html(val.image);
                });
                //hideWait();
            }
        });
    }
    function fillAllProduct() {
        $.ajax({
            url: _U + 'products',
            data: {fillAllProduct: 1},
            success: function (r) {
                $("#my-table-body").html(r);
            }
        });
    }
    function doOpenDeletePopup(id) {
        $("#DelModal").modal("show");
        $("#del_product").val(id);
    }
    function deleteRecord() {
        $.ajax({
            url: _U + 'products',
            data: {deleteRecord: 1, product_id: $("#del_product").val()},
            success: function (r) {
                _success('Record has been deleted successfully!');
                $("#my-table-body").html(r);
            }
        });
    }
    function SaveProduct() {
        if ($("#txtProductName").val().trim() == "" || $("#txtProductCode").val().trim() == "" || $("#txtPrice").val().trim() == "" || isNaN($("#txtPrice").val())) {
            if ($("#txtProductName").val().trim() == "") {
                $("#error_txtProductName").show();
                $("#txtProductName").css("border-color", "red");
            } else {
                $("#error_txtProductName").hide();
                $("#txtProductName").css("border-color", "#ccc");
            }
            if ($("#txtProductCode").val().trim() == "") {
                $("#error_txtProductCode").show();
                $("#txtProductCode").css("border-color", "red");
            } else {
                $("#error_txtProductCode").hide();
                $("#txtProductCode").css("border-color", "#ccc");
            }
            if ($("#txtPrice").val().trim() == "") {
                $("#error_txtPrice").html("Please enter product price");
                $("#error_txtPrice").show();
                $("#txtPrice").css("border-color", "red");
            } else if (isNaN($("#txtPrice").val())) {
                $("#error_txtPrice").html("Please enter valid product price");
                $("#error_txtPrice").show();
                $("#txtPrice").css("border-color", "red");
            } else {
                $("#error_txtPrice").hide();
                $("#txtPrice").css("border-color", "#ccc");
            }
            return false;
        } else {
            $("#error_txtProductName").hide();
            $("#txtProductName").css("border-color", "#ccc");
            $("#error_txtProductCode").hide();
            $("#txtProductCode").css("border-color", "#ccc");
            $("#error_txtPrice").hide();
            $("#txtPrice").css("border-color", "#ccc");
            return true;
        }
        
        /*
        $.ajax({
            url: _U + 'products',
            data: {saveProduct: 1, product_id: $("#product_id").val(),
                txtProductName: $("#txtProductName").val(),
                txtProductCode: $("#txtProductCode").val(),
                txtPrice: $("#txtPrice").val(),
                txtColor: $("#txtColor").val(),
                txtDecription: $("#txtDecription").val()
            },
            success: function (r) {
                if (r == "success") {
                    fillAllProduct();
                    $("#selectProductPopup").modal("hide");
                    _success('Record has been save successfully!');
                } else if (r == "duplicate") {
                    _error('Product Code already exists!');
                } else {
                    _error('Product can not be added! Please try again!');
                }
            }
        });
        */
    }
    function viewImage(id){
        $("#div_view_image_"+id).attr("onclick","hideImage('"+id+"')");
        if($("#div_image_"+id+" img").attr("src")==""){
            $("#div_image_"+id+" img").attr("src","<?php print _MEDIA_URL."img/product/"; ?>"+$("#hid_image_"+id).val())
        }
        $("#span_view_image_"+id).html("Hide Image");
        $("#div_image_"+id).slideDown();
    }
    function hideImage(id){
        $("#div_view_image_"+id).attr("onclick","viewImage('"+id+"')");        
        $("#div_image_"+id).slideUp();
        $("#span_view_image_"+id).html("View Image");
    }
</script>
