<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
    ];

    /*
    * Связь с моделью User
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    * Связь с моделью Product
    */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
