<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    use HasFactory;

    // Table is order_history
    protected $table = 'order_history';

    protected $fillable = [
        'user_id',
        'order_code',
        'jenis_joki',
        'jenis_rank',
        'payment_method',
        'total_price',
        'request_hero',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
