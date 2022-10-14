<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserInfoResource;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function index()
    {
        $userInfo = UserInfo::withFilters(
            request()->input('user_roles', [])
        )->get();

        return UserInfoResource::collection($userInfo);
    }
}
