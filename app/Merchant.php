<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    public $table = 'merchants';

    public $timestamps = false;
}
