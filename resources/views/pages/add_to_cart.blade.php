@extends('layout')
@section('title')
Cart
@endsection
@section('content')
<section id="cart_items">
  <div class="container col-sm-12">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Shopping Cart</li>
      </ol>
    </div>
    <div class="table-responsive cart_info">
      <?php
          $contents = Cart::content();
          // We need this to check if the user is logged in or not
          $user_id = Session::get('user_id');
      ?>
      <table class="table table-condensed">
        <thead>
          <tr class="cart_menu">
            <td class="image">Image</td>
            <td class="description">Name</td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td>Action</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
          @foreach($contents as $content)
          <tr>
            <td class="cart_product">
              <a href=""><img src="{{ $content->options->image}}" alt="" height="80px" width="80px"></a>
            </td>
            <td class="cart_description">
              <h4><a href="">{{ $content->name }}</a></h4>
              <p>Web ID: 1089772</p>
            </td>
            <td class="cart_price">
              <p>{{ $content->price }}/=</p>
            </td>
            <td class="cart_quantity">
              <div class="cart_quantity_button">
                <form class="" action="{{url('update_cart')}}" method="POST">
                  {{ csrf_field() }}
                    <input style="width: 100px;" type="number" name="qty" value="{{ $content->qty }}">
                    <input type="hidden" name="rowId" value="{{ $content->rowId }}">
                    <input type="submit" name="submit" value="update" class="btn btn-sm btn-default">
                </form>

              </div>
            </td>
            <td class="cart_total">
              <p class="cart_total_price">{{ $content->total }}</p>
            </td>
            <td class="cart_delete">
              <a class="cart_quantity_delete" href="{{URL::to('/delete_cart_item/'.$content->rowId)}}"><i class="fa fa-times"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section> <!--/#cart_items-->

<section id="do_action">
  <div class="container">
    <div class="heading">
      <h3>What would you like to do next?</h3>
      <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <!-- <div class="chose_area">
          <ul class="user_option">
            <li>
              <input type="checkbox">
              <label>Use Coupon Code</label>
            </li>
            <li>
              <input type="checkbox">
              <label>Use Gift Voucher</label>
            </li>
            <li>
              <input type="checkbox">
              <label>Estimate Shipping & Taxes</label>
            </li>
          </ul>
          <ul class="user_info">
            <li class="single_field">
              <label>Country:</label>
              <select>
                <option>United States</option>
                <option>Bangladesh</option>
                <option>UK</option>
                <option>India</option>
                <option>Pakistan</option>
                <option>Ucrane</option>
                <option>Canada</option>
                <option>Dubai</option>
              </select>

            </li>
            <li class="single_field">
              <label>Region / State:</label>
              <select>
                <option>Select</option>
                <option>Dhaka</option>
                <option>London</option>
                <option>Dillih</option>
                <option>Lahore</option>
                <option>Alaska</option>
                <option>Canada</option>
                <option>Dubai</option>
              </select>

            </li>
            <li class="single_field zip-field">
              <label>Zip Code:</label>
              <input type="text">
            </li>
          </ul>
          <a class="btn btn-default update" href="">Get Quotes</a>
          <a class="btn btn-default check_out" href="">Continue</a>
        </div> -->
      </div>
      <div class="col-sm-8">
        <div class="total_area">
          <ul>
            <li>Cart Sub Total <span>{{ Cart::subtotal() }}</span></li>
            <li>Eco Tax <span>{{ Cart::tax() }}</span></li>
            <li>Shipping Cost <span>Free</span></li>
            <li>Total <span>{{ Cart::total() }}</span></li>
          </ul>
            @if($user_id == NULL)
            <a class="btn btn-default check_out" href="{{URL::to('/login_check')}}">Check Out</a>
            @else
            <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
            @endif
            <a class="btn btn-default check_out" href="{{URL::to('/')}}">Shop more</a>
        </div>
      </div>
    </div>
  </div>
</section><!--/#do_action-->


@endsection
