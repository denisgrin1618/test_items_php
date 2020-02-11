<?php

function merge_arrays($x, $y){
    
    $temp_key = array(); 
    $temp_val = array();
    
     
    get_value_recurtion($temp_key, $x);
    get_value_recurtion($temp_val, $y);
    
   

    $ar = array_combine($temp_key, $temp_val);
    
    
return $ar;
}

function get_value_recurtion(&$ar, $key){
    
    if(is_scalar($key)){
        $ar[] = $key;
    }
    else{
        foreach($key as $k => $v){
            get_value_recurtion($ar, $v);
        }
    }
    
}

?>
