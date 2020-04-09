<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email"=>"required",
            "password"=>"required",
        ]);
        $client = Client::where("email",$request->email)->first();
        if(!$client || !Hash::check($request->password,$client->password))
        {
            return response()->json(["message"=>"Email ou mot de passe incorrect"],401);
        }
        $token = Str::random(60);
        $client->api_token = $token;
        $client->save();
        return response()->json(["message"=>$token],200);;
    }
    public function signup(Request $request)
    {
        $request->validate([
            "email"=>"required|email|unique:clients",
            "password"=>"required",
            "tele"=>"required",
            "name"=>"required",
        ]);
        Client::create([
            "email"=>$request->email,
            "telephone"=>$request->tele,
            "name"=>$request->name,
            "password"=>Hash::make($request->password)
        ]);
        return response()->json(["message"=>"Votre compte a été créé avec succès"]);
    }
}
