<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\AppResponse;
use App\Helpers\Proxy\AuthProxy;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    private AuthProxy $auth;

    public function __construct(AuthProxy $auth)
    {
        $this->auth = $auth;
    }

    public function logout(): JsonResponse
    {
        $this->auth->logout();

        return AppResponse::success();
    }
}
