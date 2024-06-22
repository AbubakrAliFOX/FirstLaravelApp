<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Job;
use App\Models\Empolyer;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    protected static ?string $password;
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(1)->create();

        Job::factory(200)->create();
    }
}
