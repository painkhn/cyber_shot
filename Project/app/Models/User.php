<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'is_admin'
    ];

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


    /*
    * Связь с моделью Card
    */
    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
