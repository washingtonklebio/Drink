<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\User; 

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function signin (Request $request) {

        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email', 
            'password' => 'required', 
        ]);

        if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            $response = array_key_exists('email', $errors) ? 
            $errors->email : $errors->password;           

            return response()->json(['message' => $response], 422);            
        }
        
        $credentials = $this->credentials($request);
        $token = \JWTAuth::attempt($credentials);
        
        if ($token) {
            $user = auth()->user();
            $user['token'] = $token;
            
            return $user;
        }

        return response()->json([
                'message' => \Lang::get('auth.failed')
            ], 400);
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

            $user = new User;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
           
            $user->save();
            
            return response()->json(['message' => 'Usuario criado com sucesso'], 201);

        } catch (\Exception $e) {

			if(config('app.debug')) {
				return response()->json(['message' => $e->getMessage()], 500);
			}
            
            return response()->json(['message' => 'Houve um erro ao criar usuário'], 500);
		}
    }
}
