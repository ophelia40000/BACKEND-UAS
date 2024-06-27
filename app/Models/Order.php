<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'status',
        'total_price',
        'product_name', // Tambahkan kolom baru ke fillable
        'product_quantity', // Tambahkan kolom baru ke fillable
        'product_size', // Tambahkan kolom baru ke fillable
    ];
    /**
     * Define relationship with User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define relationship with Cart items.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartItem()
    {
        return $this->hasOne(Cart::class, 'order_id');
    }
}