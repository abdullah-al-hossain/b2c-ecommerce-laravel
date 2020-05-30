@extends('user_layout')

@section('content')
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-md-6">
                    <label>Name</label>
                </div>
                <div class="col-md-6">
                    <p>{{ $u_info->name }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Email</label>
                </div>
                <div class="col-md-6">
                    <p>{{ $u_info->email }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Phone</label>
                </div>
                <div class="col-md-6">
                    <p>{{ $u_info->mobile }}</p>
                </div>
            </div>            
</div>

@endsection
