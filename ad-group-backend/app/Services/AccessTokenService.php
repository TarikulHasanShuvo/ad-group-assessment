<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;


class AccessTokenService
{
    /**
     * @param $user
     * @return JsonResponse
     */
    public static function getAccessToken($user): JsonResponse
    {
        return response()->json([
            'user' => UserResource::make($user),
            'access_token' => $user->createToken("API TOKEN")->plainTextToken,
            'status' => 200,
            'token_type' => 'Bearer',
        ]);
    }
}
