<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'user_id',
        'card_number',
        'card_holder',
        'expiration_date',
        'cvv',
    ];

    /*
    * Связь с моделью User
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
