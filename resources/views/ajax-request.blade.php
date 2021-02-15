<!DOCTYPE html>
<html>
<head>
    <title>Laravel Ajax Post Request Example</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <div class="container">
        <h1>Get your Forcast</a></h1>
          <span class="day" style="color:green; margin-top:10px; margin-bottom: 10px;"></span><br>
          <span class="high" style="color:green; margin-top:10px; margin-bottom: 10px;"></span><br>
          <span class="low" style="color:green; margin-top:10px; margin-bottom: 10px;"></span><br>
          <span class="state" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>
        <form id="ajaxform">
            <div class="form-group">
                <label>Latitude:</label>
                <input type="text" name="lat" class="form-control" placeholder="Enter Latitude" required="">
            </div>

            <div class="form-group">
                <label>Longtitude:</label>
                <input type="text" name="long" class="form-control" placeholder="Enter Longtitude" required="">
            </div>

            <div class="form-group">
                <button class="btn btn-success save-data">Save</button>
            </div>
        </form>
    </div>
    <script>

$(function(){
    $(".save-data").click(function(event){
        event.preventDefault();
      let lat = $("input[name=lat]").val();
      let long = $("input[name=long]").val();
      let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
              url: "/weather",
              type:"POST",
              data:{
              lat:lat,
              long:long,
             _token: _token
              }
             })
             .done(
                function( data ) {
                    if ( ! data.success) {
                     var myObj = JSON.parse(data);
                     day = myObj.forecasts[1].day;
                     $('.day').text(myObj.forecasts[1].day);
                     $('.high').text(myObj.forecasts[1].high);
                     $('.low').text(myObj.forecasts[1].low);
                     $('.state').text(myObj.forecasts[1].text);
                    // $('.day').text(data);
                     $("#ajaxform")[0].reset();
                    } else {
                        var error = 'Somethinf went Wrong';
                       $('day').html('<div class="alert alert-success">' + error + '</div>');
                    }
       
          }
          );
       });
     });
  
</script>
</body>
</html>