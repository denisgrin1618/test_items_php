<?php

$url = 'http://localhost:8000/exercises/exercise_02/insex.php';

setcookie('test', 'val', time()+1200);

if(isset($_POST['ClearCOOKIE'])){  
   foreach ($_COOKIE as $key=>$value){
        unset ($_COOKIE[$key]);
   }     
}

//var_dump($_COOKIE);
echo "<h1>COOKIE:</h1>";
echo "<ul>";
foreach ($_COOKIE as $key=>$value){
    echo "<li>{$key} = {$value} </li>";
}
echo "</ul>";



    
?>


<form action="<?=$url?>" method="post">
    <input type="hidden" name="ClearCOOKIE" value="true">
    <input type="submit" value="Clear COOKIE">
</form>


<?php

echo "<h1>SERVER:</h1>";
echo "<ul>";
foreach ($_SERVER as $key=>$value){
    echo "<li>{$key} = {$value} </li>";
}
echo "</ul>";


?>