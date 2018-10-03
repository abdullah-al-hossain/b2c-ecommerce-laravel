<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
      @yield('title')
    </title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
  <style media="screen">
    body {
      background: #fff;
    }
  </style>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
  <?php
  // We need this to check if the user is logged in or not
        $user_id = Session::get('user_id');
        $shipping_id = Session::get('shipping_id');
        $page = Session::get('page');

        $socials = DB::table('socials')
        ->get();
        foreach ($socials as $social) {
          if ($social->social_name == 'Facebook') {
            $fblink = $social->social_link;
          } elseif($social->social_name == 'Twitter') {
            $twlink = $social->social_link;
          } elseif ($social->social_name == 'LinkedIn') {
            $ldlink = $social->social_link;
          } elseif ($social->social_name == 'GooglePlus') {
            $gplink = $social->social_link;
          }
        }
   ?>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i>+8801533609794</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> hello@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{ $fblink }}"><i class="fa fa-facebook"></i></a></li>
								<li><a href="{{ $twlink }}"><i class="fa fa-twitter"></i></a></li>
								<li><a href="{{ $ldlink}}"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="{{ $gplink }}"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left" style="color: #45645e;">
              <!-- <a href=""><b>ECommerce</b> <br/> <b>Website</b></a> -->

							<a href="/"><img src="frontend/images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<!-- <div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>

							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div> -->
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                @if(Session::get('user_id') != null)
								<li><a href="{{URL::to('/user_account')}}"><i class="fa fa-user"></i> Account</a></li>
                @endif
								<li><a
                  @if($page == 'cart')
                  style="background: #666; color:white; padding:0 10px; border-radius: 5px;"
                  {{ Session::forget('page') }}
                  @endif
                href="/show_cart"><i class="fa fa-shopping-cart"></i> Cart
                  @if( Cart::count() > 0)
                  <span class="badge badge-primary">{{ Cart::count() }}</span>
                  @endif
                </a></li>
                @if($user_id == NULL)
                <li><a href="{{URL::to('/login_check')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a
                  @if($page == 'login')
                  style="background: #666; color:white; padding:0 10px; border-radius: 5px;"
                  {{ Session::forget('page') }}
                  @endif
                href="/login_check"><i class="fa fa-lock"></i>Login</a></li>
                @else
                  @if($shipping_id == NULL)
								          <li><a
                            @if($page == 'checkout')
                            style="background: #666; color:white; padding:0 10px; border-radius: 5px;"
                            {{ Session::forget('page') }}
                            @endif
                            href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                  @else
                          <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                  @endif
                      <li><a href="{{URL::to('/user_logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                @endif
							</ul>
						</div>
					</div>
				</div>
        <?php
          $message = Session::get('message');
          if ($message) {
              if($message == 'hcash' || $message == 'ppal' || $message == 'bkash'){
                  echo '<div class="alert alert-dismissable alert-success" style="overflow: hidden; ">
                      <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                      </button>You purchase request by '.'<span style="font-size: 20px; color: red;"><b>'.$message.'</b></span>
                  We will send you further notification through email
                  or the mobile number you provided us with.Thank you for being with us!';
              } else {
                echo '<div class="alert alert-dismissable alert-warning" style="overflow: hidden; ">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                      <span aria-hidden="true">&times;</span>
                    </button>'.$message;
              }

            Session::put('message', null);
            echo "</div>";
          }

         ?>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="/" class="active">Home</a></li>

								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="#">Blog List</a></li>
										<li><a href="#">Blog Single</a></li>
                                    </ul>
                                </li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
              <form action="/search_products" method="POST">
                {{ csrf_field() }}
                <input type="text" name="name" placeholder="Search Products ...">
                <button type="submit" class="btn btn-default" style="outline-style: none;"><span class="glyphicon glyphicon-search"></span></button>
              </form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
              @foreach($categories as $category)
              @if($category->pub_stat == 1)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{ URL::to('/product_by_cat/'.$category->category_id) }}">{{ $category->name }}</a></h4>
								</div>
							</div>
              @endif
							@endforeach
						</div><!--/category-products-->
						<div class="brands_products"><!--brands_products-->
							<h2>Manufacturers</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
                  @foreach($manufactures as $manufacture)
									<li><a href="{{ URL::to('/product_by_man/'.$manufacture->man_id) }}">{{ $manufacture->man_name }}</a></li>
                  @endforeach
								</ul>
							</div>
						</div><!--/brands_products-->

						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
                <form class="" action="products_by_range" method="post">
                  {{ csrf_field() }}
                  <!-- <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br /> -->
                  From $<input type="number" name="from" style="width: 90px;"><br> <br>To $<input type="number" name="to" style="width: 90px;">
                  <br> <input class="btn btn-default" type="submit" value="Submit" style="margin-top: 15px;">
                </form>

							</div>
						</div><!--/price-range-->

						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->

					</div>
				</div>

				<div class="col-sm-9 padding-right">
          <div id="content" class="span10">
          </div><!--/.fluid-container-->
            @yield('slider')
					<div class="features_items"><!--features_items-->
            @yield('content')
          </div>
				</div>
			</div>
		</div>
	</section>

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('frontend/images/home/iframe1.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('frontend/images/home/iframe2.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('frontend/images/home/iframe3.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('frontend/images/home/iframe4.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{asset('frontend/images/home/map.png')}}" alt="" />
							<p>CUET, Raojan, Chittogong, Bangladesh</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->



    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>
