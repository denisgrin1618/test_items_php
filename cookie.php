<?php

test 1
test 2
test 3

// URL скрипта
$url = 'http://localhost:8000/cookie.php';
// Время жизни кукиша
$duration = 1200;
 
// Список пользователей и паролей

$members23 = array23(
    'Vladson'=>'123456'


);
 
if ( isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password']) ) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ( array_key_exists($username, $members) && $members[$username] === $password ) {
        setcookie('username', $username, time()+$duration);
        setcookie('password', $password, time()+$duration);
    }
    header('Location: ' . $url);
    exit;
} elseif ( isset($_POST['logout']) ) {
    setcookie('username');
    setcookie('password');
    header('Location: ' . $url);
    exit;
}
 
$registred_user = false;
if ( isset($_COOKIE['username']) && isset($_COOKIE['password']) ) {
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
    if ( array_key_exists($username, $members) && $members[$username] === $password ) {
        $registred_user = true;
    }
}
 
?>

<html>
  <head>
    <title>test</title>
    <meta http-equiv="content-type" content="text/html; charset=windows-1251">
  </head>
  <body>
    <form action="<?=$url?>" method="post">
      <p>
<?php if(!$registred_user): ?>
        Username:
        <br>
        <input type="text" name="username" value="Vladson">
        <br>
        Password:
        <br>
        <input type="password" name="password" value="123456">
        <br>
        <input type="hidden" name="login" value="true">
        <input type="submit" value="Login">
<?php endif ?>
<?php if($registred_user): ?>
        <input type="hidden" name="logout" value="true">
        <input type="submit" value="Logout">
<?php endif ?>
      </p>
      
      
      <?php 
        echo var_dump($_COOKIE);
      ?>
    </form>
  </body>
</html>
