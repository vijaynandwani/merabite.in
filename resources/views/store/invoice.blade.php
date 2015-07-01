<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <meta charset="UTF-8">
	    <title>MeraBite</title>
	    <meta name="description" content="MeraBite">
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	    <meta property="og:title" content="MeraBite: Come eat with us!">
	    <meta property="og:type" content="website">
	    <meta property="og:url" content="merabite.in">
	    <meta property="og:image" content="{{ asset('img/logo_pizza.png') }}">
	    <meta property="og:site_name" content="MeraBite: Come eat with us!">
	    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap2.3.2.min.css') }}">
	</head>
	<body>
		<div style="border:1px solid black; padding:15px; width:100%;">
		<header>
			<h1><center><u>INVOICE</u></center></h1>
			<address>
				<p><u>Merabite</u><br></p>
				<p><u>Shiv Nadar University</u></p>
			</address>
			<p><strong>Order By:</strong></p>
			<address>
				<p>{{$orderForPdf->user->name}}</p>
				<p>{{$orderForPdf->user->email}}</p>
			</address>
			
		</header>
		<article>
			<div>
			<table class="table table-bordered">
				<tr>
					<th><span>Invoice #</span></th>
					<td><span>{{$orderForPdf->id}}</span></td>
				</tr>
				<tr>
					<th><span>Date</span></th>
					<td><span>{{ date("d F Y",strtotime($orderForPdf->created_at)) }} at {{ date("g:ha",strtotime($orderForPdf->created_at)) }}</span></td>
				</tr>
				<tr>
					<th><span>Amount Due</span></th>
					<td><span><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span></span><span>{{$orderForPdf->price}}</span></td>
				</tr>

			</table>
		</div>
		<div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th><span>Item</span></th>
						
						<th><span>Rate</span></th>
						<th><span>Quantity</span></th>
						<th><span>Price</span></th>
					</tr>
				</thead>
				<tbody>
					@foreach($orderForPdf->orderProducts as $product)
					<tr>
						<td><a></a><span>{{$product->product->title}}</span></td>
						<td><span data-prefix> <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span></span><span>{{$product->product->price}}</span></td>
						<td><span>{{$product->quantity}}</span></td>
						<td><span data-prefix><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span></span><span>{{$product->price}}</span></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
			<div>
			<table class="table table-bordered">
				<tr>
					<th><span>Total</span></th>
					<td><span data-prefix> <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span></span><span>{{$orderForPdf->price}}</span></td>
				</tr>
				<tr>
					<th><span>Status</span></th>
					<td><span data-prefix></span><span>Not Paid</span></td>
				</tr>
				
			</table>
		</div>
		</article>
		<aside>
			
			<h1><span>Additional Notes</span></h1>
			<div>
				
				<p>Please make the payment by 12 PM wednesday</p>

				
			</div>
		</aside>
	</div>
	</body>
</html>