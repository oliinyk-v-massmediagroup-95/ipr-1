<?php

namespace Auth\Http\Controllers;

use App\Helpers\AppResponse;

use Auth\Http\Requests\LoginRequest;
use Auth\Services\AuthService;
use Illuminate\Http\JsonResponse;

class LoginController
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $this->authService->login(
            $request->get('email'),
            $request->get('password'),
            $request->get('rememberMe', false)
        );

        return AppResponse::success();
    }

}
