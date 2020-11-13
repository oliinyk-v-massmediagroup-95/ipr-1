<?php

namespace Users\Services;

use App\Database\Models\User;
use App\Database\Queries\UserQueries;
use App\Enums\Role;
use Illuminate\Support\Collection;
use LogicException;

class ShowUserForAdminService
{
    private UserQueries $userQueries;
    private array $canSeeRoles = [Role::SUPPLIER, Role::CLIENT];

    public function __construct(UserQueries $userQueries)
    {
        $this->userQueries = $userQueries;
    }

    public function userList(): Collection
    {
        return $this->userQueries->getByRoles($this->canSeeRoles);
    }

    public function userShow(User $user): User
    {
        if(!in_array($user->role, $this->canSeeRoles, true)) {
            throw new LogicException('Invalid User');
        }

        return $this->userQueries->load($user, []);
    }
}
