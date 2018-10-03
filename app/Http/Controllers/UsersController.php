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
}
