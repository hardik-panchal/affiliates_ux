
<div class="MyPageHeader">
    Products Management
</div>

<div style="padding:10px;">    
    <div class="page_body">
        <div style="text-align:right;"><button type="button" class='btn btn-success' onclick="doOpenAddPopup();"><i class="fa fa-plus"></i>&nbsp;Add Product</button></div>
        <div class="panel-body" style="padding-left:0px;padding-right:0px;">   
            <table class="table my-table" border='0' style="width:100%;" id="tblAgents">
                <tr>
                    <th style="">Product Name</th>
                    <th style="">Product Code</th>
                    <th style="">Description</th>
                    <th style="display: none;">Color</th>
                    <th style="">Price</th>                    
                    <th style="width: 270px;">Action</th>
                </tr>
                <tbody id='my-table-body'>
                    <?php
                    include _PATH . 'instance/front/tpl/products_data.php';
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="selectProductPopup" >
        <div class="modal-dialog" style="width:70%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 id='modal-title-text' class="modal-title">Edit Product Detail</h4>

                </div>
                <form action="<?= l('products'); ?>" method="POST"  enctype="multipart/form-data" >
                    <div class="modal-body" style="height:350px;overflow: auto;" >
                        <div id="row">
                            <div class="col-lg-2" style='text-align: right;'>
                                <label class="form-label">Product Name : </label>&nbsp;<span class="req_field">*</span>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="txtProductName" name="txtProductName" />
                                <label id='error_txtProductName' style='display: none;color:red;font-weight: normal;'>Please enter product name.</label>
                            </div>
                            <div class="col-lg-2" style='text-align: right;'>
                                <label class="form-label">Product Code : </label>&nbsp;<span class="req_field">*</span>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="txtProductCode" name="txtProductCode" />
                                <label id='error_txtProductCode' style='display: none;color:red;font-weight: normal;'>Please enter product code.</label>
                            </div>
                            <div style="clear: both;height: 12px;"></div>
                            <div class="col-lg-2" style='text-align: right;'>
                                <label class="form-label">Price : </label>&nbsp;<span class="req_field">*</span>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="txtPrice" name="txtPrice" />
                                <label id='error_txtPrice' style='display: none;color:red;font-weight: normal;'>Please enter product price.</label>
                            </div>
                            <div class="col-lg-2" style='text-align: right;display: none;'>
                                <label class="form-label">Color : </label>
                            </div>
                            <div class="col-lg-4" style="display: none;">
                                <input type="text" class="form-control" id="txtColor" name="txtColor" />
                            </div>
                            <div class="col-lg-2" style='text-align: right;'>
                                <label class="form-label">Product Image : </label>
                            </div>
                            <div class="col-lg-4" style='position: relative;'>
                                <button type="button" id='btnImageUpload' name='btnImageUpload' class="btn btn-success my-btn-success" style=''>File Upload</button>
                                <div id='fileImageName'></div>
                                <input type="file" name="txtFile" id="txtFile" class="" style='display: none;' onchange="fileSelect()" >
                            </div>                        
                            <div style="clear: both;height: 12px;"></div>                        
                            <div class="col-lg-2" style='text-align: right;'>
                                <label class="form-label">Description : </label>
                            </div>
                            <div class="col-lg-4">
                                <textarea class="form-control" id="txtDecription" name="txtDecription" cols="20" rows="4"></textarea>
                            </div>                        
                            <div style="clear: both;height: 12px;"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="product_id" id="product_id" value="" />
                        <input type="hidden" name="saveProduct" id="saveProduct" value="1" />
                        <button id='btnSubmit' type="submit" class="btn btn-success my-btn-success" onclick="javascript:return SaveProduct();" >Update</button>                    
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="DelModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-body">
                    <div id="wait_del" style="display: none">Please wait while we delete product <i class='fa fa-refresh fa-spinner'></i></div>

                    <div class="alert alert-error" style="">
                        You really like to delete this product?
                    </div>
                    </br>
                    <div style="text-align:right;">
                        <input type="hidden" name="del_product" id="del_product" value="" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="deleteRecord()">Yes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>