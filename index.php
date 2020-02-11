<!DOCTYPE html>


<?php
  //setcookie("name", "7", time()+3600, "/","", 0);
  //setcookie("email", "8", time()+3600, "/", "",  0);
  
  $pass = md5('123');
  
  function get_param ($name,$number=0) { 
  //имя параметра $name и пометка $number, числовой ли он
  if (isset($_REQUEST[$name])) { 
   //Массив $_REQUEST = $_POST+$_GET+$_COOKIE !
   $name = trim(htmlspecialchars($_REQUEST[$name])); //делать для всех типов параметров
   //дальше числа и строки обрабатываем по-разному
   return ($number ? doubleval($name) : $name);
  }
  else return ($number ? 0 : ""); 
 }
 
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <h1>Авторизация</h1>
        
        <div class="container">
        <form>
            <div class="form-group">
              <label for="exampleInputLogin">Login</label>
             
              
              <input 
                  
                  <?php
                        if( !empty($_COOKIE['auth']) and isset($_COOKIE["name"]))
                           echo "value=" . addslashes($_COOKIE["name"]);

                        else
                           echo "";
                     ?>
                  
                  
                  type="text" class="form-control" id="exampleInputLogin" aria-describedby="LoginHelp">

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input 
                 
                  <?php
                        if( !empty($_COOKIE['auth']) and isset($_COOKIE["email"]))
                           echo "value=" . addslashes($_COOKIE["email"]);

                        else
                           echo "";
                     ?>
                  
                  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            
       
       

        
        
        
        
        <?php 
        
        
        if (!empty($_COOKIE['auth'])) $trypass = $_COOKIE['auth']; //есть сохранённый куки? прочитать
            else $trypass = md5(get_param('trypass')); //иначе попытаться получить пароль от юзера

            $go = get_param('go'); //некий параметр, обозначающий "действие" скрипта
            $access = false; //флажок "доступ к авторизованной части"
            if ($trypass==$pass) { //получен верный пароль
             $access = true; 
             setcookie('auth',$pass,time()+3600); //ставим кукиз на час
                  //в файле cookie хранится только зашифрованный пароль
            }
            if ($go=='logout') { //выбрано действие "выход"
             setcookie('auth','',time()-3600); //сбрасываем время действия кукиза
             $access = false; 
            }  
            if ($access) { //находимся в авторизованном режиме
             setcookie('auth',$pass,time()+3600); //продляем кукиз на час от текущего момента
             //здесь выбор других действий в зависимости от значения $go
             echo '<p>Контент для авторизованного пользователя; </p>
              <a type="submit" class="btn btn-primary" href="index.php">Обновить</a>
              <a type="submit" class="btn btn-primary" href="index.php?go=logout">Выход</a>
              ';
            }
            
            else {
             echo '<p>Вы не авторизованы; </p>
                   <a type="submit" class="btn btn-primary" href="index.php">Обновить</a>
                   <a type="submit" class="btn btn-primary" href="index.php?trypass=123">Автовход</a>
                   ';
                       //на самом деле пароль будет получен из формы
            }
        
        
        ?>
       
        
            
            
               </form>
        </div>
        
    </body>
</html>
