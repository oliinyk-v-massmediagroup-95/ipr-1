<?php

namespace Users\Http\Controllers;

use App\Helpers\AppResponse;
use Illuminate\Http\JsonResponse;
use Users\Http\Resources\UserResource;
use Users\Services\ShowUserForAdminService;

class ShowUserController
{
    private ShowUserForAdminService $showUserService;

    public function __construct(ShowUserForAdminService $showUserForAdminService)
    {
        $this->showUserService = $showUserForAdminService;
    }

    public function list(): JsonResponse
    {
        $users = $this->showUserService->userList();

        return AppResponse::success([
            'users' => UserResource::collection($users),
        ]);
    }
}
