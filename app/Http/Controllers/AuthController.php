<?php

namespace App\Http\Controllers;

use App\Helpers\Responder;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\PessoaViewResource;
use App\Models\Usuario;
use Illuminate\Auth\AuthenticationException;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $usuario->pessoa()->create(['nome' => $request->nome]);

        $token = auth()->login($usuario);

        return $this->respondWithToken($token);
    }

    /**
     * @param AuthRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws AuthenticationException
     */
    public function login(AuthRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            throw new AuthenticationException();
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();

        return Responder::success([], 'Deslogado com sucesso');
    }

    protected function respondWithToken($token)
    {
//        return response()->json([
//            'access_token' => $token,
//            'token_type'   => 'bearer',
//            'expires_in'   => auth()->factory()->getTTL() * 60
//        ]);

        $dados = [
            'access_token' => $token,
            'expires_in' => auth()->factory()->getTTL() * 60,
        ];

        return Responder::success(new PessoaViewResource(auth()->user()->pessoa), '', $dados);
    }
}
