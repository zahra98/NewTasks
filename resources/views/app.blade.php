<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel AJAX CRUD Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body class="container mt-5">

    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script >
    jQuery(document).ready(function($){

//----- Open model CREATE -----//
jQuery('#btn-add').click(function () {
    jQuery('#btn-save').val("add");
    jQuery('#myForm').trigger("reset");
    jQuery('#formModal').modal('show');
});

// CREATE
$("#btn-save").click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    var formData = {
        title: jQuery('#title').val(),
        description: jQuery('#description').val(),
    };
    var state = jQuery('#btn-save').val();
    var type = "POST";
    var todo_id = jQuery('#todo_id').val();
    var ajaxurl = 'todo';
    $.ajax({
        type: type,
        url: ajaxurl,
        data: formData,
        dataType: 'json',
        success: function (data) {
            var todo = '<tr id="todo' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + data.description + '</td>';
            if (state == "add") {
                jQuery('#todo-list').append(todo);
            } else {
                jQuery("#todo" + todo_id).replaceWith(todo);
            }
            jQuery('#myForm').trigger("reset");
            jQuery('#formModal').modal('hide')
        },
        error: function (data) {
            console.log(data);
        }
    });
});
});
    </script>


</body>

</html>