<?php

function add_new_user($name, $surname, $email, $password){
    
    if(isset($name) && isset($surname) && isset($email) && isset($password)){
        $mysqli = new mysqli('localhost', 'denis', '1618', 'test');
        $result = $mysqli->query("INSERT INTO users (name,surname,email,password) VALUES ('$name','$surname','$email','$password')");  
    }
    
}



$name       = $_POST['name'];
$surname    = $_POST['surname'];
$email      = $_POST['email'];
$password   = $_POST['password'];
add_new_user($name, $surname, $email, $password);

$mysqli = new mysqli('localhost', 'denis', '1618', 'test');
if ($mysqli->connect_errno) {

    echo "Ошибка: Не удалась создать соединение с базой MySQL и вот почему: \n";
    echo "Номер ошибки: " . $mysqli->connect_errno . "\n";
    echo "Ошибка: " . $mysqli->connect_error . "\n";

    exit;
}else{
    echo "вошли";
}



$sql = "SELECT name, surname, email, password FROM users";
if (!$result = $mysqli->query($sql)) {
    echo "Ошибка: Наш запрос не удался и вот почему: \n";
    echo "Запрос: " . $sql . "\n";
    echo "Номер ошибки: " . $mysqli->errno . "\n";
    echo "Ошибка: " . $mysqli->error . "\n";
    exit;
}


echo "<h1>Пользователи:</h1>";
echo "<ul>\n";
while ($user = $result->fetch_assoc()) {
    echo "<li> ";
    echo $user['name'] . ' ' . $user['surname'];
    echo "</li>\n";
}
echo "</ul>\n";

$result->free();
$mysqli->close();
?>

<html>
<head>
 <title>Записать новых пользователей</title>
</head>
<body>
 <form method="POST" action="users.php">
  <input name="name" type="text" placeholder="name"/>
  <input name="surname" type="text" placeholder="surname"/>
  <input name="email" type="text" placeholder="email"/>
  <input name="password" type="text" placeholder="password"/>
  <input type="submit" value="Отправить"/>
 </form>
</body>
</html>