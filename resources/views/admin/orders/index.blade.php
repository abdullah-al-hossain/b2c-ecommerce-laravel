@extends('admin_layout')
@section('title')
Manage Orders
@endsection

@section('admin_content')
<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="#">Tables</a></li>
</ul>

<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon user"></i><span class="break"></span>All Orders</h2>
      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
      </div>
    </div>
    <div class="box-content">
      <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <thead>
          <tr>
            <th>Order Id</th>
            <th>Customer Name</th>
            <th>Order Total</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($all_orders_info as $order)
        <tr>
          <td>{{ $order->order_id }}</td>
          <td>{{ $order->name }}</td>
          <td style="max-width: 500px;">{{ $order->order_total }}</td>
          <td class="center">
            <?php
            if ($order->order_status == 'pending') {
              echo '<span class="label label-success">Pending</span>';
            } else {
              echo '<span class="label label-danger">Confirmed</span>';
            }

             ?>
          </td>
          <td class="center">
            <form action="/edit_cat_pub_stat" method="POST" style="display: inline-block; padding: 0px; margin: 0px;">
              {{ csrf_field() }}
                <input type="hidden" name="category_id" value="{{$order->order_id}}"/>
                <input type="hidden" name="pub_stat" value="{{$order->order_status}}"/>
                <button type="submit" style="font-size: 30px;"
                <?php
                if ($order->order_status == 'pending') {
                  echo 'class="btn label-danger"';
                } else {
                  echo 'class="btn btn-success"';
                }

                ?>
                >
                  <i
                  <?php
                  if ($order->order_status == 'pending') {
                    echo 'class="halflings-icon white thumbs-up"';
                  } else {
                    echo 'class="halflings-icon white thumbs-down"';
                  }
                  ?>
                  ></i>
                </button>
            </form>
            <a class="btn btn-info" href='/view_order/{{ $order->order_id }}'>
              <i class="halflings-icon white edit"></i>
            </a>
            <!-- **************** -->
            <a class="btn btn-danger" href='/delete_cat/{{ $order->order_id }}' id="delete"><i class="halflings-icon white trash"></i></a>
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div><!--/span-->

</div><!--/row-->

@endsection
