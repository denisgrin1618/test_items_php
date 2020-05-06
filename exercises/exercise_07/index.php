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

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="your text..." aria-label="your text..." aria-describedby="button-addon2" id="input_string">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button_format">Format</button>
                    </div>
                </div>

            </div>
            
            
            <div class="row">
            
                <h5 class="card-title">Formated string:</h5>
                <p id="formated_string"></p>
                
            </div>
        </div>
            
        </div>

        

     





        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



        <script>



        $("#button_format").click( function (event) {

            var str = $('#input_string').val();

            $.ajax({
                type: "POST",
                url: "format_string.php",
                data: "data=" + str,
                success: function (data) {

                    $('#formated_string').text(data);
                    
                }
            });
            
        });
        
        </script>

    </body>
</html>

