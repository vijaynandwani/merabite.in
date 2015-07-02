<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;

class CollectionController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    /**
     * Show all categories
     *
     * @return Response
     */
    public function getIndex(){
        return redirect('/');
    }

    public function getOrder($id)
    {
        $orderDetails = Order::find($id);
        return view('collect.index', compact('orderDetails'));
    }

    /**
     * Post a new category
     *
     * @return Response
     */
    public function postOrder(Request $request)
    {
        $order = order::find($request->input('id'));
        $order->status = $request->input('status');
        $order->save();
        return redirect('admin/collect/order/'.$request->input('id'))->with('message', 'Order status Updated!');
    }

    public function getSale($id)
    {
        $orders = Order::where('sale_id', $id)->get();
        return view('collect.sale', compact('orders'));
    }

    
}
