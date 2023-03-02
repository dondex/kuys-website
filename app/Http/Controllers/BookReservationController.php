<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookReservation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmation;

class BookReservationController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone_number' => 'required|string|max:20',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'number_of_guests' => 'required|integer|min:1',
            'message' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $ip_address = $request->ip();

        // Check if there is a previous booking from the same IP address
        $previousReservation = BookReservation::where('ip_address', $ip_address)->first();
        if ($previousReservation) {
            return response()->json([
                'message' => 'You already have a reservation'
            ], 422);
        }

        $reservation = new BookReservation();
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone_number = $request->phone_number;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->number_of_guests = $request->number_of_guests;
        $reservation->message = $request->message;
        $reservation->ip_address = $ip_address;
        $reservation->save();

        $mailData = [
            'name' => $reservation->name,
            'email' => $reservation->email,
            'phone_number' => $reservation->phone_number,
            'date' => $reservation->date,
            'time' => $reservation->time,
            'number_of_guests' => $reservation->number_of_guests,
            'message' => $reservation->message,
        ];

        // Send email
        Mail::to('dex.chavez21@gmail.com')->send(new ReservationConfirmation($mailData));

        return response()->json([
            'message' => 'Reservation created successfully',
            'reservation' => $reservation
        ], 201);
    }

    public function checkReservation(Request $request)
    {
        // Logic to check if reservation exists

        return response()->json(['message' => 'Reservation exists'], 200);
    }
}
