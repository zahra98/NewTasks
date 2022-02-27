<?php
namespace App\Http\Controllers;
 use DB;
 use Illuminate\Http\Request;
 use App\Http\Controllers\Controller;
 use App\Providers\RouteServiceProvider;
 use App\Models\Book;
 use Illuminate\Foundation\Auth\RegistersUsers;
 use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\Validator;
 use Illuminate\Support\Facades\Auth;

$dataPoints = array();
$book = DB::table('books')
->select('catagory')
->groupBy('catagory')
->get();
foreach($book as $row){
    $votes = book::where('catagory',$row->catagory)->count();
    array_push($dataPoints, array("label"=> $row->catagory, "y"=> $votes));
}

	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Books Catagories"
	},
	subtitles: [{
		text: "number of books in each"
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "#,##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>   