<!DOCTYPE html>
<html class="js flexbox canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths js-menubar" style="" lang="en"><head>

        <title> Brilliant</title>

       
        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php print _MEDIA_URL ?>loginDesign/bootstrap.css">
        <link rel="stylesheet" href="<?php print _MEDIA_URL ?>loginDesign/bootstrap-extend.css">
        <link rel="stylesheet" href="<?php print _MEDIA_URL ?>loginDesign/site.css">

        <!-- Plugins -->

        <!-- Fonts -->
        <link rel="stylesheet" href="<?php print _MEDIA_URL ?>loginDesign/web-icons.css">
        <link rel="stylesheet" href="<?php print _MEDIA_URL ?>loginDesign/brand-icons.css">
        <link rel="stylesheet" href="<?php print _MEDIA_URL ?>loginDesign/css_002.css">
        <link href="<?php print _MEDIA_URL ?>loginDesign/css.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php print _MEDIA_URL ?>loginDesign/font-awesome.css">

        <script>
           
        </script><link rel="stylesheet" href="<?php print _MEDIA_URL ?>loginDesign/formValidation.css">   
        <link rel="stylesheet" href="<?php print _MEDIA_URL ?>loginDesign/login-v3.css">    
    


    </head>

    <body class="page-login-v3 layout-full">

        <!-- Page -->
        <div style="animation-duration: 0.8s; opacity: 1;" class="page animsition vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
            <div class="page-content vertical-align-middle">
                <div class="panel">
                    <div class="panel-body">
                        <?php
                        if ($login_error != '') {
                            $set_brilliant_cookie = 0;
                            ?>
                            <div class="" style="padding:5px;color:red;">
                                <div style="float:left;"><img src="<?php print _MEDIA_URL ?>img/login-erroe.png" width="28" height="26" alt=" " /></div>
                                <div style="float:left;">Email and password are invalid</div>
                                <div style="clear:both;"></div>
                            </div>
                        <?php } ?>
                        <div class="brand">
                            <div style="font-family: verdana; font-size: 30px; color: #70A3D2;">Brilliant </div>
                            <div style="font-family: verdana; font-size: 14px; color: #70A3D2;">Affiliates Login</div>
                            
                        </div>


                        <form class="fv-form fv-form-bootstrap" method="POST" action="<?php print $login_action_url;?>" id="loginform" autocomplete="on">

                            <div class="form-group form-material floating">
                                <input data-fv-field="email" class="form-control" autofocus="autofocus" name="email">
                                <label class="floating-label">Username / Email</label>
                                <small data-fv-result="NOT_VALIDATED" data-fv-for="email" data-fv-validator="notEmpty" class="help-block" style="display: none;">The username is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="email" data-fv-validator="emailAddress" class="help-block" style="display: none;">The email address is not valid</small></div>

                            <div class="form-group form-material floating">
                                <input data-fv-field="password" class="form-control"  name="password" value="" type="password">
                                <label class="floating-label">Password</label>
                                <small data-fv-result="NOT_VALIDATED" data-fv-for="password" data-fv-validator="notEmpty" class="help-block" style="display: none;">The password is required</small></div>

                            <div class="form-group clearfix">
                                 <div class=" checkbox-inline pull-left">
                                    <input name="remember" value="1" id="checkbox" type="checkbox" onchange="checkremember()">
                                    <label for="inputCheckbox">Remember me</label>
                                </div>

                            </div>

                            <input type="submit" name="submit" value="Sign in" class="btn btn-primary btn-block btn-lg margin-top-40"/>
                        </form>

                    </div>
                </div>

                <div class="page-copyright page-copyright-inverse">
                    <p>© <?php print date('Y');?>. All RIGHT RESERVED Brilliant</p>

                </div>
            </div>
        </div>
        <!-- End Page -->
    </body>
</html>
 <script src="<?php print _MEDIA_URL ?>loginDesign/formValidation.js"></script>


