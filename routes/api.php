<?php

use App\Http\Controllers\BookReservationController;
use App\Http\Controllers\InquiryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Reservation
Route::post('/book-reservation', [BookReservationController::class, 'store']);
Route::get('/check-reservation', [BookReservationController::class, 'checkReservation']);

//Inquiries
Route::post('/inquiries', [InquiryController::class, 'store']);
