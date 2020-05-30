@extends('layout')
@section('title')
Login
@endsection
@section('content')
<section><!--form-->
  <div class="container">
    <div class="row">
      <div class="col-sm-3 col-sm-offset-1">
        <div class="login-form"><!--login form-->
          <h2>Login to your account</h2>
          <form action="/user_login" method="POST">
            {{ csrf_field() }}
            <input type="email" placeholder="Email Address" name="user_email" required/>
            <input type="password" placeholder="Password" name="user_pwd" required/>
            <span>
              <input type="checkbox" class="checkbox">
              Keep me signed in
            </span>
            <button type="submit" class="btn btn-default">Login</button>
          </form>
        </div><!--/login form-->
      </div>
      <div class="col-sm-1">
        <h2 class="or">OR</h2>
      </div>
      <div class="col-sm-4">
        <div class="signup-form"><!--sign up form-->
          <h2>New User Signup!</h2>
          <form action="{{url('/user_reg')}}" method="POST" onsubmit="return validation()">
            {{ csrf_field() }}
            <input type="text" placeholder="Full Name" name="name" id="username"/>
            <span id="usererror" class="text-danger font-weight-bold"></span>

            <input type="email" placeholder="Email Address" name="email" id="email"/>
            <span id="emailerror" class="text-danger font-weight-bold"></span>

            <input type="password" placeholder="Password" name="password" id="pwd"/>
            <span id="passworderror" class="text-danger font-weight-bold"></span>

            <input type="password" placeholder="Confirm Password" name="cpassword" id="cpwd"/>
            <span id="cpassworderror" class="text-danger font-weight-bold"></span>

            <input type="text" placeholder="Mobile Number" name="mobile" id="mobile" />
            <span id="mobileerror" class="text-danger font-weight-bold"></span>

            <button type="submit" class="btn btn-default">Signup</button>
          </form>
        </div><!--/sign up form-->
      </div>
    </div>
  </div>
</section><!--/form-->


<script type="text/javascript">
  function validation() {
  var username = document.getElementById('username').value;
  var pwd = document.getElementById('pwd').value;
  var cpwd = document.getElementById('cpwd').value;
  var email = document.getElementById('email').value;
  var mobile = document.getElementById('mobile').value;


  var usercheck = /^[A-Za-z. ]{3,30}$/ ;
  var passwordcheck = /^(?=.*[0-9])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
  var emailcheck = /^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
  var mobilecheck = /^[0][1][0-9]{9}$/;

  console.log(pwd.localeCompare('Hello'));


  if (usercheck.test(username)) {
    document.getElementById('usererror').innerHTML = "";
  } else {
    document.getElementById('usererror').innerHTML = "** Username is Invalid";

    return false;
  }


  if (emailcheck.test(email)) {
    document.getElementById('emailerror').innerHTML = "";
  } else {
    document.getElementById('emailerror').innerHTML = "** Email is Invalid";

    return false;
  }

  if (passwordcheck.test(pwd)) {
    document.getElementById('passworderror').innerHTML = "";
  } else {
    document.getElementById('passworderror').innerHTML = "** Password is Invalid";

    return false;
  }

  if (!cpwd.localeCompare(pwd)) {
    document.getElementById('cpassworderror').innerHTML = "";
  } else {
    document.getElementById('cpassworderror').innerHTML = "** Passwords do not match";

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
