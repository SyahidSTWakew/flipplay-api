
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\UserCollectionController;

Route::apiResource('media', MediaController::class);

Route::get('/users/{user}/collection',
    [UserCollectionController::class, 'index']);

Route::post('/users/{user}/collection/{media}',
    [UserCollectionController::class, 'store']);

Route::delete('/users/{user}/collection/{media}',
    [UserCollectionController::class, 'destroy']);