<?php

namespace Modules\Auth\Services;

class AuthService
{
    public function handle()
    {
        //
    }
    public function generateToken($credentials){
       return auth()->attempt($credentials);
    }
    public function handleTokenResponse($token){
        return response()->json([
            'token' => $token,
            'user' => auth()->user(),
            'expire_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
