<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => password_hash('admin@123', PASSWORD_DEFAULT),
        ]);
        
        \App\Models\Staff::factory()->create([
            'name' => 'Staff1',
            'email' => 'staff1@gmail.com',
            'username' => 'staff1',
            'role' => 1,
            'password' => password_hash('staff1@123', PASSWORD_DEFAULT),
        ]);

        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
    }
}
