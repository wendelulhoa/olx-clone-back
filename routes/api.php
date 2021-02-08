<?php

use App\Http\Controllers\AnunciosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh',[AuthController::class, 'refresh']);
    Route::post('me',[AuthController::class, 'me']);
});
Route::group(['prefix'=>'anuncios'], function(){
    Route::get('',[AnunciosController::class, 'index']);
    Route::post('create', [AnunciosController::class, 'createAnuncio']);
});
Route::group(['prefix'=>'user'], function(){
    Route::get('');
    Route::post('create', [ UsersController::class, 'createUser']);
});