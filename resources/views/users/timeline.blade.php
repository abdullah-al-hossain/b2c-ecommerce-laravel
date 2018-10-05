@extends('user_layout')

@section('content')

  <?php
    //$orderDetails = DB::table('orders')-
   ?>
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-md-6">
                    <label>Experience</label>
                </div>
                <div class="col-md-6">
                    <p>Expert</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Hourly Rate</label>
                </div>
                <div class="col-md-6">
                    <p>10$/hr</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Total Projects</label>
                </div>
                <div class="col-md-6">
                    <p>230</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>English Level</label>
                </div>
                <div class="col-md-6">
                    <p>Expert</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Availability</label>
                </div>
                <div class="col-md-6">
                    <p>6 months</p>
                </div>
            </div>
    <div class="row">
        <div class="col-md-12">
            <label>Your Bio</label><br/>
            <p>Your detail description</p>
        </div>
    </div>
</div>
@endsection
