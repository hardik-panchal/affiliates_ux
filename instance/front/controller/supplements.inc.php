<?php

/**
 * Default Placeholder file
 * @version 1.0
 * @package BiOptimizers - FoxyCart
 * 
 */
_cg("page_title", "Home");
$products = q("select * from products where is_active='1'");
//print "FoxyCart Webhook";

?>