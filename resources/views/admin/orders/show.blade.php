@extends('admin_layout')
@section('title')
Order Details
@endsection
@section('admin_content')
<div class="row-fluid sortable">
  <div class="box span6">
    <div class="box-header">
      <h2><i class="halflings-icon user"></i><span class="break"></span>Customer Details</h2>
    </div>
    <div class="box-content">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Username</th>
            <th>Mobile</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $order_details->name }}</td>
            <td>{{ $order_details->mobile }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div><!--/span-->
  <div class="box span6">
    <div class="box-header">
      <h2><i class="halflings-icon user"></i><span class="break"></span>Shipping Details</h2>
    </div>
    <div class="box-content">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Recipient</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $order_details->shipping_first_name }} {{$order_details->shipping_last_name }}</td>
            <td>{{ $order_details->shipping_address }}</td>
            <td>{{ $order_details->mobile_number }}</td>
            <td>{{ $order_details->shipping_email }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div><!--/span-->
  <div class="box span11">
    <div class="box-header">
      <h2><i class="halflings-icon user"></i><span class="break"></span>Product Details</h2>
    </div>
    <div class="box-content">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Order Id</th>
            <th>P. Name</th>
            <th>P. price</th>
            <th>P. Sales Quantity</th>
            <th>P. Sub Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $total = 0;
          ?>
          @foreach($all_bought_products as $product)
          <tr>
            <td>{{ $product->order_id }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->product_price }}</td>
            <td>{{ $product->product_sales_quantity }}</td>
            <td>{{ $product->product_price*$product->product_sales_quantity }}</td>
            <?php
              $total += $product->product_price*$product->product_sales_quantity;
            ?>
          </tr>
          @endforeach
          <tr>
            <td colspan="4">TOTAL</td>
            <td>= {{ $total }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div><!--/span-->

  <?php
    $payment = DB::table('orders')
                ->join('payments', 'orders.payment_id', '=', 'payments.payment_id')
                ->select('payments.payment_method', 'payments.payment_status')
                ->where('order_id', $all_bought_products[0]->order_id)
                ->first();

   ?>
  <div class="box span11">
    <h1 align="center">Payment Method: {{ $payment->payment_method }}</h1>
    <h2 align="center">Payment Status: {{ $payment->payment_status }}</h2>
  </div>

</div><!--/row-->
@endsection
