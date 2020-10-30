<?php

namespace Database\Seeders;

use App\Database\User\User;
use Database\Factories\UserFactory;
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
    {
        foreach ($this->admins as $user) {
            User::factory([
                'email' => $user['email'],
                'password' => $user['password'],
                'role' => User::ROLE_ADMIN
            ]);
        }

        foreach ($this->clients as $user) {
            User::factory([
                'email' => $user['email'],
                'password' => $user['password'],
                'role' => User::ROLE_CLIENT,
            ]);
        }

        foreach ($this->supplier as $user) {
            User::factory([
                'email' => $user['email'],
                'password' => $user['password'],
                'role' => User::ROLE_SUPPLIER,
            ]);
        }
    }
}
