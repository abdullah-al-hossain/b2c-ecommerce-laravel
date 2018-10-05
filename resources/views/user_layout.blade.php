<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="frontend/css/profile.css">
<title>User's Profile</title>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/> -->
                            <img src="image/user.png" alt="profile image">
                            <div class="file btn btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <form class="" action="index.html" method="post">
                                        <a href="#"><input class="btn btn-default" type="submit" name="btnAddMore" value="Edit Profile"/></a>
                                    </form>
                                    <div style="overflow: hidden;">
                                      <a class="btn btn-default" href="{{URL::to('/')}}"><i class="fa fa-lock"></i> Home</a>
                                    </div>
                                    <div style="overflow: hidden;">
                                      <a class="btn btn-default" href="{{URL::to('/user_logout')}}"><i class="fa fa-lock"></i> Logout</a>
                                    </div>

                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="" href="/user_account" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="profile-tab" data-toggle="" href="/user_account_timeline" aria-selected="true">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">

                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
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
