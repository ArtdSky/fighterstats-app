<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function createToken(Request $request)
    {
        $request->validate([
            'token_name' => 'required|string|max:255',
        ]);

        $token = $request->user()->createToken($request->token_name);
//        $token = $request->user()->createToken('token-name', ['server:update'])->plainTextToken;
        return response()->json(['token' => $token->plainTextToken]);
    }
}
