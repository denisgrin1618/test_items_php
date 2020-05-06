
<?php
$dir = '.';
$files = scandir($dir);

session_start();
if (!isset($_SESSION['dir'])) {
    $_SESSION['dir'] = '.';
}
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>File</title>
    </head>
    <body>


        <div class="container">
            <div class="row"></div>
            <h1><?php echo $_SESSION['dir'] ?></h1>
            <table id='table_files' class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">type</th>
                        <th scope="col">name</th>
                    </tr>
                </thead>
                <tbody id='table_files_body'>


                </tbody>
            </table>

        </div>
    </div>



    <table id='table_files_empty' class="table table-striped invisible">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">type</th>
                <th scope="col">name</th>
            </tr>
        </thead>
        <tbody id='table_files_body'>

            <tr id="row_table_empty" >
                <th id='row_index' scope="row"></th>
                <td id='row_type'></td>
                <td ><button id='row_name'></button></td>
            </tr>

        </tbody>
    </table>



    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



    <script>



        var update_files = function (dir_selected) {

            $.ajax({
                type: "POST",
                url: "http://localhost:8000/exercises/exercise_04/file_manager.php",
                data: "dir_selected=" + dir_selected,
                success: function (data) {

                    $('#table_files_body').empty();



                    var obj = $.parseJSON(data);

                    $('h1').text(obj.dir);

                    $.each(obj.data, function (index, value) {
                        var tr = $("#row_table_empty").clone(true);
                        tr.removeAttr("id").removeAttr("class");
                        tr.attr('id', 'row_table');
                        tr.find('#row_index').text(index);
                        tr.find('#row_type').text(value.type);
                        tr.find('#row_name').text(value.name);
                        tr.appendTo("#table_files_body");
                    });

                }
            });

        }

        update_files('.');


        $("#row_name").on("click", function (event) {


//            var modal = $(this);
            var button = $(event.target);
            var tr = button.parent().parent();
            var index = tr.find('#row_index').text();
            var type = tr.find('#row_type').text();
            var name = tr.find('#row_name').text();

            if (type == 'dir') {
                update_files(name);
            }
            console.log(index);

        });



    </script>

</body>
</html>