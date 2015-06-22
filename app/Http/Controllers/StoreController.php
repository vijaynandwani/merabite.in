<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class StoreController extends Controller
{
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
}
