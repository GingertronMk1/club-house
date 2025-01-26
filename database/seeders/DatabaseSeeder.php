<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (! App::isProduction()) {
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@clubhouse.test',
                'password' => 12345678,
                'is_site_admin' => true,
            ]);
        }

        Club::factory(20)->create();
    }
}
