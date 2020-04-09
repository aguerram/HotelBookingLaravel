<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function profile()
    {
        return Client::where("id",auth()->user()->id)->with(["reservations.hotel:id,title","reviews.hotel:id,title"])->first();
    }
}
