<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{
    public function index() {
      return view('admin_login');
    }

    public function show_dashboard()
    {
      return view('admin.dashboard');
    }

    public function log_in_dashboard(Request $request)
    {
      $admin_email = $request->admin_email;
      $admin_pwd = md5($request->admin_password);
      $result = DB::table('admins')
                                ->where('email', $admin_email)
                                ->where('password', $admin_pwd)
                                ->first();

      if ($result) {
        Session::put('admin_name', $result->name);
        Session::put('admin_id', $result->admin_id);
        Session::put('admin_phone', $result->phone);
        return Redirect::to('/dashboard');
      } else {
        Session::put('message', 'Email or Passord Invalid');
        return Redirect::to('/admin');
      }
    }


}
