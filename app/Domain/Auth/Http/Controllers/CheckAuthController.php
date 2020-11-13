<?php

namespace Auth\Http\Controllers;

use App\Helpers\AppResponse;
use Auth\Services\AuthService;
use Users\Http\Resources\UserResource;

class CheckAuthController
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function check()
    {
        $user = $this->authService->checkAuth();

        if (isset($user)) {
            return AppResponse::success([
                'user' => UserResource::make($user),
            ]);
        }

        return AppResponse::failed('Not Authorized', 200);
    }
}
