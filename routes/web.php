<?php

//--- front-end part ---

Route::get('', 'HomeController@index');



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
