<?php

namespace App\Models;

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
       	return $this->belongsToMany('App\Models\Tag', 'products_tags', 'product_id', 'tag_id');
    }

    /**
     * Assign category to content.
     */
    public function categories()
    {
       	return $this->belongsToMany('App\Models\Category', 'categories_products', 'product_id','category_id');
    }

    /**
     * Assign merchant
     */
    public function merchant()
    {
        return $this->hasOne('App\Models\Merchant', 'id', 'merchant_id');
    }

    /**
     * Get active categories.
     */
    public static function scopeWhereFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     *  filter by tags.
     *  
     *  @param  $id: integer of node id.
     *  @return array of breadcrumb list.
     */
    public function scopeWhereCategories($builder, $slug) {

        $category = Category::where('slug', $slug)->first();
        if(empty($category)) {
            return $query;
        }

        $query = "
            select temp.product_id from(
                select categories_products.product_id from `categories_products` where categories_products.category_id = ".$category->id."
            ) temp group by temp.product_id";

        return $builder->join(\DB::raw("($query) as assigned_cat"), function($query) {
            $query->on('assigned_cat.product_id', '=', 'products.id');
        });
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

    /**
     * get image of specific category.
     */
    public function getStoreImage()
    {
        $store_base_path = \Config::get('globalconfig.store_image_base_path'); 
        $image = $store_base_path .'/'.$this->merchant_image;

        return $image;
    }

     /**
     * get image of specific category.
     */
    public function getCategoryImage()
    {
        $cat_base_path = \Config::get('globalconfig.category_image_base_path');
        $image = $cat_base_path .'/'.$this->image;

        return $image;
    }
}
