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

        User::factory()->create(
        [
            'name' => 'Aul',
            'email' => 'mardhiyahauliyarahmanlubis@mail.ug.ac.id',
            'password' => bcrypt('admin'),
        ]
    );

    User::factory()->create(
        [
            'name' => 'Lia',
            'email' => 'mardhiyahauliya181004@gmail.com',
            'password' => bcrypt('admin123'),
        ]
        );
    }
}
