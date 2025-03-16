<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $fillable = [
        'user_id', 'price', 'type', 'date_completed', 'contact_number', 'address', 'pickup_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

