<?php

    function count_visit($file_name, $cl){
        
        $f=fopen($file_name,"a+");
        flock($f,LOCK_EX);
        $count=fread($f,100);

        if($count == ""){
           $count = 1; 
        }else{
            $count += $cl;
        }

        ftruncate($f,0);
        fwrite($f,$count);
        fflush($f);
        flock($f,LOCK_UN);
        fclose($f);
        
        return $count;
    }

    $count_visit = count_visit("stat.dat", 1);
     
    if(isset($_GET['ref']) && $_GET['ref']=='google'){
        $count_visit_google = count_visit("stat_google.dat", 1);
        header("Location: https://www.google.com");
    }else{
        $count_visit_google = count_visit("stat_google.dat", 0);
    }
    
  
  
    echo "Счетчик посещения:".$count_visit;
    echo "<br>";
    echo "Счетчик перехода по ссылке:".$count_visit_google;
    
?>

<a href="index.php?ref=google">Google</a>