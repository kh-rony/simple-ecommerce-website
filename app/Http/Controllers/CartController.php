<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
	public function __construct()
	{
		//
	}

	public function postAddToCart(Request $request)
	{
		$data['product'] = DB::table('products')->where('id', $request->product_id)->first();

		if( Auth::check() )
		{
			$user_id = Auth::user()->id;

			$product_exists = DB::table('temp_orders')->where([['user_id', $user_id], ['product_id', $request->product_id]])->first();

			if( $product_exists )
			{
				/**
				 * update product quantity
				 */
				$request->product_quantity += $product_exists->product_quantity;
				DB::table('temp_orders')->where([['user_id', $user_id], ['product_id', $request->product_id]])->update(['product_quantity' => $request->product_quantity]);
			}
			else
			{
				/**
				 * insert
				 */
				DB::table('temp_orders')->insert(['tracking_number' => Session::getId(), 'user_id' => $user_id, 'product_id' => $request->product_id, 'product_name' => $data['product']->name, 'product_price' => $data['product']->price, 'product_quantity' => $request->product_quantity]);
			}
		}
		else
		{
			$product_exists = DB::table('temp_orders')->where([['tracking_number', Session::getId()], ['product_id', $request->product_id]])->first();

			if( $product_exists )
			{
				/**
				 * update product quantity
				 */
				$request->product_quantity += $product_exists->product_quantity;
				DB::table('temp_orders')->where([['tracking_number', Session::getId()], ['product_id', $request->product_id]])->update(['product_quantity' => $request->product_quantity]);
			}
			else
			{
				/**
				 * insert
				 */
				DB::table('temp_orders')->insert(['tracking_number' => Session::getId(), 'product_id' => $request->product_id, 'product_name' => $data['product']->name, 'product_price' => $data['product']->price, 'product_quantity' => $request->product_quantity]);
			}
		}

		return redirect('/cart');
	}

	public function cart()
	{
		$tracking_number = Session::getId();
		//$data['temp_orders'] = DB::table('temp_orders as to')->join('products as p', 'to.product_id', '=', 'p.id')->where('to.tracking_number', $tracking_number)->select('p.name', 'to.*')->get();
		$data['temp_orders'] = DB::table('temp_orders')->where('tracking_number', '=', $tracking_number)->get();

		if( isset($data['temp_orders']) && count($data['temp_orders'] ) )
		{
			$data['total_price'] = 0;
			$data['product_price'] = array();

			foreach( $data['temp_orders'] as $temp_order )
			{
				$data['product_price'][] = ($temp_order->product_quantity * $temp_order->product_price);
				$data['total_price'] += ($temp_order->product_quantity * $temp_order->product_price);
			}
		}

		return view('cart', ['data' => $data]);
	}

	public function postUpdateQuantity(Request $request)
	{
		$tracking_number = Session::getId();
		DB::table('temp_orders')
			->where([['id', $request->temp_order_id], ['tracking_number', $tracking_number]])
			->update(['product_quantity' => $request->product_quantity]);

		return redirect('/cart');
	}

	public function postRemoveItemFromCart(Request $request)
	{
		$tracking_number = Session::getId();
		DB::table('temp_orders')
			->where([['id', $request->temp_order_id], ['tracking_number', $tracking_number]])
			->delete();

		return redirect('/cart');
	}

	public function removeAllItemsFromCart()
	{
		$tracking_number = Session::getId();
		DB::table('temp_orders')
			->where('tracking_number', $tracking_number)
			->delete();

		return redirect('/cart');
	}


	public function checkout()
	{
		if( Auth::guest() )
		{
			return view('auth.login-before-checkout');
		}

		$tracking_number = Session::getId();

		$data['temp_orders'] = DB::table('temp_orders as to')
			->join('products as p', 'to.product_id', '=', 'p.id')
			->where('to.tracking_number', $tracking_number)
			->select('p.weight_unit', 'to.*')
			->get();

		$data['total_items'] = count($data['temp_orders']);

		if( isset($data['temp_orders']) && count($data['temp_orders'] ) )
		{
			$data['total_price'] = 0;

			foreach( $data['temp_orders'] as $temp_order )
			{
				$data['product_price'][] = ($temp_order->product_quantity * $temp_order->product_price);
				$data['total_price'] += ($temp_order->product_quantity * $temp_order->product_price);
			}
		}

		return view('checkout', ['data' => $data]);
	}

	public function postPlaceOrder(Request $request)
	{
		$temp_orders = DB::table('temp_orders')
			->where([ ['tracking_number', Session::getId()], ['user_id', Auth::user()->id] ])
			->get();

		$total_price = 0;
		foreach( $temp_orders as $temp_order )
		{
			$total_price += ($temp_order->product_quantity * $temp_order->product_price);
		}

		DB::table('orders')
			->insert([
			'tracking_number' => Session::getId(),
			'user_id' => Auth::user()->id,
			'name' => $request->name,
			'email' => $request->email,
			'contact_number' => $request->contact_number,
			'address' => $request->address,
			'country' => $request->country,
			'state' => $request->state,
			'zip' => $request->zip,
			'total_price' => $total_price,
			'shipping_amount' => $total_price,
			'shipping_country' => $request->country,
			'card_type' => $request->cardType,
			'name_on_card' => $request->nameOnCard,
			'card_number' => $request->cardNumber,
			'card_expiration_year' => $request->cardExpirationYear,
			'card_expiration_month' => $request->cardExpirationMonth,
			'card_cvv' => $request->cardCVV,
			'card_holder_contact_name' => $request->nameOnCard
		]);

		$order = DB::table('orders')
			->where([ ['tracking_number', Session::getId()], ['user_id', Auth::user()->id] ])
			->first();

		foreach( $temp_orders as $temp_order )
		{
			$insert_into_order_details_table[] = ['order_id' => $order->id, 'product_id' => $temp_order->product_id, 'product_name' => $temp_order->product_name, 'product_price' => $temp_order->product_price, 'product_quantity' => $temp_order->product_quantity];

			$product = DB::table('products')
				->where('id', $temp_order->product_id)
				->first();

			DB::table('products')
				->where('id', $temp_order->product_id)
				->update(['stock' => ($product->stock - $temp_order->product_quantity)]);
		}

		if( !empty( $insert_into_order_details_table ) )
		{
			DB::table('order_details')
				->insert( $insert_into_order_details_table );

			DB::table('temp_orders')
				->where([ ['tracking_number', Session::getId()], ['user_id', Auth::user()->id] ])
				->delete();
		}

		return view('thankyou');
	}

	public function myOrders()
	{
		if( !Auth::check() )
		{
			return redirect('/home');
		}

		$data['orders'] = DB::table('orders')
			->where('user_id', '=', Auth::user()->id)
			->get();

		return view('my-orders', ['data' => $data]);
	}


	public function test(Request $request)
	{
		return view('test');
	}
}