<?php
$data = array(1,2,3,4);
var_dump($data['0']);
array_walk($data,  'castString');
var_dump($data['0']);
d($data);