<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller( UserController::class )->group(

    function () {
        Route::get( '/', 'index' )->name( 'index' );
        Route::get( '/signUp', 'signUp' )->name( 'signUp' );
        Route::get('/logout', 'logOut')->name('logOut');
        Route::post( '/create-account', 'createAccount' );
        Route::post('/sign-in', 'signIn');
        Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware(['auth.access']);
    }
);
