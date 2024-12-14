<?php

use App\Http\Controllers\Api\TokenController;
use App\Http\Middleware\ForceJsonRequestHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/tokens/initial', [TokenController::class, 'initialToken']);

Route::post('/tokens/create', [TokenController::class, 'createToken'])
    ->middleware('auth:sanctum');


