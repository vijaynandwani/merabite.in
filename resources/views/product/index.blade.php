@extends('layouts.single')

@section('content')

	<div id="admin">
	<ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Categories">Admin Products</a></li>
                </ol>
	<div class="page-header">
        <h1>Products Admin Panel</h1>
    </div>

	<p>Here you can view, delete, and create new products.</p>

	@if(Session::has('message'))
        <p class="bg-info" style="padding: 10px;">{{Session::get('message')}}</p>
    @endif

	<h2>Products</h2><hr>
	<ul>
	@foreach($products as $product)
		<li>
			{!! Form::image($product->image, $product->title, array('width'=>'50')) !!}
			{{ $product->title }} - 
			{!! Form::open(array('url'=>'admin/product/delete', 'class'=>'form-inline')) !!}
			{!! Form::hidden('id', $product->id) !!}
			{!! Form::submit('delete') !!}
			{!! Form::close() !!} - 

			{!! Form::open(array('url'=>'admin/product/toggle-availability', 'class'=>'form-inline'))!!}
			{!! Form::hidden('id', $product->id) !!}
			{!! Form::select('availability', array('1'=>'In Stock', '0'=>'Out of Stock'), $product->availability) !!}
			{!! Form::submit('Update') !!}
			{!! Form::close() !!}
		</li>
	@endforeach
	</ul>

	<h2>Create New Product</h2><hr>

	@if($errors->has())
	<div id="form-errors" class="bg-danger" style="padding: 15px;margin-bottom: 10px;">
		<p>The following errors have occurred:</p>

		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div><!-- end form-errors -->
	@endif

	{!! Form::open(array('url'=>'admin/product/create', 'files'=>true)) !!}
		<p>
			{!! Form::label('category_id', 'Category') !!}
			{!! Form::select('category_id', $categories) !!}
		</p>
		<p>
			{!! Form::label('title') !!}
			{!! Form::text('title') !!}
		</p>
		<p>
			{!! Form::label('description') !!}
			{!! Form::textarea('description') !!}
		</p>
		<p>
			{!! Form::label('price') !!}
			{!! Form::text('price', null, array('class'=>'form-price'))!!}
		</p>
		<p>
			{!! Form::label('image', 'Choose an image') !!}
			{!!	Form::file('image') !!}
		</p>
	{!! Form::submit('Create Product', array('class'=>'btn btn-success')) !!}
	{!! Form::close() !!}
</div><!-- end admin -->
@stop