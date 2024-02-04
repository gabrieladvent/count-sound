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
        User::create(['name' => 'Caleg 1']);
        User::create(['name' => 'Caleg 2']);
        User::create(['name' => 'Caleg 3']);
        User::create(['name' => 'Caleg 4']);
    }
}
