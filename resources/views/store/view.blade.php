@extends('layouts.singleproduct')

@section('content')

<ol class="breadcrumb">
    <li><a href="index-2.html">Home</a></li>
    <li><a href="pizza.html">Pizza</a></li>
    <li>{!! link_to_action('StoreController@getView', $product->title, $product->id)!!}</li>
</ol>

<div class="product-info">
    <div class="row">
        <div class="col-md-4 popup-gallery">
            <div class="image">
                {!! Form::image($product->image, $product->title, array('class'=>'imagebox', 'width'=>'255', 'height'=>'255')) !!}
            </div>
        </div>

        <div class="col-md-8 product-center clearfix">
            <h1>{{ $product->title }}</h1>
            <div class="description">
                <strong>Availability:</strong> xxx
            </div>
            
        </div>
    </div>

    <div class="cart-area">
        <div class="row">
            <div class="col-md-4">
                <div class="review">
                    <div class="stars" title="3 reviews">
                        <i class="fa fa-star"></i>&nbsp;
                        <i class="fa fa-star"></i>&nbsp;
                        <i class="fa fa-star"></i>&nbsp;
                        <i class="fa fa-star"></i>&nbsp;
                        <i class="fa fa-star-o"></i>&nbsp;
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="price">
                    <div>
                        <span class="price-fixed">₹{{ $product->price }}</span>
                    </div>
                </div>

                <div class="text-center" style="font-size: 12px"></div>
            </div>

            <div class="col-md-4">
                <div class="cart">
                    <div class="add-to-cart clearfix" style="margin-top: 20px">
                        <!--span class="help-block">Qty:</span-->
                        <div class="input-group">
                                {!!Form::macro('addtocart', function()
                                {
                                    return '<button type="submit" class="btn btn-success">
                                    <i class="fa fa-shopping-cart"></i> <span>Add to Cart</span>
                                </button>';
                                });!!}
                                {!! Form::open(array('url'=>'store/addtocart','class'=>'form-inline')) !!}
                            <div class="form-group">
                            <input type="text" name="quantity" class="form-control" size="2" value="1">
                            </div>
                            <div class="form-group">
                            <span class="input-group-btn">
                                    {!! Form::hidden('productId',$product->id) !!}
                                     {!!Form::addtocart();!!}
                                {!! Form::close() !!}
                            </span>
                            </div>
                        </div>
                        <input type="hidden" name="product_id" size="2" value="44">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-tabs">
    <ul class="nav nav-tabs" id="tabs">
        <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-description" class="tab-pane fade in active">
            <p>
               {{$product->description}}
            </p>
        </div>

        

        
    </div>
</div>
@stop