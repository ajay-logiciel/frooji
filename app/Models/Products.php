<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    public function store()
    {
        return $this->belongsTo('App\Models\Merchant', 'merchant_id');
    }
}