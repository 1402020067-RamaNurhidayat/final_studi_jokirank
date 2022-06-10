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

    public static function statuses()
    {
        return [
            self::PENDING,
            self::PAID,
            self::ONGOING,
            self::COMPLETED,
            self::CANCELLED,
        ];
    }

    // Table name is 'order'
    protected $table = 'order';

    // Fillable column names
    protected $fillable = [
        'user_id',
        'jenis_rank_id',
        'jenis_joki_id',
        'payment_method_id',
        'login_method_id',
        'order_code',
        'email',
        'password',
        'request_hero',
        'total_price',
        'phone',
        'status'
    ];

    // Load these fields
    protected $with = [
        'jenisRank',
        'jenisJoki',
        'paymentMethod',
        'loginMethod',
        'orderReceipt',
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

    public function createHistory($status)
    {
        $this->update([
            'status' => $status,
        ]);
        return OrderHistory::create([
            'user_id' => $this->user_id,
            'order_code' => $this->order_code,
            'jenis_joki' => $this->jenisJoki->name,
            'jenis_rank' => $this->jenisRank->name,
            'payment_method' => $this->paymentMethod->name,
            'total_price' => $this->total_price,
            'request_hero' => $this->request_hero,
            'status' => $status,
        ]);
    }

    // hasOneOptional relationship with OrderReceipt
    public function orderReceipt()
    {
        return $this->hasOne(OrderReceipt::class, 'order_code', 'order_code');
    }
}
