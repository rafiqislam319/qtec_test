<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_role_id'];


    public function userRole()
    {
        return $this->belongsTo(UserRole::class);
    }
}
