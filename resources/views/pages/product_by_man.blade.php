@extends('layout')
@section('slider')
@endsection
@section('content')
<?php
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
<h2 class="title text-center">Features Items</h2>
@if($products_by_man->count() == 0)
  <h1 style="text-align:center; color: red;">Nothing to show in this manufacture</h1>
  <p style="text-align: center; font-size: 30px;"><a href="/">Click here to Go back to home!</a> </p>
@endif
@foreach($products_by_man as $product)
<div class="col-sm-4">
  <div class="product-image-wrapper" style="border-radius: 30px; border: 1px solid #888;">
    <div class="single-products" style="border-radius: 30px;">
        <div class="productinfo text-center">
          <img src="{{ $product->product_image }}" alt="Product Image" />
          <h4 style="color: #888; padding:0; margin:0;">{{ $product->product_name }}</h4>
          <h2>Price: {{ $product->product_price }}/=</h2>
          <hr>
          <p>{{ $product->short_desc}}</p>
          <form action="/add_to_cart" method="POST">
            {{ csrf_field() }}
            <input name="qty" type="hidden" value="1" />
            <input type="hidden" name="product_id" value="{{ $product->p_id }}">
            <button type="submit" class="btn btn-fefault cart">
              <i class="fa fa-shopping-cart"></i>
              Add to cart
            </button>
          </form>
        </div>
        <div class="product-overlay" style="background: #ccc;">
          <div class="overlay-content">
            <img src="{{ $product->product_image }}" alt="Product Image" /><br>
            <h2 style="padding: 0; margin: 0;">{{ $product->product_name }}</h2>
            <h3 style="padding: 0; margin: 0;">${{ $product->product_price }}</h3>
            <form action="/add_to_cart" method="POST">
              {{ csrf_field() }}
              <input name="qty" type="hidden" value="1" />
              <input type="hidden" name="product_id" value="{{ $product->p_id }}">
              <button type="submit" class="btn btn-fefault cart">
                <i class="fa fa-shopping-cart"></i>
                Add to cart
              </button>
            </form>
          </div>
        </div>
    </div>
    <div class="choose">
      <ul class="nav nav-pills nav-justified" style="background: #ccc;">
        <li><a href="{{URL::to('/view_product/'.$product->p_id)}}" style="color: #222;"><i class="fa fa-plus-square"></i>View Item</a></li>
      </ul>
    </div>
  </div>
</div>
@endforeach

</div><!--features_items-->





@endsection
