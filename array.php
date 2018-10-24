<?php
$a = array();

$a = array('a'=>1,'b'=>2,'p'=>array('c'=>3,'d'=>4));
$h = array('e'=>5,'f'=>6);
array_merge($a, $h);
print_r($a);

$json = json_encode($a);
print_r($json);
?>
