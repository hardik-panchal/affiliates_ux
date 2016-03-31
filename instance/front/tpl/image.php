<div class="row">
    <div class=" form-group" style="padding: 2%;text-align: center;border-radius: 0px;background-color: #65A9E7;font-weight: bold;color: white; " >
        <span id="btnUpload" style="cursor: pointer;">Upload Vehicle Image</span>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.parent.$('#vehicalImage').modal('hide');">&times;</button>
    </div>
</div>
<div class="row">
    <div class="form-group" style="padding: 2%;text-align: center;border-radius: 0px;background-color: #65A9E7;font-weight: bold;cursor: pointer;color: white;display: none; " id="btnDeleteUpload">
        Cancel Uploading Vehicle Image
    </div>
</div>
<div id="fillData" style="display: none;">
    <form action='<?php echo _U . "image/" . $urlArgs[0]; ?>' method="post" enctype="multipart/form-data">

        <div style="margin: 10px;">
            <div style="float: left;">Select Vehicle : </div>
            <div style="float: left;">
                <select name="vehicle" class="form-control">
                    <?php foreach ($vehicle as $value) { ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['vehicle']; ?></option>
                    <?php } ?>
                </select>
            </div> 
        </div>
        <div style="clear: both;">
        <div style="margin: 10px;">
            <div style="float: left;">Select Image : </div>
            <input type="file" name="image" size="25" class="form-group btn " style="float: left;border-radius: 0px; "/>
        </div>
            <div style="clear: both;">
        <div style="margin: 10px;"> 
            <input type="submit" name="submit" value="Upload" class="form-group btn" style="font-weight: bold;border-radius: 0px;"/>
        </div> 
        <div style="clear: both;"></div>
        <input type="hidden" name="id" value="<?php echo $urlArgs[0] ?>">
    </form>
</div>


<div class="container imageGallry">
    <div class="row">
        <h3>Vehicle Images</h3>
        <p>
            <?php
            $imageData = explode(",", $image["image"]);
            foreach ($imageData as $value) {
                ?>
                <a class="fancybox-thumbs xxx"  data-fancybox-group="thumb" href="<?php echo _MEDIA_URL . "uploads/" . $value ?>">
                    <img src="<?php echo _MEDIA_URL . "uploads/" . $value ?>" alt="" style="width: 45%;margin: 10px;float: left;"/>
                </a>
            <?php } ?>
        </p>

    </div> <!-- row / end -->
</div> <!-- container / end -->
<script type="text/javascript">
    $(document).ready(function () {
        $("#btnUpload").click(function () {
            $(".imageGallry").hide();
            $("#fillData").show();
            $("#btnDeleteUpload").show();
            $("#btnUpload").parent().hide();
        });
        $("#btnDeleteUpload").click(function () {
            $(".imageGallry").show();
            $("#fillData").hide();
            $("#btnDeleteUpload").hide();
            $("#btnUpload").parent().show();
        });
        $('.fancybox').fancybox();
        ;
        /*
         *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
         */

        $('.fancybox-thumbs').fancybox({
            prevEffect: 'none',
            nextEffect: 'none',
            closeBtn: true,
            arrows: false,
            nextClick: true,
            helpers: {
                thumbs: {
                    width: 50,
                    height: 50
                }
            }
        }).trigger("click");
    });
</script>
<style type="text/css">
    .fancybox-custom .fancybox-skin {
        box-shadow: 0 0 50px #222;
    }

    body {
        max-width: 700px;
        margin: 0 auto;
    }
</style>