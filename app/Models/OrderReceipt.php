<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'image',
    ];

    public function order()
    {
        // Belongs to order through order_code
        return $this->belongsTo(Order::class, 'order_code', 'order_code');
    }
}
