<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacture;
use App\Product;

class HomeController extends Controller
{
    public function index()
    {
      $products = Product::all()->where('pub_stat', '=' , 1);
      $categories = Category::all();
      $manufactures = Manufacture::all();
      return view('pages.home_content', compact('categories', 'manufactures', 'products'));
    }


}
