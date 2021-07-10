
  <div class="product-image-wrapper" style="border-radius: 30px; border: 1px solid #888;">
    <div class="single-products" style="border-radius: 10px;">
        <div class="productinfo text-center">
          <img src="{{ my_asset($product->product_image) }}" alt="Product Image" />
          <h4 style="color: #888; padding:0; margin:0;">{{ $product->product_name }}</h4>

          <h2>মূল্য:<?php echo en2bn($product->product_price); ?>৳</h2>
          <hr>
          <form action="{{URL::to('/add_to_cart')}}" method="POST">
            {{ csrf_field() }}
            <input name="qty" type="hidden" value="1" />
            <input type="hidden" name="product_id" value="{{ $product->p_id }}">
            <button type="submit" class="btn btn-fefault cart">
              <i class="fa fa-shopping-cart"></i>
              ঝুড়িতে তুলুন
            </button>
          </form>
        </div>
        <div class="product-overlay" style="background: #ccc;">
          <div class="overlay-content">
            @if($product->product_image1 == NULL)
              <img src="{{ my_asset($product->product_image) }}" alt="Product Image" style="width: 70%; height: auto" />
            @else
              <img src="{{ my_asset($product->product_image1) }}" alt="Product Image" style="width: 70%; height: auto" />
            @endif
            <h2 style="padding: 0; margin: 0;">{{ $product->product_name }}</h2>
            <p>{{$product->short_desc}}</p>
            <h3 style="padding: 0; margin: 0;"><?php echo en2bn($product->product_price); ?>৳</h3>
            <form action="{{URL::to('/add_to_cart')}}" method="POST">
              {{ csrf_field() }}
              <input name="qty" type="hidden" value="1" />
              <input type="hidden" name="product_id" value="{{ $product->p_id }}">
              <button type="submit" class="btn btn-fefault cart">
                <i class="fa fa-shopping-cart"></i>
                ঝুড়িতে তুলুন
              </button>
            </form>
          </div>
        </div>
    </div>
    <div class="choose">
      <ul class="nav nav-pills nav-justified" style="background: #ccc;">
        <li><a href="{{URL::to('/view_product/'.$product->p_id)}}" style="color: #333;"><i class="fa fa-plus-square"></i>পণ্য দেখুন</a></li>
      </ul>
    </div>
  </div>