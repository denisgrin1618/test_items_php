<?php

    $order_id       = $_POST['order_id'];
    $order_age      = $_POST['order_age'];
    $order_gender   = $_POST['order_gender'];
    $order_login    = $_POST['order_login'];
    
 
    $array = array(
        'a1' => array('id' => '1', 'age' => '16', 'gender' => 'm', 'login' => 'Вася'),
        'a2' => array('id' => '2', 'age' => '18', 'gender' => 'm', 'login' => 'Петя'),
        'a3' => array('id' => '3', 'age' => '20', 'gender' => 'g', 'login' => 'Катя'),
        'a4' => array('id' => '4', 'age' => '20', 'gender' => 'm', 'login' => 'Стас'),
        'a5' => array('id' => '5', 'age' => '12', 'gender' => 'g', 'login' => 'Маша'),
        'a6' => array('id' => '6', 'age' => '44', 'gender' => 'g', 'login' => 'Галя'),
        'a7' => array('id' => '7', 'age' => '45', 'gender' => 'm', 'login' => 'Макс'),
        'a8' => array('id' => '8', 'age' => '20', 'gender' => 'm', 'login' => 'Илья'),
        'a9' => array('id' => '9', 'age' => '20', 'gender' => 'g', 'login' => 'Даша'),
    );
    
    
    
    //сортировый список id
    $array_id = array();
    foreach ($array as $key => $value) {
        $array_id[]= $value['id'];
    }
    $array_id = array_unique($array_id);
    
    if($order_id == 'ASC'){
        sort($array_id);
    }else{
        arsort($array_id);
    }
    
    
    //сортировый список age
    $array_age = array();
    foreach ($array as $key => $value) {
        $array_age[]= $value['age'];
    }
    $array_age = array_unique($array_age);
    
    if($order_age == 'ASC'){
        sort($array_age);
    }else{
        arsort($array_age);
    }
    
    //сортировый список gender
    $array_gender = array();
    foreach ($array as $key => $value) {
        $array_gender[]= $value['gender'];
    }
    $array_gender = array_unique($array_gender);
    
    if($order_gender == 'ASC'){
        sort($array_gender);
    }else{
        arsort($array_gender);
    }
    
    //сортировый список login
    $array_login = array();
    foreach ($array as $key => $value) {
        $array_login[]= $value['login'];
    }
    $array_login = array_unique($array_login);
    
    if($order_login == 'ASC'){
        sort($array_login);
    }else{
        arsort($array_login);
    }
 
    
    $array_sorted = array();
    foreach ($array_age as $age) {
        foreach ($array_gender as $gender) {
            foreach ($array_login as $login) {


                foreach ($array as $key => $value) {

                    if ($value['age'] == $age && $value['gender'] == $gender && $value['login'] == $login) {
                        $array_sorted[$key] = $value;
                    }
                }
            }
        }
    }







$json = json_encode($array_sorted, JSON_PRETTY_PRINT | JSON_FORCE_OBJECT);   
    echo $json;

?>

