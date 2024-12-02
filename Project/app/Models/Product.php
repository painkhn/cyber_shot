<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image', 'article', 'category_id'];

    /*
    * Связь с моделью Category
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /*
    * Связь с моделью Basket
    */
    public function baskets()
    {
        return $this->hasMany(Basket::class);
    }

    /*
    * Связь с моделью Order
    */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
