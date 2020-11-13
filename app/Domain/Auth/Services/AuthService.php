<?php


namespace Auth\Services;

use App\Database\Models\User;
use App\Database\Queries\UserQueries;
use App\Exceptions\ValidationException;
use App\Helpers\Proxy\AuthProxy;
use Illuminate\Hashing\BcryptHasher;

class AuthService
{
    private AuthProxy $auth;
    private UserQueries $userQueries;
    private BcryptHasher $bcryptHasher;

    public function __construct(AuthProxy $authProxy, UserQueries $userQueries, BcryptHasher $bcryptHasher)
    {
        $this->auth = $authProxy;
        $this->userQueries = $userQueries;
        $this->bcryptHasher = $bcryptHasher;
    }


    public function login(string $email, string $password, bool $rememberMe): User
    {
        $user = $this->userQueries->findByEmail($email);

        if (!isset($user) || !$this->bcryptHasher->check($password, $user->password)) {
            throw new ValidationException(['email' => 'Invalid Credentials']);
        }

        $this->auth->login($user, $rememberMe);

        return $user;
    }

    public function checkAuth(): ?User
    {
        if ($this->auth->check()) {
            return $this->auth->user();
        }

        return null;
    }

    public function logout()
    {
        $this->auth->logout();
    }
}
