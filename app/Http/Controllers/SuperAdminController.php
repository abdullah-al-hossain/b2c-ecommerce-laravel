<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;


class SuperAdminController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
        return view('admin.dashboard');
    }

    public function logout()
    {
      Session::flush();
      return Redirect::to('/admin');
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
