<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function login_check()
    {
      Session::put('page', 'login');
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
      $this->UserAuthCheck();
      if (Cart::count() <= 0) {
        return Redirect::to('/')
                          ->with('message', 'You have nothing in your cart. Please buy something at first.');
      }
      Session::put('page', 'checkout');
      $categories = DB::table('categories')->where('pub_stat', 1)->get();
      $manufactures = DB::table('manufactures')->where('pub_stat', 1)->get();
      return view('pages.checkout', compact('categories', 'manufactures'));
    }

    public function save_shipping_details(Request $request)
    {
      $this->UserAuthCheck();
      $data = array();
      $data['shipping_email'] = $request->shipping_email;
      $data['shipping_first_name'] = $request->shipping_first_name;
      $data['shipping_last_name'] = $request->shipping_last_name;
      $data['shipping_address'] = $request->shipping_address;
      $data['shipping_city'] = $request->shipping_city;
      $data['mobile_number'] = $request->shipping_mobile;

      $sipping_id = DB::table('shippings')
                      ->insertGetId($data);
      Session::put('shipping_id', $sipping_id);
      return Redirect::to('/payment');
    }

    public function logout()
    {
      $this->UserAuthCheck();
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
        Session::put('user_email', $result->email);
        Session::put('user_mobile', $result->mobile);
        $sid = Session::get('shipping_id');
        if($sid == null)
          return Redirect::to('/');

        return Redirect::to('/checkout');
      } else {
        Session::put('message', 'Email or Passord Invalid');
        return Redirect::to('/login_check');
      }
    }

    public function payment()
    {
      $this->UserAuthCheck();
      $sid = Session::get('shipping_id');

      if(!$sid) {
          return Redirect::to('/')->with('message', 'You must checkout at first');
      }
      $categories = DB::table('categories')->where('pub_stat', 1)->get();
      $manufactures = DB::table('manufactures')->where('pub_stat', 1)->get();
      return view('pages.payment', compact('categories', 'manufactures'));
    }

    public function payment_insert(Request $request)
    {
      $this->UserAuthCheck();
      $contents = Cart::content();
      $payment_gateway = $request->payment_gateway;

      $pdata = array();
      $pdata['payment_method'] = $payment_gateway;
      $pdata['payment_status'] = 'pending';

      $payment_id = DB::table('payments')
                          ->insertGetId($pdata);


      $odata = array();
      $odata['uid'] = Session::get('user_id');
      $odata['shipping_id'] = Session::get('shipping_id');
      $odata['payment_id'] = $payment_id;
      $odata['order_total'] = Cart::total();
      $odata['order_status'] = 'pending';

      $order_id = DB::table('orders')
                        ->insertGetId($odata);

      $odetails = array();

      $contents = Cart::content();

      foreach ($contents as $content) {
        $odetails['order_id'] = $order_id;
        $odetails['product_id'] = $content->id;
        $odetails['product_name'] = $content->name;
        $odetails['product_price'] = $content->price;
        $odetails['product_sales_quantity'] = $content->qty;

        DB::table('orderdetails')
                                ->insert($odetails);
      }

      if ($payment_gateway == 'hcash') {
          $message = 'hcash';
          Cart::destroy();
      } elseif ($payment_gateway == 'bkash') {
          $message = 'bkash';
          Cart::destroy();
      } elseif ($payment_gateway == 'ppal') {
          $message = 'ppal';
          Cart::destroy();
      }

      Session::forget('shipping_id');

      return Redirect::to('/')
                        ->with('message', $message);
    }

    public function manage_order()
    {
      $all_orders_info = DB::table('orders')
                                          ->join('users', 'orders.uid', '=', 'users.uid')
                                          ->select('orders.*', 'users.name')
                                          ->get();
      return view('admin.orders.index', compact('all_orders_info'));
    }

    public function view_order($order_id)
    {
      $order_info_byId = DB::table('orders')
                                          ->join('users', 'orders.uid', '=', 'users.uid')
                                          ->join('orderdetails', 'orders.order_id', '=', 'orderdetails.order_id')
                                          ->join('shippings', 'orders.shipping_id', '=' , 'shippings.shipping_id')
                                          ->select('orders.*', 'orderdetails.*', 'shippings.*', 'users.*')
                                          ->first();

      $products_by_order_id = DB::table('products');
      echo "<pre>";
      print_r($order_info_byId);
      echo "</pre>";
      return view('admin.orders.show', compact('order_info_byId'));
    }
    // The function you see below was created for the purpose to see if the user is logged in or not
    public function UserAuthCheck()
    {
      $userId = Session::get('user_id');

      if ($userId) {
        return;
      } else {
        return Redirect::to('/login_check')->send();
      }
    }
}
