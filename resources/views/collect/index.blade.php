@extends('layouts.single')
@section('content')

	<div id="admin">
	<ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Categories">Collect Amount</a></li>
                </ol>
	<div class="page-header">
        <h1>Collect Amount Panel</h1>
    </div>

	@if(Session::has('message'))
        <p class="bg-info" style="padding: 10px;">{{Session::get('message')}}</p>
    @endif
    <p><strong>Order By: </strong>{{$orderDetails->user->name}}</p>
    {!! Form::open(array('url'=>'admin/collect/order', 'class'=>'form-inline'))!!}
	{!! Form::hidden('id', $orderDetails->id) !!}
	{!! Form::label('status', 'Status: ') !!}
	{!! Form::select('status', array('1'=>'Paid', '2'=>'Not Paid', '3'=>'Delivered'), $orderDetails->status) !!}
	{!! Form::submit('Update') !!}
	{!! Form::close() !!}
    <div class="cart-info table-responsive">
        <table class="table table-bordered">
            <thead><tr>
                <th class="image">Image</th>
                <th class="name">Product Name</th>
                <th class="quantity">Quantity</th>
                <th class="price">Unit Price</th>
                <th class="totalprice">Total Price</th>
            </tr></thead>
            <tbody>
                @foreach($orderDetails->orderProducts as $product)   
                <tr>
                    <td class="image">
                        <a href="{{action('StoreController@getView', ['id' => $product->product->id])}}">
                            <img src="{{url($product->product->image)}}" alt="{{$product->product->name}}" title="{{$product->product->name}}">
                        </a>
                    </td>
                    <td class="name">
                        <a href="{{action('StoreController@getView', ['id' => $product->product->id])}}">{{$product->product->title}}</a>
                    </td>
                    <td class="quantity">
                        {{$product->quantity}}
                    </td>
                    <td class="price">
                        ₹{{$product->product->price}}
                    </td>
                    <td class="totalprice">
                        ₹{{$product->price}}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <p class="pull-right">Total: ₹{{$orderDetails->price}}</p>

</div><!-- end admin -->
@stop