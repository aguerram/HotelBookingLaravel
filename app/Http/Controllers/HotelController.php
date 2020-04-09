<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Review;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function all()
    {
        return Hotel::all()->makeHidden("description");
    }
    public function show(Hotel $hotel)
    {
        return $hotel->where("id",$hotel->id)->withCount("totalVotes")->first();
    }
    public function search(Request $request,$search)
    {
        $minPrice =  $request->get("minPrice");
        $minStars =  $request->get("minStars");
        $maxPrice =  $request->get("maxPrice");

        $searchArray = [];
        array_push($searchArray,["address","like","%".$search."%"]);
        if(isset($minPrice))
        {
            array_push($searchArray,["price",">=",$minPrice]);
        }
        if(isset($minStars))
        {
            array_push($searchArray,["stars",">=",$minStars]);
        }
        if(isset($maxPrice))
        {
            array_push($searchArray,["price","<=",$maxPrice]);
        }
        return Hotel::where($searchArray)->get();
    }

}
