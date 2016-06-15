<?php

namespace App\Http;
use Config;

class Deals
{
	public function getDeals($value='')
	{
		$path = Config::get('globalconfig.ftmc_deal_path');
    	$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $path);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);

		$data = json_decode($response, true);

		return $data;
	}
}