@extends('layouts.app')
@section('title','CRUD首頁')
@section('navbar-brand')
	<div class="navbar-header"><a href="#" class="navbar-brand">index</a></div>
@endsection
@section('content')
<div class="row justify-content-center">
	<div class="card w-100" >
	  <div class="card-header">
	    <a id="create_data" href="#" class="btn btn-primary left-margin mb-2"><span class="glyphicon glyphicon-list">create</span></a>
	  </div>
	  <div class="card-body">

			<div class="table-responsive ">
				<table class="table table-bordered table-hover ">
					<thead >
				      <tr>
				      	<th>id</th>
				        <th>Product</th>
				        <th>Category</th>
			            <th>Description</th>
			            <th>Price</th>
			            <th>Actions</th>
				      </tr>
				    </thead>
				    <tbody>
				    	@foreach ($users as $user)
				    	<tr>
				    		<td>{{ $user['id'] }}</td>
				    		<td>{{ $user['name'] }}</td>
				    		<td>{{ $user['category_id'] }}</td>
				    		<td>{{ $user['description'] }}</td>
				    		<td>{{ $user['price'] }}</td>
				    		<td>
				    			<a href="{{ route('readContact', $user['id']) }}" class="btn btn-primary left-margin"><span class="glyphicon glyphicon-list">read</span></a>
				    			<a href="#" class="btn btn-info left-margin edit" data-content="{{$user}}"><span class="glyphicon glyphicon-list">edit</span></a>
				    			<a href="#" class="btn btn-danger left-margin delete" data-content="{{$user}}"><span class="glyphicon glyphicon-list">delete</span></a>			
				    		</td>
				    	</tr>			
				    	@endforeach
				    </tbody>
	    		</table>
			</div>
	  </div>
	  <div class="card-footer text-muted " >
    		{{ $users->links() }}
  	  </div>
	</div>
</div>



<script>

	$('.pagination').addClass('d-flex justify-content-center')
	$('#create_data').on('click', function(event) {
		event.preventDefault();
		$('#data_info').modal('show');
	});
	$('.edit').on('click', function(event) {
		event.preventDefault();
		var data=$(this).data();
		$.each(data.content, function(index, val) {
			console.log(index);
			//$('#data_edit').find('[name='+index+']').val(val);
		});
		arr = jQuery.map( data.content, function( n, i ) {
		  $('#data_edit').find('[name='+i+']').val(n);
		});
		$('#data_edit').modal('show');
	});
	$('.delete').on('click', function(event) {
		event.preventDefault();
		var data=$(this).data();
		console.log(data);
		$('#data_delete').find('.table').find( "tr" ).remove();
		$.each(data.content, function(index, val) {
			if(index!="remember_token"){
				$('#data_delete').find('.table').append('<tr><td>'+index+'</td><td>'+val+'</td></tr>');
			}
		});
		$('#data_delete').modal('show');
	});
</script>
@include('_modal')

@endsection







