<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function profile()
    {
        $client = Client::find(auth()->user()->id);
        return $client->with(["reservations","reviews"])->first();
    }
}
