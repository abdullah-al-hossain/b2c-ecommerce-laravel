<?php

//--- front-end part ---

  Route::get('', 'HomeController@index');

// Show product by cateory

  Route::get('/product_by_cat/{category_id?}', 'HomeController@show_product_by_category');
  Route::get('/product_by_man/{man_id?}', 'HomeController@show_product_by_man');
  Route::get('/view_product/{product_id?}', 'HomeController@show_product_details');
  Route::post('/add_to_cart', 'CartController@add_to_cart');
  Route::get('/show_cart', 'CartController@show_cart');
  Route::get('/delete_cart_item/{rowId?}', 'CartController@delete');
  Route::post('/update_cart', 'CartController@update_cart');

// checkout routes go here

  Route::get('/login_check', 'CheckoutController@login_check');
  Route::post('/user_reg', 'CheckoutController@user_reg');
  Route::get('/checkout', 'CheckoutController@checkout');
  Route::post('/save_shipping_details', 'CheckoutController@save_shipping_details');
  Route::get('/user_logout', 'CheckoutController@logout');
  Route::post('/user_login', 'CheckoutController@user_login');
  Route::get('/payment', 'CheckoutController@payment');
  Route::post('/payment', 'CheckoutController@payment_insert');


  /// backend
  Route::get('/admin', 'AdminController@index');
  Route::get('/dashboard', 'SuperAdminController@index');
  Route::post('/dashboard', 'AdminController@log_in_dashboard');
  Route::get('/logout', 'SuperAdminController@logout');

  ///Category

  Route::get('/all_cat', 'CategoryController@index');
  Route::get('/add_cat', 'CategoryController@create');
  Route::post('/add_cat', 'CategoryController@store');
  Route::get('/edit_cat/{category_id?}', 'CategoryController@edit');
  Route::post('/update_cat', 'CategoryController@update');
  Route::post('/edit_cat_pub_stat','CategoryController@public_status');
  Route::get('/delete_cat/{category_id?}', 'CategoryController@delete');

  /// Manufacture or brand routes

  Route::get('/all_man', 'ManufacturesController@index');
  Route::get('/add_man', 'ManufacturesController@create');
  Route::post('/add_man', 'ManufacturesController@store');
  Route::get('/edit_man/{man_id?}', 'ManufacturesController@edit');
  Route::post('/update_man', 'ManufacturesController@update');
  Route::post('/edit_man_pub_stat','ManufacturesController@public_status');
  Route::get('/delete_man/{man_id?}', 'ManufacturesController@delete');

  // products

  Route::get('/all_products', 'ProductsController@index');
  Route::get('/add_product', 'ProductsController@create');
  Route::post('/add_product', 'ProductsController@store');
  Route::post('/edit_product_pub_stat','ProductsController@public_status');
  Route::get('/delete_product/{product_id?}', 'ProductsController@delete');
  Route::get('/edit_product/{p_id?}', 'ProductsController@edit');
  Route::post('/edit_product', 'ProductsController@update');

// slider routes go here

  Route::get('/all_sliders', 'SlidersController@index');
  Route::get('/add_slider', 'SlidersController@create');
  Route::post('/add_slider', 'SlidersController@store');
  Route::get('/delete_slider/{slider_id?}', 'SlidersController@delete');
  Route::post('/edit_slider_pub_stat','SlidersController@public_status');
