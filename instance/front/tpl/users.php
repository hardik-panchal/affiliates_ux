<div class="MyPageHeader">
    Users Management
</div>

<div style="padding:10px;">    
    <div class="page_body">
        <div style="text-align:right;"><button type="button" class='btn btn-success' onclick="doOpenAddPopup();"><i class="fa fa-plus"></i>&nbsp;Add User</button></div>
        <div class="panel-body" style="padding-left:0px;padding-right:0px;">   
            <table class="table my-table" border='0' style="width:100%;" id="tblAgents">
                <tr>
                    <th style="width: 20%;">User Name</th>
                    <th style="width: 20%;">Email</th>
                    <th style="width: 20%;">Phone</th>
                    <th style="width: 20%;">Designation</th>
                    <th style="width: 20%;">Action</th>
                </tr>
                <tbody id='my-table-body'>
                    <?php  
                    include _PATH.'instance/front/tpl/users_data.php';
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="selectUserPopup" >
        <div class="modal-dialog" style="width:70%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 id='modal-title-text' class="modal-title">Edit User Detail</h4>

                </div>
                <div class="modal-body" style="height:350px;overflow: auto;" >
                    <div id="row">
                        <div class="col-lg-2" style='text-align: right;'>
                            <label class="form-label">First Name</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="txtFirst" name="txtFirst" />
                        </div>
                        <div class="col-lg-2" style='text-align: right;'>
                            <label class="form-label">Last Name</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="txtLast" name="txtLast" />
                        </div>
                        <div style="clear: both;height: 12px;"></div>
                        <div class="col-lg-2" style='text-align: right;'>
                            <label class="form-label">Email</label>&nbsp;<span class="req_field">*</span>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="txtEmail" name="txtEmail" />
                            <label id='error_txtEmail' style='display: none;color:red;font-weight: normal;'>Please enter email address.</label>
                        </div>
                        <div class="col-lg-2" style='text-align: right;'>
                            <label class="form-label">Password</label>&nbsp;<span class="req_field">*</span>
                        </div>
                        <div class="col-lg-4">
                            <input type="password" class="form-control" id="txtPassword" name="txtPassword" />
                            <label id='error_txtPassword' style='display: none;color:red;font-weight: normal;'>Please enter password.</label>
                        </div>
                        <div style="clear: both;height: 12px;"></div>
                        <div class="col-lg-2" style='text-align: right;'>
                            <label class="form-label">Phone</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="txtPhone" name="txtPhone" />
                        </div>
                        <div class="col-lg-2" style='text-align: right;'>
                            <label class="form-label">Designation</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="txtDesignation" name="txtDesignation" />
                        </div>
                        <div style="clear: both;height: 12px;"></div>
                        <div class="col-lg-2" style='text-align: right;'>
                            <label class="form-label">Billing Address</label>
                        </div>
                        <div class="col-lg-4">
                            <textarea class="form-control" id="txtBillingAddress" name="txtBillingAddress" cols="20" rows="2"></textarea>
                        </div>
                        <div class="col-lg-2" style='text-align: right;'>
                            <label class="form-label">Shipping Address</label>
                        </div>
                        <div class="col-lg-4">
                            <textarea class="form-control" id="txtShippingAddress" name="txtShippingAddress"  rows="2"></textarea>
                        </div>
                        <div style="clear: both;height: 12px;"></div>
<!--                        <div class="col-lg-2" style='text-align: right;'>
                            <label class="form-label">Billing City</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="txtBillingCity" name="txtBillingCity" />
                        </div>
                        <div class="col-lg-2" style='text-align: right;'>
                            <label class="form-label">Shipping City</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="txtShippingCity" name="txtShippingCity" />
                        </div>
                        <div style="clear: both;height: 12px;"></div>
                        <div class="col-lg-2" style='text-align: right;'>
                            <label class="form-label">Billing Zip</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="txtBillingZip" name="txtBillingZip" />
                        </div>
                        <div class="col-lg-2" style='text-align: right;'>
                            <label class="form-label">Shipping Zip</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="txtShippingZip" name="txtShippingZip" />
                        </div>
                        <div style="clear: both;height: 12px;"></div>-->
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="user_id" id="user_id" value="" />
                    <button id='btnSubmit' type="button" class="btn btn-success my-btn-success" onclick="SaveUser()" >Update</button>                    
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="DelModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-body">
                    <div id="wait_del" style="display: none">Please wait while we delete user <i class='fa fa-refresh fa-spinner'></i></div>

                    <div class="alert alert-error" style="">
                        You really like to delete this user?
                    </div>
                    </br>
                    <div style="text-align:right;">
                        <input type="hidden" name="del_user" id="del_user" value="" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="deleteRecord()">Yes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>