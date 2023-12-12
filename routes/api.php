<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


Route::post('/login', [AuthController::class, 'loginUser']);
Route::post('/registration', [AuthController::class, 'registrationUser']);

Route::middleware('auth:api')->group(function (){
    // user interface
    Route::controller(AuthController::class)
        ->group(function (){
            Route::get('/logout', 'logoutUser');
        });
            Route::resource('/friends', '\App\Http\Controllers\Friends\FriendController')->only('index', 'store', 'destroy');
            Route::get('possible/friends', [\App\Http\Controllers\Friends\PossibleFriendsController::class, 'index']);
    });
