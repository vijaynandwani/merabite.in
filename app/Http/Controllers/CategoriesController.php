<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
	public function __construct(){
		$this->middleware('admin');
	}
	/**
	 * Show all categories
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$categories = Category::all();
		return view('category.index', compact('categories'));
	}

	/**
	 * Post a new category
	 *
	 * @return Response
	 */
	public function postCreate(Request $request)
	{
		$this->validate($request, ['name'=>'required|min:3']);
		Category::create($request->all());
		return redirect('admin/category/index')->with('message', 'Category Created!');
	}

	public function postDelete(Request $request)
	{
		$category = Category::find($request->input('id'));
		if ($category) {
			$category->delete();
			return redirect('admin/category/index')->with('message', 'Category Deleted!');
		}
		return redirect('admin/category/index')->with('message', 'Something wrong!');
		
	}
	
}