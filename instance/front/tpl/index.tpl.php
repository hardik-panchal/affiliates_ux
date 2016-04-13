<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title> Brilliant | <?php print _cg("page_title"); ?></title>        
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php print _MEDIA_URL ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php print _MEDIA_URL ?>css/style.css" rel="stylesheet" type="text/css" />

<link href='https://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
        <script src="<?php print _MEDIA_URL ?>js/jquery.min.js"></script>
    </head>
    <body>
        <div class="" >  
            <?php
            if ($no_visible_elements) :
                if ($modulePage == 'login.php' || $modulePage == 'output.php' ) {
                    if (!(@include $modulePage)) :
                        include "404.php";
                    endif;
                }else {
                    ?>
                    <div class="container" style="margin-top: 10px;">                    
                        <div class="row">                        
                            <div id="div_main_content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content_body" style="">
                                <?php
                                if (!(@include $modulePage)) :
                                    include "404.php";
                                endif;
                                ?>
                            </div>                        
                        </div>
                    </div>	
                <?php } else: include_once('left.php'); ?>
                <div class="container" style="margin-top: 66px;">                    
                    <div class="row">                        
                        <div id="div_main_content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content_body" style="">
                            <?php
                            if (!(@include $modulePage)) : 
                                include "404.php";
                            endif;
                            ?>
                        </div>                        
                    </div>
                </div>	
            <?php endif; ?>
        </div>


        <!-- Add jQuery library -->
        <script type="text/javascript" src="<?php echo _MEDIA_URL; ?>lib/jquery-1.10.2.min.js"></script>

        <!-- Add mousewheel plugin (this is optional) -->
        <script type="text/javascript" src="<?php echo _MEDIA_URL; ?>lib/jquery.mousewheel.pack.js?v=3.1.3"></script>

        <!-- Add fancyBox main JS and CSS files -->
        <script type="text/javascript" src="<?php echo _MEDIA_URL; ?>source/jquery.fancybox.pack.js?v=2.1.5"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo _MEDIA_URL; ?>source/jquery.fancybox.css?v=2.1.5" media="screen" />

        <!-- Add Button helper (this is optional) -->
        <link rel="stylesheet" type="text/css" href="<?php echo _MEDIA_URL; ?>source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
        <script type="text/javascript" src="<?php echo _MEDIA_URL; ?>source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

        <!-- Add Thumbnail helper (this is optional) -->
        <link rel="stylesheet" type="text/css" href="<?php echo _MEDIA_URL; ?>source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
        <script type="text/javascript" src="<?php echo _MEDIA_URL; ?>source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

        <!-- Add Media helper (this is optional) -->
        <script type="text/javascript" src="<?php echo _MEDIA_URL; ?>source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>


        <script src="<?php print _MEDIA_URL ?>js/jquery.validate.min.js"></script>
        <script src="<?php print _MEDIA_URL ?>js/bootstrap.min.js"></script>
        <script src="<?php print _MEDIA_URL ?>js/mask.min.js"></script>

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