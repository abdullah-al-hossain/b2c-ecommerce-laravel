<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacture;
use App\Product;
use App\Slider;
use App\User;
use Session;

use DB;

class HomeController extends Controller
{
    public function index()
    {
      $products = DB::table('products')
                                    ->where('products.pub_stat', 1)
                                    ->paginate(12);

      $categories = DB::table('categories')->where('pub_stat', 1)->get();
      $manufactures = DB::table('manufactures')->where('pub_stat', 1)->get();
      $sliders = DB::table('sliders')->where('pub_stat', 1)->get();
      $slide_1 = 1;

      return view('pages.home_content', compact('categories', 'manufactures', 'products', 'sliders', 'slide_1'));
    }

    public function show_product_by_category($category_id)
    {
      $products_by_cat = DB::table('products')
                                ->join('categories', 'products.category_id', '=', 'categories.category_id')
                                ->select('products.*', 'categories.name')
                                ->where('categories.category_id', $category_id)
                                ->where('products.pub_stat', 1)
                                ->limit(18)
                                ->get();
      $categories = DB::table('categories')->where('pub_stat', 1)->get();
      $manufactures = DB::table('manufactures')->where('pub_stat', 1)->get();

      return view('pages.product_by_cat', compact('categories', 'manufactures', 'products_by_cat'));
    }

    public function show_product_by_man($man_id)
    {
      $products_by_man = DB::table('products')
                                ->join('manufactures', 'products.man_id', '=', 'manufactures.man_id')
                                ->select('products.*', 'manufactures.man_name')
                                ->where('manufactures.man_id', $man_id)
                                ->where('products.pub_stat', 1)
                                ->limit(18)
                                ->get();
      $categories = DB::table('categories')->where('pub_stat', 1)->get();
      $manufactures = DB::table('manufactures')->where('pub_stat', 1)->get();
      return view('pages.product_by_man', compact('categories', 'manufactures', 'products_by_man'));
    }

    public function show_product_details($product_id)
    {
        $userId = Session::get('user_id');

        if ($userId) {
          $uid = Session::get('user_id');
          $p_id = $product_id;
          $event = "view";
        //   $event = DB::table('event')->insert([
        //               'uid' => $uid,
        //               'p_id' => $p_id,
        //               'event' => $event
        //           ]);
        }

      $reviews = DB::table('reviews')
                                    ->join('users', 'users.uid', '=', 'reviews.uid')
                                    ->select('users.name', 'users.uid', 'reviews.created_at','reviews.id','reviews.review', 'reviews.updated_at')
                                    ->where('reviews.p_id', $product_id)
                                    ->limit(9)
                                    ->get();
      $r_count = count($reviews);


      $product = DB::table('products')
                                ->join('categories', 'products.category_id', '=', 'categories.category_id')
                                ->join('manufactures', 'products.man_id', '=', 'manufactures.man_id')
                                ->select('products.*', 'categories.name', 'manufactures.man_name')
                                ->where('products.p_id', $product_id)
                                ->where('products.pub_stat', 1)
                                ->limit(9)
                                ->first();


      $categories = DB::table('categories')->where('pub_stat', 1)->get();
      $manufactures = DB::table('manufactures')->where('pub_stat', 1)->get();;
      return view('pages.view_product', compact('categories', 'manufactures', 'product', 'reviews', 'r_count'));
    }

     public function range(Request $request)
    {
      $from = $request->from;
      $to = $request->to;

      $products = DB::table('products')
                                    ->whereBetween('product_price', array($from, $to))
                                    ->orderBy('product_price', 'asc')
                                    ->get();

      $categories = DB::table('categories')->where('pub_stat', 1)->get();
      $manufactures = DB::table('manufactures')->where('pub_stat', 1)->get();;
      return view('pages.products_by_range', compact('categories', 'manufactures', 'products'));
    }

    public function search(Request $request)
    {
      $products = Product::where('product_name', 'like', '%'.$request->name.'%')->get();
      $categories = DB::table('categories')->where('pub_stat', 1)->get();
      $manufactures = DB::table('manufactures')->where('pub_stat', 1)->get();
      return view('pages.search_products', compact('categories', 'manufactures', 'products'));
    }

    public function delivery()
    {
      $categories = DB::table('categories')->where('pub_stat', 1)->get();
      $manufactures = DB::table('manufactures')->where('pub_stat', 1)->get();
      return view('delivery.user_show', compact('categories', 'manufactures'));
    }

    public function delivery_search(Request $request)
    {
      $categories = DB::table('categories')->where('pub_stat', 1)->get();
      $manufactures = DB::table('manufactures')->where('pub_stat', 1)->get();

      $dmen = DB::table('delivery_men')
                                        ->where('pub_stat', 1)
                                        ->where('area', $request->area)
                                        ->get();

      //return $dmen;

      return view('delivery.user_show', compact('categories', 'manufactures', 'dmen'));
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
