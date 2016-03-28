<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title> Brilliant | <?php print _cg("page_title"); ?></title>        
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php print _MEDIA_URL ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php print _MEDIA_URL ?>css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="" >  
            <?php if ($no_visible_elements) : ?>
                <?php include $modulePage; ?>
            <?php else: ?> 
                <?php include_once('left.php'); ?>
                <div class="container" style="margin-top: 66px;">                    
                    <div class="row">                        
                        <div id="div_main_content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content_body" style="">
                            <?php if (!(@include $modulePage)) : ?>
                                <?php include "404.php"; ?>
                            <?php endif; ?>
                        </div>                        
                    </div>
                </div>	
            <?php endif; ?>
        </div>

        <script src="<?php print _MEDIA_URL ?>js/jquery.min.js"></script>
        <script src="<?php print _MEDIA_URL ?>js/jquery.validate.min.js"></script>
        <script src="<?php print _MEDIA_URL ?>js/bootstrap.min.js"></script>

        <?php include "scripts.php"; ?>        

        <?php include $jsInclude; ?>
        <!-- Start Message Block -->
        <?php include "top_message.php"; ?>
        <!-- End Message Block -->
        <script type="text/javascript">
            $(document).ready(function () {
                var h = $(window).height();
                $("#div_main_content").css("min-height", (h - 50) + "px");
                $(window).resize(function e() {
                    var h = $(window).height();
                    $("#div_main_content").css("min-height", (h - 50) + "px");
                });

            });
        </script>

        <?php if ($error): ?>
            <script type="text/javascript">
                $(document).ready(function () {
                    setTimeout(function () {
                        $('#error_msg_div').fadeOut(1200);
                    }, 3500);
                });
            </script>
        <?php endif; ?>

        <?php if ($greetings): ?>
            <script type="text/javascript">
                $(document).ready(function () {
                    setTimeout(function () {
                        $('#success_msg_div').fadeOut(1200);
                    }, 3500);
                });
            </script>
        <?php endif; ?>

        <div id="waitBar">Please wait</div>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="alert alert-error" style="">
                            Are you sure you want to take this action ?
                        </div>
                        </br>
                        <div style="text-align:right;">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary" onclick="genericFun()">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>