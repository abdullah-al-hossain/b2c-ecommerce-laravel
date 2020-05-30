<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\User;
use Image;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function index()
    {
      $this->UserAuthCheck();

      $uid = Session::get('user_id');
      $u_info = DB::table('users')->where('uid', $uid)->first();

      return view('users.index', compact('u_info'));
    }

    public function confirmed_orders()
    {
      $user_id = Session::get('user_id');
      $uid = Session::get('user_id');
      $u_info = DB::table('users')->where('uid', $uid)->first();

      if ($user_id == null) {
        Session::put('message', 'You need to login or signUp at first');
        return Redirect::to('/');
      }


      $all_orders_info = DB::table('users')
                                          ->join('orders', 'orders.uid', '=', 'users.uid')
                                          ->select('orders.*', 'users.name')
                                          ->where('users.uid', $user_id)
                                          ->get();

      return view('users.confirm', compact('all_orders_info', 'u_info'));
    }

    public function pending_orders()
    {
      $user_id = Session::get('user_id');
      $uid = Session::get('user_id');
      $u_info = DB::table('users')->where('uid', $uid)->first();

      if ($user_id == null) {
        Session::put('message', 'You need to login or signUp at first');
        return Redirect::to('/');
      }


      $all_orders_info = DB::table('users')
                                          ->join('orders', 'orders.uid', '=', 'users.uid')
                                          ->select('orders.*', 'users.name')
                                          ->where('users.uid', $user_id)
                                          ->get();
      return view('users.pending', compact('all_orders_info', 'u_info'));
    }

    public function canceled_orders()
    {
      $uid = Session::get('user_id');
      $u_info = DB::table('users')->where('uid', $uid)->first();
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
      return view('users.canceled', compact('all_orders_info', 'u_info'));
    }

    public function edit_u_p()
    {
      $uid = Session::get('user_id');
      $u_info = DB::table('users')->where('uid', $uid)->first();

      return view('users.edit', compact('u_info'));
    }

    public function update_ucer(Request $request)
    {
      $this->UserAuthCheck();
      $uid = Session::get('user_id');
      $u_info = DB::table('users')->where('uid', $uid)->first();

      if ($request->hasFile('u_image')) {
        $image = $request->file('u_image');
        $filename = time().'.'.$image->getClientOriginalExtension();
        $success = Image::make($image)->resize(268, 249)->save(public_path('/image/user_images/'.$filename));
        $image_url = $filename;
        Session::put('user_image', $filename);
      } else {
        $image_url = $u_info->user_image;
      }
      
      $uid = Session::get('user_id');
      $uUpdate = User::where('uid', $uid);

      $uUpdate->update([
          'name' => $request->name,
          'email' => $request->email,
          'mobile' => $request->phone,
          'user_image' => $image_url,
      ]);


      if ($uUpdate) {
          Session::put('message_u', 'Updated successfully!!');
      } else {
          Session::put('message_u', 'Not updated!!');
      }

      return Redirect::to('/user_account');
    }

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
