<?php

namespace Database\Seeders;

use App\Database\Models\User;
use App\Enums\Role;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    private array $admins = [
        [
            'email' => 'admin1@example.net',
        ],
        [
            'email' => 'admin2@example.net',
        ],
    ];

    private array $clients = [
        [
            'email' => 'client1@example.net',
        ],
        [
            'email' => 'client2@example.net',
        ],
    ];

    private array $supplier = [
        [
            'email' => 'supplier1@example.net',
        ],
        [
            'email' => 'supplier2@example.net',
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
                'role' => Role::ADMIN
            ])->create();
        }

        foreach ($this->clients as $user) {
            User::factory([
                'email' => $user['email'],
                'role' => Role::CLIENT,
            ])->createOne();
        }

        foreach ($this->supplier as $user) {
            User::factory([
                'email' => $user['email'],
                'role' => Role::SUPPLIER,
            ])->createOne();
        }
    }
}
