<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'Cart';

    protected $fillable = [
        'user_id',
        'product_id',
        'price_per_item',
        'quantity',
        'total_amount',
    ];

    protected static function booted()
    {
        static::creating(function ($cart) {
            $cart->total_amount = $cart->price_per_item * $cart->quantity;
        });

        static::updating(function ($cart) {
            $cart->total_amount = $cart->price_per_item * $cart->quantity;
        });

    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}