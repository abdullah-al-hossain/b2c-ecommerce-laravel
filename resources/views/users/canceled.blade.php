@extends('user_layout')

@section('content')

<?php
  $i = 1;
 ?>
<div class="tab-pane fade show active" id="accordion" role="tabpanel" aria-labelledby="home-tab">
  <h1 class="text-center">Order Status: <span class = "text-danger">Canceled Orders</span></h1>
  <ul>
  @foreach($all_orders_info as $order)
  @if($order->order_status == 'canceled')
  <div class="card">
  <div class="card-header" id="headingOne">
    <h5 class="mb-0">
      <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="#collapse{{$i}}">
        Order: {{ $i }}-> Total Price: {{ $order->order_total }}/=
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
      <table
      class="table table-striped table-bordered bootstrap-datatable datatable"
      border="1">
        <tr>
          <th>Product Name</th>
          <th>Product Price</th>
          <th>Product Qty.</th>
          <th>Total</th>
        </tr>
        @foreach($all_bought_products as $product)
          <tr>
              <td>{{ $product->product_name  }}</td>
              <td>{{ $product->product_price  }}</td>
              <td>{{ $product->product_sales_quantity  }}</td>
              <td>{{ $product->product_price*$product->product_sales_quantity  }}</td>
          </tr>
        @endforeach
        <tr>
          <td colspan="3">Total</td>
          <td>{{ $order->order_total }}</td>
        </tr>
      </table>
      <hr>
    </div>
  </div>
</div>
  @endif
  @endforeach
  </ul>
</div>
@endsection
