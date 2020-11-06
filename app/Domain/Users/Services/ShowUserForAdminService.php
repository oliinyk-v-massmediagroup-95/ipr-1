<?php

namespace App\Domain\Users\Services;

use App\Database\Models\User;
use App\Database\Queries\UserQueries;
use App\Enums\Role;
use Illuminate\Support\Collection;

class ShowUserForAdminService
{
    private UserQueries $userQueries;
    private array $canSeeRoles = [Role::SUPPLIER, Role::CLIENT];

    public function __construct(UserQueries $userQueries)
    {
        $this->userQueries = $userQueries;
    }

    public function list(): Collection
    {
        return $this->userQueries->getByRoles($this->canSeeRoles);
    }

    public function single(User $user)
    {
        if(!in_array($user->role, $this->canSeeRoles, true)) {
            throw new \LogicException('Invalid User');
        }

        return $this->userQueries->load($user, []);
    }
}
