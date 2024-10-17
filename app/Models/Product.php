<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model {
    use HasFactory;
    public $timestamps = false;
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'product_name',
        'description',
        'price',
        'quantity',
        'image'
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function order_detail(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
   
}
