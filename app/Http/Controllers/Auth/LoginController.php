<?php

namespace App\Http\Controllers\Auth;

use App\Database\Queries\UserQueries;
use App\Exceptions\ValidationException;
use App\Helpers\AppResponse;
use App\Helpers\Proxy\AuthProxy;
use App\Http\Controllers\Controller;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Auth\SessionGuard;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    private UserQueries $userQueries;
    private BcryptHasher $bcryptHasher;
    private AuthProxy $auth;

    public function __construct(UserQueries $userQueries, BcryptHasher $bcryptHasher, AuthProxy $auth)
    {
        $this->userQueries = $userQueries;
        $this->bcryptHasher = $bcryptHasher;
        $this->auth = $auth;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $user = $this->userQueries->findByEmail($request->get('email'));

        if (!isset($user) || !$this->bcryptHasher->check($request->get('password'), $user->password)) {
            throw new ValidationException(['email' => 'Invalid Credentials']);
        }

        $this->auth->login($user, $request->get('rememberMe'));

        return AppResponse::success();
    }

}
