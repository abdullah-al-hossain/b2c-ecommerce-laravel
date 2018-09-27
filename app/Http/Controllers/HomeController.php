<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacture;
use App\Product;
use App\Slider;

use DB;

class HomeController extends Controller
{
    public function index()
    {
      $products = DB::table('products')
                                ->join('categories', 'products.category_id', '=', 'categories.category_id')
                                ->join('manufactures', 'products.man_id', '=', 'manufactures.man_id')
                                ->select('products.*', 'categories.name', 'manufactures.man_name')
                                ->where('products.pub_stat', 1)
                                ->limit(9)
                                ->get();
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
      return view('pages.view_product', compact('categories', 'manufactures', 'product'));
    }

}
