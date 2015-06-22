@extends('layouts.singleproduct')

@section('content')
<ol class="breadcrumb">
    <li>{!! link_to_action('StoreController@getIndex', 'Home')!!}</li>
    <li>{!! link_to_action('StoreController@getSearch', 'Search for "'.$keyword.'"', $keyword)!!}</li>
</ol>

<div class="category-info clearfix">
<h2>Search results for "{{$keyword}}"</h>
</div>

<div class="product-filter clearfix">
    <div class="display">
        <div class="btn-group btn-group-sm">
            <span class="btn btn-default" disabled="disabled"><i class="fa fa-th-list"></i> List</span>
            <a class="btn btn-default" onclick="display(&#39;grid&#39;);"><i class="fa fa-th"></i> Grid</a>
        </div>
    </div>
</div>
<div class="box-product product-list">
@if($products)
    @foreach($products as $product)
    	<div class="item">
            <div class="image">
                {!! Form::image($product->image, $product->title, array('class'=>'imagebox', 'width'=>'255', 'height'=>'255')) !!}
            </div>
            <div class="caption">
                <div class="name">
                    {!! link_to_action('StoreController@getView', $product->title, $product->id)!!}
                </div>
                <div class="description">
                   {{$product->description}}
                </div>

                <div class="price">
                    <div>
                        <span class="price-fixed">₹{{$product->price}}</span>
                    </div>
                 </div>
        
        
                <div class="cart">
                    <button class="btn btn-success" type="button" onclick="addToCart(&#39;6816&#39;);">
                        <i class="fa fa-shopping-cart"></i> <span>Add to Cart</span>
                    </button>
                </div>
            </div>
        </div>
    @endforeach
@else
    {{'No products Found!'}}
@endif
</div>
@stop