@extends('layout')
@section('title')
Checkout
@endsection
@section('content')
<section id="cart_items">
  <div class="container">
    <div class="register-req">
      <p>Fill up the form</p>
    </div><!--/register-req-->

    <div class="shopper-informations">
      <div class="row">
        <div class="col-sm-12 clearfix">
          <div class="bill-to">
            <p>Shipping Details</p>
            <div class="form-one">
              <form method="POST" action="{{url('/save_shipping_details')}}">
                {{ csrf_field() }}
                <input type="text" placeholder="Email*" name="shipping_email">
                <input type="text" placeholder="First Name *" name="shipping_first_name">
                <input type="text" placeholder="Last Name *" name="shipping_last_name">
                <input type="text" placeholder="Address*" name="shipping_address">
                <input type="text" placeholder="Mobile No.*" name="shipping_mobile">
                <input type="text" placeholder="City*" name="shipping_city">
                <input type="submit" class="btn btn-default" value="Submit">
              </form>
            </div>
            <!-- <div class="form-two">
              <form method="POST" action="">
                <input type="text" placeholder="Zip / Postal Code *">
                <select>
                  <option>-- Country --</option>
                  <option>United States</option>
                  <option>Bangladesh</option>
                  <option>UK</option>
                  <option>India</option>
                  <option>Pakistan</option>
                  <option>Ucrane</option>
                  <option>Canada</option>
                  <option>Dubai</option>
                </select>
                <select>
                  <option>-- State / Province / Region --</option>
                  <option>United States</option>
                  <option>Bangladesh</option>
                  <option>UK</option>
                  <option>India</option>
                  <option>Pakistan</option>
                  <option>Ucrane</option>
                  <option>Canada</option>
                  <option>Dubai</option>
                </select>
                <input type="password" placeholder="Confirm password">
                <input type="text" placeholder="Phone *">
                <input type="text" placeholder="Mobile Phone">
                <input type="text" placeholder="Fax">
              </form>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section> <!--/#cart_items-->



@endsection
