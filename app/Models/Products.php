<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'promo',
        'quantity',
    ];
}
