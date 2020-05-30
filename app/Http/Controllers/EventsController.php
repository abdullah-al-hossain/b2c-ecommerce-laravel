<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Image;
session_start();

class EventsController extends Controller
{
    public function add_d_man()
    {
      $this->AdminAuthCheck();
      return view('admin.delivery_man.add');
    }


    public function store_d_man(Request $request)
    {
      $this->AdminAuthCheck();
      $data = array();

      $data['product_name'] = $request->dm_name;
      $data['area'] = $request->dm_area;
      $data['desc'] = $request->desc;

      if ($request->publication_status == 'on' || $request->publication_status == 1) {
          $pub_stat = 1;
      } else {
          $pub_stat = 0;
      }

      $data['pub_stat'] = $pub_stat;

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time().'.'.$image->getClientOriginalExtension();
        $success = Image::make($image)->resize(268, 249)->save( public_path('/image/delivery/'.$filename));
        $image_url = 'image/delivery/'.$filename;
        if ($success) {
          $data['product_image'] = $image_url;

          DB::table('delivery_men')->insert($data);
          Session::put('message', 'DM Added successfully!');
          return Redirect::to('/add_d_man');
        }
      }

      $data['product_image'] =
                    DB::table('delivery_men')->insert($data);
                    Session::put('message', 'DM Added successfully without any image!!');
                    return Redirect::to('/add_d_man');

    }

    public function all_d_men()
    {
        $this->AdminAuthCheck();
        $products = DB::table('delivery_men')->get();
        return view('admin.delivery_man.index', compact('products'));
    }

    public function edit_dm($p_id)
    {
      $this->AdminAuthCheck();
      $product = DB::table('delivery_men')->where('p_id', $p_id)->first();
      return view('admin.delivery_man.edit', compact('product'));
    }

    public function update_dm(Request $request)
    {
      $this->AdminAuthCheck();
      $prod = DB::table('delivery_men')->where('p_id', $request->p_id)->first();
      $prodUpdate = DB::table('delivery_men')->where('p_id', $request->p_id);

      if ($request->pub_stat == NULL) {
        $pub_stat = 0;
      } else {
        $pub_stat = 1;
      }
      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time().'.'.$image->getClientOriginalExtension();
        $success = Image::make($image)->resize(268, 249)->save( public_path('/image/delivery/'.$filename));
        $image_url = 'image/delivery/'.$filename;
        File::delete($prod->product_image);
      } else {
        $image_url = $request->product_image;
      }

      $prodUpdate->update([
          'product_name' => $request->input('dm_name'),
          'area' => $request->input('dm_area'),
          'desc' => $request->input('desc'),
          'product_image' => $image_url,
          'pub_stat' => $pub_stat,
      ]);


      if ($prodUpdate) {
          Session::put('message', 'Delivery Man Info updated successfully!!');
      } else {
          Session::put('message', 'Delivery Man Info was not updated!!');
      }

      return Redirect::to('/all_d_men');
  }

  public function delete_dm($product_id)
  {
    $this->AdminAuthCheck();
    $image_path = DB::table('delivery_men')
                                            ->select('product_image')
                                            ->where('p_id', $product_id)
                                            ->first();

    if (DB::table('delivery_men')->where('p_id', '=', $product_id)->delete()) {
        File::delete($image_path->product_image);
        Session::put('message', 'Delivery deleted successfully!!');
    } else {
        Session::put('message', 'Delivery was not deleted check again or try again!!');
    }


    return Redirect::to('/all_d_men');
  }


  public function update_dm_pub_stat(Request $request)
  {
    $this->AdminAuthCheck();
    $productUpdate = DB::table('delivery_men')->where('p_id', $request->product_id);

    if ($request->publication_status == 1) {
      $pub_stat = 0;
    } else {
      $pub_stat = 1;
    }

    $productUpdate->update([
        'pub_stat' => $pub_stat,
    ]);

    if ($productUpdate) {
        Session::put('message', 'Available status of Delivery Man updated successfully!!');
    } else {
        Session::put('message', 'Availabe status of Delivery Man was not updated!!');
    }

    return Redirect::to('/all_d_men');
  }

  public function view_dm($d_id)
  {
    $product = DB::table('delivery_men')
                              ->where('p_id', $d_id)
                              ->where('pub_stat', 1)
                              ->first();


    $categories = DB::table('categories')->where('pub_stat', 1)->get();
    $manufactures = DB::table('manufactures')->where('pub_stat', 1)->get();;
    return view('delivery.show', compact('categories', 'manufactures', 'product'));
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
