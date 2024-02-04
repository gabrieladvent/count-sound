<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'id' => 1,
                'name' => 'Caleg 1'
            ],
            [
                'id' => 2,
                'name' => 'Caleg 2'
            ],
            [
                'id' => 3,
                'name' => 'Caleg 3'
            ],
            [
                'id' => 4,
                'name' => 'Caleg 4'
            ],
        ];

        foreach ($user as $users) {
            User::create($users);
        }
    }
}
