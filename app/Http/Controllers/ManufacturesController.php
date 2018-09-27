<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacture;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;


class ManufacturesController extends Controller
{
  public function index()
  {
    $this->AdminAuthCheck();
    $manufactures = Manufacture::all();
    return view('admin.manufactures.index', compact('manufactures'));
  }

  public function create()
  {
    $this->AdminAuthCheck();
    return view('admin.manufactures.add_man');
  }

  public function store(Request $request)
  {
    $this->AdminAuthCheck();
    $manufacture = array();
    $manufacture['man_name'] = $request->manufacture_name;
    $manufacture['man_desc'] = $request->manufacture_description;

    if ($request->pub_stat == 'on' || $request->pub_stat == 1) {
        $manufacture['pub_stat'] = 1;
    } else {
      $manufacture['pub_stat'] = 0;
    }

    DB::table('manufactures')->insert($manufacture);
    if ($manufacture) {
        Session::put('message', 'Manufacture added successfully!!');
    } else {
        Session::put('message', 'Manufacture was not added!!');
    }

    return Redirect::to('/all_man');
  }

  public function edit($man_id)
  {
    $this->AdminAuthCheck();
    $manufacture = Manufacture::where('man_id', $man_id)->first();
    return view('admin.manufactures.edit', compact('manufacture'));
  }

  public function update(Request $request)
  {
      $this->AdminAuthCheck();
      $manUpdate = Manufacture::where('man_id', $request->man_id);

      if ($request->pub_stat == null) {
        $pub_stat = 0;
      } else {
        $pub_stat = 1;
      }

      //return $pub_stat;
      $manUpdate->update([
          'man_name' => $request->input('man_name'),
          'man_desc' => $request->input('man_desc'),
          'pub_stat' => $pub_stat,
      ]);

      if ($manUpdate) {
          Session::put('message', 'Manufacture updated successfully!!');
      } else {
          Session::put('message', 'Manufacture was not updated!!');
      }

      return Redirect::to('/all_man');
  }

  public function public_status(Request $request)
  {
    $this->AdminAuthCheck();
    $manUpdate = Manufacture::where('man_id', $request->man_id);

    if ($request->pub_stat == 1) {
      $pub_stat = 0;
    } else {
      $pub_stat = 1;
    }

    $manUpdate->update([
        'pub_stat' => $pub_stat,
    ]);

    if ($manUpdate) {
        Session::put('message', 'Publication status updated successfully!!');
    } else {
        Session::put('message', 'Publication was not updated!!');
    }

    return Redirect::to('/all_man');
  }

  public function delete($man_id)
  {
    $this->AdminAuthCheck();
    if (DB::table('manufactures')->where('man_id', '=', $man_id)->delete()) {
        Session::put('message', 'Manufacture deleted successfully!!');
    } else {
        Session::put('message', 'Manufacture was not deleted check again or try again!!');
    }

    return Redirect::to('/all_man');
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
