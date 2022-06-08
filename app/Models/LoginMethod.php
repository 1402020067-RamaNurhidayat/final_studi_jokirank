<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginMethod extends Model
{
    use HasFactory;

    // Table name is 'login_method'
    protected $table = 'login_method';

    // Fillable column names
    protected $fillable = [
        'name',
        'slug',
        'icon'
    ];

    // Has many relationship with Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
