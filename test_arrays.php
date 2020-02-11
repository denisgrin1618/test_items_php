<?php

require('./functions/array_functions.php');

$array1 = array(array(77, 87), array(23, 45));
$array2 = array("w3resource", "com");


$ar = merge_arrays($array1, $array2);


        
        
echo "<br/>";        
echo var_dump($ar);

?>

