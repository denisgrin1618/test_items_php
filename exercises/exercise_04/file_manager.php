<?php


    $dir            = $_SESSION['dir'];
    $dir_selected   = $_POST['dir_selected'];
    $dir            = $dir.'/'.$dir_selected;
    $_SESSION['dir']= $dir;
    $files          = scandir($dir);
    
    
   
    $data = array('dir' => $dir,  'data' => array());
    foreach ($files as $key=>$value){
        $type = is_dir($dir.'/'.$value) ? 'dir' : 'file';
        array_push($data['data'], array('name'=>$value, 'type'=>$type));
    }

    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_FORCE_OBJECT);
    
    echo $json;
    
 
?>

