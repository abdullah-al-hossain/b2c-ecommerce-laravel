<?php

use Illuminate\Http\Request;


Route::get('products', function() {
	return App\Product::all();
});

Route::get('products/{id}', function($id) {
	return App\Product::where('p_id', $id)->get();
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

///01685695114