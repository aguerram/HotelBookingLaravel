<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservation(Request $request, Hotel $hotel)
    {
        $request->validate([
            "from" => "required|date",
            "to" => "required|date",
            "for" => "required|min:1|max:100",
            "rooms" => "required|min:1|max:100"
        ]);
        $client = auth()->user();

        Reservation::create([
            "hotel_id" => $hotel->id,
            "client_id" => $client->id,
            "guests" => $request->for,
            "from" => $request->from,
            "to" => $request->to,
        ]);

        return response()->json([
            "message" => "Votre réservation a été enregistrée, vous devez payer " . ($hotel->price * $request->for) . " DH"
        ]);
    }
}
