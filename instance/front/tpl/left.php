<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="top-divider"></div>
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style='padding: 12px 0;font-weight: bold;color:#1294d5;' id="header_customer_name">Brilliant Affiliates</a>
        </div>
        <!--drop down-->

        <ul class="nav navbar-nav navbar-right" title="setting">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                    <i class="fa fa-cog" >&nbsp;</i><b class="caret"></b>
                </a>
                <ul class="dropdown-menu">

                    <li><a onclick="cityModal()" ><i class="fa fa-plus"></i> Add City </a></li>
                    <li class="divider"></li>
                     <!--<li><a  onclick="affiliateModal__()" > <i class="fa fa-plus"></i>Add Affiliates</a></li>-->

                    <li><a  onclick="Affiliatesmodal()" > <i class="fa fa-plus"></i>Add Affiliates</a></li>
                    <li class="divider"></li>
                    <li><a  onclick="vehicleModal()" ><i class="fa fa-plus"></i>Add Vehicles</a></li>

                </ul>
            </li>
        </ul>
        <!--end drop down-->
        <!--        <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right" style="color:#1294d5;">                
                        <li><a style="margin-left: -10px" class="pointer" onclick="cityModal()" ><i class="fa fa-plus"></i> Add City </a></li>
                        <li><a style="margin-left: -10px"  class="pointer" onclick="affiliateModal()" > <i class="fa fa-plus"></i>Add Affiliates</a></li>
                        <li><a style="margin-left: -10px"  class="pointer" onclick="vehicleModal()" ><i class="fa fa-plus"></i>Add Vehicles</a></li>-->
                <!--             <li class="<?php print _cg("url") == 'supplements' ? 'active' : ''  ?>"><a href="<?php l('supplements'); ?>">Supplements</a></li>
                            <li class="<?php print _cg("url") == 'shop' ? 'active' : ''  ?>"><a href="<?php l('shop'); ?>">Shop</a></li>
        <?php if (isset($_SESSION['user'])): ?>                
                                                        
            <?php if ($_SESSION['user']['is_admin'] == '1') { ?>
                                                                                <li id="report-menu">
                                                                                    <a href="#">Admin</a>
                                                                                    <ul class="dropdown-menu" style="width: 100%;">
                                                                                        <li><a href="<?php l('users'); ?>">Users</a></li>
                                                                                        <li><a href="<?php l('products'); ?>">Products</a></li>
                                                                                    </ul>
                                                                                </li>                   
            <?php } ?>
                                                        <li><a href="<?php l('login?logout=1'); ?>">Logout</a></li>
        <?php else: ?>
                                                        <li><a href="<?php l('login'); ?>">Login</a></li> -->
        <?php endif; ?>
        <!--                <li id="report-menu">
                            <a href="#">Setting&nbsp;<i class="fa fa-cog">&nbsp;</i></a>
                            <ul class="dropdown-menu" style="width: 100%;">                        
        <?php if (isset($_SESSION['user'])): ?>                
                                                                    <li><a href="<?php l('login?logout=1'); ?>"><i class="visible-xs fa fa-chevron-right" style="width: 10px; float: left; margin-top: 4px;"></i>Logout</a></li>               
        <?php else: ?>
                                                                    <li><a href="<?php l('login'); ?>"><i class="visible-xs fa fa-chevron-right" style="width: 10px; float: left; margin-top: 4px;"></i>Login</a></li>
        <?php endif; ?>
                            </ul>
                        </li>                -->
        </ul>
    </div><!--/.navbar-collapse -->
</div>
</nav>
