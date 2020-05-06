

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>exercise_05</title>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th scope="col">key</th>
                            <th scope="col">id</th>
                            <th scope="col">age</th>
                            <th scope="col">gender</th>
                            <th scope="col">login</th>
                        </tr>
                    </thead>
                    <tbody id='table_body'>

                        <tr id="row_table_sort" class="bg-info">
                            <th id='row_key' scope="row">Sort</th>
                            <th id='row_id'>
                                <select id="order_id">
                                    <option selected>ASC</option>
                                    <option>DESC</option>
                                </select>
                            </th>
                            <td id='row_age'>
                                <select id="order_age">
                                    <option selected>ASC</option>
                                    <option>DESC</option>
                                </select>
                            </td>
                            <td id='row_gender'>
                                <select id="order_gender">
                                    <option selected>ASC</option>
                                    <option>DESC</option>
                                </select>
                            </td>
                            <td id='row_login'>
                                <select id="order_login">
                                    <option selected>ASC</option>
                                    <option>DESC</option>
                                </select>
                            </td>
                        </tr>


                    </tbody>

                </table>


            </div>



        </div>


        <table id='table_empty' class="table table-striped invisible">
            <thead>
                <tr>
                    <th scope="col">key</th>
                    <th scope="col">id</th>
                    <th scope="col">age</th>
                    <th scope="col">gender</th>
                    <th scope="col">login</th>
                </tr>
            </thead>

            <tbody id='table_empty_body'>

                <tr id="row_table_empty" >
                    <th id='row_key' scope="row"></th>
                    <th id='row_id'></th>
                    <td id='row_age'></td>
                    <td id='row_gender'></td>
                    <td id='row_login'></td>
                </tr>

            </tbody>
        </table>





        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



        <script>

            var update_table = function (order_id, order_age, order_gender, order_login) {

                console.log(111);
                $.ajax({
                    type: "POST",
                    url: "table_sorted.php",
                    data: {
                        "order_id": order_id,
                        "order_age": order_age,
                        "order_gender": order_gender,
                        "order_login": order_login
                    },

                    success: function (data) {

//                    console.log(data);

//                        $('#table_body #').empty();
                        $('#table_body').children().not('#row_table_sort').remove();

                        var obj = $.parseJSON(data);
//                        console.log(obj);
                        $.each(obj, function (index, value) {
                            var tr = $("#row_table_empty").clone(true);
                            tr.removeAttr("id").removeAttr("class");
                            tr.attr('id', 'row_table');
                            tr.find('#row_key').text(index);
                            tr.find('#row_id').text(value.id);
                            tr.find('#row_age').text(value.age);
                            tr.find('#row_gender').text(value.gender);
                            tr.find('#row_login').text(value.login);
                            tr.appendTo("#table_body");
                        });
                    }
                });
            }

            update_table('.');


            


            $("#order_id, #order_age, #order_gender, #order_login").change(function () {
                
                var order_id        = $("#order_id option:selected").text();
                var order_age       = $("#order_age option:selected").text();
                var order_gender    = $("#order_gender option:selected").text();
                var order_login     = $("#order_login option:selected").text();
                
                update_table(order_id, order_age, order_gender, order_login);
                
            });



        </script>

    </body>
</html>