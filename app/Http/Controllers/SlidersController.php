<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Slider;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
use Image;
session_start();

class SlidersController extends Controller
{
    public function index()
    {
      $this->AdminAuthCheck();
      $sliders = Slider::all();
      return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
      $this->AdminAuthCheck();
      return view('admin.sliders.add');
    }

    public function store(Request $request)
    {      
      $this->AdminAuthCheck();
      $data = array();

      if ($request->publication_status == 'on' || $request->publication_status == 1) {
          $pub_stat = 1;
      } else {
          $pub_stat = 0;
      }
      $data['pub_stat'] = $pub_stat;

      if ($request->hasFile('slider_image')) {
        $image = $request->file('slider_image');
        $filename = time().'.'.$image->getClientOriginalExtension();
        $success = Image::make($image)->resize(870, 660)->save( public_path('/image/sliders/'.$filename));
        $image_url = '/image/sliders/'.$filename;
        if ($success) {
          $data['slider_image'] = $image_url;

          DB::table('sliders')->insert($data);
          Session::put('message', 'Slider Added successfully!');
          return Redirect::to('/add_slider');
        }
      }

      $data['product_image'] =
                    DB::table('products')->insert($data);
                    Session::put('message', 'Product Added successfully without any image!!');
                    return Redirect::to('/all_sliders');

    }


    public function public_status(Request $request)
    {
      $this->AdminAuthCheck();
      $sliderUpdate = Slider::where('slider_id', $request->slider_id);

      if ($request->pub_stat == 1) {
        $pub_stat = 0;
      } else {
        $pub_stat = 1;
      }

      $sliderUpdate->update([
          'pub_stat' => $pub_stat,
      ]);

      if ($sliderUpdate) {
          Session::put('message', 'Publication status of slider updated successfully!!');
      } else {
          Session::put('message', 'Publication status of slider was not updated!!');
      }

      return Redirect::to('/all_sliders');
    }


    public function delete($slider_id)
    {
      $this->AdminAuthCheck();

      if (DB::table('sliders')->where('slider_id', '=', $slider_id)->delete()) {
          Session::put('message', 'Slider deleted successfully!!');
      } else {
          Session::put('message', 'Slider was not deleted check again or try again!!');
      }

      return Redirect::to('/all_sliders');
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
