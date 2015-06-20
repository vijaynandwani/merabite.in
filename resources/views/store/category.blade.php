@extends('layouts.singleproduct')

@section('content')
<ol class="breadcrumb">
    <li>{!! link_to_action('StoreController@getIndex', 'Home')!!}</li>
    <li>{!! link_to_action('StoreController@getCategory', $category->name, $category->id)!!}</li>
</ol>

<div class="category-info clearfix">
<h1>{{$category->name}}</h1>
</div>

@foreach($products as $product)
	{{$product}}
@endforeach
@stop