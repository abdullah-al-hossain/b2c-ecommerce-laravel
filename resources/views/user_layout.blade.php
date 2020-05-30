<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="frontend/css/profile.css">
<title>User's Profile</title>
<!------ Include the above in your HEAD tag ---------->
</head>
<?php
  $user_image = $u_info->user_image;
  $uid = Session::get('user_id');

  $confirm = DB::table('orders')->where('order_status', 'confirmed')
                                ->where('uid', $uid)
                                ->get();


  $pending = DB::table('orders')->where('order_status', 'pending')
                                ->where('uid', $uid)
                                ->get();

  $canceled = DB::table('orders')->where('order_status', 'canceled')
                                ->where('uid', $uid)
                                ->get();



?>
<body>

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/> -->
                            <img src="image\user_images\<?php echo $user_image; ?>" alt="no IMAGE" style="width:235px; height: 240px;"/>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <form action="/edit_user_profile" method="GET">
                                        {{ csrf_field() }}
                                        <a href="/edit_user_profile" class="btn btn-default">Edit Profile</a>
                                    </form>
                                    <div style="overflow: hidden;">
                                      <a class="btn btn-default" href="{{URL::to('/')}}"><i class="fa fa-lock"></i> Home</a>
                                    </div>
                                    <div style="overflow: hidden;">
                                      <a class="btn btn-default" href="{{URL::to('/user_logout')}}"><i class="fa fa-lock"></i> Logout</a>
                                    </div>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">

                            <p>You orders</p>
                            <a href="/user_confirmed_orders">Confirmed<span class="badge badge-success" style="padding: 7px; font-size: 13px">{{ count($confirm) }}</span></a><br/>
                            <a href="/pending_orders">Pending<span class="badge badge-info" style="padding: 7px; font-size: 13px">{{ count($pending) }}</span></a><br/>
                            <a href="/canceled_orders">Canceled<span class="badge badge-danger" style="padding: 7px; font-size: 13px">{{ count($canceled) }}</span></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                          @yield('content')

                        </div>
                    </div>
                </div>
            </form>
        </div>


        </body>
</html>
