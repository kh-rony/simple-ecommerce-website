<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageProductsController extends Controller
{
	public function __construct()
	{
		//
	}
	public function index()
	{
		$data["products"] = DB::table("products")->get();

		return view('admin.manage-products', ["data" => $data]);
	}

	public function postUpdateStock(Request $request)
	{
		DB::table('products')->where('id', $request->id)->update(['stock' => $request->stock]);
		return redirect('/manage-products');
	}

	public function postUpdatePrice(Request $request)
	{
		DB::table('products')->where('id', $request->id)->update(['price' => $request->price]);
		return redirect('/manage-products');
	}

	public function postEditProductInfo(Request $request)
	{
		$data["product"] = DB::table('products')->where('id', $request->id)->first();
		$data["categories"] = DB::table('categories')->get();

		return view('admin.edit-product-info', ["data" => $data]);
	}

	public function postUpdateProductInfo(Request $request)
	{
		DB::table('products')->where('id', $request->id)->update([
			'name' => $request->name,
			'category_id' => $request->category_id,
			'stock' => $request->stock,
			'price' => $request->price,
			'price_currency' => $request->price_currency,
			'weight' => $request->weight,
			'weight_unit' => $request->weight_unit,
			'sku' => $request->sku,
			'photo' => $request->photo,
			'short_description' => $request->short_description,
			'long_description' => $request->long_description
		]);

		return redirect('/manage-products');
	}

	public function postDeleteProduct(Request $request)
	{
		DB::table('products')->where('id', $request->id)->delete();
		return redirect('/manage-products');
	}

	public function createNewProduct()
	{
		$data["product"] = DB::table('products')->first();
		$data["categories"] = DB::table("categories")->get();
		return view('admin.create-new-product', ["data" => $data]);
	}

	public function postCreateNewProduct(Request $request)
	{
		DB::table('products')->where('id', $request->id)->insert([
			'name' => $request->name,
			'category_id' => $request->category_id,
			'stock' => $request->stock,
			'price' => $request->price,
			'price_currency' => $request->price_currency,
			'weight' => $request->weight,
			'weight_unit' => $request->weight_unit,
			'sku' => $request->sku,
			'photo' => $request->photo,
			'short_description' => $request->short_description,
			'long_description' => $request->long_description
		]);

		return redirect('/manage-products');
	}
}
