<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\ProductPresenter;
use Caffeinated\Presenter\Traits\PresentableTrait;

class Product extends Model
{
    use PresentableTrait;

    const FEED =  "Feed";

    protected $presenter = ProductPresenter::class;

    /**
     * Assign tag to content.
     */
    public function tags()
    {
       	return $this->belongsToMany('App\Tag', 'products_tags', 'product_id', 'tag_id');
    }

    /**
     * Assign category to content.
     */
    public function categories()
    {
       	return $this->belongsToMany('App\Category', 'categories_products', 'product_id','category_id');
    }

    /**
     * Assign merchant
     */
    public function merchant()
    {
        return $this->hasOne('App\Merchant', 'id', 'merchant_id');
    }

    /**
     * Get coupon image
     */
    public function getCouponImage()
    {
        $store_base_path = \Config::get('globalconfig.store_image_base_path');
        
        // If product image exist the return product image
        if($this->image) {
           return $this->image;
        }

        // If product image not exist then display store logo.
        $image = $store_base_path .'/'.$this->merchant->image;
        return $image;


        // If store loog not exist then display store url capture. 
    }
}
