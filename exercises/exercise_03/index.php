<?php

$url = 'http://localhost:8000/exercises/exercise_03/index.php';

session_start();
if(!isset($_SESSION['time_start'])){
    $_SESSION['time_start'] = date("H:i:s");
}

if(!isset($_SESSION['HP'])){
    $_SESSION['HP'] = 100;
}

echo "<h1>SESSION:</h1>";
echo "<ul>";
foreach ($_SESSION as $key=>$val){
    echo "<li>".$key."=".$val."</li>";
}
echo "</ul>";

if($_POST['hit']){
    $_SESSION['HP'] -= rand(1,10);
}

//echo session_name()."=".session_id();

//phpinfo();
?>


<form action="<?=$url?>" method="post">
    <input type="hidden" name="hit" value="true">
    <input type="submit" value="hit">
</form>
