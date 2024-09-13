<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

//basic Route
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);



Route::group([
    'middleware' => 'auth:api',
], function (){



//posts
Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class)
->names([
    'index' => 'posts.index',
    'store' => 'posts.store',
    'show' => 'posts.show',
    'update' => 'posts.update',
    'destroy' => 'posts.destroy',
]);


Route::post('/user', [AuthController::class, 'userProfile']);
Route::post('/logout', [AuthController::class, 'logout']);

});
