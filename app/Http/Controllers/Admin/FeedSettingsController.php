<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;
use App\Models\FeedSettings;

class FeedSettingsController extends Controller
{
	public function index()
	{
		$feeds = FeedSettings::get();

		return view('admin.feed_settings', ['feeds' => $feeds]);
	}

	public function activation($id, Request $request)
	{
		$is_active = (bool)$request->input('is_active');
		if(!$is_active) {
			$is_active = false;
		}
		// dd($is_active);
		/*$validator = Validator::make($inputs, ['is_active' => 'required']);
	
		if( $validator->fails() ) {
			
			dd('rfg');
		}*/
		$feed = FeedSettings::findOrFail($id);
		$feed->is_active = $is_active;
		$feed->save();
		
		$feeds = FeedSettings::get();

		return view('admin.feed_settings', ['feeds' => $feeds]);
	}
}
