<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Usuario;
use Illuminate\Auth\AuthenticationException;

class AuthController extends Controller
{
    public function register(AuthRequest $request)
    {
        $user = Usuario::create([
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }

    public function login(AuthRequest $request)
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            throw new AuthenticationException();
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Deslogado com sucesso']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60
        ]);
    }
}
