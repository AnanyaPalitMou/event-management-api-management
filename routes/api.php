<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/member_registration', [AuthController::class, 'memberRegistration']);
Route::post('/login', [AuthController::class, 'login']); 
Route::get('/user/{id}', [AuthController::class, 'User'])->middleware('auth:sanctum');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

//Users
//get Users
Route::get('/users', [UsersController::class, 'getUsers']);

//get single User
//Route::get('/user/{id}', [UsersController::class, 'getUsers']);

//Create Users
Route::post('/create_user', [UsersController::class, 'createUser']);

//Update Users
Route::put('/update_user/{id}', [UsersController::class, 'updateUser']);

//Delete Users
Route::delete('/delete_user/{id}', [UsersController::class, 'deleteUser']); 


//Bookings
//get All Bookings
Route::get('/bookings', [BookingsController::class, 'getAllBookings']);


//Events
//get All Events
Route::get('/events', [EventsController::class, 'events']);
