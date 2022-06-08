<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // Constant PENDING
    const PENDING = 'PENDING';
    // Constant PAID
    const PAID = 'PAID';
    // Constant ONGOING
    const ONGOING = 'ONGOING';
    // Constant COMPLETED
    const COMPLETED = 'COMPLETED';
    // Constant CANCELLED
    const CANCELLED = 'CANCELLED';

    // Table name is 'order'
    protected $table = 'order';

    // Fillable column names
    protected $fillable = [
        'user_id',
        'jenis_rank_id',
        'jenis_joki_id',
        'payment_method_id',
        'login_method_id',
        'email',
        'password',
        'request_hero',
        'phone',
        'status'
    ];

    // Belongs to relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Belongs to relationship with JenisRank
    public function jenisRank()
    {
        return $this->belongsTo(JenisRank::class);
    }

    // Belongs to relationship with JenisJoki
    public function jenisJoki()
    {
        return $this->belongsTo(JenisJoki::class);
    }

    // Belongs to relationship with PaymentMethod
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    // Belongs to relationship with LoginMethod
    public function loginMethod()
    {
        return $this->belongsTo(LoginMethod::class);
    }
}
