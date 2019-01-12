<?php

namespace App\Http\Controllers;

use Session;
use App\Order;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
session_start();

class OrderDetailsController extends Controller
{
  public function manage_order()
  {
    $this->AdminAuthCheck();
    $all_orders_info = DB::table('orders')
                                        ->join('users', 'orders.uid', '=', 'users.uid')
                                        ->select('orders.*', 'users.name')
                                        ->orderBy('order_id', 'desc')
                                        ->get();
    return view('admin.orders.index', compact('all_orders_info'));
  }

  public function view_order($order_id)
  {
    $this->AdminAuthCheck();
    $all_bought_products = DB::table('orders')
                                        ->join('orderdetails', 'orders.order_id', '=', 'orderdetails.order_id')
                                        ->select('orders.*', 'orderdetails.*')
                                        ->where('orders.order_id', $order_id)->get();

    $order_details = DB::table('orders')
                                        ->join('users', 'orders.uid', '=', 'users.uid')
                                        ->join('shippings', 'orders.shipping_id', '=' , 'shippings.shipping_id')
                                        ->select('users.*', 'shippings.*')
                                        ->where('orders.order_id', $order_id)->first();

    return view('admin.orders.show', compact('all_bought_products', 'order_details'));
  }

  public function confirm_order(Request $request)
  {
    $this->AdminAuthCheck();


    if ($request->order_status == 'pending' || $request->order_status == 'canceled') {

      $order_status = 'confirmed';

      $orderStatusUpdate = DB::table('orders')->where('order_id', $request->order_id)->update([
          'order_status' => $order_status,
      ]);

    } else {
      $order_status = 'canceled';

      $orderStatusUpdate = DB::table('orders')->where('order_id', $request->order_id)->update([
          'order_status' => $order_status,
      ]);
    }

    if ($orderStatusUpdate) {
        Session::put('message', 'Order status updated successfully!!');
    } else {
        Session::put('message', 'Order Status was not updated!!');
    }

    return Redirect::to('/manage_orders');

  }

  public function AdminAuthCheck()
  {
    $adminId = Session::get('admin_id');

    if ($adminId) {
      return;
    } else {
      return Redirect::to('/admin')->send();
    }
  }
}
