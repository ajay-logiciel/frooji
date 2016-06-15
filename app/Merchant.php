<?php

namespace App;

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
        return $this->hasMany('App\Product', 'merchant_id', 'id');
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
        $base_path = "/images/stores";
        $image = $base_path .'/'.$this->image;

        return $image;
    }
}
