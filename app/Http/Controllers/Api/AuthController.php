<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\User; 

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
        try {
            
            $validator = Validator::make($request->all(), [ 
                'name' => 'required|min:3', 
                'email' => 'required|email|unique:users', 
                'password' => 'required', 
                'c_password' => 'required|same:password|min:6', 
            ]);

            if ($validator->fails()) { 
                return response()->json(['message'=>$validator->errors()], 401);            
            }

            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
           
            $user->save();
            
            return response()->json(['message' => 'Usuario criado com sucesso'], 201);

        } catch (\Exception $e) {

			if(config('app.debug')) {
				return response()->json(['message' => $e->getMessage()], 500);
			}
            
            return response()->json(['message' => 'Houve um erro ao criar usuário'], 500);
		}
    }

    private function responseToken($token) {
        return $token ? ['token' => $token] :
            response()->json([
                'error' => \Lang::get('auth.failed')
            ], 400);
    }
}
