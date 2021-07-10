@extends('layout')
@section('title')
Product Details
@endsection
<style type="text/css">
  .review {
    background: #ccc;
    margin-bottom: 20px;
  }
  .tiles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  .tile {
    position: relative;
    overflow: hidden;
    height: 250px;
    width: auto;
    cursor: zoom-in;
  }

  .photo {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }

</style>
@section('content')
<?php
use Carbon\Carbon;

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
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div style=" width: 100%;"class="view-product">
								<div class="tile" data-scale="1.5" data-image="{{ my_asset($product->product_image) }}"></div>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">

								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										@if($product->product_image1 == NULL)
											<img style="height: 80px;" src="{{ my_asset('/image/prod_surroun_images/prod_default.jpg') }}" alt="" />
										@else
										  <a href="{{ $product->product_image1 }}" data-lightbox="gal"><img style="height: 80px;" src="{{ my_asset($product->product_image1) }}" alt="" /></a>
										@endif


										@if($product->product_image2 == NULL)

										@else
										  <a href="{{ $product->product_image2 }}" data-lightbox="gal"><img style="height: 80px;" src="{{ my_asset($product->product_image2) }}" alt="" /></a>
										@endif

										 @if($product->product_image3 == NULL)

										@else
										  <a href="{{ $product->product_image3 }}" data-lightbox="gal"><img style="height: 80px;" src="{{ my_asset($product->product_image3) }}" alt="" /></a>
										@endif
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
								<h2>{{ $product->product_name }}</h2>
								<p>Product ID: {{ $product->p_id }}</p>
								<img src="{{URL::to('frontend/images/product-details/rating.png') }}" alt=""/>
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
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews ( {{$r_count}} )</a></li>
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
                  <p><b>Write Your Review</b></p>

									<form action="/reviews" method="post">
                    {{ csrf_field() }}
										<span>
											<input name="uid" type="hidden" value="{{ Session::get('user_id')}}"/>
											<input name="p_id" type="hidden" value="{{ $product->p_id }}"/>
										</span>
										<textarea name="review"></textarea>
										<button type="submit" class="btn btn-default pull-right">
											Submit
										</button>
									</form><br><br>
                  @foreach($reviews as $review)
                  <div class="review">
									<ul style="background: #333; padding:10px;">
										<li><a href=""><i class="fa fa-user"></i><span style="color: #fff;">{{ $review->name }}</span></a></li>
										<li><a href=""><i class="fa fa-clock-o"></i><span style="color: #fff;">{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans(Carbon::now()) }}</span></a></li>
                    @if($review->uid == Session::get('user_id'))
                    <li class="pull-right">
                      <a href='/del_review/{{ $review->id }}/{{ $product->p_id }}' id="delete" style="color:#DC3545!important;"><i class="fa fa-trash" style="color:#DC3545!important;"></i>Delete</a>
                    </li>
                    <li class="pull-right">
                      <a data-toggle="modal" data-target="#edit{{ $review->id }}" href='/edit_review/{{ $review->id }}/{{ $product->p_id }}'><i class="fa fa-edit"></i>Edit</a>
                    </li>
                    <div class="modal fade" id="edit{{ $review->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-edit"></i>&nbsp;Edit</h5>
                      <button type="button" class="pull-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="/review_update" method="POST">
                      {{ csrf_field() }}
                      <div class="modal-body">
                          <div class="form-group">
                              <input type="hidden" name="review_id" value="{{ $review->id }}" />
                              <input type="hidden" name="p_id" value="{{ $product->p_id }}" />
                              <label for="first_name">Review:<span class="required"></span></label>
                              <textarea placeholder="First Name" id="first_name" name="review" spellcheck="false" class="form-control">{{ $review->review }}</textarea>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset All Info</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>

                            </form>
                          </div>
                        </div>
                      </div>
                    @endif
									</ul>
									<p>{{ $review->review }}</p>
                  </div>
                  @endforeach
								</div>
							</div>
						</div>
					</div><!--/category-tab-->
				</div>
			</div>
		</div>
	</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">

  $('.tile')
    // tile mouse actions
    .on('mouseover', function(){
      $(this).children('.photo').css({'transform': 'scale('+ $(this).attr('data-scale') +')'});
    })
    .on('mouseout', function(){
      $(this).children('.photo').css({'transform': 'scale(1)'});
    })
    .on('mousemove', function(e){
      $(this).children('.photo').css({'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +'%'});
    })
    // tiles set up
    .each(function(){
      $(this)
        // add a photo container
        .append('<div class="photo"></div>')
        // some text just to show zoom level on current item in this example

        // set up a background image for each tile based on data-image attribute
        .children('.photo').css({'background-image': 'url('+ $(this).attr('data-image') +')'});
    })

</script>

@endsection
