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

/* Start Admin Routes */
Route::group(array('middleware' => 'auth'), function() {

	Route::group(array('prefix' => 'admin'), function() {

		Route::get('/',[ 'as' => 'admin', 'uses' => 'Admin\FeedSettingsController@index' ]);
		
		Route::get('/feed_settings',[ 'as' => 'feed_settings', 'uses' => 'Admin\FeedSettingsController@index' ]);
		
		Route::put('/feed_settings/activation/{id?}',[ 'as' => 'feed_settings_activation', 'uses' => 'Admin\FeedSettingsController@activation' ]);

		Route::get('/coupon_settings',[ 'as' => 'coupon_settings', 'uses' => 'Admin\ProductsController@index' ]);
		
		Route::get('/coupon_settings/featured/{id?}',[ 'as' => 'coupon_settings_featured', 'uses' => 'Admin\ProductsController@featured' ]);
		Route::get('/coupon_settings/status/{id?}',[ 'as' => 'coupon_settings_status', 'uses' => 'Admin\ProductsController@status' ]);
		Route::get('/coupon_settings/{id}',[ 'as' => 'coupon_settings_delete', 'uses' => 'Admin\ProductsController@destroy' ]);
	});
});
/* End Admin Routes */


Route::get('/', ['as' => 'get.dashboard', 'uses' => 'ProductsController@getDashboardContents']);

Route::group(['prefix' => 'products'], function () {
	
	Route::get('/', ['as' => 'get.product.coupons', 'uses' => 'ProductsController@searchByCategory']);

	Route::get('/get-coupon-popup/{id}', ['as' => 'get.usecoupon.popup', 'uses' => 'ProductsController@getCouponPopup']);
});

Route::group(array('prefix' => 'store'), function() {

	Route::get('/{category}', ['as' => 'store.coupons', 'uses' => 'ProductsController@getStoreBySlug']);

});


Route::get('/categories', function () {
   	return view('categories');
});

Route::get('/categories/{category}', function () {
   	return view('coupons');
});

Route::get('/favorites', function () {
   	return view('favorites');
});

Route::auth();

// Get all deals and save into D.B.
Route::get('/get-deals', ['as' => 'get.deals', 'uses' => 'ProductsController@getDeals']);

