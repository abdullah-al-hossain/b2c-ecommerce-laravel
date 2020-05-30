@extends('layout')
@section('title')
Delivery Guy Details
@endsection

@section('content')
  <div class="row">
    <div class="col-sm-12">
      <h3 class="text-primary">Delivery Men according to area</h3>
      <form class="form" action="/delivery_search" method="POST">
        {{ csrf_field() }}
        <select name="area">
         <option value="raojan">Raojan</option>
         <option value="rangunia">Rangunia</option>
         <option value="gec">GEC</option>
         <option value="murad">Muradpur</option>
        </select>
        <button class="btn btn-warning" type="submit" name="button">Search</button>
      </form>
    </div>

  </div>

<div class="row" style="margin-top: 20px;">
  @if(isset($dmen))
  <div class="col-sm-12">
  @foreach($dmen as $dm)
  <div class="prod col-lg-3 col-md-4 col-sm-6 col-xs-4">
    <div class="product-image-wrapper" style="border-radius: 30px; border: 1px solid #888;">
      <div class="single-products" style="border-radius: 10px;">
          <div class="productinfo text-center">
            <img src="{{ $dm->product_image }}" alt="Delivery Man's Image" />
            <h4 style="color: #888; padding:0; margin:0;">Name: {{ ucfirst($dm->product_name) }}</h4>

            <h4 style="color: #888; padding:0; margin:0;">Area: {{ ucfirst($dm->area) }}</h4>
          </div>
      </div>
      <div class="choose">
        <ul class="nav nav-pills nav-justified" style="background: #ccc;">
          <li><a href="{{URL::to('/view_dm/'.$dm->p_id)}}" style="color: #333;"><i class="fa fa-plus-square"></i>বিস্তারিত তথ্য দেখুন</a></li>
        </ul>
      </div>
    </div>
  </div>
  @endforeach
  </div>
  @endif
</div>
@endsection
