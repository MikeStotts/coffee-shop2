@extends('master')
@section('header')
<!-- $product passed from caller -->
<!-- $method passed from caller -->
<!-- 	post 	= create new product (admin)
		delete 	= delete product (admin only)
		other	= edit product (admin)
-->
<!-- [TODO] Add delete link -->
    <h2>
    @if ($method == 'post')
    	New Product
   	@elseif ($method == 'delete')
   		Delete Product {{$product->product_name }}
    @else
    	Edit Product {{$product->product_name}}
	@endif    
    </h2>@stop
@section('content')
	Create or modify a product
@foreach($errors->all() as $error)
	<p class="error">{{ $error }} </p>
@endforeach
{{ Form::model($product, array('autocomplete' => 'off', 
'url' => 'product/'.$product->id, 'method' => $method)) }}

@unless ($method == 'delete')
	@if ($method == 'post')
			
		<div class="form-group">
			{{Form::label('Product Name')}} {{Form::text('product_name')}}
		</div>
	@endif

	<div class="form-group">
		{{Form::label('Product Description')}} {{Form::text('description')}}
	</div>

	<div class="form-group">
		{{Form::label('Price')}} {{Form::text('price')}}
	</div>
@endif
@if ($method == 'delete')
	{{Form::submit('Delete',
		['class' => 'btn btn-default']) }}
@else
	{{Form::submit('Save',
		['class' => 'btn btn-default']) }}
@endif
{{ Form::close() }}
	
@stop
