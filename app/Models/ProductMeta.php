<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class ProductMeta extends Model
{
    public $table = 'product_metas';

    protected $casts = [
        'value' => 'array'
    ];
}
