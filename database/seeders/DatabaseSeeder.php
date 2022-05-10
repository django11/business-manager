<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', 'test@test.com')->first()) {
            $user = User::factory()->create(['email' => 'test@test.com']);

            $user->companies()->saveMany(Company::factory(20)->make(['user_id' => null]));
        }
    }
}
