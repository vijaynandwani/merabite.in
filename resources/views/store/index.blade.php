@extends('layouts.main')

@section('content')

@foreach($products as $product)
<div class="item">

    <div class="image">
        {!! Form::image($product->image, $product->title, array('class'=>'feature', 'width'=>'240', 'height'=>'240')) !!}
    </div>

    <div class="caption">
        <div class="name">
                {!! link_to_action('StoreController@getView', $product->title, $product->id)!!}
        </div>

        <div class="price">
            <div>
                <span class="price-fixed">₹{{ $product->price }}</span>
            </div>
        </div>
        
        <div class="cart">
            <button onclick="addToCart(&#39;6852&#39;);" type="button" class="btn btn-success">
                <i class="fa fa-shopping-cart"></i> <span>Add to Cart</span>
            </button>
        </div>
    </div>
</div>
@endforeach
@stop