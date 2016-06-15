<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';

    /**
	 * Get active categories.
	 */
	public static function scopeWhereActive($query) {
        return $query->where('status', true);
    }

    /**
     * Get featured categories.
     */
    public static function scopeWhereFeatured($query) {
        return $query->where('featured', true);
    }
    
    /**
     * Assign category to content.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product', 'categories_products', 'product_id','category_id');
    }

    /**
     * get image of specific category.
     */
    public function getImage()
    {
        $cat_base_path = \Config::get('frooji.category_image_base_path');
        $image = $cat_base_path .'/'.$this->image;

        return $image;
    }
}
