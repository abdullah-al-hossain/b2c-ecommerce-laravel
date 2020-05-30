<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <title>
      @yield('title')
    </title>
    <link rel="icon" href="{{ asset('frontend/images/home/logo.png') }}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link href="{{asset('frontend/css/lightbox.min.css')}}" rel="stylesheet">
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

    .boun {
      -moz-animation: bounce 3s infinite linear;
      -o-animation: bounce 3s infinite linear;
      -webkit-animation: bounce 3s infinite linear;
      animation: bounce 3s infinite linear;
    }

    @-webkit-keyframes boun {
      0% { top: 150px; }
      50% { top: 115px; }
      70% { top: 110px; }

    }
    @-moz-keyframes boun {
        0% { top: 115px; }
        50% { top: 115px; }
        70% { top: 110px; }

      }
    @-o-keyframes boun {
        0% { top: 115px; }
        50% { top: 115px; }
        70% { top: 110px; }

      }
    @-ms-keyframes boun {
        0% { top: 115px; }
        50% { top: 115px; }
        70% { top: 110px; }

      }
    @keyframes boun {
      0% { top: 115px; }
      50% { top: 115px; }
      70% { top: 120px; }

    }
    .icon-bar {
      position: fixed;
      top: 50%;
      -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
      z-index: 10000;
      display: none;
    }

    div.ham {
        width: 25px;
        height: 1px;
        background-color: white;
        padding: 0px;
        margin: 4px 0;
    }

    /* Style the icon bar links */
    .icon-bar a {
      display: block;
      text-align: center;
      padding: 16px;
      transition: all 0.3s ease;
      color: white;
      font-size: 20px;
      }

      /* Style the social media icons with color, if you want */
      .icon-bar a:hover {
        background-color: #000;
      }

      .facebook {
        background: #3B5998;
        color: white;
      }

      .twitter {
        background: #55ACEE;
        color: white;
      }

      .google {
        background: #dd4b39;
        color: white;
      }

      .linkedin {
        background: #007bb5;
        color: white;
      }

      .youtube {
        background: #bb0000;
        color: white;
      }

      @media (max-width: 600px) {
        .prod {
          width: 50%;
        }
      }

      @media (max-width: 450px) {
        .prod {
          width: 70%;
          display: inline;
          margin: 0px 15%;
        }

        .shop-menu ul.nav li {
          width: 100%;
          text-align: center;
        }
      }

      @media (max-width: 400px) {
        .prod {
          width: 80%;
          display: block;
          margin: 0px 10%;
        }
      }

      @media (max-width: 350px) {
        .prod {
          width: 95%;
          display: block;
          margin: 0px 2.5%;
        }
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- The social media icon bar -->
  <div class="icon-bar" id="social">
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
    <a href="{{ $fblink }}" class="facebook"><i class="fa fa-facebook"></i></a>
    <a href="{{ $twlink }}" class="twitter"><i class="fa fa-twitter"></i></a>
    <a href="{{ $gplink }}" class="google"><i class="fa fa-google"></i></a>
    <a href="{{ $ldlink}}" class="linkedin"><i class="fa fa-linkedin"></i></a>
    <a href="https://www.youtube.com" class="youtube"><i class="fa fa-youtube"></i></a>

  </div>

  <button style="position: fixed; top:120px; left:-5px; z-index: 20000; background: #999;" class="btn btn-default boun" type="button" name="button" id="menu-toggle">></button>

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

							<a href="/"><img src="{{ URL::asset('frontend/images/home/logo.png') }}" alt="" style="width:70px; height: 70px;"/><span style="font-size: 20px;"><i><b>Bayyeenah</b></i></span></a>
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
                  @if(Session::get('user_image'))
  								<li><a href="{{URL::to('/user_account')}}"><img src="/image/user_images/<?php echo Session::get('user_image'); ?>" style="width: 25px; height: 25px; border-radius: 50%; box-shadow: 2px 2px 10px 3px; margin-right:5px;" /> <b>প্রোফাইল</b>&nbsp;&nbsp; ।</a></li>
                  @else
                  <li><a href="{{URL::to('/user_account')}}"><img src="/image/user_images/default.jpg" style="width: 25px; height: 25px; border-radius: 50%;" /> <b>প্রোফাইল</b>&nbsp;&nbsp; ।</a></li>
                  @endif
                @endif
								<li><a
                  @if($page == 'cart')
                  style="background: #666; color:white; padding:0 10px; border-radius: 5px;"
                  {{ Session::forget('page') }}
                  @endif
                href="/show_cart"><i class="fa fa-shopping-cart"></i> <b>আপনার ঝুড়ি</b> &nbsp;&nbsp;।
                  @if( Cart::count() > 0)
                  <span class="badge badge-primary">{{ Cart::count() }}</span>
                  @endif
                </a></li>
                @if($user_id == NULL)
                <li><a href="{{URL::to('/login_check')}}"><i class="fa fa-crosshairs"></i> <b>অর্ডার কনফার্ম করুন</b>&nbsp;&nbsp;।</a></li>
								<li><a
                  @if($page == 'login')
                  style="background: #666; color:white; padding:0 10px; border-radius: 5px;"
                  {{ Session::forget('page') }}
                  @endif
                href="/login_check"><i class="fa fa-lock"></i><b>লগ ইন</b></a></li>
                @else
                  @if($shipping_id == NULL)
								          <li><a
                            @if($page == 'checkout')
                            style="background: #666; color:white; padding:0 10px; border-radius: 5px;"
                            {{ Session::forget('page') }}
                            @endif
                            href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> <b>অর্ডার কনফার্ম করুন ।</b></a></li>
                  @else
                          <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> <b>অর্ডার কনফার্ম করুন ।</b></a></li>
                  @endif
                      <li><a href="{{URL::to('/user_logout')}}"><i class="fa fa-lock"></i> <b>লগ আউট</b></a></li>
                @endif
							</ul>
						</div>
					</div>
				</div>
        <?php
          $message = Session::get('message');
          if ($message) {
              if($message == 'hcash' || $message == 'ppal' || $message == 'bkash'){
                  echo '<div class="alert alert-dismissable alert-success" style="overflow: hidden; text-align: center;">
                      <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                      </button>You purchase request by '.'<span style="font-size: 20px; color: red;"><b>'.$message.'</b></span>
                  We will send you further notification through email
                  or the mobile number you provided us with.Thank you for being with us!';
              } else {
                echo '<div class="alert alert-dismissable alert-warning" style="overflow: hidden; text-align: center; font-size: 24px;">
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
						<div class="col-sm-9 navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<div class="ham"></div>
                <div class="ham"></div>
                <div class="ham"></div>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="/" class="active">হোম ।</a></li>
                <li class="dropdown"><a href="#">প্রকাশনীসমূহ<i class="fa fa-angle-down"></i> ।</a>
                    <ul role="menu" class="sub-menu">
                      @foreach($manufactures as $manufacture)
                        <li><a href="{{ URL::to('/product_by_man/'.$manufacture->man_id) }}">{{ $manufacture->man_name }}</a></li>
                      @endforeach
                    </ul>
                </li>
                <li><a href="/delivery_man">ডেলিভারি ম্যান</a></li>
							</ul>
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
						<h2>ক্যাটাগরি</h2>
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

						<div class="price-range"><!--price-range-->
							<h2>আপনার মূল্যসীমা</h2>
							<div class="well text-center">
                <form class="" action="{{ URL::to('products_by_range') }}" method="POST">
                  {{ csrf_field() }}
                   <!--<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br /> -->
                  এত থেকে <input type="number" name="from" style="width: 90px;"> /=<br> <br>এত <input type="number" name="to" style="width: 90px;"> /=
                  <br> <input class="btn btn-default" type="submit" value="Submit" style="margin-top: 15px;">
                </form>

							</div>
						</div><!--/price-range-->

					</div>
				</div>

				<div class="col-sm-9 col-xs-12 col-md-9 padding-right">
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

	<footer id="footer">

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2018 Abdullah</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="https://www.facebook.com/abdullah.hossain.52090">Abdullah</a></span></p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->
  <script type="text/javascript">
    $(document).ready(function() {
      $("#menu-toggle").click(function() {
        $("#social").toggle();
      });
    });
  </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="{{asset('frontend/js/lightbox-plus-jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
      baguetteBox.run('.tz-gallery');
    </script>
    <script type="text/javascript" src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js')}}">
    </script>
    <script type="text/javascript">
      $(document).on("click", "#delete", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");

        bootbox.confirm("Do you want to delete this review?", function(confirmed){
          if (confirmed) {
            window.location.href = link;
          };
        });
      });
    </script>
</body>
</html>
