<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingsController extends Controller
{
    public function getAllBookings(){
        $bookings=Booking::with(['user', 'event'])->get();
        return response()->json(['message'=>'Data Found', 'data'=>$bookings]);
    }
}
