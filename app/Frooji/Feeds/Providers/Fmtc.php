<?php
namespace Frooji\Feeds\Providers;
use GuzzleHttp\Client;
use Config; 

class Fmtc
{
	protected $request;

	function __construct()
	{
		$query = [
			'key' 	  => Config::get('frooji.fmtc.app_key'),
			'formate' => 'json',
		];
		
		$this->request = new Client([
			'base_uri' => Config::get('frooji.fmtc.base_url'), 
			'query' => $query,
		]);
	}

	public function getFeed() 
	{
		$response = $this->request->get('getDeals');
		dd($response);
	}
}