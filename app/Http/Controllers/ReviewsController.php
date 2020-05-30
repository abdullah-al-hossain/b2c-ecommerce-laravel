<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
session_start();

class ReviewsController extends Controller
{
  public function store(Request $request)
  {
    $this->UserAuthCheck();
    $review = array();
    $review['review'] = $request->review;
    $review['uid'] = $request->uid;
    $review['p_id'] = $request->p_id;

    DB::table('reviews')->insert($review);
    if ($review) {
        Session::put('message', 'Review added successfully!!');
    } else {
        Session::put('message', 'Review was not added!!');
    }

    return Redirect::to('/view_product/'.$request->p_id);
  }

  public function delete($review_id, $p_id)
  {
    $this->UserAuthCheck();

    if (DB::table('reviews')->where('id', '=', $review_id)->delete()) {
        Session::put('message', 'Review was deleted successfully!!');
    } else {
        Session::put('message', 'Review was not deleted check again or try again!!');
    }

    return Redirect::to('/view_product/'.$p_id);
  }
  public function update(Request $request)
  {
    $this->UserAuthCheck();

    if (DB::table('reviews')->where('id', '=', $request->review_id)->update(array('review' => $request->review))) {
        Session::put('message', 'Review was updated successfully!!');
    } else {
        Session::put('message', 'Review was not updated check again or try again!!');
    }

    return Redirect::to('/view_product/'.$request->p_id);
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
