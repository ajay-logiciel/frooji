<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedSettings extends Model
{
    protected $table = 'feed_settings';

    protected $activateRules = [
    	'id'		=> 'required',
    	'is_active' => 'required|boolean'
    ];

   	public function getActivateRules()
   	{
   		return $this->activateRules;
   	} 
}
