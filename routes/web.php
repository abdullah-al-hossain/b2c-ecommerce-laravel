<?php

//--- front-end part ---

  Route::get('/', 'HomeController@index');
  Route::post('/products_by_range', 'HomeController@range');
  Route::post('/search_products', 'HomeController@search');

// Show product by category

  Route::get('/product_by_cat/{category_id?}', 'HomeController@show_product_by_category');
  Route::get('/product_by_man/{man_id?}', 'HomeController@show_product_by_man');
  Route::get('/view_product/{product_id?}', 'HomeController@show_product_details');// view ***********
  Route::post('/add_to_cart', 'CartController@add_to_cart');
  Route::get('/show_cart', 'CartController@show_cart');
  Route::get('/delete_cart_item/{rowId?}', 'CartController@delete');
  Route::post('/update_cart', 'CartController@update_cart');

// checkout routes go here

  Route::get('/login_check', 'CheckoutController@login_check');
  Route::post('/user_reg', 'CheckoutController@user_reg')->name('user_reg');
  Route::get('/checkout', 'CheckoutController@checkout');
  Route::post('/save_shipping_details', 'CheckoutController@save_shipping_details');
  Route::get('/user_logout', 'CheckoutController@logout')->name('logout');
  Route::post('/user_login', 'CheckoutController@user_login')->name('user_login');
  Route::get('/payment', 'CheckoutController@payment');
  Route::post('/payment', 'CheckoutController@payment_insert');

  Route::get('/manage_orders', 'OrderDetailsController@manage_order');
  Route::post('/confirm_order', 'OrderDetailsController@confirm_order');
  Route::get('/view_order/{order_id?}', 'OrderDetailsController@view_order');


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



  /// Reviews

  Route::post('/reviews', 'ReviewsController@store');
  Route::get('/del_review/{review_id?}/{p_id?}', 'ReviewsController@delete');
  Route::post('/review_update/{review_id?}/{p_id?}', 'ReviewsController@update');

  /// Products API
  Route::put('edit_product/{id}', 'ProductsController@update');
  Route::delete('delete_product/{id}', 'ProductsController@delete');
  // Social links Routes

  Route::get('/social' , 'SocialsController@index');
  Route::get('/social_add' , 'SocialsController@add');
  Route::post('/add_social' , 'SocialsController@store');
  Route::post('/edit_social_stat' , 'SocialsController@editStat');
  Route::get('/edit_social/{id?}', 'SocialsController@edit');
  Route::post('/edit_social', 'SocialsController@update');
  Route::get('/delete_social/{id?}', 'SocialsController@delete');

// slider routes go here

  Route::get('/all_sliders', 'SlidersController@index');
  Route::get('/add_slider', 'SlidersController@create');
  Route::post('/add_slider', 'SlidersController@store');
  Route::get('/delete_slider/{slider_id?}', 'SlidersController@delete');
  Route::post('/edit_slider_pub_stat','SlidersController@public_status');

// user account Information

  Route::get('/user_account', 'UsersController@index');
  Route::get('/user_confirmed_orders', 'UsersController@confirmed_orders');
  Route::get('/pending_orders', 'UsersController@pending_orders');
  Route::get('/canceled_orders', 'UsersController@canceled_orders');
  Route::get('/edit_user_profile', 'UsersController@edit_u_p');
  Route::post('/edit_user_profile', 'UsersController@update_ucer');


/// Delivery man routes
  Route::get('/delivery_man', 'HomeController@delivery');
  Route::post('/delivery_search', 'HomeController@delivery_search');
  Route::get('/add_d_man', 'EventsController@add_d_man');
  Route::get('/all_d_men', 'EventsController@all_d_men');
  Route::get('/edit_dm/{d_id?}', 'EventsController@edit_dm');
  Route::get('/delete_dm/{d_id?}', 'EventsController@delete_dm');
  Route::post('/update_dm', 'EventsController@update_dm');
  Route::post('/add_dm', 'EventsController@store_d_man');
  Route::post('/edit_dm_pub_stat', 'EventsController@update_dm_pub_stat');
  Route::get('/view_dm/{d_id?}', 'EventsController@view_dm');




/// Advanced clothes function
  Route::get('/cll', function () {
    $products        = json_decode(file_get_contents(storage_path('data/products-data.json')));
    $selectedId      = intval(app('request')->input('id') ?? '8');
    $selectedProduct = $products[0];

    $selectedProducts = array_filter($products, function ($product) use ($selectedId) { return $product->id === $selectedId; });

    ///return $selectedProducts;
    if (count($selectedProducts)) {
        $selectedProduct = $selectedProducts[array_keys($selectedProducts)[0]];
    }

    $productSimilarity = new App\ProductSimilarity($products);
    $similarityMatrix  = $productSimilarity->calculateSimilarityMatrix();
    $products          = $productSimilarity->getProductsSortedBySimularity($selectedId, $similarityMatrix);

    return view('welcome', compact('selectedId', 'selectedProduct', 'products'));
});
