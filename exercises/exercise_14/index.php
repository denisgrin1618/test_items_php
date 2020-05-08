<?php

//var_dump($_SERVER);

function is_acces_granted($ip){
    
    $f          = file_get_contents('india.txt');
    $filters    = explode(" ", $f);
    
    foreach ($filters as $filter) {
       
        $filters_parts    = explode(" ", $filter);
        $part_1 = substr($filters_parts[0], 0, strpos($filters_parts[0], ".0/") );
        $count  = substr($filters_parts[0], strpos($filters_parts[0], "/")+1 );
        
        for ($index = 1; $index < $count; $index++) {
            $ipa = $part_1.".".$index;
            if($ipa == $ip){
                return true;
            }
        }

        return false;        
    }
 
        
}

$ip = $_SERVER['REMOTE_ADDR'];
if(is_acces_granted($ip)){
    echo "acces granted";
}else{
    echo "error";
}
?>



