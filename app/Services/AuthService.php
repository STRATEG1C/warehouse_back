<?php

namespace App\Services;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class AuthService
{
    public function getCurrentAuthenticatedUser(Request $request)
    {
        return $request->user();
    }

    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
    }

}
