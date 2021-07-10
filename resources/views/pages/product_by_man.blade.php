@extends('layout')
@section('slider')
@endsection
@section('content')

<h2 class="title text-center">Features Items</h2>
@if($products_by_man->count() == 0)
  <h1 style="text-align:center; color: red;">Nothing to show in this manufacture</h1>
  <p style="text-align: center; font-size: 30px;"><a href="/">Click here to Go back to home!</a> </p>
@endif
@foreach($products_by_man as $product)
<div class="col-sm-4">
  @include('product_partials', ['product' => $product])
</div>
@endforeach

</div><!--features_items-->





@endsection
