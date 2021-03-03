@extends('layouts.app')

@section('content')
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
      <select name="filter_book" id="filter_book" class="form-control" required>
       <option value="">Select book</option>
       <option value="Male">Male</option>
       <option value="Female">Female</option>
      </select>
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
       <th width="20%">Book Number</th>
       <th width="10%">Start Date</th>
       <th width="25%">End Date</th>
   
      </tr>
     </thead>
    </table>
    <br />
    <br />
    <br />
   </div>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fill_datatable();
  
  function fill_datatable(filter_book = '', filter_user = '')
  {
   var dataTable = $('#customer_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "searching" : false,
    "ajax" : {
     url:"fetch.php",
     type:"POST",
     data:{
      filter_book:filter_book, filter_user:filter_user
     }
    }
   });
  }
  
  $('#filter').click(function(){
   var filter_book = $('#filter_book').val();
   var filter_user = $('#filter_user').val();
   if(filter_book != '' && filter_user != '')
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