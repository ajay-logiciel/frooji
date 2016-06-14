<?php

use Illuminate\Database\Seeder;
use App\Models\FeedSettings;

class FeedSettingsTableSeeder extends Seeder
{
	public function run()
	{
		FeedSettings::truncate();
		$feeds = [
			[
				'app_key'	=> 'app_key_1111111111',
				'secret'	=> 'secret_1111111111',
				'is_active'	=> 1,
			],
			[
				'app_key' => 'app_key_2222222222',
				'secret' => 'secret_2222222222',
				'is_active'	=> 1,
			],
			[
				'app_key' => 'app_key_3333333333',
				'secret' => 'secret_3333333333',
				'is_active'	=> 1,
			]
		];

		foreach ($feeds as $feed) {
			FeedSettings::create($feed);
		}
	}

}
