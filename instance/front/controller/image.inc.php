<?php
$no_visible_elements=FALSE;
$urlArgs = _cg("url_vars");

d($urlArgs);
$image=qs("select image from affiliates where id={$urlArgs[0]}");

d($image);


_cg("page_title", "Image");
$jsInclude = "home.js.php";