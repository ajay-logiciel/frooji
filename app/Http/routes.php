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

Route::group(array('middleware' => 'auth'), function() {
	Route::group(array('prefix' => 'admin'), function() {
		// Route::get('/',['uses' => 'dashboard' as ]);
		Route::get('/',[ 'as' => 'admin', 'uses' => 'Admin\FeedSettingsController@index' ]);
		Route::get('/feed_settings',[ 'as' => 'feed_settings', 'uses' => 'Admin\FeedSettingsController@index' ]);
		Route::put('/feed_settings/activation/{id?}',[ 'as' => 'feed_settings_activation', 'uses' => 'Admin\FeedSettingsController@activation' ]);

		Route::get('/coupon_settings', function () {
    		return view('admin.coupon_settings');
		});
	});
	
});
Route::get('/', function () {
   	return view('user.home');
});

Route::auth();

Route::get('/home', 'HomeController@index');

// Get all deals and save into D.B.
Route::get('/get-deals', ['as' => 'get.deals', 'uses' => 'ProductsController@getDeals']);
