<?php

namespace App\Http\Controllers;
use DB;
use Cart;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {

      $qty = $request->qty;
      $product_info = DB::table('products')
                                  ->where('p_id', $request->product_id )
                                  ->first();
      $data['qty'] = $qty;
      $data['id'] = $product_info->p_id;
      $data['name'] = $product_info->product_name;
      $data['price'] = $product_info->product_price;
      $data['options']['image'] = $product_info->product_image;

      Cart::add($data);
        return Redirect::to('/show_cart');

    }

    public function show_cart()
    {
      if (Cart::count() <= 0) {
        return Redirect::to('/')
                          ->with('message', 'You have nothing in your cart. Please buy something at first.');
      }
      Session::put('page', 'cart');
      $categories = DB::table('categories')->where('pub_stat', 1)->get();
      $manufactures = DB::table('manufactures')->where('pub_stat', 1)->get();
      return view('pages.add_to_cart', compact('categories', 'manufactures', 'cartPage'));
    }

    public function delete($rowId)
    {
      Cart::update($rowId, 0);
      return Redirect::to('/show_cart');
    }

    public function update_cart(Request $request)
    {
      $qty = $request->qty;
      $rowId = $request->rowId;

      Cart::update($rowId, $qty);
      return Redirect::to('/show_cart');

    }

}
