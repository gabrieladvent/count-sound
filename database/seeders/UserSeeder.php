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
        User::create(['name' => 'Martinus Welan']);
        User::create(['name' => 'Susmiati']);
        User::create(['name' => 'Simon Ruron']);
        User::create(['name' => 'Kristina']);
    }
}
