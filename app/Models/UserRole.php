<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;


    // Relationship with User
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
