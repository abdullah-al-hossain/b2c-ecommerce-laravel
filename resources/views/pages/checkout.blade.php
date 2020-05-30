@extends('layout')
@section('title')
Checkout
@endsection
@section('content')
<?php
class BanglaConverter {
  public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
  public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

  public static function bn2en($number) {
      return str_replace(self::$bn, self::$en, $number);
  }

  public static function en2bn($number) {
      return str_replace(self::$en, self::$bn, $number);
  }
}
 ?>
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
              <form method="POST" action="{{url('/save_shipping_details')}}" onsubmit="return validation()">
                {{ csrf_field() }}                
                <input type="email" placeholder="Email*" name="shipping_email" id="email"/>
                <span id="emailerror" class="text-danger font-weight-bold"></span>

                <input type="text" placeholder="First Name *" name="shipping_first_name" id="fname">
                <span id="fnameerror" class="text-danger font-weight-bold"></span>

                <input type="text" placeholder="Last Name *" name="shipping_last_name" id="lname">
                <span id="lnameerror" class="text-danger font-weight-bold"></span>

                <input type="text" placeholder="Address*" name="shipping_address" id="address">
                <span id="addresserror" class="text-danger font-weight-bold"></span>                

                <input type="text" placeholder="Mobile No.*" name="shipping_mobile" id="mobile">
                <span id="mobileerror" class="text-danger font-weight-bold"></span>

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

<script type="text/javascript">
  function validation() { 

    var email = document.getElementById('email').value;
    var mobile = document.getElementById('mobile').value;
    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;
    var address = document.getElementById('address').value;
      
    var emailcheck = /^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
    var mobilecheck = /^[0][1][0-9]{9}$/;

    
    if (emailcheck.test(email)) {
      document.getElementById('emailerror').innerHTML = "";
    } else {
      document.getElementById('emailerror').innerHTML = "** Email is Invalid";
      
      return false;
    }

    if (fname != '') {
      document.getElementById('fnameerror').innerHTML = "";
    } else {
      document.getElementById('fnameerror').innerHTML = "** First name can't be empty";
      
      return false;
    } 

    if (lname != '') {
      document.getElementById('lnameerror').innerHTML = "";
    } else {
      document.getElementById('lnameerror').innerHTML = "** Last name can't be empty";
      
      return false;
    }

    if (address != '') {
      document.getElementById('addresserror').innerHTML = "";
    } else {
      document.getElementById('addresserror').innerHTML = "** Address can't be empty";
      
      return false;
    } 

    if (mobilecheck.test(mobile)) {
      document.getElementById('mobileerror').innerHTML = " ";
    } else {
      document.getElementById('mobileerror').innerHTML = "** Mobile number is Invalid";
      
      return false;
    }    

  }
</script>


@endsection
