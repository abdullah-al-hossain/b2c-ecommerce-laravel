@extends('layout')
@section('title')
Ecommerce BD । দরজার কাছেই
@endsection
@section('slider')
@endsection
@section('content')

@php

    $visits = DB::table('pcount')->select('visits')->where('id', 1)->first();
    DB::table('pcount')->where('id', 1)->update(array('visits' => $visits->visits+1));
    
@endphp

<h2 class="title text-center">পণ্যসমূহ</h2>
<div class="col-sm-12">
@foreach($products as $product)
<div class="prod col-lg-3 col-md-4 col-sm-6 col-xs-4">
  @include('product_partials', ['product' => $product])
</div>
@endforeach
</div>
{{ $products->links() }}
</div>

@endsection
