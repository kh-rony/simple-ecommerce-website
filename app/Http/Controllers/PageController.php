<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
	public function __construct()
	{
		//
	}

	public function index()
	{
//		$data["products"] = \App\Product::get();
		$data["products"] = DB::table("products")->get();

		return view('home', ["data"=>$data]);
	}

	public function searchProducts($searchString)
	{
		$data = null;

		$categories = DB::table("categories")->get();

		foreach( $categories as $category )
		{
			if( strcasecmp($category->name, $searchString) == 0 )
			{
				$data["products"] = DB::table('products')
					->where('category_id', '=', $category->id)
					->get();

				return view('search-results', ["data" => $data]);
			}
		}

		return view('search-results', ["data" => $data]);
	}

	public function postSearchProducts(Request $request)
	{
		$data = null;

		if( $request->searchbox == null )
		{
			return view('search-results', ["data" => $data]);
		}

		$categories = DB::table("categories")->get();

		foreach( $categories as $category )
		{
			if( strcasecmp($category->name, $request->searchbox) == 0 )
			{
				$data["products"] = DB::table('products')
					->where('category_id', '=', $category->id)
					->get();

				return view('search-results', ["data" => $data]);
			}
		}

		$products = DB::table("products")->get();

		foreach( $products as $product )
		{
			if( strpos( strtolower($product->name), strtolower($request->searchbox)) !== false )// || strcasecmp($product->name, $request->searchbox) == 0
			{
				if( $data["products"] == null )
				{
					$data["products"] = DB::table('products')
						->where('name', '=', $product->name)
						->get();
				}

				$queryResult = DB::table('products')
					->where('name', '=', $product->name)
					->get();

				$data["products"] = $data["products"]->merge($queryResult);
			}
		}

		if( $data != null )
		{
			$data["products"]->shift();
		}

		return view('search-results', ["data" => $data]);
	}

	public function productDetails($product_id)
	{
		$data['product'] = DB::table('products')
			->where('id', '=', $product_id)
			->first();

		return view('product-details', ['data' => $data]);
	}

	public function about()
	{
		return view('about');
	}

	public function contact()
	{
		return view('contact');
	}
}