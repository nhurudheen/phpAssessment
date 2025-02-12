<?php

use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api.key'])->controller(APIController::class)->group( function () {
    Route::get('/test','testing');
    Route::get('/employee-record', 'employeeRecords');
    Route::get('/fetch-employee-record/{employeePhoneNumber}', 'fetchEmployeeRecord');
    Route::post('/create-account', 'createAccount');
    Route::put('/update-record', 'updateEmployeeRecord');
});
