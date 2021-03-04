@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
       
            <div class="card">
            
                <div class="card-header">{{ __('Book Store') }}</div>

                <div class="card-body">
                  <br>
                  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
     <div class="form-group">
     <label for="name" >{{ __(' Filter by Book Name') }}</label>
     <input type="text"  name="filter_book" id="filter_book" value="{{ old('name') }}"  autofocus>

     </div>
     <div class="form-group">
     <label for="name" >{{ __(' Filter by User Name') }}</label>
      <input type="text"  name="filter_user" id="filter_user" value="{{ old('name') }}"  autofocus>
     </div>

     <div class="form-group" align="center">
      <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>
     </div>
    </div>
    <div class="col-md-4"></div>
   </div>
   <div class="table-responsive">
    <table id="customer_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th width="20%">Book Tiltle</th>
       <th width="20%">Renter Name</th>
       <th width="10%">Start Date</th>
       <th width="25%">End Date</th>
   
    </tr>
    </thead>
    </table>
    <br/>
    <br/>
    <br/>
    </div>   
    </div>
    </div>
    </div>
    </div>

    <script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  function fill_datatable(filter_book = '', filter_user = '')
  {
    let _token   = $('meta[name="csrf-token"]').attr('content');
   var dataTable = $('#customer_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "searching" : false,
    "ajax" : {
     url:"/filter",
     type:"POST",
     data:{
      filter_book:filter_book, filter_user:filter_user
      , _token: _token

     }
    }
   });
  }

  $('#filter').click(function(){
   var filter_book = $('#filter_book').val();
   var filter_user = $('#filter_user').val();
   if(filter_book != '' || filter_user != '')
   {
    $('#customer_data').DataTable().destroy();
    fill_datatable(filter_book, filter_user);
   }
   else
   {
    alert('Select Both filter option');
    $('#customer_data').DataTable().destroy();
    fill_datatable();
   }
  });
 });
</script>

</div>

@endsection
