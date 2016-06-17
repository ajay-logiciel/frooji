<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    public $table = 'merchants';

    public $timestamps = false;

    /**
     * Assign merchant
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'merchant_id', 'id');
    }

    /**
	 * Get active categories.
	 */
	public static function scopeWhereActive($query)
	{
        return $query->where('status', true);
    }

    /**
     * get image of specific category.
     */
    public function getImage()
    {
        $store_base_path = \Config::get('globalconfig.store_image_base_path'); 
        $image = $store_base_path .'/'.$this->image;

        return $image;
    }
}
