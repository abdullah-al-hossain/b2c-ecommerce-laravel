<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function index()
    {
      $user_id = Session::get('user_id');
      if ($user_id == null) {
        Session::put('message', 'You need to login or signUp at first');
        return Redirect::to('/');
      }
      return view('users.index');
    }

    public function confirmed_orders()
    {
      $user_id = Session::get('user_id');
      if ($user_id == null) {
        Session::put('message', 'You need to login or signUp at first');
        return Redirect::to('/');
      }

      
      $all_orders_info = DB::table('users')
                                          ->join('orders', 'orders.uid', '=', 'users.uid')
                                          ->select('orders.*', 'users.name')
                                          ->where('users.uid', $user_id)
                                          ->get();

      return view('users.confirm', compact('all_orders_info'));
    }

    public function pending_orders()
    {
      $user_id = Session::get('user_id');
      if ($user_id == null) {
        Session::put('message', 'You need to login or signUp at first');
        return Redirect::to('/');
      }


      $all_orders_info = DB::table('users')
                                          ->join('orders', 'orders.uid', '=', 'users.uid')
                                          ->select('orders.*', 'users.name')
                                          ->where('users.uid', $user_id)
                                          ->get();
      return view('users.pending', compact('all_orders_info'));
    }

    public function canceled_orders()
    {
      $user_id = Session::get('user_id');
      if ($user_id == null) {
        Session::put('message', 'You need to login or signUp at first');
        return Redirect::to('/');
      }

      $all_orders_info = DB::table('users')
                                          ->join('orders', 'orders.uid', '=', 'users.uid')
                                          ->select('orders.*', 'users.name')
                                          ->where('users.uid', $user_id)
                                          ->get();
      return view('users.canceled', compact('all_orders_info'));
    }

}
