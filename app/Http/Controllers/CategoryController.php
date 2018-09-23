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
      $categories = Category::all();

      //return $categories;
      return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
      return view('admin.categories.add_category');
    }

    // Store item *******************

    public function store(Request $request)
    {

      $category = array();
      $category['name'] = $request->category_name;
      $category['description'] = $request->category_description;

      if ($request->publication_status == 'on' || $request->publication_status == 1) {
          $category['publication_status'] = 1;
      } else {
        $category['publication_status'] = 0;
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
      $category = Category::where('category_id', $category_id)->first();
      return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $categoryUpdate = Category::where('category_id', $request->category_id);

        if ($request->publication_status == null) {
          $publication_status = 0;
        } else {
          $publication_status = 1;
        }

        //return $publication_status;
        $categoryUpdate->update([
            'name' => $request->input('category_name'),
            'description' => $request->input('category_description'),
            'publication_status' => $publication_status,
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
      $categoryUpdate = Category::where('category_id', $request->category_id);

      //return $categoryUpdate->publication_status;

      if ($request->publication_status == 1) {
        $publication_status = 0;
      } else {
        $publication_status = 1;
      }

      //return $publication_status;
      $categoryUpdate->update([
          'publication_status' => $publication_status,
      ]);

      if ($categoryUpdate) {
          Session::put('message', 'Publication status updated successfully!!');
      } else {
          Session::put('message', 'Category was not updated!!');
      }

      return Redirect::to('/all_cat');
    }

    // Delete item *******************

    public function delete($category_id)
    {
      //return 'hello';
      if (DB::table('categories')->where('category_id', '=', $category_id)->delete()) {
          Session::put('message', 'Category deleted successfully!!');
      } else {
          Session::put('message', 'Category was not deleted check again or try again!!');
      }

      return Redirect::to('/all_cat');
    }
}
