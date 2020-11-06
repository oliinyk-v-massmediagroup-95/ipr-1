<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\AppResponse;
use App\Helpers\Proxy\AuthProxy;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class CheckAuthController extends Controller
{
    private AuthProxy $auth;

    public function __construct(AuthProxy $auth)
    {
        $this->auth = $auth;
    }

    public function check()
    {
        if ($this->auth->check()) {
            $user = $this->auth->user();

            return AppResponse::success([
                'user' => UserResource::make($user),
            ]);
        }

        return AppResponse::failed('Not Authorized', 200);
    }
}
