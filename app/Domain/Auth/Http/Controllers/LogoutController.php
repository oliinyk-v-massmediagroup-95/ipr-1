<?php

namespace Auth\Http\Controllers;

use App\Helpers\AppResponse;
use Auth\Services\AuthService;
use Illuminate\Http\JsonResponse;

class LogoutController
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function logout(): JsonResponse
    {
        $this->authService->logout();

        return AppResponse::success();
    }
}
