<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\FeedSettings;

class FeedSettingsController extends Controller
{
	/* 
	* return all feeds
	*/
	public function index()
	{
		$feeds = FeedSettings::get();

		return view('admin.feed_settings', ['feeds' => $feeds]);
	}

	/* 
	* activate / deactivate feeds
	*/
	public function activation($id, Request $request)
	{
		$isActive = (bool)$request->input('is_active');
		if(!$isActive) {
			$isActive = false;
		}
		
		$feed = FeedSettings::findOrFail($id);
		$feed->is_active = $isActive;
		$feed->save();
		
		return redirect()->back();
	}
}
