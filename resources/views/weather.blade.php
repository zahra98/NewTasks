<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img
                                src="https://thumbs.dreamstime.com/z/librarian-online-service-platform-knowledge-education-idea-llibrary-bookshelves-guid-isolated-vector-illustration-191844276.jpg"
                                class="image"> </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row mb-4 px-3">
                            <h6 class="mb-0 mr-4 mt-2">weather</h6>
                        </div>
                        <div class="card card0 border-0"  id = "forcast">
                        <h  id="day"></h> <br>
                        <h id="low"></h><br>
                        <h id="high"></h><br> 
                        <h id="text"></h><br>
                        <h id="code"></h><br>
                        </div>
                    <br>
<br>                        <form name='form1' >
                            <div class="row px-3"> <label class="mb-1">
                                    <h6 class="mb-0 text-sm">longitude</h6>
                                </label for="long" > <input class="mb-4" type="text" name="long" id = "long" placeholder="Enter your longitude">
                            </div>
                            <div class="row px-3"> <label class="mb-1">
                                    <h6 class="mb-0 text-sm">latitude</h6>
                                </label for="lat" > <input type="text" name="lat" id = "lat" placeholder="Enter your latitude"> </div>
                            <div class="row mb-3 px-3"> <button type="button" id = "saveusers" value = "Save"
                                    class="btn btn-blue text-center">Get Weather</button> </div>
                                        <h6 id = "weather"></h6>
                        </form>
                        <div id="result"></div>
                    </div>
                </div>
            </div>
            <div class="bg-blue py-4">
            </div>
        </div>
    </div>
<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="Weather.js"></script>
  <script type="text/javascript">
    $(function(){
        $("#saveusers").on('click', function(){
            var long  = $("#long").val();
            var lat   = $("#lat").val();
            $.ajax({
              method: "POST",
              url:    "Weather.php",
              data: { "long": long, "lat": lat},
             })
             .done(
               // show_fircast(data)
                function( data ) {
                    if ( ! data.success) {
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
                    } else {
                        var error = 'Somethinf went Wrong';
                       $('day').html('<div class="alert alert-success">' + error + '</div>');
                    }
       
          }
          );
       });
     });
  </script>
