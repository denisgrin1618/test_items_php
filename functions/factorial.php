
<?php 
            function factorial($number=0){
                
                $resalt = 1;
                for($i=1; $i <= $number; $i++){
                    $resalt = $resalt * $i;
                }
                
                return $resalt;
            }
            
?>


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title></title>
    </head>
    <body>

        <h1> Функции</h1>
        <div class="container">
        
            <form class="form-inline" action="/functions/factorial.php" method="post">
                
                <div class="form-group mx-sm-3 mb-2">
                  <label for="inputPassword2" class="sr-only">Введите число</label>
                  <input type="number" class="form-control" name="entered_number" placeholder="число">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Факториал</button>
              </form>
        </div>
        
        
        <?php 

            $num = (int)$_POST['entered_number'];
            echo factorial($num);       
        ?>
    </body>
</html>
