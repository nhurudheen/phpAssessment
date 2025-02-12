<?php

use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api.key'])->controller(APIController::class)->group( function () {
    Route::get('/test','testing');
    Route::post('/create-account', 'createAccount');
});
