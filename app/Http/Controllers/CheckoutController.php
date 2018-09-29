<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function login_check()
    {
      $categories = DB::table('categories')->where('pub_stat', 1)->get();
      $manufactures = DB::table('manufactures')->where('pub_stat', 1)->get();
      return view('pages.login', compact('categories', 'manufactures'));
    }

    public function user_reg(Request $request)
    {
      $data = array();
      $data['name'] = $request->name;
      $data['email'] = $request->email;
      $data['password'] = md5($request->password);
      $data['mobile'] = $request->mobile;

      $user_id = DB::table('users')
                                ->insertGetId($data);
      Session::put('user_id', $user_id);
      Session::put('user_name', $request->name);

      return Redirect::to('/checkout');

    }

    public function checkout()
    {
      $categories = DB::table('categories')->where('pub_stat', 1)->get();
      $manufactures = DB::table('manufactures')->where('pub_stat', 1)->get();
      return view('pages.checkout', compact('categories', 'manufactures'));
    }

    public function save_shipping_details(Request $request)
    {
      $data = array();
      $data['shipping_email'] = $request->shipping_email;
      $data['shipping_first_name'] = $request->shipping_first_name;
      $data['shipping_last_name'] = $request->shipping_last_name;
      $data['shipping_address'] = $request->shipping_address;
      $data['shipping_city'] = $request->shipping_city;
      $data['ship_mobile_number'] = $request->shipping_mobile;

      $sipping_id = DB::table('shippings')
                      ->insertGetId($data);
      Session::put('shipping_id', $sipping_id);
      return Redirect::to('/payment');
    }

    public function logout()
    {
      Session::flush();
      return Redirect::to('/');
    }

    public function user_login(Request $request)
    {
      $user_email = $request->user_email;
      $user_pwd = md5($request->user_pwd);
      $result = DB::table('users')
                                ->where('email', $user_email)
                                ->where('password', $user_pwd)
                                ->first();
                                

      if ($result) {
        Session::put('user_id', $result->uid);
        Session::put('user_name', $result->name);

        return Redirect::to('/checkout');
      } else {
        Session::put('message', 'Email or Passord Invalid');
        return Redirect::to('/login_check');
      }
    }


}
