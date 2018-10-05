@extends('layout')
@section('title')
Product Details
@endsection
@section('content')
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div style="height: 300px;"class="view-product">
								<img style="height: 150px;" src="{{ $product->product_image }}" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">

								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img style="height: 80px;" src="{{ $product->product_image }}" alt="" /></a>
										  <a href=""><img style="height: 80px;" src="{{ $product->product_image }}" alt="" /></a>
										  <a href=""><img style="height: 80px;" src="{{ $product->product_image }}" alt="" /></a>
										</div>
										<div class="item">
											<a href=""><img style="height: 80px;" src="{{ $product->product_image }}" alt="" /></a>
										  <a href=""><img style="height: 80px;" src="{{ $product->product_image }}" alt="" /></a>
										  <a href=""><img style="height: 80px;" src="{{ $product->product_image }}" alt="" /></a>
										</div>
										<div class="item">
											<a href=""><img style="height: 80px;" src="{{ $product->product_image }}" alt="" /></a>
										  <a href=""><img style="height: 80px;" src="{{ $product->product_image }}" alt="" /></a>
										  <a href=""><img style="height: 80px;" src="{{ $product->product_image }}" alt="" /></a>
										</div>

									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{ $product->product_name }}</h2>
								<p>Web ID: 1089772</p>
								<img src="{{URL::to('frontend/images/product-details/rating.png') }}" alt="" />
								<span>
									<span>BN {{ $product->product_price }}/=</span>
									<form action="/add_to_cart" method="POST">
										{{ csrf_field() }}
										<label>Quantity:</label>
										<input name="qty" type="text" value="1" />
										<input type="hidden" name="product_id" value="{{ $product->p_id }}">
										<button type="submit" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
									</form>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> {{ $product->man_name }}</p>
                <p><b>Category:</b> {{ $product->name }}</p>
                <p><b>Size:</b> {{ $product->product_size }}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details">
								<p style="background-color: #eff; font-size: 20px;">{{ $product->long_desc }}</p>
							</div>

							<div class="tab-pane fade" id="companyprofile" >
								<?php
									$manName = DB::table('manufactures')
																								->where('man_id', $product->man_id)
																								->first();
									echo '<p style="background-color: #eff; font-size: 20px;">Company Name: '.$manName->man_name.'</p>';
									echo '<p style="background-color: #eff; font-size: 20px;">'.$manName->man_desc.'</p>';
								?>
							</div>

							<div class="tab-pane fade" id="tag" >
								Tags***************
							</div>

							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>

									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>

						</div>
					</div><!--/category-tab-->
				</div>
			</div>
		</div>
	</section>
@endsection
