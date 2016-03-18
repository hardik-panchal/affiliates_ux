<script>
    $(document).ready(function () {

    });
    function doOpenEditPopup(id) {
        $("#user_id").val(id);
        //showWait();
        $("#btnSubmit").html("Update");
        $("#txtPassword").attr("disabled",true);
        $("#modal-title-text").html("Edit User Detail");
        fillUserDetail(id)
        $("#selectUserPopup").modal("show");
    }
    function doOpenAddPopup() {
        clearFormData();
        //showWait();
        $("#btnSubmit").html("ADD USER");
        $("#txtPassword").attr("disabled",false);
        $("#modal-title-text").html("Add User Detail");
        $("#selectUserPopup").modal("show");
    }
    function clearFormData() {
        $("#user_id").val('');
        $("#txtFirst").val('');
        $("#txtLast").val('');
        $("#txtEmail").val('');
        $("#txtPhone").val('');
        $("#txtPassword").val('');
        $("#txtDesignation").val('');
        $("#txtBillingAddress").val('');
        $("#txtShippingAddress").val('');
    }
    function fillUserDetail(id) {
        $.ajax({
            url: _U + 'users',
            dataType: 'json',
            data: {fillUser: 1, UserId: id},
            success: function (r) {
                $.each(r.data, function (i, val) {
                    $("#txtFirst").val(val.first_name);
                    $("#txtLast").val(val.last_name);
                    $("#txtEmail").val(val.email);
                    $("#txtPhone").val(val.phone);
                    $("#txtPassword").val(val.password);
                    $("#txtDesignation").val(val.designation);
                    $("#txtBillingAddress").val(val.billing_address);
                    $("#txtShippingAddress").val(val.shipping_address);
                });
                //hideWait();
            }
        });
    }
    function fillAllUser() {
        $.ajax({
            url: _U + 'users',
            data: {fillAllUser: 1},
            success: function (r) {
                $("#my-table-body").html(r);
            }
        });
    }
    function doOpenDeletePopup(id){
        $("#DelModal").modal("show");
        $("#del_user").val(id);
    }
    function deleteRecord() {
        $.ajax({
            url: _U + 'users',
            data: {deleteRecord: 1, user_id: $("#del_user").val()},
            success: function (r) {
                _success('Record has been deleted successfully!');
                $("#my-table-body").html(r);
            }
        });
    }
    function SaveUser() {
        if ($("#txtEmail").val().trim() == "" || $("#txtPassword").val().trim() == "") {
            if ($("#txtEmail").val().trim() == "") {
                $("#error_txtEmail").show();
                $("#txtEmail").css("border-color", "red");
            } else {
                $("#error_txtEmail").hide();
                $("#txtEmail").css("border-color", "#ccc");
            }
            if ($("#txtPassword").val().trim() == "") {
                $("#error_txtPassword").show();
                $("#txtPassword").css("border-color", "red");
            } else {
                $("#error_txtPassword").hide();
                $("#txtPassword").css("border-color", "#ccc");
            }
            return false;
        } else {
            $("#error_txtEmail").hide();
            $("#txtEmail").css("border-color", "#ccc");
            $("#error_txtPassword").hide();
            $("#txtPassword").css("border-color", "#ccc");
        }
        $.ajax({
            url: _U + 'users',
            data: {saveUser: 1, user_id: $("#user_id").val(),
                txtFirst: $("#txtFirst").val(),
                txtLast: $("#txtLast").val(),
                txtEmail: $("#txtEmail").val(),
                txtPassword: $("#txtPassword").val(),
                txtPhone: $("#txtPhone").val(),
                txtDesignation: $("#txtDesignation").val(),
                txtBillingAddress: $("#txtBillingAddress").val(),
                txtShippingAddress: $("#txtShippingAddress").val()},
            success: function (r) {
                if (r == "success") {
                    fillAllUser();
                    $("#selectUserPopup").modal("hide");
                    _success('Record has been save successfully!');
                }
            }
        });
    }
</script>
