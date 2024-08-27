<?php

namespace App\Http\Controllers;

use App\Models\Users;
use GuzzleHttp\Psr7\Response;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeUnit\FunctionUnit;

class AuthController extends Controller
{
     public function register(Request $request){
        $request->validate([
            'email'=> 'required|string|unique:users,email',
            'password'=> 'required|string'
        ]);

        $user = Users::create([
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ]);

        $token = $user->createToken('firsttoken')->plainTextToken;

        $response =[
            'user'=> $user,
            'token'=>$token
        ];

        return response($response, 201);
     }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);

        $user = Users::where('email', $request->email)->first();

        if(!$user ||!Hash::check($request->password, $user->password)){
            return response([
                'message'=>'Credenciais Inválidas'
            ], 401);
        }
        
        $token = $user->createToken('firsttoken')->plainTextToken;

        $response =[
            'user'=> $user,
            'token'=>$token
        ];

        return response($response, 200);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return [
            'message'=>'logout realizado com sucesso'
        ];
    }

}
