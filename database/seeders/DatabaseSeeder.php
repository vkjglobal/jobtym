<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Employer;
use App\Models\Package;
use App\Models\User;
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
        // User::factory(50)->create();
        // Package::factory(10)->create();
        // Employer::factory(10)->create();

        if (!Admin::where('email', 'admin@jobtym.com')->first()) {
            Admin::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@jobtym.com',
            ]);
        }
    }
}
