<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Start For frontend
Route::get('/', ['as' => 'get.dashboard', 'uses' => 'ProductsController@getDashboardContents']);

Route::group(['prefix' => 'products'], function () {
	
	Route::get('/', ['as' => 'get.product.coupons', 'uses' => 'ProductsController@getProductsByCategorySlug']);

	Route::get('/get-coupon-popup/{id}', ['as' => 'get.usecoupon.popup', 'uses' => 'ProductsController@getCouponPopup']);
});

Route::group(array('prefix' => 'store'), function() {

	Route::get('/{category}', ['as' => 'store.coupons', 'uses' => 'ProductsController@getProductsByStoreSlug']);

});
// End For frontend


// Start Admin Routes 
Route::group(['prefix' => 'admin'], function() {


	// Authentication Routes...
    Route::get('/', ['as' => 'admin.login', 'uses' => 'Auth\Admin\AuthController@showLoginForm']);
    Route::get('/login', ['as' => 'admin.login', 'uses' => 'Auth\Admin\AuthController@showLoginForm']);
    Route::post('/login', ['as' => 'admin.post.login', 'uses' => 'Auth\Admin\AuthController@login']);

    // Registration Routes...
    Route::get('/register', 'Auth\Admin\AuthController@showRegistrationForm');
    Route::post('/register', 'Auth\Admin\AuthController@register');

    // Password Reset Routes...
    Route::get('/password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('/password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'Auth\PasswordController@reset');

	Route::group(['middleware' => 'admin.auth'], function() {
    	Route::get('/logout', ['as' => 'admin.logout', 'uses' => 'Auth\Admin\AuthController@logout']);
		
		Route::get('/dashboard',[ 'as' => 'admin', 'uses' => 'Admin\FeedSettingsController@index' ]);
		
		Route::get('/feed_settings',[ 'as' => 'feed_settings', 'uses' => 'Admin\FeedSettingsController@index' ]);
		
		Route::put('/feed_settings/activation/{id?}',[ 'as' => 'feed_settings_activation', 'uses' => 'Admin\FeedSettingsController@activation' ]);

		Route::get('/products',[ 'as' => 'products', 'uses' => 'Admin\ProductsController@index' ]);
		
		Route::put('/products/featured/{id?}',[ 'as' => 'products_featured', 'uses' => 'Admin\ProductsController@featured' ]);

		Route::get('/products/featured/{id?}',[ 'as' => 'products_featured', 'uses' => 'Admin\ProductsController@featured' ]);
		
		Route::get('/products/status/{id?}',[ 'as' => 'products_status', 'uses' => 'Admin\ProductsController@status' ]);

		Route::get('/products/{id}',[ 'as' => 'products_delete', 'uses' => 'Admin\ProductsController@destroy' ]);

	});
});
// End Admin Routes 

// Get all deals and save into D.B.
Route::get('/get-deals', ['as' => 'get.deals', 'uses' => 'ProductsController@getDeals']);
