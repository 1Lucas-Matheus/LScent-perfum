<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $fillable = [
        'value',
        'key'
    ];
}
