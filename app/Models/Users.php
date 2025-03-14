<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'role', 'address', 'Mobile_Number'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }
}
