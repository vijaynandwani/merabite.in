<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\orderProducts;
use App\order;

class StoreController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth', ['only' => ['postAddtocart', 'getCart', 'getRemoveitem', 'getCheckout', 'getInvoice', 'postUpdatecartquantity']]);
        $this->middleware('currentUser', ['only' => ['getInvoice']]);
    
    }
    public function getIndex() {
    	$products = Product::take(4)->orderBy('created_at', 'DESC')->get();
		return view('store.index', compact('products'));
	}

	public function getView($id) {
		$product = Product::find($id);
		return view('store.view', compact('product'));
	}

	public function getCategory($id){
		$products = Product::where('category_id', $id)->get();
		$category = Category::find($id);
		return view('store.category', compact('products', 'category'));
	}

	public function getSearch(Request $request){
		$keyword = $request->input('keyword');
		$products = Product::where('title', 'LIKE', '%'.$keyword.'%')->orWhere('description', 'LIKE', '%'.$keyword.'%')->get();
		return view('store.search', compact('products', 'keyword'));
	}

	public function postAddtocart(Request $request){
		$product = Product::find($request->input('productId'));
		$quantity = $request->input('quantity');
		\Cart::add(
			array('id' => $product->id, 
				 'name' => $product->title, 
				 'qty' => $quantity, 
				 'price' => $product->price,
				 'options' => array('image' => $product->image)
				 )
		);
		return redirect('store/cart')->with('message', 'Product Added!');
	}

	public function getCart(){
		return view('store.cart')->with('products', \Cart::content())->with('total', \Cart::total());
	}

	public function getRemoveitem(Request $request){
		\Cart::remove($request->id);
		return redirect('store/cart')->with('message', 'Product Removed!');
	}

	public function postUpdatecartquantity(Request $request){
		$row = \Cart::get($request->id);
		$product = Product::find($row->id);
		$price = $product->price * $request->quantity;
		\Cart::update($request->id, array('qty' => $request->quantity));
		$totalPrice = \Cart::total();
		$totalCount = \Cart::count();
		$response = array('total'=>$totalPrice,'price'=>'₹'.$price.'.00','count'=>$totalCount);
		return response(json_encode($response), 200)->header('Content-Type', 'json');
	}

	public function getCheckout(){
		$cart = \Cart::content();
		$user = \Auth::user();
		if(\Cart::total()>0){
			$order = order::where('user_id',$user->id)->where('sale_id', env('SALE_ID'))->first();
			
			if(is_null($order)){
				$order = new Order;
				$order->user_id = $user->id;
		        $order->sale_id = env('SALE_ID');
		        $order->status = 2;
		        $order->price =\Cart::total();
				$order->save();

		        foreach($cart as $item){
					$product = Product::find($item->id);
					$orderproduct = orderProducts::firstOrCreate(['order_id'=>$order->id,'product_id'=>$item->id, 'price'=>$product->price*$item->qty,'quantity'=>$item->qty]);
				}

				$orderDetails = order::where('id', $order->id)->get();
				$message = "You order has been placed!";
			}else{
				$orderDetails = NULL;
				$message = "You have already placed an order in this sale! Please order from some other account!";
			}
			
			\Cart::destroy();
			
		}else{
			return redirect('/');
		}
		
		return view('store.checkout', compact('orderDetails','message'));
	}
	public function getInvoice($id) {
		$orderForPdf = Order::find($id);
		return view('store.invoice', compact('orderForPdf'));
	}

	public function getPdfinvoice($id){
		$orderForPdf = Order::find($id);
		$pdf = \PDF::loadView('store.invoice', compact('orderForPdf'));
		return $pdf->download('invoice.pdf');
	}
}
