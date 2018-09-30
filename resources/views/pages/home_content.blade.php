@extends('layout')
@section('title')
Home | E-Shopper
@endsection
@section('slider')
@include('sliders')
@endsection

@section('content')
<h2 class="title text-center">Features Items</h2>
<div class="col-sm-12">
@foreach($products as $product)
<div class="col-sm-4">
  <div class="product-image-wrapper" style="border-radius: 30px; border: 1px solid #888;">
    <div class="single-products" style="border-radius: 30px;">
        <div class="productinfo text-center">
          <img src="{{ $product->product_image }}" alt="Product Image" />
          <h4 style="color: #888; padding:0; margin:0;">{{ $product->product_name }}</h4>
          <h2>${{ $product->product_price }}</h2>
          <p>{{ $product->short_desc}}</p>
          <a href="{{URL::to('/view_product/'.$product->p_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
        </div>
        <div class="product-overlay" style="background: #ccc;">
          <div class="overlay-content">
            <a href="{{URL::to('/view_product/'.$product->p_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>
        </div>
    </div>
    <div class="choose">
      <ul class="nav nav-pills nav-justified" style="background: #ccc;">
        <li><a href="{{URL::to('/view_product/'.$product->p_id)}}" style="color: #fff;"><i class="fa fa-plus-square"></i>Add to cart</a></li>
        <li><a href="{{URL::to('/view_product/'.$product->p_id)}}" style="color: #fff;"><i class="fa fa-plus-square"></i>View Item</a></li>
      </ul>
    </div>
  </div>
</div>
@endforeach
</div>
</div><!--features_items-->

<div class="category-tab"><!--category-tab-->
<div class="col-sm-12">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
    <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
    <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
    <li><a href="#kids" data-toggle="tab">Kids</a></li>
    <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
  </ul>
</div>
<div class="tab-content">
  <div class="tab-pane fade active in" id="tshirt" >
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery1.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery2.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery3.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery4.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="tab-pane fade" id="blazers" >
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery4.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery3.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery2.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery1.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="tab-pane fade" id="sunglass" >
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery3.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery4.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery1.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery2.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="tab-pane fade" id="kids" >
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery1.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery2.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery3.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery4.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="tab-pane fade" id="poloshirt" >
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery2.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery4.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery3.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{asset('frontend/images/home/gallery1.jpg')}}" alt="" />
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
</div><!--/category-tab-->

<div class="recommended_items"><!--recommended_items-->
<h2 class="title text-center">recommended items</h2>
<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="item active">
      <div class="col-sm-4">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="{{asset('frontend/images/home/gallery1.jpg')}}" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
    <i class="fa fa-angle-left"></i>
    </a>
    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
    <i class="fa fa-angle-right"></i>
    </a>
</div>
</div><!--/recommended_items-->

@endsection
