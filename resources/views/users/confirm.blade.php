@extends('user_layout')

@section('content')

<?php
  $i = 1;
 ?>
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
<div class="tab-pane fade show active" id="accordion" role="tabpanel" aria-labelledby="home-tab">
  <h1 class="text-center">Order Status: <span class = "text-success">Confirmed Orders</span></h1>
  <hr>
  <ul> 
  @foreach($all_orders_info as $order)
    @if($order->order_status == 'confirmed')
    <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0 table-responsive">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="#collapse{{$i}}">
          Order: {{ $i }}-> Total Price: <?php echo BanglaConverter::en2bn($order->order_total); ?> <span style="font-size: 24px;"> ৳</span>
        </button>
      </h5>
    </div>

    <div
      id="collapse{{$i++}}" class="collapse"
      aria-labelledby="headingOne"
      data-parent="#accordion"
    >
      <div class="card-body">
        <?php

        $all_bought_products = DB::table('orders')
                                            ->join('orderdetails', 'orders.order_id', '=', 'orderdetails.order_id')
                                            ->select('orders.*', 'orderdetails.*')
                                            ->where('orders.order_id', $order->order_id)
                                            ->get();
        ?>
        <div class="table-responsive">
        <table
        class="table table-striped table-bordered bootstrap-datatable datatable"
        border="1">
          <tr>
            <th>পণ্যের নাম</th>
            <th>পণ্যের মূল্য</th>
            <th>পণ্য সংখ্যা</th>
            <th>মোট</th>
          </tr>
          @foreach($all_bought_products as $product)
            <tr>
                <td>{{ $product->product_name  }}</td>
                <td> <?php echo BanglaConverter::en2bn($product->product_price); ?> </td>
                <td> <?php echo BanglaConverter::en2bn($product->product_sales_quantity); ?> </td>
                <td><?php echo BanglaConverter::en2bn($product->product_price*$product->product_sales_quantity); ?></td>
            </tr>
          @endforeach
          <tr>
            <td colspan="3">সর্বমোট</td>
            <td> <?php echo BanglaConverter::en2bn($order->order_total); ?> </td>
          </tr>
        </table>
        </div>
        <hr>
      </div>
    </div>
  </div>
    @endif
  @endforeach
  </ul>
</div>
@endsection
