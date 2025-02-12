<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller( UserController::class )->group(

    function () {
        Route::get( '/', 'index' )->name( 'index' );
        Route::get( '/signUp', 'signUp' )->name( 'signUp' );
        Route::get('/logout', 'logOut')->name('logOut');
        Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware(['auth.access']);
        Route::get('/delete-record/{id}','deleteRecord')->name('deleteRecord');
        Route::post('/update-record', 'updateEmployeeRecord');
        Route::post( '/create-account', 'createAccount' );
        Route::post('/sign-in', 'signIn');
    }
);
