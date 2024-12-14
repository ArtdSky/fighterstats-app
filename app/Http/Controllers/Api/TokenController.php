<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateTokenRequest;
use App\Http\Requests\Api\InitialTokenRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    /**
     * метод отвечает за аутентификацию пользователя. Принимает учетные данные (email и password)
     * если они верны, создает новый токен для аутентифицированного пользователя
     */
    public function initialToken(InitialTokenRequest $request): JsonResponse
    {
        $data = $request->validated();

        if (Auth::attempt($data)) {
            $user = Auth::user();

            $existingToken = $user->tokens()->where('name', 'AppInitialToken')->first();

            if ($existingToken) {
                $existingToken->delete();
            }

            $token = $user->createToken('AppInitialToken');

            return response()->json(['token' => $token->plainTextToken]);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    /**
     * метод предназначен для создания нового токена для уже аутентифицированного пользователя.
     * Он предполагает, что пользователь уже вошел в систему и имеет действующий токен
     */
    public function createToken(CreateTokenRequest $request): JsonResponse
    {
        $data = $request->validated();

        $token = $request->user()->createToken($data['token_name']);

        return response()->json(['token' => $token->plainTextToken]);
    }
}
