@extends('layouts.single')
@section('content')

	<ol class="breadcrumb">
        <li><a href="index-2.html">Home</a></li>
        <li><a href="shopping-cart.html">My Orders</a></li>
    </ol>

	
    
    @if (is_null($orders))
        <p class="bg-info" style="padding: 10px;">{{$message}}</p>
    @else
        <div class="page-header">
            <h1>Your Orders</h1>
        </div>
    	<div class="cart-info table-responsive">
            <table class="table table-bordered">
                <thead><tr>
                    <th class="number">Order ID</th>
                    <th class="count">Count of products</th>
                    <th class="price">Total Price</th>
                    <th class="status">Status</th>
                    <th class="details">Details</th>
                    <th class="invoice">Invoice</th>
                </tr></thead>
                <tbody>
                	@foreach($orders as $order)	
                    <tr>
                        <td class="number">{{$order->id}}</td>
                        <td class="count">{{$order->getCountOfProducts()}}</td>
                        <td class="price">₹{{$order->price}}</td>
                        <td class="status">{{$order->getStatus()}}</td>
                        <td class="details"><a href="{{action('StoreController@getOrder', ['id' => $order->id])}}">Details</a></td>
                        <td class="invoice"><a href="{{action('StoreController@getPdfinvoice', ['id' => $order->id])}}">Invoice</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
       @endif

   
@stop