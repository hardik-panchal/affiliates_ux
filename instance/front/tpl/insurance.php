<div class="modal-content" style="width:140%;" >
    <div class="modal-header" style="background-color: #EAEAEA;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <?php if ($affiliates_edit['carrier'] != ''): ?>
            <b>Edit Insurance Detail</b>
        <?php else: ?>
            <b>Add Insurance Detail</b>
        <?php endif; ?>
    </div>
    <div class="modal-body ">
        <form id="insuranceForm" method="post" action="" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id; ?>" name="field[id]">
            <div style="margin-top:7px;" class="col-lg-12">
                <div class="col-lg-12">
                    <span style="color:#AAA;font-size: 13px;">Name of Carrier</span>
                    <input type="text" placeholder="Enter Carrier Name" value="<?php echo $affiliates_edit['carrier']; ?>" class="form-control" name="field[carrier]">
                </div>
            </div>
            <div style="margin-top:7px;" class="col-lg-12">
                <div class="col-lg-12">
                    <span style="color:#AAA;font-size: 13px;">Policy #</span>
                    <input type="text" placeholder="Enter Policy#" value="<?php echo $affiliates_edit['policy']; ?>" class="form-control" name="field[policy]">
                </div>
            </div>
            <div style="margin-top:7px;" class="col-lg-12">
                <div class="col-lg-12">
                    <span style="color:#AAA;font-size: 13px;">Document</span>
                    <input type="file" name="image" />
                </div>
            </div>

        </form>
    </div>
    <div class="modal-footer" style="background-color: #EAEAEA;height:55px;">
        <div style="margin-top:-3px;">

            <?php if ($affiliates_edit['carrier'] != '') { ?>
                <button type="button" class="btn btn-success" onclick="insuranceDetail('<?php print $id; ?>');">Update</button>
            <?php } else { ?>
                <button type="button" class="btn btn-success" onclick="insuranceDetail('0');">Add</button>
            <?php } ?>

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>