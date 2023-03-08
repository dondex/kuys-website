<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\InquirySubmitted;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $inquiry = Inquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Send an email to the admin after a successful submission
        // Mail::to('dex.chavez21@gmail.com')->send(new InquirySubmitted($inquiry));

        return response()->json(['message' => 'Inquiry submitted successfully']);
    }
}
