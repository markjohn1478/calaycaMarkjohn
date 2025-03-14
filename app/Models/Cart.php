<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'product_id', 'Quantity', 'customize_image', 'customize_color', 'description', 'size', 'status', 'completed'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
