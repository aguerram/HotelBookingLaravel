<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Review;

class ReviewController extends Controller
{
    public function vote(Request $request, Hotel $hotel)
    {
        $request->validate([
            "stars" => "required|min:1|max:5"
        ]);
        $totalVotes = $hotel->totalVotes()->count();
        if (Review::where([
            ["hotel_id","=",$hotel->id],
            ["client_id","=",auth()->user()->id]
        ])->first() != null) {
            return response()->json(["message" => "Vous avez déjà voté"], 400);
        }
        Review::create([
            "hotel_id" => $hotel->id,
            "client_id" => auth()->user()->id,
            "stars" => $request->stars
        ]);
        if ($hotel->stars == null) {
            $hotel->stars = $request->stars;
        } else {
            $hotel->stars = (($hotel->stars*$totalVotes)+$request->stars)/($totalVotes+1);
        }
        $hotel->save();
        return response()->json(["message" => "Vous avez voté avec succès"], 200);
    }
}
