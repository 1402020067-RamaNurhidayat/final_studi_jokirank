<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisJoki extends Model
{
    use HasFactory;
    // Table name is 'jenis_joki'
    protected $table = 'jenis_joki';

    // Fillable column names
    protected $fillable = [
        'name'
    ];

    // Has many relationship with Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
