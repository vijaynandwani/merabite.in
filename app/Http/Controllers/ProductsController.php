<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
    /**
	 * Show all products
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$categories = array();

		foreach(Category::all() as $category) {
			$categories[$category->id] = $category->name;
		}

		$products = Product::all();
		
		return view('product.index')
		->with(compact('products'))
		->with(compact('categories'));
	}

	/**
	 * Post a new product
	 *
	 * @return Response
	 */
	public function postCreate(Request $request)
	{
		$this->validate($request, ['category_id'=>'required|integer',
								   'title'=>'required|min:2',
								   'description'=>'required|min:20',
								   'price'=>'required|numeric',
								   'availability'=>'integer',
								   'image'=>'required|image|mimes:jpeg,jpg,bmp,png,gif'
		]);
		
		$product = new Product;
		$product->category_id = $request->input('category_id');
		$product->title = $request->input('title');
		$product->description = $request->input('description');
		$product->price = $request->input('price');

		$image = $request->file('image');
        $filename  = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('img/products/' . $filename);
        \Image::make($image->getRealPath())->resize(240,240)->save($path);
        $product->image = 'img/products/'.$filename;
        $product->save();
		return redirect('admin/product/index')->with('message', 'Product Created!');
	}

	public function postDelete(Request $request)
	{
		$product = Product::find($request->input('id'));
		if ($product) {
			File::delete('public/'.$product->image);
			$product->delete();
			return redirect('admin/product/index')->with('message', 'Product Deleted!');
		}
		return redirect('admin/product/index')->with('message', 'Something wrong!');
		
	}

	public function postToggleAvailability() {
		$product = Product::find($request->input('id'));

		if ($product) {
			$product->availability = $request->input('availability');
			$product->save();
			return redirect('admin/product/index')->with('message', 'Product Updated');
		}

		return redirect('admin/product/index')->with('message', 'Invalid Product');
	}
}

