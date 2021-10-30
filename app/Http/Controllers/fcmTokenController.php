<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class fcmTokenController extends Controller
{
    
    //update token to user table
    public function saveToken(Request $request)
    {
        auth()->user()->update(['device_token'=>$request->token]);
        return response()->json(['Token successfully stored.']);        
    }
}
