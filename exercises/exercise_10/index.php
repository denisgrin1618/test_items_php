<?php
$img = isset($_GET['img']) ? $_GET['img'] : 'square';
?>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>exercise_07</title>
    </head>
    <body>

        <br>
        <div class="container">
            <div class="row">

                <img src="<?php echo $img . '.jpeg' ?>">

            </div>




            <br>
            <a href="index.php?img=square">Квадрат</a>
            <br>
            <a href="index.php?img=circle">Круг</a>
            <br>
            <a href="index.php?img=triangle">Треугольник</a>


        </div>

    </div>

</body>
</html>




