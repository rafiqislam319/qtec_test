<?php

use App\Http\Controllers\Api\UserInfoController;
use App\Http\Controllers\Api\UserRoleController;
use App\Models\UserInfo;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('user-roles', [UserRoleController::class, 'index']);
Route::get('user-infos', [UserInfoController::class, 'index']);
