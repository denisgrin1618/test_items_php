<?php

function find($arr, $val){
    foreach ($arr as $ar2){ 
        if($ar2 == $val){
            return true;
        }
    }
    
    return false;   
}


$array  = array(1,1,1,2,2,2,2,3);
$array2 = [];

foreach ($array as $ar){ 
      
    if(!find($array2, $ar)){
        $array2[] = $ar;
        echo "{$ar}\n";
    }
}


echo "<br>";
echo "array2";
var_dump($array2); 

//phpinfo();
?>



