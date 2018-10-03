@extends('admin_layout')

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
            <td>{{ $order_info_byId->name}}</td>
            <td>{{ $order_info_byId->mobile}}</td>
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
            <th>Username</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $order_info_byId->shipping_first_name }} {{ $order_info_byId->shipping_last_name }} </td>
            <td>{{ $order_info_byId->shipping_address }}</td>
            <td>{{ $order_info_byId->mobile_number }}</td>
            <td>{{ $order_info_byId->shipping_email }}</td>
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
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div><!--/span-->


</div><!--/row-->
@endsection
