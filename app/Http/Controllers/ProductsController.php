<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
use Image;
session_start();


class ProductsController extends Controller
{
  public function index()
  {
    $this->AdminAuthCheck();
    $products = Product::all();
    return view('admin.products.index', compact('products'));
  }

  public function create()
  {
    $this->AdminAuthCheck();
    return view('admin.products.add_product');
  }

  public function store(Request $request)
  {
    $this->AdminAuthCheck();
    $data = array();

    $data['product_name'] = $request->product_name;
    $data['category_id'] = $request->category_id;
    $data['man_id'] = $request->man_id;
    $data['short_desc'] = $request->product_short_desc;
    $data['long_desc'] = $request->product_long_desc;
    $data['product_price'] = $request->product_price;
    $data['product_size'] = $request->product_size;
    $data['product_color'] = $request->product_color;
    if ($request->publication_status == 'on' || $request->publication_status == 1) {
        $pub_stat = 1;
    } else {
        $pub_stat = 0;
    }

    $data['pub_stat'] = $pub_stat;

    if ($request->hasFile('product_image1')) {
      $image = $request->file('product_image1');
      $filename = time().'1.'.$image->getClientOriginalExtension();
      $success = Image::make($image)->resize(268, 249)->save( public_path('/image/prod_surroun_images/'.$filename));
      $image_url = '/image/prod_surroun_images/'.$filename;
      if ($success) {
        $data['product_image1'] = $image_url;
      }
    }

    if ($request->hasFile('product_image2')) {
      $image = $request->file('product_image2');
      $filename = time().'2.'.$image->getClientOriginalExtension();
      $success = Image::make($image)->resize(268, 249)->save( public_path('/image/prod_surroun_images/'.$filename));
      $image_url = '/image/prod_surroun_images/'.$filename;
      if ($success) {
        $data['product_image2'] = $image_url;
      }
    }


    if ($request->hasFile('product_image3')) {
      $image = $request->file('product_image3');
      $filename = time().'3.'.$image->getClientOriginalExtension();
      $success = Image::make($image)->resize(268, 249)->save( public_path('/image/prod_surroun_images/'.$filename));
      $image_url = '/image/prod_surroun_images/'.$filename;
      if ($success) {
        $data['product_image3'] = $image_url;
      }
    }

    if ($request->hasFile('product_image')) {
      $image = $request->file('product_image');
      $filename = time().'.'.$image->getClientOriginalExtension();
      $success = Image::make($image)->resize(268, 249)->save( public_path('/image/products/'.$filename));
      $image_url = '/image/products/'.$filename;
      if ($success) {
        $data['product_image'] = $image_url;

        DB::table('products')->insert($data);
        Session::put('message', 'Product Added successfully!');
        return Redirect::to('/add_product');
      }
    }

    $data['product_image'] =
                  DB::table('products')->insert($data);
                  Session::put('message', 'Product Added successfully without any image!!');
                  return Redirect::to('/all_products');

  }





  // ***************************
  public function edit($p_id)
  {
    $this->AdminAuthCheck();
    $product = Product::where('p_id', $p_id)->first();
    return view('admin.products.edit', compact('product'));
  }

  //**********************************

  public function update(Request $request)
  {
      $this->AdminAuthCheck();
      $prodUpdate = Product::where('p_id', $request->p_id);

      if ($request->pub_stat == NULL) {
        $pub_stat = 0;
      } else {
        $pub_stat = 1;
      }

      $prodUpdate->update([
          'product_name' => $request->input('product_name'),
          'category_id' => $request->input('category_id'),
          'man_id' => $request->input('man_id'),
          'short_desc' => $request->input('product_short_desc'),
          'long_desc' => $request->input('product_long_desc'),
          'product_price' => $request->input('product_price'),
          'product_size' => $request->input('product_size'),
          'product_color' => $request->input('product_color'),
          'pub_stat' => $pub_stat,
      ]);


      if ($prodUpdate) {
          Session::put('message', 'Product updated successfully!!');
      } else {
          Session::put('message', 'Product was not updated!!');
      }

      return Redirect::to('/all_products');
  }

  //*************************************

  public function public_status(Request $request)
  {
    $this->AdminAuthCheck();
    $productUpdate = Product::where('p_id', $request->product_id);

    if ($request->publication_status == 1) {
      $pub_stat = 0;
    } else {
      $pub_stat = 1;
    }

    $productUpdate->update([
        'pub_stat' => $pub_stat,
    ]);

    if ($productUpdate) {
        Session::put('message', 'Publication status of product updated successfully!!');
    } else {
        Session::put('message', 'Publication status of product was not updated!!');
    }

    return Redirect::to('/all_products');
  }

  public function delete($product_id)
  {
    $this->AdminAuthCheck();
    //return 'hello';
    if (DB::table('products')->where('p_id', '=', $product_id)->delete()) {
        Session::put('message', 'Product deleted successfully!!');
    } else {
        Session::put('message', 'Product was not deleted check again or try again!!');
    }

    return Redirect::to('/all_products');
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

  /// For API  

  // public function apiupdate(Request $request, Article $article)
  // {
  //     $article->update($request->all());

  //     return response()->json($article, 200);
  // }

  // public function delete(Article $article)
  // {
  //     $article->delete();

  //     return response()->json(null, 204);
  // }
}
