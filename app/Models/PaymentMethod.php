<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    // Table name is 'payment_method'
    protected $table = 'payment_method';

    // Fillable column names
    protected $fillable = [
        'name',
        'slug'
    ];

    // Has many relationship with Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
