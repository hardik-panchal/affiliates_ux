<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php print _U?>"  id="header_customer_name">Brilliant Affiliates System</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <!--drop down-->
            <ul class="nav navbar-nav navbar-right" title="setting">
                <li><a style="color:white;" href="javascript:;"  onclick="editAffiliatesmodal('0')" > <i class="fa fa-plus">&nbsp;</i>Add Affiliate</a></li>
                <li><a style="color:white;"  href="<?php l('login?logout=1'); ?>"><i class="fa fa-sign-out">&nbsp;</i>Logout</a></li>
            </ul>
        </div>
    </div><!--/.navbar-collapse -->
</nav>
