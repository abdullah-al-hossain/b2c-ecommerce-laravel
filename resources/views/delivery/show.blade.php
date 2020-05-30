@extends('layout')
@section('title')
Delivery Man Details
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
								<div class="tile" data-scale="1.5" data-image="/{{ $product->product_image }}"></div>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2>{{ $product->product_name }}</h2>
								<p>Delivery Man ID: {{ $product->p_id }}</p>
								<p><b>Availability:</b> Available</p>
                <p><b>Description:</b> {!! $product->desc !!}</p>
                <p><b>Area:</b> {{ ucfirst($product->area) }}</p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
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
