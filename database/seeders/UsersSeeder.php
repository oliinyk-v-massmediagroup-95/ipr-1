<?php

namespace Database\Seeders;

use App\Database\Models\User;
use App\Enums\Role;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    private array $admins = [
        [
            'email' => 'admin@example.net',
            'password' => 'password'
        ],
        [
            'email' => 'admin2@example.net',
            'password' => 'password'
        ],
    ];

    private array $clients = [
        [
            'email' => 'client@example.net',
            'password' => 'password'
        ],
        [
            'email' => 'client2@example.net',
            'password' => 'password'
        ],
    ];

    private array $supplier = [
        [
            'email' => 'supplier@example.net',
            'password' => 'password'
        ],
        [
            'email' => 'supplier2@example.net',
            'password' => 'password'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {;
        foreach ($this->admins as $user) {
            User::factory([
                'email' => $user['email'],
                'password' => $user['password'],
                'role' => Role::ADMIN
            ])->create();
        }

        foreach ($this->clients as $user) {
            User::factory([
                'email' => $user['email'],
                'password' => $user['password'],
                'role' => Role::CLIENT,
            ])->createOne();
        }

        foreach ($this->supplier as $user) {
            User::factory([
                'email' => $user['email'],
                'password' => $user['password'],
                'role' => Role::SUPPLIER,
            ])->createOne();
        }
    }
}
