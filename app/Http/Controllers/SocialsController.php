<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Social;
use Illuminate\Support\Facades\Redirect;

class SocialsController extends Controller
{
    public function index()
    {
      $socials = Social::all();
      return view('admin.socials.index', compact('socials'));
    }

    public function add()
    {
      return view('admin.socials.add_social');
    }

    public function store(Request $request)
    {
      $data = array();
      $data['social_name'] = $request->social_name;
      $data['social_link'] = $request->social_link;
      if ($request->pub_stat = 'on' || $request->pub_stat = 1) {
        $pub_stat = 1;
      } else {
        $pub_stat = 0;
      }
      $data['status'] = $pub_stat;

      $insertSocial = DB::table('socials')->insert($data);

      return Redirect::to('/social');
    }

    public function editStat(Request $request)
    {
      $socialUpdate = Social::where('id', $request->id);

      if ($request->status == 1) {
        $pub_stat = 0;
      } else {
        $pub_stat = 1;
      }

      $socialUpdate->update([
          'status' => $pub_stat,
      ]);

      if ($socialUpdate) {
          Session::put('message', 'Social media status updated successfully!!');
      } else {
          Session::put('message', 'Social media status was not updated!!');
      }

      return Redirect::to('/social');
    }

    public function edit($id)
    {
      $this->AdminAuthCheck();
      $social = Social::where('id', $id)->first();
      return view('admin.socials.edit', compact('social'));
    }

    public function update(Request $request)
    {
        $this->AdminAuthCheck();
        $socialUpdate = Social::where('id', $request->id);

        if ($request->pub_stat == null) {
          $pub_stat = 0;
        } else {
          $pub_stat = 1;
        }

        //return $pub_stat;
        $socialUpdate->update([
            'social_name' => $request->input('social_name'),
            'social_link' => $request->input('social_link'),
            'status' => $pub_stat,
        ]);

        if ($socialUpdate) {
            Session::put('message', 'Social media updated successfully!!');
        } else {
            Session::put('message', 'Social media was not updated!!');
        }

        return Redirect::to('/social');
    }

    public function delete($id)
    {
      $socialDelete = Social::where('id', $id)->delete();

      if ($socialDelete) {
        Session::put('message', 'Social was deleted successfully!!');
      } else {
        Session::put('message', 'Social was not deleted successfully!!');
      }

      return Redirect::to('/social');
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
