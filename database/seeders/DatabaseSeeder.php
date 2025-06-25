<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Bruce Wayne',
            'email' => 'bruce.wayne@example.com',
            'password' => 'AlfredJTM',
        ]);

        User::factory()->create([
            'name' => 'Korben Dallas',
            'email' => 'corben.dallas@example.com',
            'password' => 'Multipass',
        ]);

        User::factory()->create([
            'name' => 'John Smith',
            'email' => 'john.smith@example.com',
            'password' => 'Néo',
        ]);
    }
}