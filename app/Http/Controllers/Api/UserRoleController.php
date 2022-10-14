<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserRoleResource;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index()
    {
        $roles = UserRole::withCount(['userInfo' => function ($query) {
            $query->withFilters(
                request()->input('user_roles', [])
            );
        }])->get();
            

        return UserRoleResource::collection($roles);
    }
}
