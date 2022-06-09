<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisRank extends Model
{
    use HasFactory;

    // Table name is 'jenis_rank'
    protected $table = 'jenis_rank';

    // Fillable column names
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    // Has many relationship with Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
