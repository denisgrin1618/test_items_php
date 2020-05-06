<?php

    $data           = isset($_POST['data']) ? $_POST['data'] : "";
    $array_data     = explode(" ", $data);
    $str_max_length = 6;
    
    $formated_string = "";
    foreach ($array_data as $str) {
        $peace = (strlen($str) > $str_max_length) ? (substr($str,0,$str_max_length)."*") : $str;     
        $formated_string = $formated_string." ".$peace; 
    }

    echo $formated_string;
       
?>
