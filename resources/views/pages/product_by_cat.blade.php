@extends('layout')
@section('slider')
@endsection
@section('content')
<h2 class="title text-center">Features Items</h2>
@if($products_by_cat->count() == 0)
  <h1 style="text-align:center; color: red;">Nothing to show in this category</h1>
  <p style="text-align: center; font-size: 30px;"><a href="/">Click here to Go back to home!</a> </p>
@endif
@foreach($products_by_cat as $product)
<div class="col-sm-4">
  <div class="product-image-wrapper">
    <div class="single-products">
        <div class="productinfo text-center">
          <img src="{{ $product->product_image }}" alt="Product Image" />
          <h2>${{ $product->product_price}}</h2>
          <p>{{ $product->short_desc}}</p>
          <a href="{{URL::to('/view_product/'.$product->p_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
        </div>
        <div class="product-overlay">
          <div class="overlay-content">
            <h2>$56</h2>
            <p>Easy Polo Black Edition</p>
            <a href="{{URL::to('/view_product/'.$product->p_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
          </div>
        </div>
    </div>
    <div class="choose">
      <ul class="nav nav-pills nav-justified">
        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
        <li><a href="{{URL::to('/view_product/'.$product->p_id)}}"><i class="fa fa-plus-square"></i>View Item</a></li>
      </ul>
    </div>
  </div>
</div>
@endforeach

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
              <img src="{{asset('frontend/images/home/recommend1.jpg')}}" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>

          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="{{asset('frontend/images/home/recommend2.jpg')}}" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>

          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="{{asset('frontend/images/home/recommend3.jpg')}}" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="col-sm-4">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="{{asset('frontend/images/home/recommend1.jpg')}}" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>

          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="{{asset('frontend/images/home/recommend2.jpg')}}" alt="" />
              <h2>$56</h2>
              <p>Easy Polo Black Edition</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>

          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <img src="{{asset('frontend/images/home/recommend3.jpg')}}" alt="" />
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
