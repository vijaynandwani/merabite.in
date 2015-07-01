@extends('layouts.single')

@section('content')

	<ol class="breadcrumb">
        <li><a href="index-2.html">Home</a></li>
        <li><a href="shopping-cart.html">Shopping Cart</a></li>
    </ol>

	@if(Session::has('message'))
        <p class="bg-info" style="padding: 10px;">{{Session::get('message')}}</p>
    @endif

    <div class="page-header">
        <h1>Shopping Cart<small id="headingtotal">(₹{{$total}})</small></h1>
    </div>
    	{!! Form::open(array('url'=>'store/checkout')) !!}
		<div class="cart-info table-responsive">
            <table class="table table-bordered">
                <thead><tr>
                    <th class="image">Image</th>
                    <th class="name">Product Name</th>
                    <th class="quantity">Quantity</th>
                    <th class="price">Unit Price</th>
                </tr></thead>
                <tbody>
                	@foreach($products as $product)	
                    <tr>
                        <td class="image">
                            <a href="{{action('StoreController@getView', ['id' => $product->id])}}">
                                <img src="{{url($product->options->image)}}" alt="{{$product->name}}" title="{{$product->name}}">
                            </a>
                        </td>
                        <td class="name">
                            <a href="{{action('StoreController@getView', ['id' => $product->id])}}">{{$product->name}}</a>
                        </td>
                        <td class="quantity">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button id="updatequantity" class="btn btn-success" type="image" alt="Update" title="Update"><i class="fa fa-refresh"></i></button>
                                </span>

                                <input class="form-control quantityvalue" id="{{$product->rowid}}" type="text" name="quantityColumn" value="{{$product->qty}}" size="1">

                                <span class="input-group-btn">
                                    <a class="btn btn-danger removeitem" href="removeitem?id={{$product->rowid}}" title="Remove">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </span>
                            </div>
                        </td>
                        <td class="price">
                            ₹{{$product->price}}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    
   {!!Form::close()!!}

    <div class="cart-total">
                        <table id="total">
                            <tbody><tr>
                                <td class="text-right">
                                    <strong>Sub-Total:</strong>
                                </td>
                                <td class="text-right subTotalDown">
                                	₹{{\Cart::total()}}.00
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <strong>Delivery Charges:</strong>
                                </td>
                                <td class="text-right">
                                    ₹30.00
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <strong>Total:</strong>
                                </td>
                                <td class="text-right totalDown">
                                    ₹{{\Cart::total()+30}}.00
                                </td>
                            </tr>
                        </tbody></table>
                    </div>
                    <div class="buttons">
                        <div class="text-right">
                            <a href="{{action('StoreController@getCheckout')}}" class="btn btn-success">
                                <i class="fa fa-credit-card"></i> <span>Checkout</span>
                            </a>

                            <a href="{{url('/')}}" class="btn btn-warning">
                                Continue Shopping <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
	 
@stop