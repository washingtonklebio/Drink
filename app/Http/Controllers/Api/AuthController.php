<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function signin (Request $request) {
        $this->validateLogin($request);
        
        $credentials = $this->credentials($request);

        $token = \JWTAuth::attempt($credentials);

        return $this->responseToken($token);
    }

    public function signup (Request $request) {

    }

    private function responseToken($token) {
        return $token ? ['token' => $token] :
            response()->json([
                'error' => \Lang::get('auth.failed')
            ], 400);
    }
}
