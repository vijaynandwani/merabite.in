@extends('layouts.single')

@section('content')

	<div id="admin">
	<ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Categories">Admin Categories</a></li>
                </ol>
	<div class="page-header">
        <h1>Categories Admin Panel</h1>
    </div>

	<p>Here you can view, delete, and create new categories.</p>

	@if(Session::has('message'))
        <p class="bg-info" style="padding: 10px;">{{Session::get('message')}}</p>
    @endif

	<h2>Categories</h2><hr>
	<ul>
	@foreach($categories as $category)
		<li>
					{{ $category->name }} - 
					{!! Form::open(array('url'=>'admin/category/delete', 'class'=>'form-inline')) !!}
					{!! Form::hidden('id', $category->id) !!}
					{!! Form::submit('delete') !!}
					{!! Form::close() !!}
		</li>
	@endforeach
	</ul>

	<h2>Create New Category</h2><hr>

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

	{!! Form::open(array('url'=>'admin/category/create')) !!}
	<p>
		{!! Form::label('name') !!}
		{!! Form::text('name') !!}
	</p>
	{!! Form::submit('Create Category', array('class'=>'btn btn-success')) !!}
	{!! Form::close() !!}
</div><!-- end admin -->
@stop