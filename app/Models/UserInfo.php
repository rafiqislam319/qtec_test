<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_role_id'];

    const DATES = [
        'Day From 1 to 7',
        'Day From 7 to 30',
        'Day More than 30',
    ];


    public function userRole()
    {
        return $this->belongsTo(UserRole::class);
    }

    public function scopeWithFilters($query, $roles)
    {
        return $query->when(count($roles), function ($query) use ($roles) {
            $query->whereIn('user_role_id', $roles);
        });
    }


    // public function scopeWithFilters($query, $roles, $dates)
    // {
    //     return $query->when(count($roles), function ($query) use ($roles) {
    //         $query->whereIn('user_role_id', $roles);
    //     })
    //         ->when(count($dates), function ($query) use ($dates) {
    //             $query->where(function ($query) use ($dates) {
    //                 $query->when(in_array(0, $dates), function ($query) {
    //                     $query->orWhere('dates', '1', '7');
    //                 })
    //                     ->when(in_array(1, $dates), function ($query) {
    //                         $query->orWhereBetween('dates', ['7', '30']);
    //                     })
    //                     ->when(in_array(2, $dates), function ($query) {
    //                         $query->orWhere('dates', '>', '30');
    //                     });
    //             });
    //         });
    // }

}
