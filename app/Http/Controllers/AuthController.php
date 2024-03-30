<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use ApiResponseTrait;
    public function register(Request $request){
        $request->validate([
            'name' => 'string|required',
            'image' => 'image|nullable',
            'email'=> 'string|email|required',
            'password'=> 'string|required',
        ]);

        $image = $request->image;

        if($image != null && !$image->getError()){
            $image = $request->image->store('asset', 'public');
        }

        $user = User::create([
            'name'=> $request->name,
            'image'=> $image,
            'email'=> $request->email,
            'password'=> $request->password
        ]);

        $token = \auth()->login($user);

        return $this->successResponse(
            ['token' => $token, 'user' => $user],
            'Inscription effectue avec succes'
        );
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'string|email|required',
            'password' => 'string|required'
        ]);

        $credentials = $request->only('email', 'password');

        if (! $token = JWTAuth::attempt($credentials)){
            return $this->unauthorizedResponse('Login ou mot de passe incorrect');
        }

        return $this->successResponse(
            ['token' => $token, 'user' => Auth::user()],
            'connexion effectue avec succes'
        );
    }

    public function loggedUser()
    {
        return new UserResource(Auth::user());
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message', 'Vous vous etes deconnecte']);
    }
}
