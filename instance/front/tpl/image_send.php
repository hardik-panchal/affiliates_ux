<div class="row">
    <div class=" form-group" style="padding: 2%;border-radius: 0px;background-color: #65A9E7;font-weight: bold;color: white; position: fixed;
         top: 0;
         width: 100%;" >
        <span style="font-size: 16px;">Send Vehicle Images To Customer</span>
        <span class="btn btn-success pull-right"  onclick="window.parent.$('#vehicalImageSend').modal('hide');" >Cancel</span>
        <span class="btn btn-success pull-right" id="sendMail" style="margin-right: 10px;">Send Mail</span>


    </div>
</div>
<div class="row" style="margin-top: 60px;">
    <div style="padding: 10px;">
        <div style="width: 100%;font-weight: bold;font-size: 12px;">To: </div>
        <div style="width: 100%;"><input type="text" id="email" class="form-control" value=""></div>
        <div class="clearfix"></div>
    </div>
    <div style="padding: 10px;">
        <div style="width: 100%;font-weight: bold;font-size: 12px;">Subject: </div>
        <div style="width: 100%;"><input type="text" id="sub" class="form-control" value=""></div>
        <div class="clearfix"></div>
    </div>
    <div style="padding: 10px;">
        <div style="width: 100%;font-weight: bold;font-size: 12px;">Body: </div>
        <div style="width: 100%;"><div contenteditable="true" style="background-color: #fff;
                                       background-image: none;
                                       border: 1px solid #ccc;
                                       border-radius: 4px;
                                       box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
                                       color: #555;
                                       display: block;
                                       font-size: 14px;
                                       height: auto;
                                       line-height: 1.42857;
                                       padding: 6px 12px;
                                       transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
                                       width: 100%;" id="emailBody">
                Hello sir,
                <br/>
                <br/>
                Here i attached vehicle images.
                <br/>
                <br/>
                Thanks,<br/>
                Melissa </textarea></div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <div style="padding: 10px;margin-top: 15px;">
            <div style="width: 16%;float: left;font-weight: bold;font-size: 12px;">Attachment : </div>
            <div style="width: 84%;float: left;">
                <?php
                foreach ($vehicle as $value) {
                    echo "<div >";
                    echo '<span style="font-weight: bold;font-size: 12px;">' . $value['vehicle'] . "</span>";
                    $f = 1;
                    foreach ($image as $key) {
                        if ($value['id'] == $key['vehicle_id']) {
                            $f = 0;
                        }
                    }
                    if ($f != 1) {
                        ?>
                        <span>  <input type="checkbox" name="vehicle" value="<?php echo $value['id']; ?>"/></span><br/>
                    <?php
                    } else {
                        echo '<br>';
                    }
                    $f = 1;
                    foreach ($image as $key) {
                        if ($value['id'] == $key['vehicle_id']) {

                            $f = 0;
                            ?>
                            <a  href="<?php echo _U . "instance/front/media/uploads/" . $value['file_name'] ?>" target="_blank">
                                <img src="<?php echo _U . "instance/front/media/uploads/" . $key['file_name'] ?>" alt="" style="width: 20%;height:20%;margin: 10px;"/>
                            </a>
                            <?php
                        }
                    }
                    if ($f == 1) {
                        echo "Not any Image";
                    }
                    echo "<br/>";
                    echo "</div><hr style='margin:10px 0;'>";
                }
                ?>

            </div>
            <div class="clearfix"></div>
        </div>


    </div>

    <div style="display: none;" id="affiliate"><?php echo $id; ?></div>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#vehicle").change(function () {
                console.log($(this).val());

                $.ajax({
                    url: _U + 'image_send/' + $("#affiliate").html(),
                    data: {imageContent: 1, id: $(this).val()},
                    success: function (r) {
                        $(".imageGallry").html(r);
                    }
                });
            });
            $("#sendMail").click(function () {
                //console.log($('input[name="vehicle"]:checked').serialize());
                //or
                var vehicle = '';
                $('input[name="vehicle"]:checked').each(function () {
                    vehicle = vehicle + this.value + ",";
                });
                $.ajax({
                    url: _U + 'image_send/' + $("#affiliate").html(),
                    data: {sendMail: 1, sub: $("#sub").val(), vehicle: vehicle, email: $("#email").val(), content: $("#emailBody").html()},
                    success: function (r) {
                        _success("Mail Send SuccessFully");
                        window.parent.$('#vehicalImageSend').modal('hide');
                    }
                });
            });
        });
    </script>
