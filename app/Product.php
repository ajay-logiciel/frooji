<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';

    const FEED =  "Feed";

    
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
}
