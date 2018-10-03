<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{

  // THe index function to show all the item********************
    public function index()
    {
      $this->AdminAuthCheck();
      $categories = Category::all();

      //return $categories;
      return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
      $this->AdminAuthCheck();
      return view('admin.categories.add_category');
    }

    // Store item *******************

    public function store(Request $request)
    {
      $this->AdminAuthCheck();
      $category = array();
      $category['name'] = $request->category_name;
      $category['description'] = $request->category_description;

      if ($request->pub_stat == 'on' || $request->pub_stat == 1) {
          $category['pub_stat'] = 1;
      } else {
        $category['pub_stat'] = 0;
      }

      DB::table('categories')->insert($category);
      if ($category) {
          Session::put('message', 'Category added successfully!!');
      } else {
          Session::put('message', 'Category was not added!!');
      }

      return Redirect::to('/all_cat');
    }

    // change category information *******************

    public function edit($category_id)
    {
      $this->AdminAuthCheck();
      $category = Category::where('category_id', $category_id)->first();
      return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $this->AdminAuthCheck();
        $categoryUpdate = Category::where('category_id', $request->category_id);

        if ($request->pub_stat == null) {
          $pub_stat = 0;
        } else {
          $pub_stat = 1;
        }

        //return $pub_stat;
        $categoryUpdate->update([
            'name' => $request->input('category_name'),
            'description' => $request->input('category_description'),
            'pub_stat' => $pub_stat,
        ]);

        if ($categoryUpdate) {
            Session::put('message', 'Category updated successfully!!');
        } else {
            Session::put('message', 'Category was not updated!!');
        }

        return Redirect::to('/all_cat');
    }

    // change publication status of the category *******************

    public function public_status(Request $request)
    {
      $this->AdminAuthCheck();
      $categoryUpdate = Category::where('category_id', $request->category_id);

      //return $categoryUpdate->pub_stat;

      if ($request->pub_stat == 1) {
        $pub_stat = 0;
      } else {
        $pub_stat = 1;
      }

      //return $pub_stat;
      $categoryUpdate->update([
          'pub_stat' => $pub_stat,
      ]);

      if ($categoryUpdate) {
          Session::put('message', 'Publication status updated successfully!!');
      } else {
          Session::put('message', 'Publication Status was not updated!!');
      }

      return Redirect::to('/all_cat');
    }

    // Delete item *******************

    public function delete($category_id)
    {
      $this->AdminAuthCheck();
      //return 'hello';
      if (DB::table('categories')->where('category_id', '=', $category_id)->delete()) {
          Session::put('message', 'Category deleted successfully!!');
      } else {
          Session::put('message', 'Category was not deleted check again or try again!!');
      }

      return Redirect::to('/all_cat');
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
