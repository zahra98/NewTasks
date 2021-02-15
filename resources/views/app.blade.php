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
        lat: jQuery('#lat').val(),
        long: jQuery('#long').val(),
    };
    var state = jQuery('#btn-save').val();
    var type = "POST";
    var todo_id = jQuery('#todo_id').val();
    var ajaxurl = '/ajaxRequest';
   // {{ url('/product_catalog/storeProduct') }}
   // {{ url('/product_catalog/storeProduct') }}
    $.ajax({
        type: type,
        url: ajaxurl,
        data: formData,
        dataType: 'json',
        success: function (data) {
            var myObj = JSON.parse(data);
 var day = '';
 var high = '';
 var low = '';
 var text = '';
 var code = '';

 day = myObj.forecasts[1].day;
 high = myObj.forecasts[1].high;
 low = myObj.forecasts[1].low;
 text = myObj.forecasts[1].text;
 code = myObj.forecasts[1].code;
    // $("#day").show(3000).html(day).addClass('success');
    // $("#high").show(3000).html(high).addClass('success');
 document.getElementById("day").innerHTML = 'day:' +' '+day;
 document.getElementById("high").innerHTML = 'High:' +' ' + high;
 document.getElementById("low").innerHTML = 'Low:' +' '+low;
 document.getElementById("text").innerHTML = 'Status:' +' '+text;
 document.getElementById("code").innerHTML = 'Code:' +' '+code;
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